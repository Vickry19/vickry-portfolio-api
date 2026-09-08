@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-white">
                Hero Roles
            </h1>
            <p class="mt-1 text-sm text-white/50">
                Kelola role yang tampil pada marquee di bagian Hero.
            </p>
        </div>

        <a
            href="{{ route('admin.hero-roles.create') }}"
            class="rounded-lg bg-white px-4 py-2 text-sm font-medium text-black transition hover:bg-white/90"
        >
            + Add Role
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-sm text-white">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-xl border border-white/10 bg-[#151515]">

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="border-b border-white/10 bg-white/[0.03]">
                    <tr>
                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-white/40">
                            #
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-white/40">
                            Role
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-white/40">
                            Order
                        </th>

                        <th class="px-5 py-4 text-xs font-medium uppercase tracking-wider text-white/40">
                            Status
                        </th>

                        <th class="px-5 py-4 text-right text-xs font-medium uppercase tracking-wider text-white/40">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse($roles as $role)
                        <tr class="transition hover:bg-white/[0.03]">

                            <td class="px-5 py-4 text-sm text-white/40">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4">
                                <span class="text-sm font-medium text-white">
                                    {{ $role->role }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-sm text-white/60">
                                {{ $role->sort_order }}
                            </td>

                            <td class="px-5 py-4">
                                @if($role->is_visible)
                                    <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-2.5 py-1 text-xs text-white">
                                        Visible
                                    </span>
                                @else
                                    <span class="inline-flex rounded-full border border-white/10 bg-black/20 px-2.5 py-1 text-xs text-white/40">
                                        Hidden
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.hero-roles.edit', $role) }}"
                                        class="rounded-lg border border-white/10 px-3 py-1.5 text-xs text-white/70 transition hover:border-white/20 hover:bg-white/5 hover:text-white"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.hero-roles.destroy', $role) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus role ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-white/10 px-3 py-1.5 text-xs text-white/50 transition hover:border-white/20 hover:bg-white/5 hover:text-white"
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
                                colspan="5"
                                class="px-5 py-12 text-center text-sm text-white/40"
                            >
                                Belum ada Hero Role.
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection