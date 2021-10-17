 <x-guestLayout title="Daftar Baru">
    <div class="bg-white rounded-2xl p-10 text-gray-800 w-full dark:bg-gray-900 dark:text-white">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex flex-col gap-3">
        <div class="flex flex-col gap-2">
            <label for="name" class="uppercase font-semibold text-sm px-1">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
            class="transition duration-300 bg-white rounded-xl border-transparent ring-2 ring-rose-200 focus:ring-2 focus:ring-rose-400 focus:border-transparent
            dark:bg-gray-800 dark:ring-lime-200 dark:focus:ring-2 dark:focus:ring-lime-400 dark:focus:border-transparent"> 
        </div>
        <div class="flex flex-col gap-2">
            <label for="username" class="uppercase font-semibold text-sm px-1">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
            class="transition duration-300 bg-white rounded-xl border-transparent ring-2 ring-rose-200 focus:ring-2 focus:ring-rose-400 focus:border-transparent
            dark:bg-gray-800 dark:ring-lime-200 dark:focus:ring-2 dark:focus:ring-lime-400 dark:focus:border-transparent"> 
        </div> 
        <div class="flex flex-col gap-2">
            <label for="email" class="uppercase font-semibold text-sm px-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
            class="transition duration-300 bg-white rounded-xl border-transparent ring-2 ring-rose-200 focus:ring-2 focus:ring-rose-400 focus:border-transparent
            dark:bg-gray-800 dark:ring-lime-200 dark:focus:ring-2 dark:focus:ring-lime-400 dark:focus:border-transparent"> 
        </div>    
        <div class="flex flex-col gap-2">
            <label for="password" class="uppercase font-semibold text-sm px-1">Password</label>
            <input type="password" name="password" id="password" required  autocomplete="new-password"
            class="transition duration-300 bg-white rounded-xl border-transparent ring-2 ring-rose-200 focus:ring-2 focus:ring-rose-400 focus:border-transparent
            dark:bg-gray-800 dark:ring-lime-200 dark:focus:ring-2 dark:focus:ring-lime-400 dark:focus:border-transparent"> 
        </div>     
        <div class="flex flex-col gap-2">
            <label for="password_confirmation" class="uppercase font-semibold text-sm px-1">Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required  autocomplete="new-password"
            class="transition duration-300 bg-white rounded-xl border-transparent ring-2 ring-rose-200 focus:ring-2 focus:ring-rose-400 focus:border-transparent
            dark:bg-gray-800 dark:ring-lime-200 dark:focus:ring-2 dark:focus:ring-lime-400 dark:focus:border-transparent"> 
        </div>
        <a class="underline text-sm text-gray-400 hover:text-gray-500" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
        <button class="transition duration-300 bg-rose-400 p-2 rounded-xl font-semibold uppercase text-white hover:bg-rose-600 dark:bg-lime-400 dark:text-gray-800 
        dark:hover:bg-lime-600 w-full focus:ring-2 focus:border-transparent focus:ring-rose-600 focus:outline-none dark:focus:ring-lime-600">Register</button>
    </form> 
    </div>
 </x-guest-layout>

            <!-- Name -->