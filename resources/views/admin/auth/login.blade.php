<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login — Vickry CMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#111111] text-white">

    <div class="flex min-h-screen items-center justify-center px-6">

        <div class="w-full max-w-md">

            <div class="mb-8 text-center">
                <p class="text-sm tracking-[0.3em] text-white/40">
                    VICKRY CMS
                </p>

                <h1 class="mt-3 text-3xl font-semibold">
                    Welcome Back
                </h1>

                <p class="mt-2 text-sm text-white/50">
                    Sign in to manage your portfolio.
                </p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-[#181818] p-7">

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    <div>
                        <label
                            for="email"
                            class="mb-2 block text-sm text-white/60"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-white/30"
                            placeholder="admin@example.com"
                        >
                    </div>

                    <div class="mt-5">
                        <label
                            for="password"
                            class="mb-2 block text-sm text-white/60"
                        >
                            Password
                        </label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="w-full rounded-xl border border-white/10 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-white/30"
                            placeholder="••••••••"
                        >
                    </div>

                    <label class="mt-5 flex items-center gap-3 text-sm text-white/50">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="h-4 w-4 rounded border-white/20 bg-[#111111]"
                        >

                        Remember me
                    </label>

                    <button
                        type="submit"
                        class="mt-6 w-full rounded-xl bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-white/90"
                    >
                        Sign In
                    </button>
                </form>

            </div>

            <p class="mt-6 text-center text-xs text-white/30">
                Vickry Portfolio CMS
            </p>

        </div>

    </div>

</body>
</html>