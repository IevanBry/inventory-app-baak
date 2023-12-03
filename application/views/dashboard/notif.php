<div class="w-full ml-12 sm:ml-0 p-3 bg-white ">
    <div class="w-[80%]  p-2 ">
        <div class="items-center justify-between flex ">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="post" autocomplete="off">
                    <label for="notif-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="notif-search" 
                            class="bg-gray-50 border  text-gray-900 sm:text-sm rounded shadow-md  block w-full p-2.5 border-gray-300 focus:ring-sky-500 focus:border-sky-500"
                            placeholder="Masukan keyword...">
                    </div>
                </form>
            </div>
            <div>
                <select name="" id="" class="py-1 px-3 rounded text-sm border-gray-300 shadow-md focus:ring-sky-500 focus:border-sky-500">
                    <option value="">semua</option>
                    <option value="">terbaru</option>
                </select>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-2 p-2">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <div class="notif-card bg-white shadow-md p-4 rounded border w-[80%] hover:bg-gray-100">
                <div class="flex text-sm justify-between items-center">
                    <div class="flex gap-4 items-center">
                        <div class="bg-sky-400 p-2 h-12 w-12 flex items-center justify-center rounded">
                            <i class='bx bx-envelope text-white'></i>
                        </div>
                        <div>
                            <div>
                                <div class="flex">
                                    <h1 class="text-gray-900 font-semibold">Otong Surotong</h1>
                                    <h1 class="text-gray-900 font-semibold ms-2">Request Barang : </h1>
                                </div>
                                <p class="text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga
                                    alias
                                    sequi similique provident blandi</p>
                            </div>
                            <div class="flex items-center h-4 mt-2 gap-1 text-gray-900">
                                <i class='bx bx-calendar'></i>
                                <span>20 November 2023</span>
                            </div>
                        </div>
                    </div>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </div>
            </div>
        <?php } ?>
    </div>
</div>