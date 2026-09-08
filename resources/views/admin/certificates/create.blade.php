@extends('admin.layouts.app')

@section('title', 'Add Certificate — Vickry CMS')
@section('header', 'Add Certificate')

@section('heading')
    Add Certificate
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
            Add a certificate to your portfolio.
        </p>
    </div>

    <form
        action="{{ route('admin.certificates.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        @include('admin.certificates.form')

        <div class="mt-6 flex flex-wrap gap-3">

            <button
                type="submit"
                class="rounded-lg bg-white px-5 py-2.5 text-sm font-medium text-black transition hover:bg-white/90"
            >
                Save Certificate
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