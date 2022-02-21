<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="{!! asset('images\logo.png') !!}" alt="">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nom')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="sur_name" :value="__('Cognom')" />

                <x-input id="sur_name" class="block mt-1 w-full" type="text" name="sur_name" :value="old('sur_name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="dni" :value="__('DNI')" />
                <x-input id="dni" placeholder="Introduzca su DNI" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus /> 
                @error('dni')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="phone" :value="__('Telèfon')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
            
                @error('phone')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="zip_code" :value="__('Codi Postal')" />

                <x-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" required autofocus />
            </div>

            <input type="hidden" value="3" name="user_types" id="user_types">
            

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Correu')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contrasenya')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmeu la Contrasenya')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ja tens una conta ?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registra') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
