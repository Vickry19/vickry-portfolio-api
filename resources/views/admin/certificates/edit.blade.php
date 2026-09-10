@extends('admin.layouts.app')

@section('title', 'Edit Certificate — Vickry CMS')
@section('header', 'Edit Certificate')

@section('heading')
    Edit Certificate
@endsection

@section('content')

<div class="max-w-4xl">

    <div class="mb-6">
        <a
            href="{{ route('admin.certificates.index') }}"
            class="text-xs text-white/35 transition hover:text-white/70"
        >
            ← Back to Certificates
        </a>

        <p class="mt-3 text-sm text-white/45">
            Update certificate information and portfolio visibility.
        </p>
    </div>

    <form
        id="certificate-form"
        action="{{ route('admin.certificates.update', $certificate) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        @include('admin.certificates.form')

        {{-- Current File --}}
        @if($certificate->file)

            @php
                $certificateFileUrl = filter_var(
                    $certificate->file,
                    FILTER_VALIDATE_URL
                )
                    ? $certificate->file
                    : asset('storage/' . $certificate->file);
            @endphp

            <div class="mt-6 rounded-xl border border-white/10 bg-[#151515] p-5 md:p-6">

                <div class="mb-4">
                    <h3 class="text-sm font-medium text-white">
                        Current File
                    </h3>

                    <p class="mt-1 text-xs text-white/35">
                        Uploaded certificate file.
                    </p>
                </div>

                @if(
                    in_array(
                        strtolower($certificate->file_type ?? ''),
                        ['jpg', 'jpeg', 'png', 'webp']
                    )
                )

                    <div class="overflow-hidden rounded-lg border border-white/10 bg-white/[0.02]">
                        <img
                            src="{{ $certificateFileUrl }}"
                            alt="{{ $certificate->title }}"
                            class="max-h-[400px] w-full object-contain"
                        >
                    </div>

                @else

                    <a
                        href="{{ $certificateFileUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center rounded-lg border border-white/10 bg-white/[0.03] px-4 py-2.5 text-xs font-medium text-white/60 transition hover:bg-white/[0.07] hover:text-white"
                    >
                        View PDF
                        <span class="ml-2">↗</span>
                    </a>

                @endif

            </div>

        @endif

        {{-- Actions --}}
        <div class="mt-6 flex flex-wrap gap-3">

            <button
                type="submit"
                id="update-certificate"
                class="rounded-lg bg-white px-5 py-2.5 text-sm font-medium text-black transition hover:bg-white/90 disabled:cursor-not-allowed disabled:opacity-50"
            >
                Update Certificate
            </button>

            <a
                href="{{ route('admin.certificates.index') }}"
                class="rounded-lg border border-white/10 bg-white/[0.03] px-5 py-2.5 text-sm font-medium text-white/60 transition hover:bg-white/[0.07] hover:text-white"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection