@extends('admin.layouts.app')

@section('title', 'Hero — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Hero')

@section('content')

@if(session('success'))
    <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-300">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-6 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ route('admin.hero.update') }}"
    method="POST"
    enctype="multipart/form-data"
    class="mx-auto max-w-5xl space-y-6"
>

    @csrf
    @method('PUT')

    {{-- Main Hero --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            Main Hero
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Main content displayed at the top of your portfolio.
        </p>

        <div class="mt-6 space-y-5">

            {{-- Hello --}}
            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Hello Text
                </label>

                <input
                    type="text"
                    name="hello_text"
                    value="{{ old('hello_text', $hero->hello_text) }}"
                    placeholder="Hello, I'm"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            {{-- Name --}}
            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $hero->name) }}"
                    placeholder="Vickry Kamaluddin."
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            {{-- Role --}}
            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Role
                </label>

                <input
                    type="text"
                    name="role"
                    value="{{ old('role', $hero->role) }}"
                    placeholder="Web Developer & Informatics Student"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            {{-- Description --}}
            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    placeholder="Write your hero description..."
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >{{ old('description', $hero->description) }}</textarea>
            </div>

        </div>

    </section>


    {{-- Availability --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            Availability
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Availability status displayed on the Hero section.
        </p>

        <div class="mt-6">

            <label class="mb-2 block text-sm text-white/60">
                Availability Text
            </label>

            <input
                type="text"
                name="availability_text"
                value="{{ old('availability_text', $hero->availability_text) }}"
                placeholder="Available for Internship & Freelance"
                class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
            >

        </div>

    </section>


    {{-- Additional --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            Additional Text
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Additional information displayed around the Hero section.
        </p>

        <div class="mt-6 grid gap-5 md:grid-cols-2">

            {{-- Based --}}
            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Based Text
                </label>

                <input
                    type="text"
                    name="based_text"
                    value="{{ old('based_text', $hero->based_text) }}"
                    placeholder="Based in Indonesia"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            {{-- Scroll --}}
            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Scroll Text
                </label>

                <input
                    type="text"
                    name="scroll_text"
                    value="{{ old('scroll_text', $hero->scroll_text) }}"
                    placeholder="Scroll to explore"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

        </div>

    </section>


    {{-- Profile & CV --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            Profile & CV
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Upload your profile photo and CV.
        </p>

        <div class="mt-6 grid gap-6 md:grid-cols-2">

            {{-- Profile Image --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Profile Image
                </label>

                <input
                    type="file"
                    name="profile_image"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="block w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white/60 file:mr-4 file:rounded-lg file:border-0 file:bg-white file:px-4 file:py-2 file:text-sm file:font-medium file:text-black"
                >

                <p class="mt-2 text-xs text-white/30">
                    JPG, JPEG, PNG or WEBP. Maximum 5 MB.
                </p>

                @if($hero->profile_image)

                    <div class="mt-4">

                        <p class="mb-2 text-xs text-white/30">
                            Current image
                        </p>

                        <img
                            src="{{ asset('storage/' . $hero->profile_image) }}"
                            alt="Profile"
                            class="h-32 w-32 rounded-2xl border border-white/10 object-cover"
                        >

                    </div>

                @endif

            </div>


            {{-- CV --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    CV / Resume
                </label>

                <input
                    type="file"
                    name="cv_file"
                    accept=".pdf"
                    class="block w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white/60 file:mr-4 file:rounded-lg file:border-0 file:bg-white file:px-4 file:py-2 file:text-sm file:font-medium file:text-black"
                >

                <p class="mt-2 text-xs text-white/30">
                    PDF only. Maximum 10 MB.
                </p>

                @if($hero->cv_url)

                    <div class="mt-4">

                        <p class="mb-2 text-xs text-white/30">
                            Current CV
                        </p>

                        <a
                            href="{{ asset('storage/' . $hero->cv_url) }}"
                            target="_blank"
                            class="inline-flex items-center rounded-xl border border-white/10 px-4 py-2 text-sm text-white/70 transition hover:bg-white/5 hover:text-white"
                        >
                            View Current CV
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </section>


    {{-- Save --}}
    <div class="flex justify-end">

        <button
            type="submit"
            class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90"
        >
            Save Changes
        </button>

    </div>

</form>

@endsection