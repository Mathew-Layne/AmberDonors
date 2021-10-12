<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="bg-gray-100 h-screen w-screen">
        <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
            <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
                <div class="flex flex-col w-full md:w-1/2 p-4">
                    <div class="flex flex-col flex-1 justify-center mb-8">
                        <h1 class="text-4xl text-center font-thin">Create account</h1>
                        <div class="w-full mt-4">

                            <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="flex flex-col mt-4">
                                    <x-input id="name" class="flex-grow h-8 px-2 border rounded border-grey-400" 
                                    type="text" name="name" :value="old('name')" placeholder="Full Name" required autofocus />
                                </div>
                                <div class="flex flex-col mt-4">
                                    <x-input id="email" class="flex-grow h-8 px-2 border rounded border-grey-400"
                                        type="email" name="email" placeholder="Email" :value="old('email')" required
                                        autofocus />
                                </div>
                                <div class="flex flex-col mt-4">
                                    <x-input id="password" class="flex-grow h-8 px-2 border rounded border-grey-400"
                                        type="password" name="password" placeholder="Password" required
                                        autocomplete="current-password" />
                                </div>
                                <div class="flex flex-col mt-4">
                                    <x-input id="password" class="flex-grow h-8 px-2 border rounded border-grey-400" type="password"
                                name="password_confirmation" placeholder="Verify Password" required />
                                </div>
                                
                                <div class="flex flex-col mt-8">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                        Register
                                    </button>
                                </div>
                            </form>
                            <div class="text-center mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/2 rounded-r-lg"
                    style="background: url('https://images.pexels.com/photos/8460341/pexels-photo-8460341.jpeg?cs=srgb&dl=pexels-los-muertos-crew-8460341.jpg&fm=jpg'); background-size: cover; background-position: center center;">
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>