@extends('auth.layouts.main')

@push('title')
    Log In
@endpush

@push('css')
@endpush

@section('content')
    <div class="absolute hidden opacity-50 ltr:-left-16 rtl:-right-16 -top-10 md:block">
        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 125 316" width="125" height="316">
            <title>&lt;Group&gt;</title>
            <g id="&lt;Group&gt;">
                <path id="&lt;Path&gt;" class="fill-custom-100/50 dark:fill-custom-950/50"
                    d="m23.4 221.8l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-100 dark:fill-custom-950"
                    d="m31.2 229.6l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-200/50 dark:fill-custom-900/50"
                    d="m39 237.4l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-200/75 dark:fill-custom-900/75"
                    d="m46.8 245.2l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-200 dark:fill-custom-900"
                    d="m54.6 253.1l-1.3-3.1v-315.4l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-300/50 dark:fill-custom-800/50"
                    d="m62.4 260.9l-1.2-3.1v-315.4l1.2 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-300/75 dark:fill-custom-800/75"
                    d="m70.3 268.7l-1.3-3.1v-315.4l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-300 dark:fill-custom-800"
                    d="m78.1 276.5l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-400/50 dark:fill-custom-700/50"
                    d="m85.9 284.3l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-400/75 dark:fill-custom-700/75"
                    d="m93.7 292.1l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-400 dark:fill-custom-700"
                    d="m101.5 299.9l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-500/50 dark:fill-custom-600/50"
                    d="m109.3 307.8l-1.3-3.1v-315.4l1.3 3.1z"></path>
            </g>
        </svg>
    </div>

    <div class="absolute hidden -rotate-180 opacity-50 ltr:-right-16 rtl:-left-16 -bottom-10 md:block">
        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 125 316" width="125" height="316">
            <title>&lt;Group&gt;</title>
            <g id="&lt;Group&gt;">
                <path id="&lt;Path&gt;" class="fill-custom-100/50 dark:fill-custom-950/50"
                    d="m23.4 221.8l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-100 dark:fill-custom-950"
                    d="m31.2 229.6l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-200/50 dark:fill-custom-900/50"
                    d="m39 237.4l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-200/75 dark:fill-custom-900/75"
                    d="m46.8 245.2l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-200 dark:fill-custom-900"
                    d="m54.6 253.1l-1.3-3.1v-315.4l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-300/50 dark:fill-custom-800/50"
                    d="m62.4 260.9l-1.2-3.1v-315.4l1.2 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-300/75 dark:fill-custom-800/75"
                    d="m70.3 268.7l-1.3-3.1v-315.4l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-300 dark:fill-custom-800"
                    d="m78.1 276.5l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-400/50 dark:fill-custom-700/50"
                    d="m85.9 284.3l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-400/75 dark:fill-custom-700/75"
                    d="m93.7 292.1l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-400 dark:fill-custom-700"
                    d="m101.5 299.9l-1.3-3.1v-315.3l1.3 3.1z"></path>
                <path id="&lt;Path&gt;" class="fill-custom-500/50 dark:fill-custom-600/50"
                    d="m109.3 307.8l-1.3-3.1v-315.4l1.3 3.1z"></path>
            </g>
        </svg>
    </div>

    <div class="mb-0 w-screen lg:mx-auto lg:w-[500px] card shadow-lg border-none shadow-slate-100 relative">
        <div class="!px-10 !py-12 card-body">
            <a href="">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="hidden h-6 mx-auto dark:block">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="block h-16 mx-auto dark:hidden">
            </a>

            <div class="mt-8 text-center">
                <h4 class="mb-1 text-custom-500 dark:text-custom-500">Selamat Datang Kembali !</h4>
                {{-- <p class="text-slate-500 dark:text-zink-200">Login.</p> --}}
            </div>

            @if ($errors->any())
                <div class="flex mt-2 gap-3 p-4 text-sm text-red-500 rounded-md bg-red-50 dark:bg-red-400/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-alert-triangle inline-block size-4 mt-0.5 shrink-0">
                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                        <path d="M12 9v4"></path>
                        <path d="M12 17h.01"></path>
                    </svg>
                    <div>
                        <h6 class="mb-1">Ada kesalahan pada input anda!</h6>
                        <ul class="ml-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('login') }}" class="mt-10" id="signInForm" method="POST">
                <div class="hidden px-4 py-3 mb-3 text-sm text-green-500 border border-green-200 rounded-md bg-green-50 dark:bg-green-400/20 dark:border-green-500/50"
                    id="successAlert">
                    You have <b>successfully</b> signed in.
                </div>

                @csrf
                <div class="mb-3">
                    <label for="email" class="inline-block mb-2 text-base font-medium">Email</label>
                    <input type="email" id="email"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                        @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Enter username or email">

                    @error('email')
                        <div id="username-error" class="hidden mt-1 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                    <input type="password" id="password"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                        @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Enter password">

                    @error('password')
                        <div id="password-error" class="hidden mt-1 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <input id="form-checkbox"
                            class="border rounded-sm appearce-none size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                            type="checkbox" value="" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label for="form-checkbox-label"
                            class="inline-block text-base font-medium align-middle cursor-pointer">Remember me</label>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit"
                        class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Log
                        In</button>
                </div>

                {{-- <div class="mt-10 text-center">
                    @if (Route::has('password.request'))
                        <p class="mb-0 text-slate-500 dark:text-zink-200">Lupa Password ? <a
                                href="{{ route('password.request') }}"
                                class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">
                                Reset</a> </p>
                    @endif
                </div> --}}
            </form>
        </div>
    </div>
@endsection
