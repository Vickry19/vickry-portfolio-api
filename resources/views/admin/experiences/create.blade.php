@extends('admin.layouts.app')

@section('title', 'Add Experience — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Add Experience')

@section('content')

@if($errors->any())

    <div class="mx-auto mb-6 max-w-3xl rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">

        <ul class="list-disc space-y-1 pl-5">

            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>

    </div>

@endif


<form
    action="{{ route('admin.experiences.store') }}"
    method="POST"
    class="mx-auto max-w-3xl"
>

    @csrf

    <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <div class="space-y-6">


            {{-- Period --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Period
                </label>

                <input
                    type="text"
                    name="period"
                    value="{{ old('period') }}"
                    placeholder="2026"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-white/30"
                >

            </div>


            {{-- Position --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Position
                </label>

                <input
                    type="text"
                    name="position"
                    value="{{ old('position') }}"
                    placeholder="Web Developer"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-white/30"
                >

            </div>


            {{-- Organization --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Organization / Project
                </label>

                <input
                    type="text"
                    name="organization"
                    value="{{ old('organization') }}"
                    placeholder="Architecture Wahyudi"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-white/30"
                >

            </div>


            {{-- Description --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="7"
                    placeholder="Describe your experience..."
                    class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-white/30"
                >{{ old('description') }}</textarea>

            </div>


            {{-- Technologies --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Technologies
                </label>

                <input
                    type="text"
                    name="technologies"
                    value="{{ old('technologies') }}"
                    placeholder="Laravel, Blade, MySQL, Tailwind CSS"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-white/30"
                >

                <p class="mt-2 text-xs text-white/30">
                    Pisahkan teknologi dengan koma.
                </p>

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
            <label class="flex cursor-pointer items-center gap-3">

                <input
                    type="checkbox"
                    name="is_visible"
                    value="1"
                    {{ old('is_visible', true) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-white/20 bg-[#111111]"
                >

                <span class="text-sm text-white/60">
                    Show this experience on the website
                </span>

            </label>

        </div>

    </div>


    <div class="mt-6 flex justify-end gap-3">

        <a
            href="{{ route('admin.experiences.index') }}"
            class="rounded-xl border border-white/10 px-5 py-3 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90"
        >
            Save Experience
        </button>

    </div>

</form>

@endsection