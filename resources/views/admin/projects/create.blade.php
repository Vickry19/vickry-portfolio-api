@extends('admin.layouts.app')

@section('title', 'Add Project — Vickry CMS')

@section('header', 'Projects')

@section('heading')
    Add Project
@endsection

@section('content')

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-white/10 bg-white/5 p-5">

            <p class="mb-3 text-sm font-medium text-white">
                Please fix the following errors:
            </p>

            <ul class="space-y-1 text-sm text-white/50">
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <form
        action="{{ route('admin.projects.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf

        {{-- Basic Information --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Basic Information
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Informasi utama project.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Number
                    </label>

                    <input
                        type="text"
                        name="number"
                        value="{{ old('number') }}"
                        placeholder="01"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Year
                    </label>

                    <input
                        type="text"
                        name="year"
                        value="{{ old('year') }}"
                        placeholder="2026"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm text-white/60">
                        Title *
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="NutriScan"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Slug
                    </label>

                    <input
                        type="text"
                        name="slug"
                        value="{{ old('slug') }}"
                        placeholder="nutriscan"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                    <p class="mt-2 text-xs text-white/30">
                        Kosongkan untuk generate otomatis dari title.
                    </p>
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category') }}"
                        placeholder="AI / Web Application"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Role
                    </label>

                    <input
                        type="text"
                        name="role"
                        value="{{ old('role') }}"
                        placeholder="Full Stack Developer"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Status
                    </label>

                    <input
                        type="text"
                        name="status"
                        value="{{ old('status') }}"
                        placeholder="Prototype"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

            </div>

        </div>

        {{-- Description --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Project Description
                </h2>
            </div>

            <div class="space-y-5">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Short Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Brief description of the project..."
                        class="w-full resize-none rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Long Description
                    </label>

                    <textarea
                        name="long_description"
                        rows="7"
                        placeholder="Detailed explanation of the project..."
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >{{ old('long_description') }}</textarea>
                </div>

                <div class="grid gap-5 md:grid-cols-2">

                    <div>
                        <label class="mb-2 block text-sm text-white/60">
                            Problem
                        </label>

                        <textarea
                            name="problem"
                            rows="6"
                            placeholder="What problem does this project solve?"
                            class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                        >{{ old('problem') }}</textarea>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-white/60">
                            Solution
                        </label>

                        <textarea
                            name="solution"
                            rows="6"
                            placeholder="How does the project solve the problem?"
                            class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                        >{{ old('solution') }}</textarea>
                    </div>

                </div>

            </div>

        </div>

        {{-- Technologies & Features --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Technologies & Features
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Satu item per baris.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Technologies
                    </label>

                    <textarea
                        name="technologies"
                        rows="8"
                        placeholder="React&#10;TypeScript&#10;Tailwind CSS&#10;API"
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >{{ old('technologies') }}</textarea>
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Features
                    </label>

                    <textarea
                        name="features"
                        rows="8"
                        placeholder="AI food analysis&#10;Barcode scanning&#10;Responsive interface"
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >{{ old('features') }}</textarea>
                </div>

            </div>

        </div>

        {{-- URLs --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Project Links
                </h2>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        GitHub URL
                    </label>

                    <input
                        type="url"
                        name="github_url"
                        value="{{ old('github_url') }}"
                        placeholder="https://github.com/..."
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Live URL
                    </label>

                    <input
                        type="url"
                        name="live_url"
                        value="{{ old('live_url') }}"
                        placeholder="https://..."
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

            </div>

        </div>

        {{-- Images --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">

                <h2 class="text-base font-semibold text-white">
                    Project Images
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Upload cover dan beberapa gambar gallery.
                </p>

            </div>

            <div class="space-y-6">

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Cover Image
                    </label>

                    <input
                        type="file"
                        name="cover_image"
                        accept="image/jpeg,image/png,image/webp"
                        class="block w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white/60"
                    >

                    <p class="mt-2 text-xs text-white/30">
                        JPG, PNG atau WEBP. Maksimal 5 MB.
                    </p>

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Gallery Images
                    </label>

                    <input
                        type="file"
                        name="gallery[]"
                        multiple
                        accept="image/jpeg,image/png,image/webp"
                        class="block w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white/60"
                    >

                    <p class="mt-2 text-xs text-white/30">
                        Bisa memilih beberapa gambar sekaligus.
                    </p>

                </div>

            </div>

        </div>

        {{-- Settings --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="grid gap-5 md:grid-cols-2">

                {{-- Sort Order --}}

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Sort Order
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', 0) }}"
                        min="0"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                </div>

                {{-- Visibility --}}

                <div class="flex items-end">

                    <label class="flex cursor-pointer items-center gap-3">

                        <input
                            type="checkbox"
                            name="is_visible"
                            value="1"
                            {{ old('is_visible', true) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-white/20 bg-black"
                        >

                        <span class="text-sm text-white/70">
                            Tampilkan project di website
                        </span>

                    </label>

                </div>

                {{-- Featured --}}

                <div class="flex items-center md:col-span-2">

                    <label class="flex cursor-pointer items-center gap-3">

                        <input
                            type="checkbox"
                            name="is_featured"
                            value="1"
                            {{ old('is_featured', false) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-white/20 bg-black"
                        >

                        <div>
                            <span class="block text-sm text-white/70">
                                Featured Project
                            </span>

                            <span class="mt-1 block text-xs text-white/30">
                                Jadikan project ini sebagai project utama di portfolio.
                            </span>
                        </div>

                    </label>

                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ route('admin.projects.index') }}"
                class="rounded-xl border border-white/10 px-5 py-3 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-xl bg-white px-6 py-3 text-sm font-semibold text-black transition hover:bg-white/90"
            >
                Save Project
            </button>

        </div>

    </form>

@endsection