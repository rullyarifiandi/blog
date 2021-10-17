<x-appLayout title="Tentang">
    <div class="px-12 py-10 bg-white rounded-2xl dark:bg-gray-900">
        <div class="flex flex-col gap-1 justify-right">
            <div class="flex flex-row justify-between">
                <div class="flex flex-col items-start">
                    <div class="text-xl font-bold text-gray-800 uppercase dark:text-white">Tentang</div>
                    <div class="text-xs font-normal text-gray-400">Beberapa tentang blog ini</div>
                </div>
                <div class="flex items-center">
                    <div class="text-xs font-normal text-gray-400">{{ \Carbon\Carbon::parse('2021-09-10 12:11:36')->diffForHumans() }}</div>
                </div>
            </div>
            <div class="mt-5">
                <div class="float-left w-2/6 mr-5">
                    <img id="imgAbout" src="" alt="about me">
                </div>
                <div class="font-normal leading-relaxed text-justify text-gray-800 dark:text-white">
                    <p>Blog ini adalah blog pribadi milik Malika, dan Malika sendiri adalah toko fiksi yang dikembangkan oleh penulis untuk sekedar iseng semata. Penulis berharap blog iseng ini
                        bisa membantu kita semua dalam menghadapi masalah, terlebih lagi masalah tentang pemprograman, database, dan seputar teknologi yang berkembang saat ini.<br>
                        Penulis dan juga Malika mengucapkan mohon maaf apabila dalam tutur bahasa kata, kurang baik dan sukar untuk di mengerti. Ini adalah blog pertama kita, jadi mohon dimengerti ya
                        kalau masih ada banyak kekurangan di dalam penyampaian nya.<br> Ohiya blog ini dibangun dengan bahasa pemrograman <b>PHP</b> yang masih sederhana, dan berikut adalah alat yang saya gunakan untuk pembuatan blog ini. Kedepan nya mungkin akan
                        saya kembangkan lagi blog ini dan semoga bisa menjadi referensi yang baik untuk dipelajari ya.</p>
                    <div class = "flex flex-col mt-5">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-2 border-dashed rounded-lg shadow border-rose-400 dark:bg-gray-800 dark:border-lime-400">
                                    <table class="min-w-full divide-y-2 divide-dashed divide-rose-400 dark:divide-lime-400">
                                        <thead class="bg-white dark:bg-gray-800">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-rose-400 dark:text-lime-400">
                                                    Nama
                                                </th>
                                                <th width="80%"
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-rose-400 dark:text-lime-400">
                                                    Keterangan
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-800">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="https://tailwindcss.com/" target="_blank" class="text-sm text-center text-gray-800 dark:text-white">Tailwind CSS</a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-800 dark:text-white">
                                                        Tailwind CSS merupakan framework yang bersifat utility-first untuk membangun desain antarmuka khusus dengan cepat.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="https://laravel.com/" target="_blank" class="text-sm text-center text-gray-800 dark:text-white">Laravel</a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-800 dark:text-white">
                                                        Laravel adalah kerangka kerja aplikasi web berbasis PHP yang sumber terbuka, menggunakan konsep Model-View-Controller. Laravel berada dibawah lisensi MIT, dengan menggunakan GitHub sebagai tempat berbagi kode.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="https://www.mysql.com/" target="_blank" class="text-sm text-center text-gray-800 dark:text-white">MySQL</a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-800 dark:text-white">
                                                        MySQL adalah sebuah perangkat lunak sistem manajemen basis data SQL atau DBMS yang multialur, multipengguna, dengan sekitar 6 juta instalasi di seluruh dunia.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="https://aws.amazon.com/" target="_blank" class="text-sm text-center text-gray-800 dark:text-white">AWS EC2</a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-800 dark:text-white">
                                                        Amazon Elastic Compute Cloud adalah bagian dari platform komputasi awan Amazon.com, Amazon Web Services, yang memungkinkan pengguna menyewa komputer virtual untuk menjalankan aplikasi komputer mereka sendiri.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="https://storyset.com/" target="_blank" class="text-sm text-center text-gray-800 dark:text-white">Storyset</a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-800 dark:text-white">
                                                        Ilustrasi gratis yang luar biasa yang dapat disesuaikan untuk proyek Anda berikutnya
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="https://iconmonstr.com/" target="_blank" class="text-sm text-center text-gray-800 dark:text-white">Iconmonst</a>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-800 dark:text-white">
                                                        Satu set 450+ ikon SVG berkualitas tinggi berlisensi MIT gratis untuk Anda gunakan dalam proyek web Anda.
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-end gap-3 mt-5 text-xs">
                        <a href="https://github.com/rullyarifiandi/blog" class="uppercase" target="_blank">Source Code blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @slot('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if(localStorage.getItem('dark') === 'true') {
                    if(document.getElementById('imgAbout') != null){
                        document.getElementById('imgAbout').src = "{{ asset('img/about-me-lime.svg') }}";
                    }
                } else {
                    if(document.getElementById('imgAbout') != null){
                        document.getElementById('imgAbout').src = "{{ asset('img/about-me-rose.svg') }}";
                    }
                }
            })

            if(document.getElementById('switchTheme')){
                document.getElementById('switchTheme').addEventListener('click', function() {
                    if(localStorage.getItem('dark') === 'true') {
                        if(document.getElementById('imgAbout') != null){
                            document.getElementById('imgAbout').src = "{{ asset('img/about-me-lime.svg') }}";
                        }
                    } else {
                        if(document.getElementById('imgAbout') != null){
                            document.getElementById('imgAbout').src = "{{ asset('img/about-me-rose.svg') }}";
                        }
                    }
                });
            }
        </script>
    @endslot
</x-appLayout>
