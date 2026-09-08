@extends('admin.layouts.app')

@section('title', 'Add Exploring Item — Vickry CMS')
@section('header', 'Add Exploring Item')

@section('heading')
    Add Exploring Item
@endsection

@section('content')

<div class="max-w-4xl">

    <div class="mb-6">
        <a
            href="{{ route('admin.exploring.index') }}"
            class="text-xs text-white/35 hover:text-white/70"
        >
            ← Back to Currently Exploring
        </a>

        <p class="mt-3 text-sm text-white/45">
            Add a technology or area you are currently exploring.
        </p>
    </div>

    <form
        action="{{ route('admin.exploring.store') }}"
        method="POST"
    >
        @csrf

        @include('admin.exploring.form')

        <div class="mt-6 flex gap-3">

            <button
                type="submit"
                class="rounded-lg bg-white px-5 py-2.5 text-sm font-medium text-black hover:bg-white/90"
            >
                Save Item
            </button>

            <a
                href="{{ route('admin.exploring.index') }}"
                class="rounded-lg border border-white/10 bg-white/[0.03] px-5 py-2.5 text-sm text-white/60 hover:bg-white/[0.07] hover:text-white"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection
