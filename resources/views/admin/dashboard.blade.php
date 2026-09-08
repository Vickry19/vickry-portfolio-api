@extends('admin.layouts.app')

@section('title', 'Dashboard — Vickry CMS')

@section('content')
    @php
        /*
        |--------------------------------------------------------------------------
        | Dashboard Data
        |--------------------------------------------------------------------------
        */

        $projectCount = \App\Models\Project::count();

        $visibleProjectCount = \App\Models\Project::where('is_visible', true)->count();

        $certificateCount = \App\Models\Certificate::count();

        $skillCount = \App\Models\Skill::count();

        $messageCount = \App\Models\ContactMessage::count();

        $unreadMessageCount = \App\Models\ContactMessage::where(
            'is_read',
            false
        )->count();

        $featuredProject = \App\Models\Project::where(
            'is_featured',
            true
        )->first();

        $recentProjects = \App\Models\Project::latest()
            ->take(3)
            ->get();

        $recentMessages = \App\Models\ContactMessage::latest()
            ->take(4)
            ->get();
    @endphp


    <div class="space-y-8">

        {{-- =========================================================
            HEADER
        ========================================================== --}}
        <div class="flex flex-col justify-between gap-5 lg:flex-row lg:items-end">

            <div>
                <div class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-white"></span>

                    <p class="text-[11px] font-medium uppercase tracking-[0.25em] text-white/35">
                        Admin Dashboard
                    </p>
                </div>

                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                    Welcome back.
                </h1>

                <p class="mt-2 max-w-xl text-sm leading-6 text-white/40">
                    Pantau dan kelola portfolio kamu dari satu workspace.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a
                    href="{{ route('admin.projects.create') }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-medium text-black transition hover:bg-white/85"
                >
                    <span class="text-base leading-none">+</span>
                    New Project
                </a>

                <a
                    href="{{ route('admin.contact-messages.index') }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.03] px-4 py-2.5 text-sm text-white/65 transition hover:border-white/20 hover:bg-white/[0.06] hover:text-white"
                >
                    Messages

                    @if($unreadMessageCount > 0)
                        <span class="flex h-5 min-w-5 items-center justify-center rounded-full bg-white px-1.5 text-[10px] font-semibold text-black">
                            {{ $unreadMessageCount }}
                        </span>
                    @endif
                </a>
            </div>

        </div>


        {{-- =========================================================
            OVERVIEW
        ========================================================== --}}
        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Projects --}}
            <a
                href="{{ route('admin.projects.index') }}"
                class="group relative overflow-hidden rounded-2xl border border-white/10 bg-white/[0.025] p-5 transition duration-300 hover:-translate-y-0.5 hover:border-white/20 hover:bg-white/[0.045]"
            >
                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-white/30">
                            Projects
                        </p>

                        <p class="mt-3 text-3xl font-semibold tracking-tight text-white">
                            {{ $projectCount }}
                        </p>

                        <p class="mt-1 text-xs text-white/30">
                            {{ $visibleProjectCount }} currently visible
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] text-white/40 transition group-hover:text-white">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 6.75A2.75 2.75 0 0 1 6.75 4h10.5A2.75 2.75 0 0 1 20 6.75v10.5A2.75 2.75 0 0 1 17.25 20H6.75A2.75 2.75 0 0 1 4 17.25V6.75Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8 8h8M8 12h8M8 16h5"
                            />
                        </svg>
                    </div>

                </div>

                <div class="mt-5 text-xs text-white/25 transition group-hover:text-white/50">
                    View projects →
                </div>
            </a>


            {{-- Certificates --}}
            <a
                href="{{ route('admin.certificates.index') }}"
                class="group relative overflow-hidden rounded-2xl border border-white/10 bg-white/[0.025] p-5 transition duration-300 hover:-translate-y-0.5 hover:border-white/20 hover:bg-white/[0.045]"
            >
                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-white/30">
                            Certificates
                        </p>

                        <p class="mt-3 text-3xl font-semibold tracking-tight text-white">
                            {{ $certificateCount }}
                        </p>

                        <p class="mt-1 text-xs text-white/30">
                            Credentials in portfolio
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] text-white/40 transition group-hover:text-white">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7.25 3.75h9.5A2.25 2.25 0 0 1 19 6v12a2.25 2.25 0 0 1-2.25 2.25h-9.5A2.25 2.25 0 0 1 5 18V6a2.25 2.25 0 0 1 2.25-2.25Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m8.5 12 2 2 4.5-5"
                            />
                        </svg>
                    </div>

                </div>

                <div class="mt-5 text-xs text-white/25 transition group-hover:text-white/50">
                    View certificates →
                </div>
            </a>


            {{-- Skills --}}
            <a
                href="{{ route('admin.skills.index') }}"
                class="group relative overflow-hidden rounded-2xl border border-white/10 bg-white/[0.025] p-5 transition duration-300 hover:-translate-y-0.5 hover:border-white/20 hover:bg-white/[0.045]"
            >
                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-white/30">
                            Skills
                        </p>

                        <p class="mt-3 text-3xl font-semibold tracking-tight text-white">
                            {{ $skillCount }}
                        </p>

                        <p class="mt-1 text-xs text-white/30">
                            Technologies & tools
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] text-white/40 transition group-hover:text-white">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <circle cx="12" cy="12" r="8.25" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8.5 12h7M12 8.5v7"
                            />
                        </svg>
                    </div>

                </div>

                <div class="mt-5 text-xs text-white/25 transition group-hover:text-white/50">
                    View skills →
                </div>
            </a>


            {{-- Messages --}}
            <a
                href="{{ route('admin.contact-messages.index') }}"
                class="group relative overflow-hidden rounded-2xl border border-white/10 bg-white/[0.025] p-5 transition duration-300 hover:-translate-y-0.5 hover:border-white/20 hover:bg-white/[0.045]"
            >
                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-white/30">
                            Messages
                        </p>

                        <p class="mt-3 text-3xl font-semibold tracking-tight text-white">
                            {{ $messageCount }}
                        </p>

                        @if($unreadMessageCount > 0)
                            <p class="mt-1 text-xs text-white/50">
                                {{ $unreadMessageCount }} unread message{{ $unreadMessageCount > 1 ? 's' : '' }}
                            </p>
                        @else
                            <p class="mt-1 text-xs text-white/30">
                                All messages read
                            </p>
                        @endif
                    </div>

                    <div class="relative flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] text-white/40 transition group-hover:text-white">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M20.25 11.5c0 4.28-3.69 7.75-8.25 7.75a9.8 9.8 0 0 1-3.6-.67L4 20l1.25-3.72A7.28 7.28 0 0 1 3.75 11.5c0-4.28 3.69-7.75 8.25-7.75s8.25 3.47 8.25 7.75Z"
                            />
                        </svg>

                        @if($unreadMessageCount > 0)
                            <span class="absolute -right-1 -top-1 h-2.5 w-2.5 rounded-full bg-white ring-4 ring-[#111111]"></span>
                        @endif

                    </div>

                </div>

                <div class="mt-5 text-xs text-white/25 transition group-hover:text-white/50">
                    Open inbox →
                </div>
            </a>

        </div>


        {{-- =========================================================
            SPOTLIGHT + QUICK ACCESS
        ========================================================== --}}
        <div class="grid gap-6 lg:grid-cols-3">

            {{-- Featured Project --}}
            <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-white/[0.025] lg:col-span-2">

                @if($featuredProject)

                    <div class="absolute right-0 top-0 h-40 w-40 rounded-full bg-white/[0.025] blur-3xl"></div>

                    <div class="relative p-6 sm:p-7">

                        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">

                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-white"></span>

                                    <p class="text-[10px] font-medium uppercase tracking-[0.22em] text-white/30">
                                        Portfolio Spotlight
                                    </p>
                                </div>

                                <h2 class="mt-3 text-xl font-medium tracking-tight text-white">
                                    {{ $featuredProject->title }}
                                </h2>

                                @if($featuredProject->category)
                                    <p class="mt-1 text-xs text-white/35">
                                        {{ $featuredProject->category }}
                                        @if($featuredProject->year)
                                            <span class="mx-1 text-white/15">•</span>
                                            {{ $featuredProject->year }}
                                        @endif
                                    </p>
                                @endif
                            </div>

                            <span class="inline-flex w-fit rounded-full border border-white/15 bg-white px-3 py-1 text-[10px] font-medium uppercase tracking-wider text-black">
                                Featured
                            </span>

                        </div>


                        @if($featuredProject->description)
                            <p class="mt-6 max-w-2xl text-sm leading-7 text-white/45">
                                {{ $featuredProject->description }}
                            </p>
                        @endif


                        @if($featuredProject->technologies)
                            <div class="mt-5 flex flex-wrap gap-2">

                                @foreach(explode("\n", $featuredProject->technologies) as $technology)
                                    @if(trim($technology))
                                        <span class="rounded-full border border-white/10 bg-white/[0.03] px-2.5 py-1 text-[10px] text-white/40">
                                            {{ trim($technology) }}
                                        </span>
                                    @endif
                                @endforeach

                            </div>
                        @endif


                        <div class="mt-7 flex flex-wrap gap-3">

                            <a
                                href="{{ route('admin.projects.edit', $featuredProject) }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-xs font-medium text-black transition hover:bg-white/85"
                            >
                                Edit Featured Project
                                <span>→</span>
                            </a>

                            <a
                                href="{{ route('admin.projects.index') }}"
                                class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-4 py-2.5 text-xs text-white/50 transition hover:border-white/20 hover:text-white"
                            >
                                All Projects
                            </a>

                        </div>

                    </div>

                @else

                    <div class="p-6 sm:p-7">

                        <div class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-white/30"></span>

                            <p class="text-[10px] font-medium uppercase tracking-[0.22em] text-white/30">
                                Portfolio Spotlight
                            </p>
                        </div>

                        <h2 class="mt-3 text-xl font-medium text-white">
                            No featured project
                        </h2>

                        <p class="mt-3 max-w-lg text-sm leading-6 text-white/40">
                            Pilih salah satu project sebagai Featured Project agar muncul sebagai project utama portfolio.
                        </p>

                        <a
                            href="{{ route('admin.projects.index') }}"
                            class="mt-6 inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-xs font-medium text-black transition hover:bg-white/85"
                        >
                            Choose Project
                            <span>→</span>
                        </a>

                    </div>

                @endif

            </div>


            {{-- Quick Access --}}
            <div class="rounded-2xl border border-white/10 bg-white/[0.025] p-6">

                <div>
                    <p class="text-[10px] font-medium uppercase tracking-[0.22em] text-white/30">
                        Quick Access
                    </p>

                    <h2 class="mt-2 text-lg font-medium text-white">
                        Edit portfolio
                    </h2>
                </div>


                <div class="mt-5 space-y-2">

                    <a
                        href="{{ route('admin.hero.edit') }}"
                        class="group flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.02] px-4 py-3.5 transition hover:border-white/20 hover:bg-white/[0.05]"
                    >
                        <div>
                            <p class="text-sm text-white/70">
                                Hero
                            </p>
                            <p class="mt-0.5 text-[11px] text-white/25">
                                Introduction & profile
                            </p>
                        </div>

                        <span class="text-white/20 transition group-hover:translate-x-1 group-hover:text-white/60">
                            →
                        </span>
                    </a>


                    <a
                        href="{{ route('admin.about.edit') }}"
                        class="group flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.02] px-4 py-3.5 transition hover:border-white/20 hover:bg-white/[0.05]"
                    >
                        <div>
                            <p class="text-sm text-white/70">
                                About
                            </p>
                            <p class="mt-0.5 text-[11px] text-white/25">
                                Personal introduction
                            </p>
                        </div>

                        <span class="text-white/20 transition group-hover:translate-x-1 group-hover:text-white/60">
                            →
                        </span>
                    </a>


                    <a
                        href="{{ route('admin.projects.index') }}"
                        class="group flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.02] px-4 py-3.5 transition hover:border-white/20 hover:bg-white/[0.05]"
                    >
                        <div>
                            <p class="text-sm text-white/70">
                                Projects
                            </p>
                            <p class="mt-0.5 text-[11px] text-white/25">
                                Portfolio work
                            </p>
                        </div>

                        <span class="text-white/20 transition group-hover:translate-x-1 group-hover:text-white/60">
                            →
                        </span>
                    </a>


                    <a
                        href="{{ route('admin.site-settings.edit') }}"
                        class="group flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.02] px-4 py-3.5 transition hover:border-white/20 hover:bg-white/[0.05]"
                    >
                        <div>
                            <p class="text-sm text-white/70">
                                Site Settings
                            </p>
                            <p class="mt-0.5 text-[11px] text-white/25">
                                Identity & SEO
                            </p>
                        </div>

                        <span class="text-white/20 transition group-hover:translate-x-1 group-hover:text-white/60">
                            →
                        </span>
                    </a>

                </div>

            </div>

        </div>


        {{-- =========================================================
            RECENT ACTIVITY
        ========================================================== --}}
        <div class="grid gap-6 lg:grid-cols-2">

            {{-- Recent Projects --}}
            <div class="rounded-2xl border border-white/10 bg-white/[0.025]">

                <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">

                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-[0.22em] text-white/30">
                            Recent Activity
                        </p>

                        <h2 class="mt-1.5 text-base font-medium text-white">
                            Latest Projects
                        </h2>
                    </div>

                    <a
                        href="{{ route('admin.projects.index') }}"
                        class="text-xs text-white/30 transition hover:text-white"
                    >
                        View all →
                    </a>

                </div>


                <div class="divide-y divide-white/10">

                    @forelse($recentProjects as $project)

                        <a
                            href="{{ route('admin.projects.edit', $project) }}"
                            class="group flex items-center gap-4 px-6 py-4 transition hover:bg-white/[0.025]"
                        >

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] text-xs text-white/30">
                                {{ $project->number ?: str_pad($project->id, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="min-w-0 flex-1">

                                <div class="flex flex-wrap items-center gap-2">

                                    <p class="truncate text-sm text-white/70">
                                        {{ $project->title }}
                                    </p>

                                    @if($project->is_featured)
                                        <span class="rounded-full border border-white/10 bg-white px-2 py-0.5 text-[9px] font-medium text-black">
                                            Featured
                                        </span>
                                    @endif

                                </div>

                                <div class="mt-1 flex items-center gap-2 text-[11px] text-white/25">

                                    @if($project->category)
                                        <span>{{ $project->category }}</span>
                                    @endif

                                    @if($project->year)
                                        @if($project->category)
                                            <span>•</span>
                                        @endif

                                        <span>{{ $project->year }}</span>
                                    @endif

                                </div>

                            </div>

                            <span class="text-white/15 transition group-hover:translate-x-1 group-hover:text-white/50">
                                →
                            </span>

                        </a>

                    @empty

                        <div class="px-6 py-10 text-center">
                            <p class="text-sm text-white/35">
                                Belum ada project.
                            </p>

                            <a
                                href="{{ route('admin.projects.create') }}"
                                class="mt-3 inline-block text-xs text-white/50 hover:text-white"
                            >
                                Create your first project →
                            </a>
                        </div>

                    @endforelse

                </div>

            </div>


            {{-- Recent Messages --}}
            <div class="rounded-2xl border border-white/10 bg-white/[0.025]">

                <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">

                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-[0.22em] text-white/30">
                            Inbox
                        </p>

                        <h2 class="mt-1.5 text-base font-medium text-white">
                            Recent Messages
                        </h2>
                    </div>

                    <a
                        href="{{ route('admin.contact-messages.index') }}"
                        class="text-xs text-white/30 transition hover:text-white"
                    >
                        View all →
                    </a>

                </div>


                <div class="divide-y divide-white/10">

                    @forelse($recentMessages as $message)

                        <a
                            href="{{ route('admin.contact-messages.show', $message) }}"
                            class="group flex items-center gap-4 px-6 py-4 transition hover:bg-white/[0.025]"
                        >

                            <div class="relative flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-white/10 bg-white/[0.03] text-xs font-medium text-white/40">
                                {{ strtoupper(substr($message->name, 0, 1)) }}

                                @if(!$message->is_read)
                                    <span class="absolute -right-0.5 -top-0.5 h-2.5 w-2.5 rounded-full bg-white ring-4 ring-[#111111]"></span>
                                @endif
                            </div>


                            <div class="min-w-0 flex-1">

                                <div class="flex items-center justify-between gap-3">

                                    <p class="truncate text-sm text-white/70">
                                        {{ $message->name }}
                                    </p>

                                    <span class="shrink-0 text-[10px] text-white/20">
                                        {{ $message->created_at?->diffForHumans() }}
                                    </span>

                                </div>

                                <p class="mt-1 truncate text-xs text-white/30">
                                    {{ $message->subject ?: 'No subject' }}
                                </p>

                            </div>

                            <span class="text-white/15 transition group-hover:translate-x-1 group-hover:text-white/50">
                                →
                            </span>

                        </a>

                    @empty

                        <div class="px-6 py-10 text-center">
                            <p class="text-sm text-white/35">
                                Belum ada pesan masuk.
                            </p>
                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- =========================================================
            PORTFOLIO SNAPSHOT
        ========================================================== --}}
        <div class="rounded-2xl border border-white/10 bg-white/[0.025] p-6">

            <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

                <div>
                    <p class="text-[10px] font-medium uppercase tracking-[0.22em] text-white/30">
                        Portfolio Snapshot
                    </p>

                    <h2 class="mt-2 text-lg font-medium text-white">
                        Your portfolio at a glance
                    </h2>

                    <p class="mt-1 text-xs text-white/30">
                        Ringkasan konten yang sedang kamu kelola.
                    </p>
                </div>

                <a
                    href="{{ route('admin.site-settings.edit') }}"
                    class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/10 px-4 py-2.5 text-xs text-white/45 transition hover:border-white/20 hover:text-white"
                >
                    Edit Settings
                    <span>→</span>
                </a>

            </div>


            <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-xl border border-white/10 bg-black/10 p-4">
                    <p class="text-[10px] uppercase tracking-[0.18em] text-white/25">
                        Total Projects
                    </p>

                    <p class="mt-2 text-xl font-medium text-white">
                        {{ $projectCount }}
                    </p>
                </div>


                <div class="rounded-xl border border-white/10 bg-black/10 p-4">
                    <p class="text-[10px] uppercase tracking-[0.18em] text-white/25">
                        Published
                    </p>

                    <p class="mt-2 text-xl font-medium text-white">
                        {{ $visibleProjectCount }}
                    </p>
                </div>


                <div class="rounded-xl border border-white/10 bg-black/10 p-4">
                    <p class="text-[10px] uppercase tracking-[0.18em] text-white/25">
                        Skills
                    </p>

                    <p class="mt-2 text-xl font-medium text-white">
                        {{ $skillCount }}
                    </p>
                </div>


                <div class="rounded-xl border border-white/10 bg-black/10 p-4">
                    <p class="text-[10px] uppercase tracking-[0.18em] text-white/25">
                        Certificates
                    </p>

                    <p class="mt-2 text-xl font-medium text-white">
                        {{ $certificateCount }}
                    </p>
                </div>

            </div>

        </div>

    </div>
@endsection