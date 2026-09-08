@extends('admin.layouts.app')

@section('title', 'Certificates — Vickry CMS')
@section('header', 'Certificates')

@section('heading')
    Certificates
@endsection

@section('content')

<div class="space-y-6">

    {{-- Header Action --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm leading-6 text-white/45">
                Manage certificates displayed on your portfolio.
            </p>
        </div>

        <a
            href="{{ route('admin.certificates.create') }}"
            class="inline-flex w-fit items-center rounded-lg border border-white/15 bg-white px-4 py-2.5 text-sm font-medium text-black transition hover:bg-white/90"
        >
            + Add Certificate
        </a>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
            {{ session('success') }}
        </div>
    @endif


    {{-- Error Message --}}
    @if($errors->any())
        <div class="rounded-xl border border-red-400/20 bg-red-400/10 px-4 py-3">
            <p class="text-sm font-medium text-red-300">
                Please check the following errors:
            </p>

            <ul class="mt-2 list-disc space-y-1 pl-5 text-xs text-red-300/80">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Certificates Table --}}
    <div class="overflow-hidden rounded-xl border border-white/10 bg-[#151515]">

        {{-- Table Header --}}
        <div class="border-b border-white/10 px-5 py-4 md:px-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-white">
                        All Certificates
                    </h3>

                    <p class="mt-1 text-xs text-white/35">
                        {{ $certificates->count() }}
                        {{ Str::plural('certificate', $certificates->count()) }}
                    </p>
                </div>
            </div>
        </div>


        {{-- Desktop Table --}}
        <div class="hidden overflow-x-auto md:block">
            <table class="min-w-full text-sm">

                <thead>
                    <tr class="border-b border-white/10 bg-white/[0.02]">
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            #
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            Certificate
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            Issuer
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            Date
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

                    @forelse($certificates as $certificate)

                        <tr class="group transition hover:bg-white/[0.025]">

                            {{-- Number --}}
                            <td class="whitespace-nowrap px-6 py-5 text-white/30">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </td>


                            {{-- Certificate --}}
                            <td class="px-6 py-5">
                                <div class="max-w-xs">

                                    <p class="truncate font-medium text-white">
                                        {{ $certificate->title }}
                                    </p>

                                    @if($certificate->credential_id)
                                        <p class="mt-1 truncate text-xs text-white/30">
                                            ID: {{ $certificate->credential_id }}
                                        </p>
                                    @endif

                                </div>
                            </td>


                            {{-- Issuer --}}
                            <td class="whitespace-nowrap px-6 py-5 text-white/50">
                                {{ $certificate->issuer ?: '—' }}
                            </td>


                            {{-- Date --}}
                            <td class="whitespace-nowrap px-6 py-5 text-white/50">
                                {{ $certificate->issued_at ?: '—' }}
                            </td>


                            {{-- Status --}}
                            <td class="whitespace-nowrap px-6 py-5">

                                @if($certificate->is_visible)

                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-2.5 py-1 text-xs text-emerald-300">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                        Visible
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/[0.04] px-2.5 py-1 text-xs text-white/35">
                                        <span class="h-1.5 w-1.5 rounded-full bg-white/30"></span>
                                        Hidden
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.certificates.edit', $certificate) }}"
                                        class="rounded-lg border border-white/10 bg-white/[0.03] px-3 py-2 text-xs font-medium text-white/60 transition hover:border-white/20 hover:bg-white/[0.07] hover:text-white"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.certificates.destroy', $certificate) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this certificate?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-400/10 bg-red-400/[0.03] px-3 py-2 text-xs font-medium text-red-400/70 transition hover:border-red-400/20 hover:bg-red-400/10 hover:text-red-300"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="mx-auto max-w-sm">

                                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/[0.03]">
                                        <span class="text-lg text-white/30">
                                            +
                                        </span>
                                    </div>

                                    <h3 class="mt-4 text-sm font-medium text-white">
                                        No certificates yet
                                    </h3>

                                    <p class="mt-1 text-xs leading-5 text-white/35">
                                        Add your first certificate to display it on your portfolio.
                                    </p>

                                    <a
                                        href="{{ route('admin.certificates.create') }}"
                                        class="mt-5 inline-flex rounded-lg border border-white/10 bg-white/[0.05] px-4 py-2 text-xs font-medium text-white/70 transition hover:bg-white/10 hover:text-white"
                                    >
                                        Add Certificate
                                    </a>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>


        {{-- Mobile Cards --}}
        <div class="divide-y divide-white/10 md:hidden">

            @forelse($certificates as $certificate)

                <div class="p-5">

                    <div class="flex items-start justify-between gap-4">

                        <div class="min-w-0">

                            <p class="text-sm font-medium text-white">
                                {{ $certificate->title }}
                            </p>

                            <p class="mt-1 text-xs text-white/40">
                                {{ $certificate->issuer ?: 'Unknown issuer' }}
                            </p>

                        </div>

                        @if($certificate->is_visible)

                            <span class="shrink-0 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-2 py-1 text-[10px] text-emerald-300">
                                Visible
                            </span>

                        @else

                            <span class="shrink-0 rounded-full border border-white/10 bg-white/[0.04] px-2 py-1 text-[10px] text-white/35">
                                Hidden
                            </span>

                        @endif

                    </div>


                    <div class="mt-4 grid grid-cols-2 gap-4">

                        <div>
                            <p class="text-[10px] uppercase tracking-wider text-white/25">
                                Date
                            </p>

                            <p class="mt-1 text-xs text-white/55">
                                {{ $certificate->issued_at ?: '—' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-[10px] uppercase tracking-wider text-white/25">
                                Order
                            </p>

                            <p class="mt-1 text-xs text-white/55">
                                {{ $certificate->sort_order }}
                            </p>
                        </div>

                    </div>


                    <div class="mt-5 flex gap-2">

                        <a
                            href="{{ route('admin.certificates.edit', $certificate) }}"
                            class="flex-1 rounded-lg border border-white/10 bg-white/[0.03] px-3 py-2 text-center text-xs font-medium text-white/60 transition hover:bg-white/[0.07] hover:text-white"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.certificates.destroy', $certificate) }}"
                            method="POST"
                            class="flex-1"
                            onsubmit="return confirm('Delete this certificate?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full rounded-lg border border-red-400/10 bg-red-400/[0.03] px-3 py-2 text-xs font-medium text-red-400/70 transition hover:bg-red-400/10 hover:text-red-300"
                            >
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

            @empty

                <div class="px-5 py-14 text-center">

                    <p class="text-sm text-white/40">
                        No certificates yet.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection