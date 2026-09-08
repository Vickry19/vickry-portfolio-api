@extends('admin.layouts.app')

@section('title', 'Add Education — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Add Education')

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
    action="{{ route('admin.educations.store') }}"
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
                    placeholder="2024 — Present"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none placeholder:text-white/20 focus:border-white/30"
                >

            </div>


            {{-- Degree --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Degree / Program
                </label>

                <input
                    type="text"
                    name="degree"
                    value="{{ old('degree') }}"
                    placeholder="Bachelor of Informatics"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none placeholder:text-white/20 focus:border-white/30"
                >

            </div>


            {{-- Institution --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Institution
                </label>

                <input
                    type="text"
                    name="institution"
                    value="{{ old('institution') }}"
                    placeholder="University / Institution Name"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none placeholder:text-white/20 focus:border-white/30"
                >

            </div>


            {{-- Description --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="6"
                    placeholder="Describe your education..."
                    class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none placeholder:text-white/20 focus:border-white/30"
                >{{ old('description') }}</textarea>

            </div>


            {{-- Focus --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Focus / Areas of Study
                </label>

                <textarea
                    name="focus"
                    rows="4"
                    placeholder="Software Development, Web Development, Database"
                    class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none placeholder:text-white/20 focus:border-white/30"
                >{{ old('focus') }}</textarea>

                <p class="mt-2 text-xs text-white/30">
                    Pisahkan setiap bidang dengan koma.
                </p>

            </div>


            {{-- Sort --}}
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
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
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
                    Show this education on the website
                </span>

            </label>

        </div>

    </div>


    <div class="mt-6 flex justify-end gap-3">

        <a
            href="{{ route('admin.educations.index') }}"
            class="rounded-xl border border-white/10 px-5 py-3 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90"
        >
            Save Education
        </button>

    </div>

</form>

@endsection