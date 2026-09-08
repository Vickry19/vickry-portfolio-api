@extends('admin.layouts.app')

@section('title', 'Experience — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Experience')

@section('content')

@if(session('success'))
    <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-300">
        {{ session('success') }}
    </div>
@endif

<div class="mb-6 flex items-center justify-between">

    <div>
        <p class="text-sm text-white/40">
            Manage your professional, academic, and project experience.
        </p>
    </div>

    <a
        href="{{ route('admin.experiences.create') }}"
        class="rounded-xl bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-white/90"
    >
        + Add Experience
    </a>

</div>


<div class="overflow-hidden rounded-2xl border border-white/10 bg-[#181818]">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[900px] text-left">

            <thead class="border-b border-white/10 bg-white/[0.02]">

                <tr>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Order
                    </th>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Period
                    </th>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Position
                    </th>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Organization
                    </th>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Status
                    </th>

                    <th class="px-6 py-4 text-right text-xs uppercase tracking-wider text-white/40">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-white/5">

                @forelse($experiences as $experience)

                    <tr class="transition hover:bg-white/[0.02]">

                        <td class="px-6 py-5 text-sm text-white/50">
                            {{ $experience->sort_order }}
                        </td>

                        <td class="px-6 py-5 text-sm text-white/60">
                            {{ $experience->period }}
                        </td>

                        <td class="px-6 py-5">

                            <p class="text-sm font-medium text-white">
                                {{ $experience->position }}
                            </p>

                        </td>

                        <td class="px-6 py-5 text-sm text-white/50">
                            {{ $experience->organization }}
                        </td>

                        <td class="px-6 py-5">

                            @if($experience->is_visible)

                                <span class="inline-flex rounded-full border border-green-500/20 bg-green-500/10 px-3 py-1 text-xs text-green-300">
                                    Visible
                                </span>

                            @else

                                <span class="inline-flex rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-white/40">
                                    Hidden
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-5">

                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('admin.experiences.edit', $experience) }}"
                                    class="rounded-lg border border-white/10 px-3 py-2 text-xs text-white/60 transition hover:bg-white/5 hover:text-white"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.experiences.destroy', $experience) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus experience ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded-lg border border-red-500/20 px-3 py-2 text-xs text-red-300 transition hover:bg-red-500/10"
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
                            Belum ada experience.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection