@extends('admin.layouts.app')

@section('title', 'Add Project — Vickry CMS')

@section('header', 'Projects')

@section('heading')
    Add Project
@endsection

@section('content')

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-white/10 bg-white/5 p-5">
            <p class="mb-3 text-sm font-medium text-white">
                Please fix the following errors:
            </p>

            <ul class="space-y-1 text-sm text-white/50">
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        id="project-form"
        action="{{ route('admin.projects.store') }}"
        method="POST"
        class="space-y-6"
    >

        @csrf

        {{-- =========================================================
            BASIC INFORMATION
        ========================================================== --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Basic Information
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Informasi utama project.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Number
                    </label>

                    <input
                        type="text"
                        name="number"
                        value="{{ old('number') }}"
                        placeholder="01"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Year
                    </label>

                    <input
                        type="text"
                        name="year"
                        value="{{ old('year') }}"
                        placeholder="2026"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm text-white/60">
                        Title *
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="NutriScan"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Slug
                    </label>

                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="{{ old('slug') }}"
                        placeholder="nutriscan"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >

                    <p class="mt-2 text-xs text-white/30">
                        Kosongkan untuk generate otomatis dari title.
                    </p>
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category') }}"
                        placeholder="AI / Web Application"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Role
                    </label>

                    <input
                        type="text"
                        name="role"
                        value="{{ old('role') }}"
                        placeholder="Full Stack Developer"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Status
                    </label>

                    <input
                        type="text"
                        name="status"
                        value="{{ old('status') }}"
                        placeholder="Prototype"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >
                </div>

            </div>

        </div>


        {{-- =========================================================
            DESCRIPTION
        ========================================================== --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Project Description
                </h2>
            </div>

            <div class="space-y-5">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Short Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Brief description of the project..."
                        class="w-full resize-none rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Long Description
                    </label>

                    <textarea
                        name="long_description"
                        rows="7"
                        placeholder="Detailed explanation of the project..."
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
                    >{{ old('long_description') }}</textarea>
                </div>

                <div class="grid gap-5 md:grid-cols-2">

                    <div>
                        <label class="mb-2 block text-sm text-white/60">
                            Problem
                        </label>

                        <textarea
                            name="problem"
                            rows="6"
                            placeholder="What problem does this project solve?"
                            class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                        >{{ old('problem') }}</textarea>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-white/60">
                            Solution
                        </label>

                        <textarea
                            name="solution"
                            rows="6"
                            placeholder="How does the project solve the problem?"
                            class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                        >{{ old('solution') }}</textarea>
                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            TECHNOLOGIES & FEATURES
        ========================================================== --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Technologies & Features
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Satu item per baris.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Technologies
                    </label>

                    <textarea
                        name="technologies"
                        rows="8"
                        placeholder="React&#10;TypeScript&#10;Tailwind CSS&#10;API"
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >{{ old('technologies') }}</textarea>
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Features
                    </label>

                    <textarea
                        name="features"
                        rows="8"
                        placeholder="AI food analysis&#10;Barcode scanning&#10;Responsive interface"
                        class="w-full resize-y rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >{{ old('features') }}</textarea>
                </div>

            </div>

        </div>


        {{-- =========================================================
            URLS
        ========================================================== --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Project Links
                </h2>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        GitHub URL
                    </label>

                    <input
                        type="url"
                        name="github_url"
                        value="{{ old('github_url') }}"
                        placeholder="https://github.com/..."
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Live URL
                    </label>

                    <input
                        type="url"
                        name="live_url"
                        value="{{ old('live_url') }}"
                        placeholder="https://..."
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

            </div>

        </div>


        {{-- =========================================================
            PROJECT IMAGES
        ========================================================== --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="mb-6">
                <h2 class="text-base font-semibold text-white">
                    Project Images
                </h2>

                <p class="mt-1 text-sm text-white/40">
                    Gambar akan disimpan ke Vercel Blob.
                </p>
            </div>

            {{-- Hidden Blob URLs --}}
            <input
                type="hidden"
                name="cover_image"
                id="cover_image_url"
                value="{{ old('cover_image') }}"
            >

            <div id="gallery-url-container"></div>


            {{-- COVER --}}
            <div class="mb-6">

                <label class="mb-2 block text-sm text-white/60">
                    Cover Image
                </label>

                <input
                    type="file"
                    id="cover_image_file"
                    accept="image/jpeg,image/png,image/webp"
                    class="block w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white/60"
                >

                <p class="mt-2 text-xs text-white/30">
                    JPG, PNG atau WEBP. Maksimal 5 MB.
                </p>

                <div
                    id="cover-preview-wrapper"
                    class="mt-4 hidden overflow-hidden rounded-xl border border-white/10"
                >
                    <img
                        id="cover-preview"
                        src=""
                        alt="Cover preview"
                        class="max-h-72 w-full object-cover"
                    >
                </div>

                <div
                    id="cover-upload-status"
                    class="mt-3 hidden rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-xs text-white/50"
                ></div>

            </div>


            {{-- GALLERY --}}
            <div>

                <label class="mb-2 block text-sm text-white/60">
                    Gallery Images
                </label>

                <input
                    type="file"
                    id="gallery_files"
                    multiple
                    accept="image/jpeg,image/png,image/webp"
                    class="block w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white/60"
                >

                <p class="mt-2 text-xs text-white/30">
                    Bisa memilih beberapa gambar sekaligus. Maksimal 5 MB per gambar.
                </p>

                <div
                    id="gallery-preview"
                    class="mt-4 grid grid-cols-2 gap-4 md:grid-cols-4"
                ></div>

                <div
                    id="gallery-upload-status"
                    class="mt-3 hidden rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-xs text-white/50"
                ></div>

            </div>

        </div>


        {{-- =========================================================
            SETTINGS
        ========================================================== --}}
        <div class="rounded-2xl border border-white/10 bg-[#151515] p-6">

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-white/60">
                        Sort Order
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', 0) }}"
                        min="0"
                        class="w-full rounded-xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

                <div class="flex items-end">

                    <label class="flex cursor-pointer items-center gap-3">

                        <input
                            type="checkbox"
                            name="is_visible"
                            value="1"
                            {{ old('is_visible', true) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-white/20 bg-black"
                        >

                        <span class="text-sm text-white/70">
                            Tampilkan project di website
                        </span>

                    </label>

                </div>

                <div class="flex items-center md:col-span-2">

                    <label class="flex cursor-pointer items-center gap-3">

                        <input
                            type="checkbox"
                            name="is_featured"
                            value="1"
                            {{ old('is_featured', false) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-white/20 bg-black"
                        >

                        <div>
                            <span class="block text-sm text-white/70">
                                Featured Project
                            </span>

                            <span class="mt-1 block text-xs text-white/30">
                                Jadikan project ini sebagai project utama di portfolio.
                            </span>
                        </div>

                    </label>

                </div>

            </div>

        </div>


        {{-- =========================================================
            ACTIONS
        ========================================================== --}}
        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ route('admin.projects.index') }}"
                class="rounded-xl border border-white/10 px-5 py-3 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
            >
                Cancel
            </a>

            <button
                type="submit"
                id="submit-button"
                class="rounded-xl bg-white px-6 py-3 text-sm font-semibold text-black transition hover:bg-white/90"
            >
                Save Project
            </button>

        </div>

    </form>


    {{-- =========================================================
        VERCEL BLOB UPLOAD
    ========================================================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const form =
                document.getElementById('project-form');

            const submitButton =
                document.getElementById('submit-button');

            const titleInput =
                document.getElementById('title');

            const slugInput =
                document.getElementById('slug');

            const coverInput =
                document.getElementById('cover_image_file');

            const coverUrlInput =
                document.getElementById('cover_image_url');

            const galleryInput =
                document.getElementById('gallery_files');

            const galleryContainer =
                document.getElementById('gallery-url-container');

            const coverPreviewWrapper =
                document.getElementById('cover-preview-wrapper');

            const coverPreview =
                document.getElementById('cover-preview');

            const galleryPreview =
                document.getElementById('gallery-preview');

            const coverStatus =
                document.getElementById('cover-upload-status');

            const galleryStatus =
                document.getElementById('gallery-upload-status');


            const HANDLE_UPLOAD_URL =
                'https://vickry-portfolio.vercel.app/api/blob-upload';


            let uploading = false;


            /*
            |--------------------------------------------------------------------------
            | Helpers
            |--------------------------------------------------------------------------
            */

            function slugify(value) {
                return value
                    .toString()
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }


            function getProjectSlug() {

                const manualSlug =
                    slugInput?.value.trim();

                if (manualSlug) {
                    return slugify(manualSlug);
                }

                return slugify(
                    titleInput?.value || 'project'
                );
            }


            function showStatus(element, message) {

                if (!element) {
                    return;
                }

                element.textContent = message;
                element.classList.remove('hidden');
            }


            function hideStatus(element) {

                if (!element) {
                    return;
                }

                element.classList.add('hidden');
            }


            function validateFile(file) {

                if (!file) {
                    return false;
                }

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!allowedTypes.includes(file.type)) {

                    throw new Error(
                        `${file.name}: format gambar tidak didukung.`
                    );
                }

                if (file.size > 5 * 1024 * 1024) {

                    throw new Error(
                        `${file.name}: ukuran maksimal 5 MB.`
                    );
                }

                return true;
            }


            /*
            |--------------------------------------------------------------------------
            | Cover Preview
            |--------------------------------------------------------------------------
            */

            if (coverInput) {

                coverInput.addEventListener(
                    'change',
                    function () {

                        const file =
                            this.files?.[0];

                        if (!file) {
                            return;
                        }

                        try {

                            validateFile(file);

                            const reader =
                                new FileReader();

                            reader.onload =
                                function (event) {

                                    coverPreview.src =
                                        event.target.result;

                                    coverPreviewWrapper
                                        .classList
                                        .remove('hidden');
                                };

                            reader.readAsDataURL(file);

                        } catch (error) {

                            this.value = '';

                            alert(
                                error.message
                            );
                        }

                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | Gallery Preview
            |--------------------------------------------------------------------------
            */

            if (galleryInput) {

                galleryInput.addEventListener(
                    'change',
                    function () {

                        galleryPreview.innerHTML = '';

                        const files =
                            Array.from(
                                this.files || []
                            );

                        files.forEach(function (file) {

                            try {

                                validateFile(file);

                                const wrapper =
                                    document.createElement('div');

                                wrapper.className =
                                    'overflow-hidden rounded-xl border border-white/10 bg-black/20';

                                const img =
                                    document.createElement('img');

                                img.className =
                                    'aspect-[4/3] h-full w-full object-cover';

                                img.alt =
                                    file.name;

                                const reader =
                                    new FileReader();

                                reader.onload =
                                    function (event) {

                                        img.src =
                                            event.target.result;
                                    };

                                reader.readAsDataURL(file);

                                wrapper.appendChild(img);

                                galleryPreview.appendChild(
                                    wrapper
                                );

                            } catch (error) {

                                alert(
                                    error.message
                                );

                                galleryInput.value = '';
                                galleryPreview.innerHTML = '';
                            }

                        });

                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | Upload Cover
            |--------------------------------------------------------------------------
            */

            async function uploadCover(upload) {

                const file =
                    coverInput?.files?.[0];

                if (!file) {
                    return null;
                }

                validateFile(file);

                showStatus(
                    coverStatus,
                    'Mengupload cover image...'
                );

                const filename =
                    `projects/${getProjectSlug()}/cover-${Date.now()}-${file.name}`;

                const blob =
                    await upload(
                        filename,
                        file,
                        {
                            access: 'public',

                            handleUploadUrl:
                                HANDLE_UPLOAD_URL,

                            onUploadProgress(event) {

                                const percentage =
                                    Math.round(
                                        event.percentage || 0
                                    );

                                showStatus(
                                    coverStatus,
                                    `Mengupload cover image... ${percentage}%`
                                );
                            }
                        }
                    );

                coverUrlInput.value =
                    blob.url;

                showStatus(
                    coverStatus,
                    'Cover image berhasil diupload.'
                );

                return blob.url;
            }


            /*
            |--------------------------------------------------------------------------
            | Upload Gallery
            |--------------------------------------------------------------------------
            */

            async function uploadGallery(upload) {

                const files =
                    Array.from(
                        galleryInput?.files || []
                    );

                if (!files.length) {
                    return [];
                }

                galleryContainer.innerHTML = '';

                const urls = [];

                for (
                    let index = 0;
                    index < files.length;
                    index++
                ) {

                    const file =
                        files[index];

                    validateFile(file);

                    showStatus(
                        galleryStatus,
                        `Mengupload gallery ${index + 1}/${files.length}...`
                    );

                    const filename =
                        `projects/${getProjectSlug()}/gallery-${Date.now()}-${index}-${file.name}`;

                    const blob =
                        await upload(
                            filename,
                            file,
                            {
                                access: 'public',

                                handleUploadUrl:
                                    HANDLE_UPLOAD_URL,

                                onUploadProgress(event) {

                                    const percentage =
                                        Math.round(
                                            event.percentage || 0
                                        );

                                    showStatus(
                                        galleryStatus,
                                        `Mengupload gallery ${index + 1}/${files.length}... ${percentage}%`
                                    );
                                }
                            }
                        );

                    urls.push(blob.url);

                    const hidden =
                        document.createElement('input');

                    hidden.type = 'hidden';
                    hidden.name = 'gallery_urls[]';
                    hidden.value = blob.url;

                    galleryContainer.appendChild(
                        hidden
                    );
                }

                showStatus(
                    galleryStatus,
                    `${urls.length} gallery image berhasil diupload.`
                );

                return urls;
            }


            /*
            |--------------------------------------------------------------------------
            | Submit
            |--------------------------------------------------------------------------
            */

            if (form) {

                form.addEventListener(
                    'submit',
                    async function (event) {

                        if (uploading) {
                            return;
                        }

                        event.preventDefault();

                        uploading = true;

                        submitButton.disabled = true;
                        submitButton.textContent =
                            'Uploading...';

                        hideStatus(coverStatus);
                        hideStatus(galleryStatus);

                        try {

                            const {
                                upload
                            } = await import(
                                'https://cdn.jsdelivr.net/npm/@vercel/blob@2.8.0/client/+esm'
                            );

                            await uploadCover(
                                upload
                            );

                            await uploadGallery(
                                upload
                            );

                            submitButton.textContent =
                                'Saving...';

                            /*
                             * Native submit agar browser
                             * tidak menjalankan event listener
                             * ini lagi.
                             */

                            HTMLFormElement.prototype.submit.call(
                                form
                            );

                        } catch (error) {

                            console.error(
                                'Vercel Blob upload error:',
                                error
                            );

                            alert(
                                error?.message ||
                                'Upload gambar gagal.'
                            );

                            uploading = false;

                            submitButton.disabled =
                                false;

                            submitButton.textContent =
                                'Save Project';
                        }

                    }
                );

            }

        });
    </script>

@endsection