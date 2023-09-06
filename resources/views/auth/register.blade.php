<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-5" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <a class="navbar-brand text-warning-emphasis fs-1 fw-bolder d-flex justify-content-center pb-3" href="#">Ora<span
                class="text-info">Gon</span></a>

            <!-- Name -->
            <div >
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full"
                                type="text"
                                name="phone" required />
            </div>

            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address"  class="block mt-1 w-full"
                                type="text"
                                name="address" required />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('photo')" />

                <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                type="file"
                                name="photo" required />
            </div>

            <div class="flex items-center justify-end mt-5 mb-5">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>


        </form>
    </x-auth-card>
</x-guest-layout>
