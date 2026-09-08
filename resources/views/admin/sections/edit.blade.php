@extends('admin.layouts.app')

@section('title', 'Edit Section — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Edit Section')

@section('content')

<div class="mx-auto max-w-3xl">

    <div class="mb-8">

        <a
            href="{{ route('admin.sections.index') }}"
            class="text-sm text-white/40 transition hover:text-white"
        >
            ← Back to Sections
        </a>

        <p class="mt-5 text-sm text-white/40">
            Update section content and settings.
        </p>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="mb-6 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">

            <ul class="list-disc space-y-1 pl-5">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Form --}}
    <form
        action="{{ route('admin.sections.update', $section) }}"
        method="POST"
        class="space-y-6"
    >

        @csrf
        @method('PUT')


        {{-- Section Information --}}
        <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">

            <div class="mb-6">

                <h2 class="text-lg font-semibold">
                    Section Information
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Configure the section identity and content.
                </p>

            </div>


            <div class="grid gap-5 md:grid-cols-2">


                {{-- Key --}}
                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Key
                    </label>

                    <input
                        type="text"
                        name="key"
                        value="{{ old('key', $section->key) }}"
                        required
                        class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                    <p class="mt-2 text-xs text-white/30">
                        Unique identifier for this section.
                    </p>

                </div>


                {{-- Number --}}
                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Number
                    </label>

                    <input
                        type="text"
                        name="number"
                        value="{{ old('number', $section->number) }}"
                        placeholder="01"
                        class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                </div>


                {{-- Eyebrow --}}
                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Eyebrow
                    </label>

                    <input
                        type="text"
                        name="eyebrow"
                        value="{{ old('eyebrow', $section->eyebrow) }}"
                        placeholder="About Me"
                        class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                </div>


                {{-- Title --}}
                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $section->title) }}"
                        placeholder="About"
                        class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                </div>


                {{-- Subtitle --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm text-white/60">
                        Subtitle
                    </label>

                    <textarea
                        name="subtitle"
                        rows="4"
                        placeholder="Section subtitle..."
                        class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >{{ old('subtitle', $section->subtitle) }}</textarea>

                </div>


                {{-- Sort Order --}}
                <div>

                    <label class="mb-2 block text-sm text-white/60">
                        Sort Order
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', $section->sort_order) }}"
                        min="0"
                        required
                        class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                </div>


                {{-- Visibility --}}
                <div class="flex items-center pt-7">

                    <label class="flex cursor-pointer items-center gap-3 text-sm text-white/60">

                        <input
                            type="checkbox"
                            name="is_visible"
                            value="1"
                            @checked(old('is_visible', $section->is_visible))
                            class="h-4 w-4 rounded"
                        >

                        <span>
                            Show this section on website
                        </span>

                    </label>

                </div>

            </div>

        </div>


        {{-- Actions --}}
        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.sections.index') }}"
                class="rounded-xl border border-white/10 px-5 py-3 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90"
            >
                Update Section
            </button>

        </div>

    </form>

</div>

@endsection