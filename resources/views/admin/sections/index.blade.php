@extends('admin.layouts.app')

@section('title', 'Sections — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Sections')

@section('content')

@if(session('success'))
    <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-300">
        {{ session('success') }}
    </div>
@endif

<div class="mx-auto max-w-6xl">

    <div class="mb-6 flex items-center justify-between">

        <div>
            <h2 class="text-lg font-medium">
                Website Sections
            </h2>

            <p class="mt-1 text-sm text-white/40">
                Manage section numbers, titles and visibility.
            </p>
        </div>

        <a
            href="{{ route('admin.sections.create') }}"
            class="rounded-xl bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-white/90"
        >
            + Add Section
        </a>

    </div>


    {{-- Table --}}
    <div class="overflow-hidden rounded-2xl border border-white/10 bg-[#181818]">

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="border-b border-white/10 bg-white/[0.02]">

                    <tr>

                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/30">
                            Order
                        </th>

                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/30">
                            Number
                        </th>

                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/30">
                            Section
                        </th>

                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/30">
                            Title
                        </th>

                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/30">
                            Status
                        </th>

                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/30">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-white/5">

                    @forelse($sections as $section)

                        <tr class="transition hover:bg-white/[0.02]">

                            {{-- Order --}}
                            <td class="px-6 py-4 text-sm text-white/50">
                                {{ $section->sort_order }}
                            </td>


                            {{-- Number --}}
                            <td class="px-6 py-4 font-mono text-sm">
                                {{ $section->number }}
                            </td>


                            {{-- Key --}}
                            <td class="px-6 py-4 text-sm text-white/50">
                                {{ $section->key }}
                            </td>


                            {{-- Title --}}
                            <td class="px-6 py-4">

                                <p class="font-medium">
                                    {{ $section->title }}
                                </p>

                                @if($section->eyebrow)

                                    <p class="mt-1 text-xs text-white/30">
                                        {{ $section->eyebrow }}
                                    </p>

                                @endif

                                @if($section->subtitle)

                                    <p class="mt-1 text-xs text-white/30">
                                        {{ $section->subtitle }}
                                    </p>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if($section->is_visible)

                                    <span class="inline-flex rounded-full bg-green-500/10 px-3 py-1 text-xs text-green-300">
                                        Visible
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-white/5 px-3 py-1 text-xs text-white/30">
                                        Hidden
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <a
                                        href="{{ route('admin.sections.edit', $section) }}"
                                        class="text-sm text-white/60 transition hover:text-white"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.sections.destroy', $section) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus section ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="text-sm text-red-400 transition hover:text-red-300"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-12 text-center text-sm text-white/30"
                            >
                                Belum ada section.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection