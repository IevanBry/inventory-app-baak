<?php $kategori = ['Alat tulis', 'Elektronik', 'Obat', 'Makanan'] ?>

<div class="p-3 ml-12 md:ml-0 w-full ">

    <div class="ml-2">
        <div class="flex items-center justify-between mb-3 bg-white shadow-md p-3 rounded border">

            <input type="text"
                class="bg-white shadow-md rounded px-3 py-1 focus:ring-sky-400 focus:border-sky-400 border-gray-300 w-72 "
                placeholder="Cari barang...">

            <div class="grid grid-cols-4 gap-4">

                <?php foreach ($kategori as $k): ?>

                    <button class=" px-3 py-1 text-sm ounded-lg hover:text-sky-400">
                        <?= $k ?>
                    </button>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="grid grid-cols-3 gap-2">
            <?php for ($i = 0; $i < 12; $i++) { ?>
                <div class="bg-white shadow-md rounded border">
                    <div class="p-2 flex items-center">
                        <img src="<?= base_url('dist/1.png') ?>" alt="" class="w-32 h-32 rounded-lg border p-1">
                        <div class="p-3">
                            <h1 class=" font-semibold">Spidol Papan Tulis</h1>
                            <p class="text-gray-500 text-sm ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                                numquam del</p>

                            <div class="flex items-center justify-evenly text-xs gap-2 mt-2 font-medium ">
                                <p class="">Tersedia<span class="text-green-500"> 20</span></p>
                                <button class="px-3 py-1 shadow-md rounded bg-white border">Detail</button>
                                <button class="px-3 py-1 shadow-md rounded  bg-amber-300 hover:bg-amber-400 text-white"
                                    data-modal-target="select-modal" data-modal-toggle="select-modal">Request</button>
                            </div>
                        </div>

                    </div>

                </div>


            <?php } ?>



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
                    Next

                </a>
            </div>
        </div>

    </div>

</div>



<!-- Modal toggle -->


<!-- Main modal -->
<div id="select-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t -600">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Request ke BAAK
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200  rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="select-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <p class="text-gray-500  mb-4">Pilih jenis Request</p>
                <ul class="space-y-4 mb-4">
                    <li>
                        <input type="radio" id="job-1" name="job" value="job-1" class="hidden peer" required>
                        <label for="job-1"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer  dark:peer-checked:text-sky-500 peer-checked:border-sky-600 peer-checked:text-sky-600  hover:bg-gray-100   ">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">Permintaan Barang</div>
                            </div>
                            <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="job-2" name="job" value="job-2" class="hidden peer">
                        <label for="job-2"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer -500 dark:peer-checked:text-sky-500 peer-checked:border-sky-600 peer-checked:text-sky-600 hover:text-gray-900 hover:bg-gray-100   ">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">Penambahan Stock barang</div>
                            </div>
                            <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </label>
                    </li>

                </ul>
                <button
                    class="text-white inline-flex w-full justify-center bg-sky-400 hover:bg-sky-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                    data-modal-target="permintaanBarang" data-modal-toggle="permintaanBarang"
                    data-modal-hide="select-modal">
                    Lanjut
                </button>
            </div>
        </div>
    </div>
</div>

<div id="permintaanBarang" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-90">
                    Form Permintaan Barang
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="permintaanBarang">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="#" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="grid-cols-">
                        <div class="mb-3">
                            <label for=" name" class="block mb-2 text-sm font-medium text-gray-90">Nama
                                barang</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded-lg  block w-full p-2.5 "
                                placeholder="" required="" value="Spidol">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="block mb-2 text-sm font-medium  text-gray-900 ">Jumlah</label>
                            <input type="number" name="price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                                placeholder="0" required="" value="1">
                        </div>
                        <div class="mb-6">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Kategori</label>
                            <input type="text" name="price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                                placeholder="0" required="" value="alat tulis">
                        </div>
                        <div class="col-span-1">
                            <button type="submit"
                                class="text-center w-full bg-amber-300 hover:bg-amber-400 shadow-md text-white font-medium rounded-lg text-sm px-3 py-2"
                                data-modal-toggle="permintaanBarang" data-modal-toggle="select-modal">
                                Ajukan Permintaan
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 ">
                        <div class="col-span-2">
                            <label for="category" class="block text-sm font-medium text-gray-900 ">Gambar</label>
                            <img src="<?= base_url('dist/1.png') ?>" alt="" class="w-[150px] h-[150px]">
                        </div>

                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi
                                Barang</label>
                            <div class="bg-gray-100 p-3 rounded shadow-md border">
                                spidol hitam papan tulis
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>