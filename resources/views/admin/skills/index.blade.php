@extends('admin.layouts.app')

@section('title', 'Skills — Vickry CMS')

@section('header', 'Content')

@section('heading', 'Skills')

@section('content')

@if(session('success'))
    <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-300">
        {{ session('success') }}
    </div>
@endif

<div class="mb-6 flex items-center justify-between">

    <div>
        <p class="text-sm text-white/40">
            Manage the technologies displayed in your Skills section.
        </p>
    </div>

    <a
        href="{{ route('admin.skills.create') }}"
        class="rounded-xl bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-white/90"
    >
        + Add Skill
    </a>

</div>


<div class="overflow-hidden rounded-2xl border border-white/10 bg-[#181818]">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[800px] text-left">

            <thead class="border-b border-white/10 bg-white/[0.02]">

                <tr>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Order
                    </th>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Skill
                    </th>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Category
                    </th>

                    <th class="px-6 py-4 text-xs uppercase tracking-wider text-white/40">
                        Icon
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

                @forelse($skills as $skill)

                    <tr class="transition hover:bg-white/[0.02]">

                        <td class="px-6 py-5 text-sm text-white/50">
                            {{ $skill->sort_order }}
                        </td>

                        <td class="px-6 py-5 text-sm font-medium text-white">
                            {{ $skill->name }}
                        </td>

                        <td class="px-6 py-5 text-sm text-white/50">
                            {{ $skill->category?->name ?? '-' }}
                        </td>

                        <td class="px-6 py-5 text-sm text-white/40">
                            {{ $skill->icon ?: '-' }}
                        </td>

                        <td class="px-6 py-5">

                            @if($skill->is_visible)

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
                                    href="{{ route('admin.skills.edit', $skill) }}"
                                    class="rounded-lg border border-white/10 px-3 py-2 text-xs text-white/60 transition hover:bg-white/5 hover:text-white"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.skills.destroy', $skill) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus skill ini?')"
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
                            Belum ada skill.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<div class="mt-6">

    <a
        href="{{ route('admin.skill-categories.index') }}"
        class="text-sm text-white/40 transition hover:text-white"
    >
        Manage Categories →
    </a>

</div>

@endsection