@extends('admin.layouts.app')

@section('title', 'Message — Vickry CMS')
@section('header', 'Message')

@section('heading')
    Message
@endsection

@section('content')

<div class="max-w-4xl">

    <div class="mb-6">
        <a
            href="{{ route('admin.contact-messages.index') }}"
            class="text-xs text-white/35 transition hover:text-white/70"
        >
            ← Back to Messages
        </a>
    </div>


    @if(session('success'))
        <div class="mb-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
            {{ session('success') }}
        </div>
    @endif


    <div class="overflow-hidden rounded-xl border border-white/10 bg-[#151515]">

        {{-- Sender --}}
        <div class="border-b border-white/10 p-6">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">

                <div>

                    <p class="text-lg font-medium text-white">
                        {{ $contactMessage->name }}
                    </p>

                    <a
                        href="mailto:{{ $contactMessage->email }}"
                        class="mt-1 block text-sm text-white/40 hover:text-white/70"
                    >
                        {{ $contactMessage->email }}
                    </a>

                </div>


                @if($contactMessage->is_read)

                    <span class="w-fit rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-xs text-white/35">
                        Read
                    </span>

                @else

                    <span class="w-fit rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs text-emerald-300">
                        New
                    </span>

                @endif

            </div>

        </div>


        {{-- Subject --}}
        <div class="border-b border-white/10 px-6 py-5">

            <p class="text-[10px] uppercase tracking-[0.15em] text-white/25">
                Subject
            </p>

            <p class="mt-2 text-sm text-white/70">
                {{ $contactMessage->subject ?: 'No subject' }}
            </p>

        </div>


        {{-- Message --}}
        <div class="p-6">

            <p class="text-[10px] uppercase tracking-[0.15em] text-white/25">
                Message
            </p>

            <p class="mt-4 whitespace-pre-line text-sm leading-7 text-white/55">
                {{ $contactMessage->message }}
            </p>

        </div>


        {{-- Footer --}}
        <div class="flex flex-col gap-4 border-t border-white/10 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <p class="text-xs text-white/25">
                {{ $contactMessage->created_at->format('d M Y, H:i') }}
            </p>


            <div class="flex gap-2">

                <a
                    href="mailto:{{ $contactMessage->email }}"
                    class="rounded-lg bg-white px-4 py-2.5 text-xs font-medium text-black hover:bg-white/90"
                >
                    Reply
                </a>


                <form
                    action="{{ route('admin.contact-messages.destroy', $contactMessage) }}"
                    method="POST"
                    onsubmit="return confirm('Delete this message?')"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="rounded-lg border border-red-400/10 bg-red-400/[0.03] px-4 py-2.5 text-xs font-medium text-red-400/70 hover:bg-red-400/10 hover:text-red-300"
                    >
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection