<div class="p-3 ml-12 md:ml-3 w-full">
    <div class="bg-white rounded border shadow-lg ">
        <div class="p-4  block sm:flex items-center justify-between border-b border-gray-200 ">
            <div class="w-full mb-1">
                <div class="items-center justify-between block sm:flex ">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <form class="sm:pr-3" action="#" method="post" autocomplete="off">
                            <label for="products-search" class="sr-only">Search</label>
                            <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                                <input type="text" name="email" id="products-search"
                                    class="bg-gray-50 border  text-gray-900 sm:text-sm rounded shadow-md  block w-full p-2.5 border-gray-300 focus:ring-sky-500 focus:border-sky-500"
                                    placeholder="Cari User..">
                            </div>
                        </form>
                    </div>
                    <div class="flex gap-2">

                        <button id="exportDataUser" type="button"
                            class="bg-sky-400 text-white hover:bg-sky-500 flex items-center shadow-md font-medium rounded text-sm px-3 py-1">
                            <i class='bx bxs-file-export text-md'></i>

                            <span>Export</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50  checked:bg-sky-400 focus:ring-sky-400 focus:bg-sky-400">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        User
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Jabatan
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Status
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-center  uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white " id="tableBody">
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <tr class="hover:bg-gray-100 borde">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="" aria-describedby="checkbox-1" type="checkbox" 
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 checked:bg-sky-400 focus:ring-sky-400 focus:bg-sky-400">
                                            </div>
                                        </td>

                                        <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full" src="<?= base_url('dist/muka abu.jpg') ?>">
                                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                <div class="text-base font-semibold text-gray-900">
                                                    Ridho Hidayat
                                                </div>
                                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    rdho.hdyat@gmail.com</div>
                                            </div>
                                        </td>
                                        <td class="p-2 text-sm font-medium text-gray-900">Staff</td>
                                        <td class="p-2 text-sm font-medium text-gray-900">Active <i
                                                class='bx bxs-circle text-xs text-green-500'></i></td>

                                        <td class="p-4 space-x-2 text-center">

                                            <button type="button" id="updateUser" data-modal-target="updateUserModal"
                                                data-modal-toggle="updateUserModal"
                                                class="inline-flex items-center px-3 py-1 text-sm font-medium  rounded shadow-md border bg-white hover:bg-gray-100">
                                                <i class="bx bx-edit"></i>
                                                update
                                            </button>

                                            <button type="button" id="buttonHapusUser" data-modal-target="modalHapusUser"
                                                data-modal-toggle="modalHapusUser"
                                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-center bg-white border rounded shadow-md hover:bg-gray-100">
                                                <i class="bx bx-trash"></i>
                                                delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
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
                            class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium  rounded bg-white shadow-md border hover:bg-gray-100  text-gray-700">
                            Previous
                        </a>
                        <a href="#"
                            class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium  rounded bg-white shadow-md border hover:bg-gray-100  text-gray-700">
                            Next

                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal update user-->
        <div id="updateUserModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Ubah Informasi User
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                            data-modal-toggle="updateUserModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span lass="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="#" class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                    placeholder="Nama user" required="" value="Ridho Hidayat">
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                    placeholder="Nama user" required="" value="Staff">
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="text" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                    placeholder="Email" required="" value="ridho@gmail.com">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                                <input type="text" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                    placeholder="Email" required="" value="082287498239">
                            </div>
                            

                        </div>
                        <div class="text-end">
                            <button type="submit"
                                class="text-white inline-flex items-center bg-amber-400 hover:bg-amber-500 shadow-md font-medium rounded text-sm px-5 py-2.5 text-center ">
                                Update data user
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- tambah user -->
        <div id="tambahUserModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Tambah User Baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-toggle="tambahUserModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="" class="p-4 md:p-5">
                        <div class="">
                            <div class="">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                    placeholder="barang" required="">
                            </div>
                            <div class="">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="text" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                    placeholder="email" required="">
                            </div>
                            <div class="">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="text" name="password" id="password"
                                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                    placeholder="barang" required="">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit"
                                class="text-white inline-flex items-center bg-amber-400 hover:bg-amber-500 shadow-md font-medium rounded text-sm px-5 py-2.5 text-center ">
                                Tambah user
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- modal notifikasi hapus user -->

        <div id="modalHapusUser" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded shadow">
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-10 h-10 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">
                            Yakin untuk menghapus user ini ?</h3>
                        <button data-modal-hide="modalHapusUser" type="button"
                            class="text-white bg-amber-300 hover:bg-amber-400  font-medium rounded text-sm inline-flex items-center px-3 py-2 text-center me-2">
                            Ya, Lanjutkan
                        </button>
                        <button data-modal-hide="modalHapusUser" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100  rounded border border-gray-200 text-sm font-medium px-3 py-2 hover:text-gray-900 focus:z-10 ">Tidak,
                            batal</button>
                    </div>
                </div>
            </div>
        </div>