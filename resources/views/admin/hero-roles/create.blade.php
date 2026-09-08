@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl space-y-6">

    <div>
        <h1 class="text-2xl font-semibold text-white">
            Add Hero Role
        </h1>

        <p class="mt-1 text-sm text-white/50">
            Tambahkan role baru untuk bagian Hero.
        </p>
    </div>

    @if($errors->any())
        <div class="rounded-lg border border-white/10 bg-white/5 px-4 py-3">
            <ul class="space-y-1 text-sm text-white/70">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.hero-roles.store') }}"
        method="POST"
        class="space-y-6 rounded-xl border border-white/10 bg-[#151515] p-6"
    >

        @csrf

        <div>
            <label class="mb-2 block text-sm text-white/70">
                Role
            </label>

            <input
                type="text"
                name="role"
                value="{{ old('role') }}"
                placeholder="Web Developer"
                required
                class="w-full rounded-lg border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/25 focus:border-white/30"
            >
        </div>

        <div>
            <label class="mb-2 block text-sm text-white/70">
                Sort Order
            </label>

            <input
                type="number"
                name="sort_order"
                value="{{ old('sort_order', 0) }}"
                min="0"
                required
                class="w-full rounded-lg border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-white/30"
            >
        </div>

        <label class="flex cursor-pointer items-center gap-3">
            <input
                type="checkbox"
                name="is_visible"
                value="1"
                checked
                class="h-4 w-4"
            >

            <span class="text-sm text-white/70">
                Tampilkan di website
            </span>
        </label>

        <div class="flex gap-3 pt-2">

            <a
                href="{{ route('admin.hero-roles.index') }}"
                class="rounded-lg border border-white/10 px-4 py-2.5 text-sm text-white/60 transition hover:bg-white/5 hover:text-white"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-lg bg-white px-5 py-2.5 text-sm font-medium text-black transition hover:bg-white/90"
            >
                Save Role
            </button>

        </div>

    </form>

</div>
@endsection