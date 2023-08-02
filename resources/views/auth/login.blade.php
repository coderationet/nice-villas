@extends('layouts.app')
@section('title',__('front/login.login'))
@section('content')

    <div class="container page">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <div class="card mt-5 col-md-4 mx-auto">
            <div class="card-header">
                <div class="card-title">
                    {{ __('front/login.login')}}
                </div>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="text-center">
                        <x-input-label for="email" :value="__('front/login.email')"/>
                        <x-text-input id="email" class="block mt-1 w-100 form-control" type="email" name="email" :value="old('email')" required
                                      autofocus autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <!-- Password -->
                    <div class="mt-4 text-center">
                        <x-input-label for="password" class="w-100" :value="__('front/login.login')"/>

                        <x-text-input id="password" class="block mt-1 w-100 form-control"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4 w-100 text-center">
                        <label for="remember_me" class="inline-flex items-center text-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('front/login.remember_me') }}</span>
                        </label>
                    </div>

                    <div class="d-flex flex-column justify-content-center align-items-center mt-4">
{{--                        @if (Route::has('password.request'))--}}
{{--                            <a class="underline text-sm  text-center text-decoration-none text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"--}}
{{--                               href="{{ route('password.request') }}">--}}
{{--                                {{ __('front/login.forgot_password') }}--}}
{{--                            </a>--}}
{{--                        @endif--}}

                        <x-primary-button class="ml-3 mt-3 btn btn-primary">
                            {{ __('front/login.login') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
