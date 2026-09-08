<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Vickry CMS')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#111111] text-white">

    <div class="flex min-h-screen">

        {{-- =========================================================
            DESKTOP SIDEBAR
        ========================================================== --}}
        <aside class="hidden w-64 shrink-0 border-r border-white/10 bg-[#151515] md:flex md:flex-col">

            {{-- Brand --}}
            <div class="px-6 pb-6 pt-7">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="group block"
                >
                    <div class="flex items-center gap-3">

                        <div class="flex h-9 w-9 items-center justify-center rounded-xl border border-white/10 bg-white/[0.04] transition group-hover:border-white/20 group-hover:bg-white/[0.07]">
                            <span class="text-xs font-semibold tracking-wider text-white/70">
                                VK
                            </span>
                        </div>

                        <div>
                            <p class="text-[10px] font-medium uppercase tracking-[0.25em] text-white/30">
                                VICKRY
                            </p>

                            <p class="mt-0.5 text-sm font-medium text-white/80">
                                Portfolio CMS
                            </p>
                        </div>

                    </div>
                </a>

            </div>


            {{-- Navigation --}}
            <nav class="flex-1 space-y-7 overflow-y-auto px-4 pb-6">

                {{-- =====================================================
                    WORKSPACE
                ====================================================== --}}
                <div>

                    <p class="mb-2 px-3 text-[10px] font-medium uppercase tracking-[0.22em] text-white/25">
                        Workspace
                    </p>


                    {{-- Dashboard --}}
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.dashboard')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <rect
                                width="7"
                                height="7"
                                x="3.75"
                                y="3.75"
                                rx="1"
                            />

                            <rect
                                width="7"
                                height="7"
                                x="13.25"
                                y="3.75"
                                rx="1"
                            />

                            <rect
                                width="7"
                                height="7"
                                x="3.75"
                                y="13.25"
                                rx="1"
                            />

                            <rect
                                width="7"
                                height="7"
                                x="13.25"
                                y="13.25"
                                rx="1"
                            />
                        </svg>

                        <span>Dashboard</span>

                    </a>

                </div>


                {{-- =====================================================
                    PORTFOLIO
                ====================================================== --}}
                <div>

                    <p class="mb-2 px-3 text-[10px] font-medium uppercase tracking-[0.22em] text-white/25">
                        Portfolio
                    </p>


                    {{-- Hero --}}
                    <a
                        href="{{ route('admin.hero.edit') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.hero.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.hero.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3.75v16.5M3.75 12h16.5"
                            />
                        </svg>

                        <span>Hero</span>
                    </a>


                    {{-- About --}}
                    <a
                        href="{{ route('admin.about.edit') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.about.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.about.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <circle
                                cx="12"
                                cy="12"
                                r="8.25"
                            />

                            <path
                                stroke-linecap="round"
                                d="M12 10.5v5"
                            />

                            <path
                                stroke-linecap="round"
                                d="M12 7.75h.01"
                            />
                        </svg>

                        <span>About</span>
                    </a>


                    {{-- Skills --}}
                    <a
                        href="{{ route('admin.skills.index') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.skills.*') || request()->routeIs('admin.skill-categories.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.skills.*') || request()->routeIs('admin.skill-categories.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m12 3.75 2.1 4.26 4.7.68-3.4 3.31.8 4.68-4.2-2.2-4.2 2.2.8-4.68-3.4-3.31 4.7-.68L12 3.75Z"
                            />
                        </svg>

                        <span>Skills</span>
                    </a>


                    {{-- Experience --}}
                    <a
                        href="{{ route('admin.experiences.index') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.experiences.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.experiences.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <rect
                                width="16.5"
                                height="14"
                                x="3.75"
                                y="5"
                                rx="2"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 5V3.75h6V5"
                            />

                            <path
                                stroke-linecap="round"
                                d="M3.75 10h16.5"
                            />
                        </svg>

                        <span>Experience</span>
                    </a>


                    {{-- Education --}}
                    <a
                        href="{{ route('admin.educations.index') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.educations.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.educations.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m3.75 9 8.25-4.5L20.25 9 12 13.5 3.75 9Z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7.5 11v4.25c0 1.52 2.01 2.75 4.5 2.75s4.5-1.23 4.5-2.75V11"
                            />

                            <path
                                stroke-linecap="round"
                                d="M20.25 9v5"
                            />
                        </svg>

                        <span>Education</span>
                    </a>


                    {{-- Projects --}}
                    <a
                        href="{{ route('admin.projects.index') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.projects.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.projects.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <rect
                                width="16.5"
                                height="16.5"
                                x="3.75"
                                y="3.75"
                                rx="2"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m8 15 2.5-2.5 2 2 3.5-4"
                            />
                        </svg>

                        <span>Projects</span>
                    </a>


                    {{-- Certificates --}}
                    <a
                        href="{{ route('admin.certificates.index') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.certificates.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.certificates.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7 3.75h10A2.25 2.25 0 0 1 19.25 6v12A2.25 2.25 0 0 1 17 20.25H7A2.25 2.25 0 0 1 4.75 18V6A2.25 2.25 0 0 1 7 3.75Z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m8.5 12 2.25 2.25L15.5 9.5"
                            />
                        </svg>

                        <span>Certificates</span>
                    </a>


                    {{-- Exploring --}}
                    <a
                        href="{{ route('admin.exploring.index') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.exploring.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.exploring.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3.75a5.25 5.25 0 0 0-3 9.56c.94.63 1.5 1.69 1.5 2.82h3c0-1.13.56-2.19 1.5-2.82A5.25 5.25 0 0 0 12 3.75Z"
                            />

                            <path
                                stroke-linecap="round"
                                d="M10 19.25h4M10.5 21h3"
                            />
                        </svg>

                        <span>Exploring</span>
                    </a>

                </div>


                {{-- =====================================================
                    INBOX
                ====================================================== --}}
                <div>

                    <p class="mb-2 px-3 text-[10px] font-medium uppercase tracking-[0.22em] text-white/25">
                        Inbox
                    </p>


                    {{-- Contact Messages --}}
                    <a
                        href="{{ route('admin.contact-messages.index') }}"
                        class="group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.contact-messages.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >

                        <div class="flex items-center gap-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.contact-messages.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
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

                            <span>Messages</span>

                        </div>


                        @php
                            $sidebarUnreadMessages = \App\Models\ContactMessage::where(
                                'is_read',
                                false
                            )->count();
                        @endphp

                        @if($sidebarUnreadMessages > 0)
                            <span class="flex h-5 min-w-5 items-center justify-center rounded-full bg-white px-1.5 text-[9px] font-semibold text-black">
                                {{ $sidebarUnreadMessages }}
                            </span>
                        @endif

                    </a>

                </div>


                {{-- =====================================================
                    SETTINGS
                ====================================================== --}}
                <div>

                    <p class="mb-2 px-3 text-[10px] font-medium uppercase tracking-[0.22em] text-white/25">
                        Settings
                    </p>


                    {{-- Site Settings --}}
                    <a
                        href="{{ route('admin.site-settings.edit') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.site-settings.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.site-settings.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <circle
                                cx="12"
                                cy="12"
                                r="3"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.7 1.7-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.03 1.56V20h-2.4v-.2a1.7 1.7 0 0 0-1.03-1.56 1.7 1.7 0 0 0-1.88.34l-.06.06-1.7-1.7.06-.06A1.7 1.7 0 0 0 8.46 15a1.7 1.7 0 0 0-1.56-1.03H6.7v-2.4h.2A1.7 1.7 0 0 0 8.46 10a1.7 1.7 0 0 0-.34-1.88l-.06-.06 1.7-1.7.06.06a1.7 1.7 0 0 0 1.88.34A1.7 1.7 0 0 0 12.73 5.2V5h2.4v.2a1.7 1.7 0 0 0 1.03 1.56 1.7 1.7 0 0 0 1.88-.34l.06-.06 1.7 1.7-.06.06a1.7 1.7 0 0 0-.34 1.88 1.7 1.7 0 0 0 1.56 1.03h.2A1.7 1.7 0 0 0 19.4 15Z"
                            />
                        </svg>

                        <span>Site Settings</span>

                    </a>


                    {{-- Contact Settings --}}
                    <a
                        href="{{ route('admin.contact-settings.edit') }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.contact-settings.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.contact-settings.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 6.75A2.75 2.75 0 0 1 6.75 4h10.5A2.75 2.75 0 0 1 20 6.75v7.5A2.75 2.75 0 0 1 17.25 17H11l-4.5 3v-3.25H6.75A2.75 2.75 0 0 1 4 14.25v-7.5Z"
                            />

                            <path
                                stroke-linecap="round"
                                d="M8 8.5h8M8 12h5"
                            />
                        </svg>

                        <span>Contact Settings</span>

                    </a>

                </div>

            </nav>


            {{-- Sidebar Footer --}}
            <div class="border-t border-white/10 p-4">

                <div class="rounded-xl border border-white/10 bg-white/[0.02] px-3 py-3">

                    <p class="text-[10px] uppercase tracking-[0.18em] text-white/25">
                        Portfolio CMS
                    </p>

                    <p class="mt-1 text-xs text-white/40">
                        Manage your digital presence.
                    </p>

                </div>

            </div>

        </aside>


        {{-- =========================================================
            MOBILE SIDEBAR OVERLAY
        ========================================================== --}}
        <div
            id="mobile-sidebar-overlay"
            class="fixed inset-0 z-40 hidden bg-black/60 backdrop-blur-sm md:hidden"
            onclick="closeMobileSidebar()"
        ></div>


        {{-- =========================================================
            MOBILE SIDEBAR
        ========================================================== --}}
        <aside
            id="mobile-sidebar"
            class="fixed inset-y-0 left-0 z-50 flex w-72 -translate-x-full flex-col border-r border-white/10 bg-[#151515] transition-transform duration-300 ease-out md:hidden"
        >

            {{-- Mobile Brand --}}
            <div class="flex items-center justify-between border-b border-white/10 px-5 py-5">

                <a
                    href="{{ route('admin.dashboard') }}"
                    onclick="closeMobileSidebar()"
                    class="group flex items-center gap-3"
                >

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl border border-white/10 bg-white/[0.04]">
                        <span class="text-xs font-semibold tracking-wider text-white/70">
                            VK
                        </span>
                    </div>

                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-[0.25em] text-white/30">
                            VICKRY
                        </p>

                        <p class="mt-0.5 text-sm font-medium text-white/80">
                            Portfolio CMS
                        </p>
                    </div>

                </a>


                {{-- Close --}}
                <button
                    type="button"
                    onclick="closeMobileSidebar()"
                    aria-label="Close menu"
                    class="flex h-9 w-9 items-center justify-center rounded-xl border border-white/10 text-white/50 transition hover:border-white/20 hover:bg-white/[0.05] hover:text-white"
                >
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
                            d="M6 6l12 12M18 6 6 18"
                        />
                    </svg>
                </button>

            </div>


            {{-- Mobile Navigation --}}
            <nav class="flex-1 space-y-7 overflow-y-auto px-4 py-6">

                {{-- Workspace --}}
                <div>

                    <p class="mb-2 px-3 text-[10px] font-medium uppercase tracking-[0.22em] text-white/25">
                        Workspace
                    </p>

                    {{-- Dashboard --}}
                    <a
                        href="{{ route('admin.dashboard') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.dashboard')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <rect width="7" height="7" x="3.75" y="3.75" rx="1" />
                            <rect width="7" height="7" x="13.25" y="3.75" rx="1" />
                            <rect width="7" height="7" x="3.75" y="13.25" rx="1" />
                            <rect width="7" height="7" x="13.25" y="13.25" rx="1" />
                        </svg>

                        <span>Dashboard</span>
                    </a>

                </div>


                {{-- Portfolio --}}
                <div>

                    <p class="mb-2 px-3 text-[10px] font-medium uppercase tracking-[0.22em] text-white/25">
                        Portfolio
                    </p>


                    {{-- Hero --}}
                    <a
                        href="{{ route('admin.hero.edit') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.hero.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.hero.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3.75v16.5M3.75 12h16.5"
                            />
                        </svg>

                        <span>Hero</span>
                    </a>


                    {{-- About --}}
                    <a
                        href="{{ route('admin.about.edit') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.about.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.about.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <circle cx="12" cy="12" r="8.25" />

                            <path
                                stroke-linecap="round"
                                d="M12 10.5v5"
                            />

                            <path
                                stroke-linecap="round"
                                d="M12 7.75h.01"
                            />
                        </svg>

                        <span>About</span>
                    </a>


                    {{-- Skills --}}
                    <a
                        href="{{ route('admin.skills.index') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.skills.*') || request()->routeIs('admin.skill-categories.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.skills.*') || request()->routeIs('admin.skill-categories.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m12 3.75 2.1 4.26 4.7.68-3.4 3.31.8 4.68-4.2-2.2-4.2 2.2.8-4.68-3.4-3.31 4.7-.68L12 3.75Z"
                            />
                        </svg>

                        <span>Skills</span>
                    </a>


                    {{-- Experience --}}
                    <a
                        href="{{ route('admin.experiences.index') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.experiences.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.experiences.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <rect
                                width="16.5"
                                height="14"
                                x="3.75"
                                y="5"
                                rx="2"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 5V3.75h6V5"
                            />

                            <path
                                stroke-linecap="round"
                                d="M3.75 10h16.5"
                            />
                        </svg>

                        <span>Experience</span>
                    </a>


                    {{-- Education --}}
                    <a
                        href="{{ route('admin.educations.index') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.educations.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.educations.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m3.75 9 8.25-4.5L20.25 9 12 13.5 3.75 9Z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7.5 11v4.25c0 1.52 2.01 2.75 4.5 2.75s4.5-1.23 4.5-2.75V11"
                            />

                            <path
                                stroke-linecap="round"
                                d="M20.25 9v5"
                            />
                        </svg>

                        <span>Education</span>
                    </a>


                    {{-- Projects --}}
                    <a
                        href="{{ route('admin.projects.index') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.projects.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.projects.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <rect
                                width="16.5"
                                height="16.5"
                                x="3.75"
                                y="3.75"
                                rx="2"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m8 15 2.5-2.5 2 2 3.5-4"
                            />
                        </svg>

                        <span>Projects</span>
                    </a>


                    {{-- Certificates --}}
                    <a
                        href="{{ route('admin.certificates.index') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.certificates.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.certificates.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7 3.75h10A2.25 2.25 0 0 1 19.25 6v12A2.25 2.25 0 0 1 17 20.25H7A2.25 2.25 0 0 1 4.75 18V6A2.25 2.25 0 0 1 7 3.75Z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m8.5 12 2.25 2.25L15.5 9.5"
                            />
                        </svg>

                        <span>Certificates</span>
                    </a>


                    {{-- Exploring --}}
                    <a
                        href="{{ route('admin.exploring.index') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.exploring.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.exploring.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3.75a5.25 5.25 0 0 0-3 9.56c.94.63 1.5 1.69 1.5 2.82h3c0-1.13.56-2.19 1.5-2.82A5.25 5.25 0 0 0 12 3.75Z"
                            />

                            <path
                                stroke-linecap="round"
                                d="M10 19.25h4M10.5 21h3"
                            />
                        </svg>

                        <span>Exploring</span>
                    </a>

                </div>


                {{-- Inbox --}}
                <div>

                    <p class="mb-2 px-3 text-[10px] font-medium uppercase tracking-[0.22em] text-white/25">
                        Inbox
                    </p>

                    <a
                        href="{{ route('admin.contact-messages.index') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.contact-messages.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >

                        <div class="flex items-center gap-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.contact-messages.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
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

                            <span>Messages</span>

                        </div>

                        @php
                            $mobileUnreadMessages = \App\Models\ContactMessage::where(
                                'is_read',
                                false
                            )->count();
                        @endphp

                        @if($mobileUnreadMessages > 0)
                            <span class="flex h-5 min-w-5 items-center justify-center rounded-full bg-white px-1.5 text-[9px] font-semibold text-black">
                                {{ $mobileUnreadMessages }}
                            </span>
                        @endif

                    </a>

                </div>


                {{-- Settings --}}
                <div>

                    <p class="mb-2 px-3 text-[10px] font-medium uppercase tracking-[0.22em] text-white/25">
                        Settings
                    </p>


                    {{-- Site Settings --}}
                    <a
                        href="{{ route('admin.site-settings.edit') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.site-settings.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.site-settings.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <circle
                                cx="12"
                                cy="12"
                                r="3"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.7 1.7-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.03 1.56V20h-2.4v-.2a1.7 1.7 0 0 0-1.03-1.56 1.7 1.7 0 0 0-1.88.34l-.06.06-1.7-1.7.06-.06A1.7 1.7 0 0 0 8.46 15a1.7 1.7 0 0 0-1.56-1.03H6.7v-2.4h.2A1.7 1.7 0 0 0 8.46 10a1.7 1.7 0 0 0-.34-1.88l-.06-.06 1.7-1.7.06.06a1.7 1.7 0 0 0 1.88.34A1.7 1.7 0 0 0 12.73 5.2V5h2.4v.2a1.7 1.7 0 0 0 1.03 1.56 1.7 1.7 0 0 0 1.88-.34l-.06.06 1.7 1.7-.06.06a1.7 1.7 0 0 0-.34 1.88 1.7 1.7 0 0 0 1.56 1.03h.2A1.7 1.7 0 0 0 19.4 15Z"
                            />
                        </svg>

                        <span>Site Settings</span>

                    </a>


                    {{-- Contact Settings --}}
                    <a
                        href="{{ route('admin.contact-settings.edit') }}"
                        onclick="closeMobileSidebar()"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition
                        {{ request()->routeIs('admin.contact-settings.*')
                            ? 'bg-white text-black'
                            : 'text-white/55 hover:bg-white/[0.05] hover:text-white' }}"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 shrink-0 {{ request()->routeIs('admin.contact-settings.*') ? 'text-black' : 'text-white/30 group-hover:text-white/60' }}"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 6.75A2.75 2.75 0 0 1 6.75 4h10.5A2.75 2.75 0 0 1 20 6.75v7.5A2.75 2.75 0 0 1 17.25 17H11l-4.5 3v-3.25H6.75A2.75 2.75 0 0 1 4 14.25v-7.5Z"
                            />

                            <path
                                stroke-linecap="round"
                                d="M8 8.5h8M8 12h5"
                            />
                        </svg>

                        <span>Contact Settings</span>

                    </a>

                </div>

            </nav>


            {{-- Mobile Sidebar Footer --}}
            <div class="border-t border-white/10 p-4">

                <div class="rounded-xl border border-white/10 bg-white/[0.02] px-3 py-3">

                    <p class="text-[10px] uppercase tracking-[0.18em] text-white/25">
                        Portfolio CMS
                    </p>

                    <p class="mt-1 text-xs text-white/40">
                        Manage your digital presence.
                    </p>

                </div>

            </div>

        </aside>


        {{-- =========================================================
            MAIN
        ========================================================== --}}
        <main class="min-w-0 flex-1">

            {{-- Header --}}
            <header class="flex items-center justify-between border-b border-white/10 px-4 py-4 sm:px-6 md:px-10 md:py-5">

                <div class="flex items-center gap-3">

                    {{-- Mobile Hamburger --}}
                    <button
                        type="button"
                        onclick="openMobileSidebar()"
                        aria-label="Open menu"
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-white/10 text-white/55 transition hover:border-white/20 hover:bg-white/[0.04] hover:text-white md:hidden"
                    >
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
                                d="M4 6.75h16M4 12h16M4 17.25h16"
                            />
                        </svg>
                    </button>


                    <div>
                        <p class="text-xs uppercase tracking-[0.18em] text-white/30">
                            @yield('header', 'Vickry CMS')
                        </p>

                        <h1 class="mt-1 text-xl font-semibold tracking-tight sm:text-2xl">
                            @yield('heading', 'Content Management System')
                        </h1>
                    </div>

                </div>


                {{-- Logout --}}
                <form
                    action="{{ route('admin.logout') }}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        aria-label="Logout"
                        title="Logout"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 text-white/55 transition hover:border-white/20 hover:bg-white/[0.04] hover:text-white"
                    >

                        {{-- Door / Logout Icon --}}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 8.25V6.75A2.25 2.25 0 0 0 13.5 4.5h-6A2.25 2.25 0 0 0 5.25 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25h6a2.25 2.25 0 0 0 2.25-2.25v-1.5"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 12h8.25m0 0-3-3m3 3-3 3"
                            />
                        </svg>

                    </button>

                </form>

            </header>


            {{-- Page Content --}}
            <div class="p-4 sm:p-6 md:p-10">

                @yield('content')

            </div>

        </main>

    </div>


    {{-- =========================================================
        MOBILE SIDEBAR SCRIPT
    ========================================================== --}}
    <script>
        function openMobileSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('mobile-sidebar-overlay');

            if (!sidebar || !overlay) {
                return;
            }

            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');

            document.body.classList.add('overflow-hidden');
        }

        function closeMobileSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('mobile-sidebar-overlay');

            if (!sidebar || !overlay) {
                return;
            }

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeMobileSidebar();
            }
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 768) {
                closeMobileSidebar();
            }
        });
    </script>

</body>
</html>