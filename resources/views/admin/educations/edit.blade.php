@extends('admin.layouts.app')

@section('title', 'Edit Education — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Edit Education')

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
    action="{{ route('admin.educations.update', $education) }}"
    method="POST"
    class="mx-auto max-w-3xl"
>

    @csrf
    @method('PUT')

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
                    value="{{ old('period', $education->period) }}"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
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
                    value="{{ old('degree', $education->degree) }}"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
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
                    value="{{ old('institution', $education->institution) }}"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
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
                    class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                >{{ old('description', $education->description) }}</textarea>

            </div>


            {{-- Focus --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Focus / Areas of Study
                </label>

                <textarea
                    name="focus"
                    rows="4"
                    class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                >{{ old('focus', $education->focus) }}</textarea>

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
                    value="{{ old('sort_order', $education->sort_order) }}"
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
                    {{ old('is_visible', $education->is_visible) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-white/20 bg-[#111111]"
                >

                <span class="text-sm text-white/60">
                    Show this education on the website
                </span>

            </label>

        </div>

    </div>


    <div class="mt-6 flex justify-between">

        <a
            href="{{ route('admin.educations.index') }}"
            class="rounded-xl border border-white/10 px-5 py-3 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
        >
            ← Back
        </a>

        <button
            type="submit"
            class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90"
        >
            Update Education
        </button>

    </div>

</form>

@endsection