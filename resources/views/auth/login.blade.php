<x-guestLayout title="Login">  
    <div class="bg-white rounded-2xl p-10 text-gray-800 w-full dark:bg-gray-900 dark:text-white">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-2">
                    <label for="username" class="uppercase font-semibold text-sm px-1">Username</label> 
                    <input type="text" value="{{ old('username') }}" id="username" name="username" required autofocus autocomplete="off"
                    class="transition duration-300 bg-white rounded-xl border-transparent ring-2 ring-rose-200 focus:ring-2 focus:ring-rose-400 focus:border-transparent
                    dark:bg-gray-800 dark:ring-lime-200 dark:focus:ring-2 dark:focus:ring-lime-400 dark:focus:border-transparent"> 
                </div>
                <div class="flex flex-col gap-2">
                    <label for="password" class="uppercase font-semibold text-sm px-1">Kata Sandi</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password"
                    class="transition duration-300 bg-white rounded-xl border-transparent ring-2 ring-rose-200 focus:ring-2 focus:ring-rose-400 focus:border-transparent
                    dark:bg-gray-800 dark:ring-lime-200 dark:focus:ring-2 dark:focus:ring-lime-400 dark:focus:border-transparent"> 
                </div>
                <div class="flex flex-row justify-between items-center">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-rose-400 shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50
                        dark:text-lime-400 dark:focus:border-lime-300 dark:focus:ring dark:focus:ring-lime-200 dark:focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-400 hover:text-gray-500">{{ __('Ingat saya') }}</span>
                    </label>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-400 hover:text-gray-500">Daftar</a>
                    @endif
                </div> 
                <div class="flex items-center justify-end">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-400 hover:text-gray-500" href="{{ route('password.request') }}">
                            {{ __('Lupa kata sandi?') }}
                        </a>
                    @endif
                </div> 
                <button class="transition duration-300 bg-rose-400 p-2 rounded-xl font-semibold uppercase text-white hover:bg-rose-600 dark:bg-lime-400 dark:text-gray-800 
                dark:hover:bg-lime-600 w-full focus:ring-2 focus:border-transparent focus:ring-rose-600 focus:outline-none dark:focus:ring-lime-600">Masuk</button>
            </div> 
        </form> 
    </div> 
</x-guestLayout> 