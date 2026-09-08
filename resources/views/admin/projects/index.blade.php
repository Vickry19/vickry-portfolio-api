@extends('admin.layouts.app')

@section('title', 'Projects — Vickry CMS')

@section('header', 'Projects')

@section('heading')
    Manage Projects
@endsection

@section('content')

    @if(session('success'))
        <div class="mb-6 rounded-xl border border-white/10 bg-white/5 px-5 py-4 text-sm text-white">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6 flex items-center justify-between gap-4">
        <div>
            <p class="text-sm text-white/50">
                Kelola project yang tampil di portfolio.
            </p>
        </div>

        <a
            href="{{ route('admin.projects.create') }}"
            class="rounded-xl bg-white px-5 py-3 text-sm font-semibold text-black transition hover:bg-white/90"
        >
            + Add Project
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-white/10 bg-[#151515]">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px] text-left">

                <thead class="border-b border-white/10 bg-white/[0.03]">
                    <tr>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-white/40">
                            #
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-white/40">
                            Project
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-white/40">
                            Category
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-white/40">
                            Year
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-white/40">
                            Gallery
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-white/40">
                            Status
                        </th>

                        <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-white/40">
                            Featured
                        </th>

                        <th class="px-5 py-4 text-right text-xs font-semibold uppercase tracking-wider text-white/40">
                            Action
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-white/5">

                    @forelse($projects as $project)

                        <tr class="transition hover:bg-white/[0.025]">

                            {{-- Number --}}

                            <td class="px-5 py-5 text-sm text-white/40">
                                {{ $project->number ?? $loop->iteration }}
                            </td>

                            {{-- Project --}}

                            <td class="px-5 py-5">
                                <div>
                                    <p class="font-medium text-white">
                                        {{ $project->title }}
                                    </p>

                                    <p class="mt-1 text-xs text-white/35">
                                        /{{ $project->slug }}
                                    </p>
                                </div>
                            </td>

                            {{-- Category --}}

                            <td class="px-5 py-5 text-sm text-white/60">
                                {{ $project->category ?? '-' }}
                            </td>

                            {{-- Year --}}

                            <td class="px-5 py-5 text-sm text-white/60">
                                {{ $project->year ?? '-' }}
                            </td>

                            {{-- Gallery --}}

                            <td class="px-5 py-5 text-sm text-white/60">
                                {{ $project->images_count }} images
                            </td>

                            {{-- Visibility Status --}}

                            <td class="px-5 py-5">

                                @if($project->is_visible)

                                    <span class="inline-flex rounded-full border border-white/15 bg-white/5 px-3 py-1 text-xs text-white/70">
                                        Visible
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full border border-white/10 bg-black/20 px-3 py-1 text-xs text-white/30">
                                        Hidden
                                    </span>

                                @endif

                            </td>

                            {{-- Featured Status --}}

                            <td class="px-5 py-5">

                                @if($project->is_featured)

                                    <span class="inline-flex rounded-full border border-white/20 bg-white px-3 py-1 text-xs font-medium text-black">
                                        Featured
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full border border-white/10 bg-white/[0.02] px-3 py-1 text-xs text-white/25">
                                        —
                                    </span>

                                @endif

                            </td>

                            {{-- Actions --}}

                            <td class="px-5 py-5">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.projects.edit', $project) }}"
                                        class="rounded-lg border border-white/10 px-3 py-2 text-xs text-white/70 transition hover:bg-white/10 hover:text-white"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.projects.destroy', $project) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus project ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-white/10 px-3 py-2 text-xs text-white/40 transition hover:bg-white/10 hover:text-white"
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
                                colspan="8"
                                class="px-5 py-16 text-center"
                            >
                                <p class="text-sm text-white/40">
                                    Belum ada project.
                                </p>

                                <a
                                    href="{{ route('admin.projects.create') }}"
                                    class="mt-4 inline-block text-sm text-white underline underline-offset-4"
                                >
                                    Tambahkan project pertama
                                </a>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection