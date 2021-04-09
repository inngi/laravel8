<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if ($errors)
            @foreach ($errors->all() as $error)
                <p class="text-red-500 text-xl">{{ $error }}</p>                
            @endforeach
        @endif
        @if (Session::has('error')) 
        <p class="text-red-500 text-xl">{{ session('error') }}</p>                
        @endif
        <form method="POST">
            @csrf
            <!-- username -->
            <div>
                <x-label for="name" :value="__('username')" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username"  required autofocus />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
