<x-appLayout title="Beranda">
    <div class="px-12 py-10 bg-white rounded-2xl dark:bg-gray-900">
        <div class="flex flex-col gap-2 justify-right">
            <div class="flex flex-row justify-between">
                <div class="flex flex-col items-start">
                    <div class="text-xl font-bold text-gray-800 uppercase dark:text-white">Beranda</div>
                    <div class="text-xs font-normal text-gray-400">Beberapa catatan dari Malika</div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-6 py-5">
            @foreach ($posts as $post)
                <div class="w-full h-full transition duration-150 ease-in-out transform cursor-pointer hover:-translate-y-0 hover:scale-105 hover:filter hover:sepia">
                    <a href="{{ route('posts.show', $post) }}">
                        <div class="shadow rounded-2xl">
                            <div class="flex flex-col">
                                <img src="{{ asset('img/test.png') }}" alt="image" class="w-full rounded-t-2xl">
                                <div class="flex flex-col gap-1 px-5 py-3">
                                    <div class="text-lg font-semibold text-left">{{ $post->title }}</div>
                                    <div class="text-xs text-left">{{ $post->user->name }} - {{ $post->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{ $posts->links() }}
        </div>
    </div>
</x-appLayout>
