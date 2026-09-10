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

@php
    $profileImageUrl = null;
    $cvUrl = null;

    if ($hero->profile_image) {
        $profileImageUrl = filter_var($hero->profile_image, FILTER_VALIDATE_URL)
            ? $hero->profile_image
            : asset('storage/' . $hero->profile_image);
    }

    if ($hero->cv_url) {
        $cvUrl = filter_var($hero->cv_url, FILTER_VALIDATE_URL)
            ? $hero->cv_url
            : asset('storage/' . $hero->cv_url);
    }
@endphp

<form
    action="{{ route('admin.hero.update') }}"
    method="POST"
    enctype="multipart/form-data"
    class="mx-auto max-w-5xl space-y-6"
    id="hero-form"
>
    @csrf
    @method('PUT')

    {{-- Hidden Blob URLs --}}
    <input
        type="hidden"
        name="profile_image"
        id="profile_image_url"
        value="{{ old('profile_image', $hero->profile_image) }}"
    >

    <input
        type="hidden"
        name="cv_url"
        id="cv_url"
        value="{{ old('cv_url', $hero->cv_url) }}"
    >

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
                    id="profile_image_file"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="block w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white/60 file:mr-4 file:rounded-lg file:border-0 file:bg-white file:px-4 file:py-2 file:text-sm file:font-medium file:text-black"
                >

                <p class="mt-2 text-xs text-white/30">
                    JPG, JPEG, PNG or WEBP. Maximum 5 MB.
                </p>

                {{-- Upload Status --}}
                <div
                    id="profile-upload-status"
                    class="mt-3 hidden rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-xs text-white/60"
                ></div>

                @if($profileImageUrl)

                    <div class="mt-4">

                        <p class="mb-2 text-xs text-white/30">
                            Current image
                        </p>

                        <img
                            src="{{ $profileImageUrl }}"
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
                    id="cv_file"
                    accept=".pdf"
                    class="block w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white/60 file:mr-4 file:rounded-lg file:border-0 file:bg-white file:px-4 file:py-2 file:text-sm file:font-medium file:text-black"
                >

                <p class="mt-2 text-xs text-white/30">
                    PDF only. Maximum 10 MB.
                </p>

                {{-- Upload Status --}}
                <div
                    id="cv-upload-status"
                    class="mt-3 hidden rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-xs text-white/60"
                ></div>

                @if($cvUrl)

                    <div class="mt-4">

                        <p class="mb-2 text-xs text-white/30">
                            Current CV
                        </p>

                        <a
                            href="{{ $cvUrl }}"
                            target="_blank"
                            rel="noopener noreferrer"
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
            id="save-button"
            class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90 disabled:cursor-not-allowed disabled:opacity-50"
        >
            Save Changes
        </button>

    </div>

</form>


{{-- Vercel Blob Upload --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('hero-form');

    const profileInput = document.getElementById('profile_image_file');
    const cvInput = document.getElementById('cv_file');

    const profileUrlInput = document.getElementById('profile_image_url');
    const cvUrlInput = document.getElementById('cv_url');

    const profileStatus = document.getElementById('profile-upload-status');
    const cvStatus = document.getElementById('cv-upload-status');

    const saveButton = document.getElementById('save-button');

    if (
        !form ||
        !profileInput ||
        !cvInput ||
        !profileUrlInput ||
        !cvUrlInput
    ) {
        return;
    }

    const BLOB_UPLOAD_URL =
        'https://vickry-portfolio.vercel.app/api/blob-upload';


    function setStatus(element, message, show = true) {
        if (!element) return;

        element.textContent = message;

        if (show) {
            element.classList.remove('hidden');
        } else {
            element.classList.add('hidden');
        }
    }


    function sanitizeFilename(filename) {
        return filename
            .replace(/[^a-zA-Z0-9._-]/g, '-')
            .replace(/-+/g, '-');
    }


    async function uploadToBlob(file, folder) {

const { upload } = await import(
    'https://cdn.jsdelivr.net/npm/@vercel/blob@2.8.0/client/+esm'
);

const filename =
    folder +
    '/' +
    Date.now() +
    '-' +
    sanitizeFilename(file.name);

const blob = await upload(
    filename,
    file,
    {
        access: 'public',

        handleUploadUrl:
            'https://vickry-portfolio.vercel.app/api/blob-upload',

        onUploadProgress(event) {
            console.log(
                `Upload ${folder}: ${event.percentage}%`
            );
        }
    }
);

if (!blob || !blob.url) {
    throw new Error(
        'Vercel Blob tidak mengembalikan URL file.'
    );
}

return blob.url;
}


    /*
    |--------------------------------------------------------------------------
    | Form Submit
    |--------------------------------------------------------------------------
    */

    form.addEventListener('submit', async function (event) {

        event.preventDefault();


        try {

            saveButton.disabled = true;
            saveButton.textContent = 'Uploading...';


            /*
            |--------------------------------------------------------------------------
            | Profile Image
            |--------------------------------------------------------------------------
            */

            if (profileInput.files.length > 0) {

                const file = profileInput.files[0];


                if (file.size > 5 * 1024 * 1024) {
                    throw new Error(
                        'Profile image maksimal 5 MB.'
                    );
                }


                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];


                if (!allowedTypes.includes(file.type)) {
                    throw new Error(
                        'Profile image harus JPG, JPEG, PNG, atau WEBP.'
                    );
                }


                setStatus(
                    profileStatus,
                    'Mengupload profile image...'
                );


                profileUrlInput.value =
                    await uploadToBlob(
                        file,
                        'profile'
                    );


                setStatus(
                    profileStatus,
                    'Profile image berhasil diupload.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | CV
            |--------------------------------------------------------------------------
            */

            if (cvInput.files.length > 0) {

                const file = cvInput.files[0];


                if (file.size > 10 * 1024 * 1024) {
                    throw new Error(
                        'CV maksimal 10 MB.'
                    );
                }


                if (file.type !== 'application/pdf') {
                    throw new Error(
                        'CV harus berupa file PDF.'
                    );
                }


                setStatus(
                    cvStatus,
                    'Mengupload CV...'
                );


                saveButton.textContent = 'Uploading CV...';


                cvUrlInput.value =
                    await uploadToBlob(
                        file,
                        'cv'
                    );


                setStatus(
                    cvStatus,
                    'CV berhasil diupload.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Save Laravel Database
            |--------------------------------------------------------------------------
            */

            saveButton.textContent = 'Saving...';

            form.submit();

        } catch (error) {

            console.error(
                'Vercel Blob upload error:',
                error
            );


            alert(
                error instanceof Error
                    ? error.message
                    : 'Upload gagal.'
            );


            setStatus(
                profileStatus,
                '',
                false
            );

            setStatus(
                cvStatus,
                '',
                false
            );


            saveButton.disabled = false;
            saveButton.textContent = 'Save Changes';
        }

    });

});
</script>

@endsection