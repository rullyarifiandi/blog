<x-appLayout title="Tentang">
    <div class="px-12 py-10 bg-white rounded-2xl dark:bg-gray-900">
        <div class="flex flex-col gap-1 justify-right">
            <div class="flex flex-row justify-between">
                <div class="flex flex-col items-start w-4/5">
                    <div class="text-xl font-bold text-gray-800 uppercase dark:text-white">{{ $tool->nama }}</div>
                    <div class="text-xs font-normal text-justify text-gray-400">{{ $tool->deskripsi }}</div>
                </div>
                <div class="flex items-center">
                    <div class="text-xs font-normal text-gray-400">{{ \Carbon\Carbon::parse($tool->created_at)->diffForHumans() }}</div>
                </div>
            </div>
            <div class="mt-5">
                <div class="flex flex-row items-center justify-between gap-2">
                    <div class="flex-flex col">
                        <form enctype="multipart/form-data" method="post" class="mb-2" id="form_ocr">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <label for="image_upload" class="text-gray-800 dark:text-white">Unggah file berupa gambar atau pdf</label>
                            <div class="flex flex-row gap-4 mt-3">
                                <input type="file" name="image_upload" placeholder="select image" id="image_upload" class="p-2 text-gray-800 border-2 border-gray-400 border-dashed rounded-lg dark:text-white">
                                <button type="submit" name="btnSubmit" id="btnSubmit" class="px-4 py-2 font-semibold text-white uppercase transition duration-300 rounded-lg bg-rose-400 hover:bg-rose-500 dark:text-gray-800 dark:bg-lime-400 dark:hover:bg-lime-500">
                                    <span class="flex flex-row gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-auto text-white fill-current animate-spin dark:text-gray-800" id="loading"><path d="M0 11c.511-6.158 5.685-11 12-11s11.489 4.842 12 11h-2.009c-.506-5.046-4.793-9-9.991-9s-9.485 3.954-9.991 9h-2.009zm21.991 2c-.506 5.046-4.793 9-9.991 9s-9.485-3.954-9.991-9h-2.009c.511 6.158 5.685 11 12 11s11.489-4.842 12-11h-2.009z"/></svg>
                                        <div id="btn_ocr">Uraikan</div>
                                    </span>
                                </button>
                            </div>
                        </form>
                        <a href="{{ asset('sample.pdf') }}" class="text-xs font-light text-gray-800 hover:underline dark:text-white" target="_blank" class="mt-3" download>Contoh file</span></a>
                    </div>
                    <div class="float-right">
                        <img src="" alt="Scan images" class="h-auto w-52" id="imgOCR">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="showing" class="px-12 py-10 mt-4 text-gray-800 bg-white rounded-2xl dark:bg-gray-900 dark:text-white">
        <p class="mb-4 text-xl font-bold text-gray-800 uppercase dark:text-white">Hasil</p>
        <p id="output"></p>
    </div>
    @slot('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
	            document.querySelector('#showing').style.display = 'none';
	            document.querySelector('#loading').style.display = 'none';

                if(localStorage.getItem('dark') === 'true') {
                    if(document.getElementById('imgOCR') != null){
                        document.getElementById('imgOCR').src = "{{ asset('img/scan-lime.svg') }}";
                    }
                } else {
                    if(document.getElementById('imgOCR') != null){
                        document.getElementById('imgOCR').src = "{{ asset('img/scan-rose.svg') }}";
                    }
                }
            })

            document.getElementById('switchTheme').addEventListener('click', function() {
                if(localStorage.getItem('dark') === 'true') {
                    if(document.getElementById('imgOCR') != null){
                        document.getElementById('imgOCR').src = "{{ asset('img/scan-lime.svg') }}";
                    }
                } else {
                    if(document.getElementById('imgOCR') != null){
                        document.getElementById('imgOCR').src = "{{ asset('img/scan-rose.svg') }}";
                    }
                }
            });

            document.getElementById('btnSubmit').addEventListener('click', function() {
                event.preventDefault();

                let input   = document.querySelector('input[type=file]'),
                file    = input.files[0];

                let form    = document.querySelector('#form_ocr');
                let http    = new XMLHttpRequest();
                let data    = new FormData();
                let url     = '{{ route('ocr_process') }}';
                let csrf    = document.querySelector('meta[name="csrf-token"]').content;

                http.open('POST', url, true);
                http.setRequestHeader('X-CSRF-TOKEN', csrf);
                data.append('file', file)
                http.onreadystatechange = function() {
                    if(http.readyState == 4 && http.status == 200) {
	                    document.querySelector('#showing').style.display = 'block';
                        document.querySelector('#output').innerHTML = http.responseText;
	                    document.querySelector('#loading').style.display = 'none';
                        document.querySelector('#btn_ocr').innerHTML = 'Uraikan'
                        document.querySelector('#btnSubmit').disabled = false;
                    }
                }
	            document.querySelector('#loading').style.display = 'block';
                document.querySelector('#btn_ocr').innerHTML = 'Proses';
                document.querySelector('#btnSubmit').disabled = true;
                http.send(data);
            })
        </script>
    @endslot
</x-appLayout>
