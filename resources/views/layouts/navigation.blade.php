<nav class="fixed z-50 flex justify-center w-full px-16 backdrop-filter backdrop-blur-lg">
    <div class="container flex justify-between w-2/3">
        <div class="flex flex-row items-center">
            <div class="flex flex-col py-5">
                <div class="mr-6 text-xl font-extrabold text-left text-transparent uppercase cursor-default bg-clip-text bg-gradient-to-br from-rose-400 to-rose-500 dark:from-lime-400 dark:to-lime-500">{{ env('APP_NAME') }}
                </div>
            </div>
            @foreach ($navigation as $nav)
                <div class="transform duration-300 {{ request()->is($nav['url'].'*') ? 'text-rose-400 dark:text-lime-400': 'text-gray-400' }}
                    flex align-middle px-5 font-semibold uppercase hover:text-rose-600 dark:hover:text-lime-600">
                    <a href="{{ route($nav['route']) }}">{{ $nav['nama'] }}</a>
                </div>
            @endforeach
        </div>
        <div class="flex items-center gap-3">
                <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                    <div @click="open = ! open">
                        <button class="flex items-center text-sm font-medium uppercase transition duration-300 ease-in-out text-rose-400 hover:text-rose-600 focus:text-red-700 dark:text-lime-400 dark:hover:text-lime-600 dark:focus:text-lime-700">
                            <div>{{ Auth::user()->name ?? 'Halo!' }}</div>
                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 w-40 mt-2 rounded-md shadow-xl" style="display: none;" @click="open = false">
                        <div class="flex flex-col gap-2 p-4 bg-white rounded-xl dark:bg-gray-900">
                            <button @click="darkMode = !darkMode" id="switchTheme" class="text-sm font-semibold text-left text-gray-800 uppercase hover:text-rose-400 dark:text-white dark:hover:text-lime-400">Mode gelap</button>
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-sm font-semibold text-left text-gray-800 uppercase hover:text-rose-400 dark:text-white dark:hover:text-lime-400">
                                        Keluar
                                    </a>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold text-left text-gray-800 uppercase hover:text-rose-400 dark:text-white dark:hover:text-lime-400">
                                    Masuk
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
        </div>
    </div>
</nav>

@slot('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if(localStorage.getItem('dark') === 'true') {
            if(document.getElementById('switchTheme') != null){
                document.getElementById('switchTheme').innerText = "Mode gelap";
            }
        } else {
            if(document.getElementById('switchTheme') != null){
                document.getElementById('switchTheme').innerText = "Mode Terang";
            }
        }
    })

    document.getElementById('switchTheme').addEventListener('click', function() {
        if(localStorage.getItem('dark') === 'true') {
            if(document.getElementById('switchTheme') != null){
                document.getElementById('switchTheme').innerText = "Mode gelap";
            }
        } else {
            if(document.getElementById('switchTheme') != null){
                document.getElementById('switchTheme').innerText = "Mode Terang";
            }
        }
    });
</script>
@endslot
