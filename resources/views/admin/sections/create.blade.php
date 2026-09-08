@extends('admin.layouts.app')

@section('title', 'Add Section — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Add Section')

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
            Add a new section to your portfolio.
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
        action="{{ route('admin.sections.store') }}"
        method="POST"
        class="space-y-6"
    >

        @csrf


        {{-- Section Information --}}
        <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">

            <div class="mb-6">

                <h2 class="text-lg font-semibold">
                    Section Information
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Configure the identity and content of this section.
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
                        value="{{ old('key') }}"
                        required
                        placeholder="about"
                        class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                    <p class="mt-2 text-xs text-white/30">
                        Unique identifier, e.g. about, skills, projects.
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
                        value="{{ old('number') }}"
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
                        value="{{ old('eyebrow') }}"
                        placeholder="About"
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
                        value="{{ old('title') }}"
                        placeholder="About Me"
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
                        placeholder="Section description..."
                        class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >{{ old('subtitle') }}</textarea>

                </div>


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
                            checked
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
                Save Section
            </button>

        </div>

    </form>

</div>

@endsection