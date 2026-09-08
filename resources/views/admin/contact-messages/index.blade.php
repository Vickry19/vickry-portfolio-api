@extends('admin.layouts.app')

@section('title', 'Contact Messages — Vickry CMS')
@section('header', 'Contact Messages')

@section('heading')
    Contact Messages
@endsection

@section('content')

<div class="space-y-6">

    <div>
        <p class="text-sm leading-6 text-white/45">
            Messages received from visitors through your portfolio.
        </p>
    </div>


    @if(session('success'))
        <div class="rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
            {{ session('success') }}
        </div>
    @endif


    <div class="overflow-hidden rounded-xl border border-white/10 bg-[#151515]">

        <div class="border-b border-white/10 px-5 py-4 md:px-6">

            <h3 class="text-sm font-medium text-white">
                Inbox
            </h3>

            <p class="mt-1 text-xs text-white/35">
                {{ $messages->total() }} messages
            </p>

        </div>


        <div class="hidden overflow-x-auto md:block">

            <table class="min-w-full text-sm">

                <thead>
                    <tr class="border-b border-white/10 bg-white/[0.02]">

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            Sender
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-white/35">
                            Subject
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

                    @forelse($messages as $message)

                        <tr class="transition hover:bg-white/[0.025]">

                            <td class="px-6 py-5">

                                <p class="font-medium text-white">
                                    {{ $message->name }}
                                </p>

                                <p class="mt-1 text-xs text-white/35">
                                    {{ $message->email }}
                                </p>

                            </td>


                            <td class="max-w-sm px-6 py-5">

                                <p class="truncate text-white/60">
                                    {{ $message->subject ?: 'No subject' }}
                                </p>

                                <p class="mt-1 truncate text-xs text-white/30">
                                    {{ $message->message }}
                                </p>

                            </td>


                            <td class="whitespace-nowrap px-6 py-5 text-xs text-white/40">
                                {{ $message->created_at->format('d M Y, H:i') }}
                            </td>


                            <td class="px-6 py-5">

                                @if($message->is_read)

                                    <span class="inline-flex items-center rounded-full border border-white/10 bg-white/[0.04] px-2.5 py-1 text-xs text-white/35">
                                        Read
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-2.5 py-1 text-xs text-emerald-300">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                        New
                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.contact-messages.show', $message) }}"
                                        class="rounded-lg border border-white/10 bg-white/[0.03] px-3 py-2 text-xs text-white/60 transition hover:bg-white/[0.07] hover:text-white"
                                    >
                                        View
                                    </a>

                                    <form
                                        action="{{ route('admin.contact-messages.destroy', $message) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this message?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-400/10 bg-red-400/[0.03] px-3 py-2 text-xs text-red-400/70 transition hover:bg-red-400/10 hover:text-red-300"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">

                                <p class="text-sm text-white/40">
                                    No messages yet.
                                </p>

                                <p class="mt-1 text-xs text-white/25">
                                    Messages submitted through the contact form will appear here.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Mobile --}}
        <div class="divide-y divide-white/10 md:hidden">

            @forelse($messages as $message)

                <div class="p-5">

                    <div class="flex items-start justify-between gap-4">

                        <div class="min-w-0">

                            <p class="text-sm font-medium text-white">
                                {{ $message->name }}
                            </p>

                            <p class="mt-1 truncate text-xs text-white/35">
                                {{ $message->email }}
                            </p>

                        </div>

                        @if(!$message->is_read)
                            <span class="shrink-0 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-2 py-1 text-[10px] text-emerald-300">
                                New
                            </span>
                        @endif

                    </div>


                    <p class="mt-4 text-sm text-white/55">
                        {{ $message->subject ?: 'No subject' }}
                    </p>

                    <p class="mt-1 line-clamp-2 text-xs leading-5 text-white/30">
                        {{ $message->message }}
                    </p>


                    <div class="mt-4 flex items-center justify-between">

                        <span class="text-[10px] text-white/25">
                            {{ $message->created_at->format('d M Y, H:i') }}
                        </span>

                        <a
                            href="{{ route('admin.contact-messages.show', $message) }}"
                            class="rounded-lg border border-white/10 px-3 py-2 text-xs text-white/60 hover:bg-white/[0.05] hover:text-white"
                        >
                            View
                        </a>

                    </div>

                </div>

            @empty

                <div class="px-5 py-14 text-center">
                    <p class="text-sm text-white/40">
                        No messages yet.
                    </p>
                </div>

            @endforelse

        </div>

    </div>


    {{-- Pagination --}}
    @if($messages->hasPages())

        <div class="border-t border-white/10 pt-5">
            {{ $messages->links() }}
        </div>

    @endif

</div>

@endsection