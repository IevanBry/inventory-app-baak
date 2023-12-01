<div class="w-full ml-12 sm:ml-0 p-3 bg-white ">
    <div class="w-full  mb-3  p-2 rounded">
        <div class="items-center justify-between block sm:flex ">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="post">
                    <label for="notif-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="notif-search"
                            class="bg-gray-50 border  text-gray-900 sm:text-sm rounded shadow-md  block w-full p-2.5 border-gray-300 focus:ring-sky-500 focus:border-sky-500"
                            placeholder="Masukan keyword...">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-2 p-2">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <div class="notif-card bg-white shadow-md p-2 rounded border">

                <div class="flex text-sm justify-between items-center">
                    <div class="flex gap-4">
                        <i class='bx bx-envelope'></i>
                        <div>
                            <div>Ridho Hidayat</div>
                            <p class="text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga alias
                                sequi similique provident blanditiis autem </p>
                        </div>
                    </div>
                    
                    <div  class="w-48 flex items-center gap-4">
                        <span>20 November 2023</span>
                        <i class='bx bx-trash bg-red-200 p-2 text-red-500 rounded shadow-md'></i>
                    </div>
                    
                </div>
            </div>
        <?php } ?>
    </div>
</div>