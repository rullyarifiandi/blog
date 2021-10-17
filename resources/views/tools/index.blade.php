<x-appLayout title="Peralatan">
    <div class="px-12 py-10 bg-white rounded-2xl dark:bg-gray-900">
        <div class="flex flex-col gap-1 justify-right">
            <div class="flex flex-row justify-between">
                <div class="flex flex-col items-start">
                    <div class="text-xl font-bold text-gray-800 uppercase dark:text-white">Peralatan</div>
                    <div class="text-xs font-normal text-gray-400">Beberapa alat menarik mungkin ada disini</div>
                </div>
            </div>
            <div class="mt-5">
                <div class="float-left w-2/6 mr-5">
                    <img id="imgTool" src="" alt="tool image">
                </div>
                <p class="font-normal leading-relaxed text-justify text-gray-800 dark:text-white">
                    Internet adalah sumber informasi dan ilmu yang tak terbatas, sehingga kita bisa dengan mudahnya menemukan hal-hal baru yang ada di dunia, dari yang paling aneh hingga yang paling keren!
                    salah satunya yang keren adalah masalah tentang teknologi. disini Malika akan membagikan beberapa <i>libraries</i> yang bersifat <i>opensource</i> dan layak untuk dicoba. Dan tentunya <i>libraries</i>
                    yang Malika coba adalah <i>libraries</i> yang ada untuk bahasa pemrograman <b>PHP</b>, karna memang bahasa pemrograman inilah yang Malika kuasai. Tapi ga hanya tentang <i>libraries</i> di bahasa
                    pemrograman saja loh, nantinya beberapa <i>libraries</i> lain yang ada di beberapa teknologi seperti database atau server mungkin akan Malika masukkan juga, tergantung waktu luang dan mood pastinya. hehe...&#128517;<br>
                    Berikut adalah beberapa <i>libraries</i> yang Malika coba untuk sekedar belajar ataupin iseng saja, tapi mungkin salah satunya adalah <i>libraries</i> yang lagi kalian cari,
                    semoga bermanfaat buat kita semua ya.  </p>
            </div>
            <div class="grid grid-cols-3 gap-3 mt-5">
                @auth
                    @include('tools._create')
                @endauth
                @php
                    $x = 0;
                @endphp
                @foreach ($tools as $index => $tool)
                    @php
                        $x++;
                    @endphp
                    <div class="h-full p-4 text-gray-800 duration-300 transform bg-gray-200 rounded-lg dark:bg-gray-800 dark:text-white">
                        @if ($index == 0)
                            <span class="absolute px-2 py-1 text-xs font-bold rounded-full bg-rose-300 -top-2 right-2 dark:bg-lime-300 dark:text-gray-800">Baru</span>
                        @endif
                        <div class="flex flex-col justify-between h-full gap-3">
                            <div class="flex flex-col h-full gap-1">
                                <div class="font-semibold text-left">
                                    {{ $tool->title }}
                                </div>
                                <div class="text-sm font-normal text-justify break-words">
                                    {{ $tool->content }}
                                </div>
                            </div>
                            <div class="flex flex-col w-full gap-2">
                                <a href="{{ route('tools.show', $tool) }}" class="w-full p-2 font-semibold text-center text-white uppercase duration-300 bg-rose-400 rounded-xl hover:bg-rose-600 dark:bg-lime-400 dark:text-gray-800 dark:hover:bg-lime-600 focus:ring-2 focus:border-transparent focus:ring-rose-600 focus:outline-none dark:focus:ring-lime-600" >Lihat</a>
                                @auth
                                    <form method="POST" action="{{ route('tools.destroy', $tool) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="w-full p-2 font-semibold text-white uppercase duration-300 bg-rose-400 rounded-xl hover:bg-rose-600 dark:bg-lime-400 dark:text-gray-800 dark:hover:bg-lime-600 focus:ring-2 focus:border-transparent focus:ring-rose-600 focus:outline-none dark:focus:ring-lime-600" type="submit">Hapus</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
                @guest
                    @php
                        $x = ($x% 3);
                        $y = 3;
                    @endphp
                @else
                    @php
                        $x = (($x% 3)-1);
                        $y = 1;
                    @endphp
                @endguest
                @for ($i = $x; $i < $y ; $i++)
                    <div class="flex items-center justify-center p-4 font-normal text-center text-gray-800 bg-transparent border-2 border-dashed rounded-lg border-rose-200 dark:text-white dark:border-lime-200">
                        <svg class="w-6 h-6 fill-current text-rose-200 dark:text-lime-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    @slot('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if(localStorage.getItem('dark') === 'true') {
                    if(document.getElementById('imgTool') != null){
                        document.getElementById('imgTool').src = "{{ asset('img/tool-lime.svg') }}";
                    }
                } else {
                    if(document.getElementById('imgTool') != null){
                        document.getElementById('imgTool').src = "{{ asset('img/tool-rose.svg') }}";
                    }
                }
            })

            if(document.getElementById('switchTheme')){
                document.getElementById('switchTheme').addEventListener('click', function() {
                    if(localStorage.getItem('dark') === 'true') {
                        if(document.getElementById('imgTool') != null){
                            document.getElementById('imgTool').src = "{{ asset('img/tool-lime.svg') }}";
                        }
                    } else {
                        if(document.getElementById('imgTool') != null){
                            document.getElementById('imgTool').src = "{{ asset('img/tool-rose.svg') }}";
                        }
                    }
                });
            }
        </script>
    @endslot
</x-appLayout>
