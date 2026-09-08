@extends('admin.layouts.app')

@section('title', 'Edit Project — Vickry CMS')

@section('header', 'Projects')

@section('heading')
    Edit Project
@endsection

@section('content')

    @if(session('success'))
        <div class="mb-6 rounded-xl border border-white/10 bg-white/5 px-5 py-4 text-sm text-white">
            {{ session('success') }}
        </div>
    @endif

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
        action="{{ route('admin.projects.update', $project) }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf
        @method('PUT')

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
                        value="{{ old('number', $project->number) }}"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Year
                    </label>

                    <input
                        type="text"
                        name="year"
                        value="{{ old('year', $project->year) }}"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm text-white/60">
                        Title *
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $project->title) }}"
                        required
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Slug
                    </label>

                    <input
                        type="text"
                        name="slug"
                        value="{{ old('slug', $project->slug) }}"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category', $project->category) }}"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Role
                    </label>

                    <input
                        type="text"
                        name="role"
                        value="{{ old('role', $project->role) }}"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Status
                    </label>

                    <input
                        type="text"
                        name="status"
                        value="{{ old('status', $project->status) }}"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
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
                        class="w-full resize-none rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >{{ old('description', $project->description) }}</textarea>

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Long Description
                    </label>

                    <textarea
                        name="long_description"
                        rows="7"
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >{{ old('long_description', $project->long_description) }}</textarea>

                </div>

                <div class="grid gap-5 md:grid-cols-2">

                    <div>

                        <label class="mb-2 block text-sm text-white/60">
                            Problem
                        </label>

                        <textarea
                            name="problem"
                            rows="6"
                            class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                        >{{ old('problem', $project->problem) }}</textarea>

                    </div>

                    <div>

                        <label class="mb-2 block text-sm text-white/60">
                            Solution
                        </label>

                        <textarea
                            name="solution"
                            rows="6"
                            class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                        >{{ old('solution', $project->solution) }}</textarea>

                    </div>

                </div>

            </div>

        </div>

        {{-- Technologies --}}
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
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >{{ old('technologies', $project->technologies) }}</textarea>

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Features
                    </label>

                    <textarea
                        name="features"
                        rows="8"
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >{{ old('features', $project->features) }}</textarea>

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
                        value="{{ old('github_url', $project->github_url) }}"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Live URL
                    </label>

                    <input
                        type="url"
                        name="live_url"
                        value="{{ old('live_url', $project->live_url) }}"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

            </div>

        </div>

        {{-- Cover --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <h2 class="mb-6 text-base font-semibold text-white">
                Cover Image
            </h2>

            @if($project->cover_image)

                <div class="mb-5 overflow-hidden rounded-xl border border-white/10">

                    <img
                        src="{{ asset('storage/' . $project->cover_image) }}"
                        alt="{{ $project->title }}"
                        class="h-56 w-full object-cover"
                    >

                </div>

            @endif

            <input
                type="file"
                name="cover_image"
                accept="image/jpeg,image/png,image/webp"
                class="block w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white/60"
            >

            <p class="mt-2 text-xs text-white/30">
                Upload gambar baru hanya jika ingin mengganti cover.
            </p>

        </div>

        {{-- Gallery --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">

                <h2 class="text-base font-semibold text-white">
                    Gallery
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Gambar yang sudah ada.
                </p>

            </div>

            @if($project->images->count())

                <div class="grid grid-cols-2 gap-4 md:grid-cols-4">

                    @foreach($project->images as $image)

                        <div class="overflow-hidden rounded-xl border border-white/10 bg-black/20">

                            <div class="aspect-[4/3]">

                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="{{ $image->alt ?? $project->title }}"
                                    class="h-full w-full object-cover"
                                >

                            </div>

                            <div class="p-3">

                                <form
                                    action="{{ route('admin.project-images.destroy', $image) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus gambar ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-full rounded-lg border border-white/10 px-3 py-2 text-xs text-white/50 transition hover:bg-white/10 hover:text-white"
                                    >
                                        Delete Image
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="rounded-xl border border-dashed border-white/10 px-5 py-10 text-center">

                    <p class="text-sm text-white/30">
                        Belum ada gallery image.
                    </p>

                </div>

            @endif

            <div class="mt-6 border-t border-white/10 pt-6">

                <label class="mb-2 block text-sm text-white/60">
                    Add Gallery Images
                </label>

                <input
                    type="file"
                    name="gallery[]"
                    multiple
                    accept="image/jpeg,image/png,image/webp"
                    class="block w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white/60"
                >

                <p class="mt-2 text-xs text-white/30">
                    Pilih satu atau beberapa gambar.
                </p>

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
                        value="{{ old('sort_order', $project->sort_order) }}"
                        min="0"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >

                </div>

                {{-- Visibility --}}

                <div class="flex items-end">

                    <label class="flex cursor-pointer items-center gap-3">

                        <input
                            type="checkbox"
                            name="is_visible"
                            value="1"
                            {{ old('is_visible', $project->is_visible) ? 'checked' : '' }}
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
                            {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
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
                Update Project
            </button>

        </div>

    </form>

@endsection