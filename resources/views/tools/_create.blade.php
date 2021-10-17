<form action="{{ route('tools.store') }}" method="POST">
    @csrf
    <div class="h-full transform duration-300 bg-gray-200 rounded-lg p-4 text-gray-800 dark:bg-gray-800 dark:text-white"> 
        <span class="absolute bg-rose-300 px-2 py-1 text-xs font-bold rounded-full -top-2 right-2 dark:bg-lime-300 dark:text-gray-800">Tambah</span> 
        <div class="flex flex-col justify-between h-full gap-1">
            <div class="flex flex-col h-full gap-1">
                <div>  
                    <label class="text-sm font-semibold text-gray-800 dark:text-white" for="nama">Nama</label>
                    <input class="text-sm w-full mt-1 rounded-md py-1 px-2 text-gray-800 ring-1 border-transparent ring-rose-300 bg-white focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-transparent
                    dark:bg-gray-900 dark:text-white dark:ring-lime-200 dark:focus:ring-lime-400" type="text" name="nama" id="nama" autocomplete="off" placeholder="Isi nama disini" value="{{ old('nama') }}">
                    @error('nama')
                        <span>
                            <div class="text-xs text-rose-600 pt-1 dark:text-lime-600">
                                {{ $message }}
                            </div>
                        </span> 
                    @enderror
                </div>
                <div> 
                    <label class="text-sm font-semibold text-gray-800 dark:text-white" for="deskripsi">Deskripsi</label>
                    <textarea class="text-sm h-5/6 w-full mt-1 rounded-md py-1 px-2 text-gray-800 ring-1  border-transparent ring-rose-300 bg-white  focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-transparent
                    dark:bg-gray-900 dark:text-white dark:ring-lime-200 dark:focus:ring-lime-400" name="deskripsi" id="deskripsi" placeholder="Isi nama deskripsi">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <span>
                            <div class="text-xs text-rose-600 dark:text-lime-600">
                                {{ $message }}
                            </div>
                        </span> 
                    @enderror
                </div>  
            </div>
            <button class="transition duration-300 bg-rose-400 p-2 rounded-xl font-semibold uppercase text-white hover:bg-rose-600 dark:bg-lime-400 dark:text-gray-800 
            dark:hover:bg-lime-600 w-full focus:ring-2 focus:border-transparent focus:ring-rose-600 focus:outline-none dark:focus:ring-lime-600" type="submit">Kirim</button>  
        </div>
    </div>  
    <input type="hidden" name="slug">
</form>