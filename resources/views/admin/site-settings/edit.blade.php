@extends('admin.layouts.app')

@section('title', 'Site Settings — Vickry CMS')

@section('header', 'Website')

@section('heading', 'Site Settings')

@section('content')

@if (session('success'))
    <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-300">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">
        <ul class="list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ route('admin.site-settings.update') }}"
    method="POST"
    class="mx-auto max-w-5xl space-y-6"
>

    @csrf
    @method('PUT')

    {{-- General --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            General
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Basic identity of the portfolio website.
        </p>

        <div class="mt-6 grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Site Name
                </label>

                <input
                    type="text"
                    name="site_name"
                    value="{{ old('site_name', $settings->site_name) }}"
                    placeholder="Vickry Kamaluddin"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Logo Text
                </label>

                <input
                    type="text"
                    name="logo_text"
                    value="{{ old('logo_text', $settings->logo_text) }}"
                    placeholder="VICKRY"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

        </div>

    </section>


    {{-- Contact --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            Contact Information
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Contact information displayed throughout the website.
        </p>

        <div class="mt-6 grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $settings->email) }}"
                    placeholder="your@email.com"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    WhatsApp
                </label>

                <input
                    type="text"
                    name="whatsapp"
                    value="{{ old('whatsapp', $settings->whatsapp) }}"
                    placeholder="+62..."
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm text-white/60">
                    Location
                </label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location', $settings->location) }}"
                    placeholder="Indonesia"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

        </div>

    </section>


    {{-- Social --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            Social Media
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Social media links used by your portfolio.
        </p>

        <div class="mt-6 space-y-5">

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    GitHub URL
                </label>

                <input
                    type="url"
                    name="github_url"
                    value="{{ old('github_url', $settings->github_url) }}"
                    placeholder="https://github.com/username"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    LinkedIn URL
                </label>

                <input
                    type="url"
                    name="linkedin_url"
                    value="{{ old('linkedin_url', $settings->linkedin_url) }}"
                    placeholder="https://linkedin.com/in/username"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Instagram URL
                </label>

                <input
                    type="url"
                    name="instagram_url"
                    value="{{ old('instagram_url', $settings->instagram_url) }}"
                    placeholder="https://instagram.com/username"
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
            Profile image and CV are managed from the Hero section.
        </p>

        <div class="mt-5 rounded-xl border border-white/10 bg-[#111111] p-4">

            <p class="text-sm text-white/50">
                To upload or replace your profile image and CV, open:
            </p>

            <a
                href="{{ route('admin.hero.edit') }}"
                class="mt-3 inline-flex rounded-lg bg-white px-4 py-2 text-sm font-medium text-black transition hover:bg-white/90"
            >
                Manage Profile & CV
            </a>

        </div>

    </section>


    {{-- SEO --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            SEO
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Search engine metadata for your portfolio.
        </p>

        <div class="mt-6 space-y-5">

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    SEO Title
                </label>

                <input
                    type="text"
                    name="seo_title"
                    value="{{ old('seo_title', $settings->seo_title) }}"
                    placeholder="Vickry Kamaluddin — Web Developer"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    SEO Description
                </label>

                <textarea
                    name="seo_description"
                    rows="4"
                    placeholder="Portfolio website description..."
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >{{ old('seo_description', $settings->seo_description) }}</textarea>
            </div>

        </div>

    </section>


    {{-- Footer --}}
    <section class="rounded-2xl border border-white/10 bg-[#181818] p-6">

        <h2 class="text-lg font-semibold">
            Footer
        </h2>

        <p class="mt-1 text-sm text-white/40">
            Content displayed in the website footer.
        </p>

        <div class="mt-6 space-y-5">

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Footer Description
                </label>

                <textarea
                    name="footer_description"
                    rows="4"
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >{{ old('footer_description', $settings->footer_description) }}</textarea>
            </div>

            <div>
                <label class="mb-2 block text-sm text-white/60">
                    Copyright Text
                </label>

                <input
                    type="text"
                    name="copyright_text"
                    value="{{ old('copyright_text', $settings->copyright_text) }}"
                    placeholder="© 2026 Vickry Kamaluddin. All rights reserved."
                    class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm outline-none transition focus:border-white/30"
                >
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