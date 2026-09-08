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


    {{-- File --}}
    <div>
        <label class="mb-2 block text-sm font-medium text-white/75">
            Certificate File
        </label>

        <div class="rounded-lg border border-dashed border-white/10 bg-white/[0.02] p-4">

            <input
                type="file"
                name="file"
                accept=".jpg,.jpeg,.png,.webp,.pdf"
                class="block w-full cursor-pointer text-sm text-white/50 file:mr-4 file:rounded-lg file:border-0 file:bg-white file:px-4 file:py-2 file:text-xs file:font-medium file:text-black hover:file:bg-white/90"
            >

        </div>

        <p class="mt-2 text-xs text-white/30">
            JPG, JPEG, PNG, WEBP, or PDF. Maximum 10 MB.
        </p>

        @error('file')
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