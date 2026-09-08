@extends('admin.layouts.app')

@section('title', 'Edit Statistic — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Edit Statistic')

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
    action="{{ route('admin.about-statistics.update', $aboutStatistic) }}"
    method="POST"
    class="mx-auto max-w-3xl"
>

    @csrf
    @method('PUT')

    <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <div class="space-y-6">

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Value
                </label>

                <input
                    type="text"
                    name="value"
                    value="{{ old('value', $aboutStatistic->value) }}"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Suffix
                </label>

                <input
                    type="text"
                    name="suffix"
                    value="{{ old('suffix', $aboutStatistic->suffix) }}"
                    placeholder="+"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-white/30"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Label
                </label>

                <input
                    type="text"
                    name="label"
                    value="{{ old('label', $aboutStatistic->label) }}"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Sort Order
                </label>

                <input
                    type="number"
                    name="sort_order"
                    value="{{ old('sort_order', $aboutStatistic->sort_order) }}"
                    min="0"
                    required
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                >
            </div>

            <label class="flex cursor-pointer items-center gap-3">

                <input
                    type="checkbox"
                    name="is_visible"
                    value="1"
                    {{ old('is_visible', $aboutStatistic->is_visible) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-white/20 bg-[#111111]"
                >

                <span class="text-sm text-white/60">
                    Show this statistic on the website
                </span>

            </label>

        </div>

    </div>

    <div class="mt-6 flex justify-between">

        <a
            href="{{ route('admin.about-statistics.index') }}"
            class="rounded-xl border border-white/10 px-5 py-3 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
        >
            ← Back
        </a>

        <button
            type="submit"
            class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90"
        >
            Update Statistic
        </button>

    </div>

</form>

@endsection