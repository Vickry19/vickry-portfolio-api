@extends('admin.layouts.app')

@section('title', 'Currently Exploring — Vickry CMS')
@section('header', 'Currently Exploring')

@section('heading')
    Currently Exploring
@endsection

@section('content')

<div class="space-y-6">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm leading-6 text-white/45">
                Manage technologies and areas you are currently exploring.
            </p>
        </div>

        <a
            href="{{ route('admin.exploring.create') }}"
            class="inline-flex w-fit rounded-lg bg-white px-4 py-2.5 text-sm font-medium text-black transition hover:bg-white/90"
        >
            + Add Item
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-xl border border-white/10 bg-[#151515]">

        <div class="border-b border-white/10 px-5 py-4">
            <h3 class="text-sm font-medium text-white">
                Exploring Items
            </h3>

            <p class="mt-1 text-xs text-white/35">
                {{ $items->count() }} items
            </p>
        </div>

        <div class="hidden overflow-x-auto md:block">

            <table class="min-w-full text-sm">

                <thead>
                    <tr class="border-b border-white/10 bg-white/[0.02]">

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            #
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            Item
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            Label
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-medium uppercase tracking-wider text-white/35">
                            Action
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-white/5">

                    @forelse($items as $item)

                        <tr class="transition hover:bg-white/[0.025]">

                            <td class="px-6 py-5 text-white/30">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </td>

                            <td class="px-6 py-5">

                                <p class="font-medium text-white">
                                    {{ $item->title }}
                                </p>

                                @if($item->description)
                                    <p class="mt-1 max-w-md truncate text-xs text-white/35">
                                        {{ $item->description }}
                                    </p>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                @if($item->label)

                                    <span class="rounded-full border border-white/10 bg-white/[0.03] px-2.5 py-1 text-xs text-white/50">
                                        {{ $item->label }}
                                    </span>

                                @else
                                    <span class="text-white/25">—</span>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                @if($item->is_visible)

                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-2.5 py-1 text-xs text-emerald-300">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                        Visible
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/[0.04] px-2.5 py-1 text-xs text-white/35">
                                        Hidden
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.exploring.edit', $item) }}"
                                        class="rounded-lg border border-white/10 bg-white/[0.03] px-3 py-2 text-xs text-white/60 transition hover:bg-white/[0.07] hover:text-white"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.exploring.destroy', $item) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this item?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-400/10 bg-red-400/[0.03] px-3 py-2 text-xs text-red-400/70 transition hover:bg-red-400/10 hover:text-red-300"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">

                                <p class="text-sm text-white/40">
                                    No exploring items yet.
                                </p>

                                <a
                                    href="{{ route('admin.exploring.create') }}"
                                    class="mt-4 inline-flex rounded-lg border border-white/10 bg-white/[0.04] px-4 py-2 text-xs text-white/60 hover:bg-white/[0.08] hover:text-white"
                                >
                                    Add Item
                                </a>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Mobile --}}
        <div class="divide-y divide-white/10 md:hidden">

            @forelse($items as $item)

                <div class="p-5">

                    <div class="flex items-start justify-between gap-4">

                        <div>
                            <p class="text-sm font-medium text-white">
                                {{ $item->title }}
                            </p>

                            <p class="mt-1 text-xs text-white/35">
                                {{ $item->description ?: 'No description' }}
                            </p>
                        </div>

                        @if($item->is_visible)
                            <span class="shrink-0 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-2 py-1 text-[10px] text-emerald-300">
                                Visible
                            </span>
                        @else
                            <span class="shrink-0 rounded-full border border-white/10 bg-white/[0.04] px-2 py-1 text-[10px] text-white/35">
                                Hidden
                            </span>
                        @endif

                    </div>

                    <div class="mt-4 flex gap-2">

                        <a
                            href="{{ route('admin.exploring.edit', $item) }}"
                            class="flex-1 rounded-lg border border-white/10 px-3 py-2 text-center text-xs text-white/60 hover:bg-white/[0.05] hover:text-white"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.exploring.destroy', $item) }}"
                            method="POST"
                            class="flex-1"
                            onsubmit="return confirm('Delete this item?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full rounded-lg border border-red-400/10 px-3 py-2 text-xs text-red-400/70 hover:bg-red-400/10"
                            >
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

            @empty

                <div class="px-5 py-14 text-center">
                    <p class="text-sm text-white/40">
                        No exploring items yet.
                    </p>
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection