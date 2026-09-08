@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl">

    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-white">
            Contact Settings
        </h1>

        <p class="mt-2 text-sm text-white/40">
            Kelola seluruh teks yang ditampilkan pada section Contact.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-400">
            <ul class="list-disc space-y-1 pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.contact-settings.update') }}"
        method="POST"
        class="space-y-8"
    >
        @csrf
        @method('PUT')

        {{-- Description --}}
        <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">
            <h2 class="text-lg font-medium text-white">
                Contact Description
            </h2>

            <p class="mt-1 text-sm text-white/40">
                Teks pengantar di sebelah kiri Contact section.
            </p>

            <textarea
                name="description"
                rows="5"
                class="mt-5 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm leading-6 text-white outline-none placeholder:text-white/20 focus:border-white/30"
            >{{ old('description', $settings->description) }}</textarea>
        </div>

        {{-- Contact Information --}}
        <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">
            <h2 class="text-lg font-medium text-white">
                Contact Information
            </h2>

            <div class="mt-5 grid gap-5 sm:grid-cols-2">

                <div>
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        Email Label
                    </label>

                    <input
                        type="text"
                        name="email_label"
                        value="{{ old('email_label', $settings->email_label) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        WhatsApp Label
                    </label>

                    <input
                        type="text"
                        name="whatsapp_label"
                        value="{{ old('whatsapp_label', $settings->whatsapp_label) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        WhatsApp Text
                    </label>

                    <input
                        type="text"
                        name="whatsapp_text"
                        value="{{ old('whatsapp_text', $settings->whatsapp_text) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        Location Label
                    </label>

                    <input
                        type="text"
                        name="location_label"
                        value="{{ old('location_label', $settings->location_label) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

                <div class="sm:col-span-2">
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        Availability Text
                    </label>

                    <input
                        type="text"
                        name="availability_text"
                        value="{{ old('availability_text', $settings->availability_text) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

            </div>
        </div>

        {{-- Form Labels --}}
        <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">
            <h2 class="text-lg font-medium text-white">
                Form Labels
            </h2>

            <div class="mt-5 grid gap-5 sm:grid-cols-2">

                @php
                    $fields = [
                        'name_label' => 'Name Label',
                        'email_field_label' => 'Email Label',
                        'subject_label' => 'Subject Label',
                        'message_label' => 'Message Label',
                    ];
                @endphp

                @foreach($fields as $field => $label)
                    <div>
                        <label class="text-xs uppercase tracking-wider text-white/40">
                            {{ $label }}
                        </label>

                        <input
                            type="text"
                            name="{{ $field }}"
                            value="{{ old($field, $settings->$field) }}"
                            class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                        >
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Placeholders --}}
        <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">
            <h2 class="text-lg font-medium text-white">
                Form Placeholders
            </h2>

            <div class="mt-5 space-y-5">

                @php
                    $placeholders = [
                        'name_placeholder' => 'Name Placeholder',
                        'email_placeholder' => 'Email Placeholder',
                        'subject_placeholder' => 'Subject Placeholder',
                        'message_placeholder' => 'Message Placeholder',
                    ];
                @endphp

                @foreach($placeholders as $field => $label)
                    <div>
                        <label class="text-xs uppercase tracking-wider text-white/40">
                            {{ $label }}
                        </label>

                        <input
                            type="text"
                            name="{{ $field }}"
                            value="{{ old($field, $settings->$field) }}"
                            class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                        >
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Button & Messages --}}
        <div class="rounded-2xl border border-white/10 bg-[#181818] p-6">
            <h2 class="text-lg font-medium text-white">
                Button & Messages
            </h2>

            <div class="mt-5 space-y-5">

                <div>
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        Button Text
                    </label>

                    <input
                        type="text"
                        name="button_text"
                        value="{{ old('button_text', $settings->button_text) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        Sending Text
                    </label>

                    <input
                        type="text"
                        name="sending_text"
                        value="{{ old('sending_text', $settings->sending_text) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>
                <div>
    <label class="text-xs uppercase tracking-wider text-white/40">
        Sent Text
    </label>

    <input
        type="text"
        name="sent_text"
        value="{{ old('sent_text', $settings->sent_text) }}"
        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
    >
</div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        Success Message
                    </label>

                    <input
                        type="text"
                        name="success_message"
                        value="{{ old('success_message', $settings->success_message) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

                <div>
                    <label class="text-xs uppercase tracking-wider text-white/40">
                        Error Message
                    </label>

                    <input
                        type="text"
                        name="error_message"
                        value="{{ old('error_message', $settings->error_message) }}"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none focus:border-white/30"
                    >
                </div>

            </div>
        </div>

        {{-- Save --}}
        <div class="flex justify-end">
            <button
                type="submit"
                class="rounded-xl bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-white/90"
            >
                Save Changes
            </button>
        </div>

    </form>

</div>

@endsection