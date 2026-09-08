<div class="space-y-6 rounded-xl border border-white/10 bg-[#151515] p-5 md:p-6">

    <div>
        <label class="mb-2 block text-sm font-medium text-white/75">
            Title
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $exploring->title ?? '') }}"
            required
            placeholder="Example: Next.js"
            class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none focus:border-white/25"
        >
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-white/75">
            Description
        </label>

        <input
            type="text"
            name="description"
            value="{{ old('description', $exploring->description ?? '') }}"
            placeholder="Example: Building modern web applications with React and Next.js."
            class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none focus:border-white/25"
        >
    </div>

    <div class="grid gap-6 md:grid-cols-2">

        <div>
            <label class="mb-2 block text-sm font-medium text-white/75">
                Label
            </label>

            <input
                type="text"
                name="label"
                value="{{ old('label', $exploring->label ?? '') }}"
                placeholder="Example: Learning"
                class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none focus:border-white/25"
            >
        </div>

        <div>
            <label class="mb-2 block text-sm font-medium text-white/75">
                Icon
            </label>

            <input
                type="text"
                name="icon"
                value="{{ old('icon', $exploring->icon ?? '') }}"
                placeholder="Example: nextjs"
                class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder-white/20 outline-none focus:border-white/25"
            >
        </div>

    </div>

    <div class="grid gap-6 md:grid-cols-2">

        <div>
            <label class="mb-2 block text-sm font-medium text-white/75">
                Sort Order
            </label>

            <input
                type="number"
                name="sort_order"
                min="0"
                value="{{ old('sort_order', $exploring->sort_order ?? 0) }}"
                class="w-full rounded-lg border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-white outline-none focus:border-white/25"
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
                    @checked(old('is_visible', $exploring->is_visible ?? true))
                    class="h-4 w-4 accent-white"
                >

                <span class="text-sm text-white/55">
                    Show on portfolio
                </span>

            </label>
        </div>

    </div>

</div>