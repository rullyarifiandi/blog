 @if (session('status'))
    <div class="rounded-2xl py-4 px-6 bg-rose-400 text-white dark:bg-lime-400 dark:text-gray-800 mb-6"> 
        @if (session('status') == 'verification-link-sent') 
            Link verifikasi sudah di kirimkan ulang ke email yang anda gunakan saat pendaftaran. 
        @else
        {{ session('status') }}
        @endif 
    </div> 
 @endif
 @if ($errors->any())
    <div class="rounded-2xl py-4 px-6 bg-rose-400 text-white dark:bg-lime-400 dark:text-gray-800 mb-6">
         <div class="font-medium">
             {{ __('Whoops! Something went wrong.') }}
         </div> 
         <ul class="mt-3 list-disc list-inside text-sm ">
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif
 