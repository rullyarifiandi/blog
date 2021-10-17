<x-guest-layout title="Verifikasi Email">
    <div class="flex flex-col gap-4 bg-white rounded-2xl p-10 text-gray-800 w-full dark:bg-gray-900 dark:text-white"> 
        <div class="text-justify">
            Terimakasih telah mendaftar! sebelum melakukan hal lainnya, silahkan verifikasi akun dengan klik link yang sudah diemail.
        </div> 
        <div class="flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf 
                <div>
                    <button type="submit" class="hover:text-rose-400 dark:hover:text-lime-400">Kirim ulang link verifikasi</button>
                </div>
            </form> 
            <form method="POST" action="{{ route('logout') }}">
                @csrf  
                <button type="submit" class="transition duration-300 bg-rose-400 p-2 rounded-xl font-semibold uppercase text-white hover:bg-rose-600 dark:bg-lime-400 dark:text-gray-800 
                dark:hover:bg-lime-600 w-full focus:ring-2 focus:border-transparent focus:ring-rose-600 focus:outline-none dark:focus:ring-lime-600">Keluar</button>
            </form>
        </div>
    </div> 
</x-guest-layout> 