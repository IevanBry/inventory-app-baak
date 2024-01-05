<?php $kategori = ['Alat tulis', 'Elektronik', 'Obat', 'Makanan'] ?>

<div class="p-3 ml-12 md:ml-0 w-full ">

    <div class="ml-2">
        <div class="flex items-center justify-between mb-3 bg-white shadow-md p-3 rounded border">

            <input type="text"
                class="bg-white shadow-md rounded px-3 py-1 focus:ring-sky-400 focus:border-sky-400 border-gray-300 w-72 "
                placeholder="Cari barang...">

            <div class="grid grid-cols-4 gap-4">

                <?php foreach ($kategori as $k): ?>

                    <button class=" px-3 py-1 text-sm rounded border hover:bg-sky-400 hover:text-white border-sky-400">
                        <?= $k ?>
                    </button>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="grid grid-cols-3 gap-2">
            <?php foreach($barang as $item) :  ?>
                <div class="bg-white shadow-md rounded border">
                    <div class="p-2 flex items-center">
                        <img src="<?= base_url('dist/') . $item['gambar'] ?>" alt="" class="w-32 h-32 rounded-lg  p-1">
                        <div class="p-3">
                            <h1 class=" font-semibold"><?= $item['nama_barang'] ?></h1>
                            <p class="text-gray-500 text-sm "><?= $item['deskripsi'] ?></p>

                            <div class="text-xs  mt-2 font-medium ">
                                <p class="mb-3">Tersedia <span class="text-green-500 "><?= $item['stok']  ?></span></p>
                                <button
                                    class="px-3 py-2 mb-3 shadow-md rounded w-full bg-white border hover:bg-gray-100">Detail
                                    barang</button>
                                <button 
                                    class="tambah-barang px-3 w-full mb-3 py-2 shadow-md rounded  bg-amber-300 hover:bg-amber-400 text-white"
                                   >Tambah ke keranjang</button>
                            </div>
                        </div>

                    </div>
                </div>


            <?php endforeach ?>



        </div>
        <div class=" bottom-0 right-0 items-center w-full p-4 flex sm:justify-between border-t">
            <div class="flex items-center mb-4 sm:mb-0">
                <a href="#" class="inline-flex justify-center p-1  rounded cursor-pointer">

                </a>
                <a href="#" class="inline-flex justify-center p-1 mr-2  rounded cursor-pointer">

                </a>
                <span class="text-sm font-normal ">Showing <span class="font-semibold text-gray">1-5</span>
                    of <span class="font-semibold text-gray">100</span></span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="#"
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium  rounded-lg bg-white shadow-md border hover:bg-gray-100  text-gray-700">
                    Previous
                </a>
                <a href="#"
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium  rounded-lg bg-white shadow-md border hover:bg-gray-100  text-gray-700">
                    Next</a>
            </div>
        </div>

    </div>

</div>



<!-- pop up keranjang barang -->
<div id="keranjang" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] duration-500"
    tabindex="-1" aria-labelledby="keranjang-label">

    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-lg font-semibold text-gray-90">
            Keranjang
        </h3>
        <button type="button" data-drawer-hide="keranjang"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
    </div>

    <form action="">
        <div class="h-[600px] px-3 pb-4 flex flex-col justify-between">
            <div class="text-sm ">
                <table class="w-full">
                   
                </table>
            </div>

            <button class="w-full p-2 bg-amber-400 font-medium text-sm rounded text-white">Minta Barang</button>

        </div>
    </form>
</div>
</div>