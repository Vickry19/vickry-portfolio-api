<div class="space-y-6 rounded-xl border border-white/10 bg-[#151515] p-5 md:p-6">

    {{-- Certificate Title --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-white/75">
            Certificate Title
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $certificate->title ?? '') }}"
            required
            class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none transition focus:border-white/25 focus:bg-white/[0.05]"
            placeholder="Example: Responsive Web Design"
        >

        @error('title')
            <p class="mt-2 text-xs text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- Issuer + Date --}}
    <div class="grid gap-6 md:grid-cols-2">

        <div>
            <label class="mb-2 block text-sm font-medium text-white/75">
                Issuer
            </label>

            <input
                type="text"
                name="issuer"
                value="{{ old('issuer', $certificate->issuer ?? '') }}"
                class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none transition focus:border-white/25 focus:bg-white/[0.05]"
                placeholder="Example: Dicoding"
            >

            @error('issuer')
                <p class="mt-2 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <div>
            <label class="mb-2 block text-sm font-medium text-white/75">
                Issued At
            </label>

            <input
                type="text"
                name="issued_at"
                value="{{ old('issued_at', $certificate->issued_at ?? '') }}"
                class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none transition focus:border-white/25 focus:bg-white/[0.05]"
                placeholder="Example: August 2026"
            >

            @error('issued_at')
                <p class="mt-2 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>

    </div>


    {{-- Credential ID --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-white/75">
            Credential ID
        </label>

        <input
            type="text"
            name="credential_id"
            value="{{ old('credential_id', $certificate->credential_id ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none transition focus:border-white/25 focus:bg-white/[0.05]"
            placeholder="Optional"
        >

        @error('credential_id')
            <p class="mt-2 text-xs text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- Credential URL --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-white/75">
            Credential URL
        </label>

        <input
            type="url"
            name="credential_url"
            value="{{ old('credential_url', $certificate->credential_url ?? '') }}"
            class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none transition focus:border-white/25 focus:bg-white/[0.05]"
            placeholder="https://..."
        >

        @error('credential_url')
            <p class="mt-2 text-xs text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- Certificate File --}}
    <div>

        <label class="mb-2 block text-sm font-medium text-white/75">
            Certificate File
        </label>

        {{-- Hidden values sent to Laravel --}}
        <input
            type="hidden"
            name="file"
            id="certificate_file_url"
            value="{{ old('file', $certificate->file ?? '') }}"
        >

        <input
            type="hidden"
            name="file_type"
            id="certificate_file_type"
            value="{{ old('file_type', $certificate->file_type ?? '') }}"
        >

        <div class="rounded-lg border border-dashed border-white/10 bg-white/[0.02] p-4">

            <input
                type="file"
                id="certificate_file"
                accept=".jpg,.jpeg,.png,.webp,.pdf"
                class="block w-full cursor-pointer text-sm text-white/50 file:mr-4 file:rounded-lg file:border-0 file:bg-white file:px-4 file:py-2 file:text-xs file:font-medium file:text-black hover:file:bg-white/90"
            >

        </div>

        <p class="mt-2 text-xs text-white/30">
            JPG, JPEG, PNG, WEBP, or PDF. Maximum 10 MB.
        </p>

        {{-- Upload Status --}}
        <div
            id="certificate-upload-status"
            class="mt-3 hidden rounded-lg border border-white/10 bg-white/[0.02] p-3"
        >
            <div class="flex items-center justify-between gap-4">

                <span
                    id="certificate-upload-text"
                    class="text-xs text-white/50"
                >
                    Preparing upload...
                </span>

                <span
                    id="certificate-upload-percent"
                    class="text-xs font-medium text-white/70"
                >
                    0%
                </span>

            </div>

            <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/10">

                <div
                    id="certificate-upload-progress"
                    class="h-full w-0 rounded-full bg-white transition-all duration-200"
                ></div>

            </div>
        </div>

        {{-- Selected File --}}
        <div
            id="certificate-selected-file"
            class="mt-3 hidden text-xs text-white/40"
        ></div>

        @error('file')
            <p class="mt-2 text-xs text-red-400">
                {{ $message }}
            </p>
        @enderror

        @error('file_type')
            <p class="mt-2 text-xs text-red-400">
                {{ $message }}
            </p>
        @enderror

    </div>


    {{-- Description --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-white/75">
            Description
        </label>

        <textarea
            name="description"
            rows="5"
            class="w-full resize-y rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none transition focus:border-white/25 focus:bg-white/[0.05]"
            placeholder="Optional certificate description"
        >{{ old('description', $certificate->description ?? '') }}</textarea>

        @error('description')
            <p class="mt-2 text-xs text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- Sort + Visibility --}}
    <div class="grid gap-6 md:grid-cols-2">

        <div>
            <label class="mb-2 block text-sm font-medium text-white/75">
                Sort Order
            </label>

            <input
                type="number"
                name="sort_order"
                min="0"
                value="{{ old('sort_order', $certificate->sort_order ?? 0) }}"
                class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white outline-none transition focus:border-white/25 focus:bg-white/[0.05]"
            >

            @error('sort_order')
                <p class="mt-2 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <div>
            <label class="mb-2 block text-sm font-medium text-white/75">
                Visibility
            </label>

            <label class="flex min-h-[48px] cursor-pointer items-center gap-3 rounded-lg border border-white/10 bg-white/[0.02] px-4">

                <input
                    type="checkbox"
                    name="is_visible"
                    value="1"
                    @checked(old('is_visible', $certificate->is_visible ?? true))
                    class="h-4 w-4 rounded border-white/20 bg-white/5 accent-white"
                >

                <span class="text-sm text-white/55">
                    Show on portfolio
                </span>

            </label>
        </div>

    </div>

</div>


{{-- Vercel Blob Upload --}}
<script>
document.addEventListener('DOMContentLoaded', async () => {

    const form = document.getElementById('certificate-form');
    const fileInput = document.getElementById('certificate_file');

    const fileUrlInput = document.getElementById('certificate_file_url');
    const fileTypeInput = document.getElementById('certificate_file_type');

    const saveButton =
        document.getElementById('save-certificate') ||
        document.getElementById('update-certificate');

    const status = document.getElementById('certificate-upload-status');
    const statusText = document.getElementById('certificate-upload-text');
    const percentText = document.getElementById('certificate-upload-percent');
    const progress = document.getElementById('certificate-upload-progress');

    const selectedFile =
        document.getElementById('certificate-selected-file');

    if (!form || !fileInput) {
        return;
    }

    let upload;

    try {
        const blobClient = await import(
            'https://cdn.jsdelivr.net/npm/@vercel/blob@2.8.0/client/+esm'
        );

        upload = blobClient.upload;

        if (typeof upload !== 'function') {
            throw new Error('Vercel Blob upload function tidak tersedia.');
        }

    } catch (error) {

        console.error('Vercel Blob initialization failed:', error);

        if (status) {
            status.classList.remove('hidden');
        }

        if (statusText) {
            statusText.textContent =
                'Vercel Blob gagal dimuat. Silakan refresh halaman.';
        }

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | File Selection
    |--------------------------------------------------------------------------
    */

    fileInput.addEventListener('change', () => {

        const file = fileInput.files?.[0];

        if (!file) {
            selectedFile?.classList.add('hidden');
            return;
        }

        const maxSize = 10 * 1024 * 1024;

        if (file.size > maxSize) {

            alert('Ukuran file maksimal 10 MB.');

            fileInput.value = '';

            selectedFile?.classList.add('hidden');

            return;
        }

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp',
            'application/pdf',
        ];

        if (!allowedTypes.includes(file.type)) {

            alert(
                'Format file harus JPG, JPEG, PNG, WEBP, atau PDF.'
            );

            fileInput.value = '';

            selectedFile?.classList.add('hidden');

            return;
        }

        if (selectedFile) {
            selectedFile.textContent =
                `Selected: ${file.name} (${formatBytes(file.size)})`;

            selectedFile.classList.remove('hidden');
        }
    });


    /*
    |--------------------------------------------------------------------------
    | Form Submit
    |--------------------------------------------------------------------------
    */

    form.addEventListener('submit', async (event) => {

        const file = fileInput.files?.[0];

        /*
         * Jika tidak memilih file baru:
         * - create -> boleh kosong
         * - edit -> gunakan file lama
         */
        if (!file) {
            return;
        }

        event.preventDefault();

        if (saveButton) {
            saveButton.disabled = true;
            saveButton.textContent = 'Uploading...';
        }

        if (status) {
            status.classList.remove('hidden');
        }

        setProgress(
            0,
            'Uploading certificate...'
        );

        try {

            const extension = getExtension(file.name);

            const safeName = sanitizeFilename(
                removeExtension(file.name)
            );

            const filename =
                `certificates/${Date.now()}-${safeName}.${extension}`;

            const blob = await upload(
                filename,
                file,
                {
                    access: 'public',

                    handleUploadUrl:
                        'https://vickry-portfolio.vercel.app/api/blob-upload',

                    onUploadProgress(event) {

                        const percentage =
                            Math.round(event.percentage || 0);

                        setProgress(
                            percentage,
                            `Uploading ${percentage}%...`
                        );
                    },
                }
            );

            if (!blob?.url) {
                throw new Error(
                    'Vercel Blob tidak mengembalikan URL file.'
                );
            }

            /*
             * Simpan URL Blob ke hidden input.
             */
            fileUrlInput.value = blob.url;

            /*
             * Simpan extension ke database.
             */
            fileTypeInput.value = extension;

            setProgress(
                100,
                'Upload complete.'
            );

            /*
             * Submit Laravel form.
             */
            form.submit();

        } catch (error) {

            console.error(
                'Certificate upload failed:',
                error
            );

            setProgress(
                0,
                error?.message ||
                    'Upload certificate gagal.'
            );

            if (saveButton) {
                saveButton.disabled = false;
                saveButton.textContent =
                    form.querySelector('input[name="_method"]')
                        ? 'Update Certificate'
                        : 'Save Certificate';
            }

            alert(
                error?.message ||
                'Upload certificate gagal. Silakan coba lagi.'
            );
        }
    });


    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    function setProgress(value, text) {

        const percentage =
            Math.max(
                0,
                Math.min(100, Number(value) || 0)
            );

        if (progress) {
            progress.style.width =
                `${percentage}%`;
        }

        if (percentText) {
            percentText.textContent =
                `${percentage}%`;
        }

        if (statusText) {
            statusText.textContent =
                text;
        }
    }


    function getExtension(filename) {

        const parts =
            filename.toLowerCase().split('.');

        return parts.length > 1
            ? parts.pop()
            : '';
    }


    function removeExtension(filename) {

        return filename.replace(
            /\.[^/.]+$/,
            ''
        );
    }


    function sanitizeFilename(filename) {

        return filename
            .normalize('NFKD')
            .replace(/[^\w\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .toLowerCase()
            .slice(0, 100) || 'certificate';
    }


    function formatBytes(bytes) {

        if (!bytes) {
            return '0 Bytes';
        }

        const units = [
            'Bytes',
            'KB',
            'MB',
            'GB'
        ];

        const index =
            Math.floor(
                Math.log(bytes) /
                Math.log(1024)
            );

        return `${(
            bytes /
            Math.pow(1024, index)
        ).toFixed(2)} ${units[index]}`;
    }

});
</script>