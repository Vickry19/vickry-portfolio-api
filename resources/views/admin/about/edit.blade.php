@extends('admin.layouts.app')

@section('title', 'About — Vickry CMS')

@section('header', 'Content')

@section('heading', 'About')

@section('content')

@if(session('success'))
    <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-300">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-6 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">
        <ul class="list-disc space-y-1 pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ route('admin.about.update') }}"
    method="POST"
    class="mx-auto max-w-5xl space-y-6"
>

    @csrf
    @method('PUT')

    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            About Content
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Manage the descriptions displayed in the About section.
        </p>

        <div class="mt-6 space-y-6">

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Indonesian Description
                </label>

                <textarea
                    name="description_id"
                    rows="7"
                    placeholder="Tulis deskripsi About dalam Bahasa Indonesia..."
                    class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                >{{ old('description_id', $about->description_id) }}</textarea>
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    English Description
                </label>

                <textarea
                    name="description_en"
                    rows="7"
                    placeholder="Write your About description in English..."
                    class="w-full resize-y rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                >{{ old('description_en', $about->description_en) }}</textarea>
            </div>

        </div>

    </section>

    <div class="flex items-center justify-between">

        <a
            href="{{ route('admin.about-statistics.index') }}"
            class="rounded-xl border border-white/10 px-5 py-3 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
        >
            Manage Statistics
        </a>

        <button
            type="submit"
            class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90"
        >
            Save Changes
        </button>

    </div>

</form>

@endsection