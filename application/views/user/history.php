<div class="w-full ml-12 sm:ml-0 p-3 bg-white ">
    <div class="w-full  mb-3  p-2 rounded">
        <div class="items-center justify-between block sm:flex ">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="post">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search"
                            class="bg-gray-50 border  text-gray-900 sm:text-sm rounded-lg shadow-md  block w-full p-2.5 border-gray-300 focus:ring-sky-400 focus:border-sky-400"
                            placeholder="Cari history...">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-2 p-2">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <div class="notif-card bg-white shadow-md p-2 rounded border">

                <div class="flex text-sm justify-between items-center">
                    <div class="flex gap-4 items-center">
                        <i class='bx bx-history'></i>
                        <div>
                            <h1 class="text-base font-semibold">Permintaan barang</h1>
                            <p>Permintaan spidol, 4 buah</p>
                        </div>
                        <?php if($i%2==0) { ?>
                            <div class="p-3 py-1  bg-green-400 text-white rounded">Diterima</div>
                        <?php } else { ?>
                            <div class="p-3 py-1  bg-red-400 text-white rounded">Ditolak</div>
                        <?php } ?>
                    </div>
                   
                    <div class="w-48">20 November 2023</div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>