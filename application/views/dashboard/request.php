<div class="p-3 ml-12 md:ml-3 w-full ">
    <div class="mb-3">
        <div class=" rounded grid grid-cols-3 gap-4">
            <div class="shadow-md p-4 bg-white rounded flex items-center gap-2 border ">
                <i class='bx bx-checkbox-checked text-3xl w-12 bg-green-100 text-green-500 p-2 rounded'></i>
                <div>
                    <p class="text-gray-500 text-sm sm:text-base">Di Setujui</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                    <?php
                            if ($total_setuju !== null) {
                                echo number_format($total_setuju);
                            } else {
                                echo 'Rp 0';
                            }
                            ?>
                    </h1>
                </div>
            </div>
            <div class="shadow-md p-4 bg-white rounded flex items-center gap-2 border ">
                <i class='bx bx-loader text-3xl bg-yellow-100 w-12 text-yellow-500 p-2 rounded'></i>
                <div>
                    <p class="text-gray-500 text-sm sm:text-base">Proses</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                    <?php
                            if ($total_proses !== null) {
                                echo number_format($total_proses);
                            } else {
                                echo 'Rp 0';
                            }
                            ?>
                    </h1>
                </div>
            </div>
            <div class="shadow-md p-4 bg-white rounded flex items-center gap-2 border ">
                <i class='bx bxs-x-square text-3xl w-12 bg-red-100 text-red-500 p-2 rounded'></i>
                <div>
                    <p class="text-gray-500 text-sm sm:text-base">Ditolak</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                    <?php
                            if ($total_tolak !== null) {
                                echo number_format($total_tolak);
                            } else {
                                echo 'Rp 0';
                            }
                            ?>
                    </h1>
                </div>
            </div>


        </div>
    </div>
    <div class="bg-white rounded border shadow-md">

        <div class="p-4  block sm:flex items-center justify-between border-b border-gray-200 ">
            <div class="w-full mb-1">

                <div class="items-center justify-between block sm:flex">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <form class="sm:pr-3" action="#" method="post" autocomplete="off">
                            <label for="products-search" class="sr-only">Search</label>
                            <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                                <input type="text" name="email" id="products-search"
                                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 sm:text-sm  rounded shadow-md  block w-full p-2.5 "
                                    placeholder="Request...">
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed" id="example">
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
                                        Tanggal
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Barang
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Jumlah
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
                                <?php $no = 1; ?>
                                <?php foreach ($request as $r): ?>
                                    <tr class="hover:bg-gray-100 ">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="" aria-describedby="checkbox-1" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50v checked:bg-sky-400 focus:ring-sky-400 focus:bg-sky-400">
                                                <label for="" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="p-2 text-sm font-medium text-gray-900">
                                            <?= $r['nama'] ?>
                                        </td>
                                        <td class="p-2 text-sm font-medium text-gray-900">
                                            <?= date('d F Y H:i:s', strtotime($r['tanggal'])); ?>
                                        </td>
                                        <td class="p-2 text-sm font-medium text-gray-900">
                                            <?= $r['nama_barang'] ?>
                                        </td>
                                        <td class="p-2 text-sm font-medium text-gray-900"><span class="ml-6">
                                                <?= $r['jumlah'] ?>
                                            </span></td>
                                        <td class="p-2 text-sm font-medium text-gray-900">
                                            <?php
                                            $status = strtolower($r['status']); 
                                            if (strcasecmp($status, 'proses') == 0): ?>
                                                <span class="bg-amber-300 text-white shadow-md p-1 px-3 rounded">
                                                    <?= $r['status'] ?>
                                                </span>
                                            <?php endif; ?>

                                        </td>
                                        <td class="p-4 space-x-2 text-center">
                                            <button type="button" data-modal-target="verifikasi<?= $no ?>"
                                                data-modal-toggle="verifikasi<?= $no ?>"
                                                class="inline-flex items-center px-3 py-1 text-sm font-medium  rounded shadow-md bg-white border">
                                                <i class="bx bx-edit"></i>
                                                Verifikasi
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Verifikasi -->
                                    <div id="verifikasi<?= $no ?>" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Verifikasi
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                                                        data-modal-hide="verifikasi<?= $no ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <form action="">
                                                        <ul class="flex justify-between px-10">
                                                            <li>User</li>
                                                            <li>
                                                                <?= $r['nama'] ?>
                                                            </li>
                                                        </ul>
                                                        <ul class="flex justify-between px-10">
                                                            <li>Jenis Request</li>
                                                            <li>Permintaan Barang</li>
                                                        </ul>
                                                        <ul class="flex justify-between px-10">
                                                            <li>Tanggal</li>
                                                            <li>
                                                                <?= date('d F Y H:i:s', strtotime($r['tanggal'])); ?>
                                                            </li>
                                                        </ul>
                                                        <ul class="flex justify-between px-10">
                                                            <li>Barang</li>
                                                            <li>
                                                                <?= $r['nama_barang'] ?>
                                                            </li>
                                                        </ul>
                                                        <ul class="flex justify-between px-10">
                                                            <li>Jumlah Permintaan</li>
                                                            <li>
                                                                <?= $r['jumlah'] ?>
                                                            </li>
                                                        </ul>
                                                        <ul class="flex justify-between px-10">
                                                            <li>Gambar</li>
                                                            <li><img class="w-36" src="<?= base_url('dist/Logo_PCR.png') ?>"
                                                                    alt=""></li>
                                                        </ul>
                                                    </form>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="grid grid-cols-2 gap-4 border-t p-4">
                                                    <button class="px-3 py-1  border bg-white shadow-md rounded"
                                                        data-modal-toggle="tolak-verifikasi<?= $no ?>"
                                                        data-modal-target="tolak-verifikasi<?= $no ?>"
                                                        data-modal-hide="verifikasi<?= $no ?>">Tolak</button>
                                                    <form action="<?= base_url('AdminRequest/verifRequest'); ?>"
                                                        method="post">
                                                        <input type="hidden" name="request_id"
                                                            value="<?= $r['id_request'] ?>">
                                                        <input type="hidden" name="terima" value="1">
                                                        <button class="px-3 py-1 text-white bg-amber-300 shadow-md rounded"
                                                            data-modal-toggle="verifikasi<?= $no ?>">Terima
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tolak-verifikasi<?= $no ?>" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded shadow ">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-hide="tolak-verifikasi<?= $no ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Tolak request ?</h3>
                                                    <form action="<?= base_url('AdminRequest/verifRequest'); ?>"
                                                        method="post">
                                                        <input type="hidden" name="request_id"
                                                            value="<?= $r['id_request'] ?>">
                                                        <button type="submit"
                                                            class="text-white bg-amber-300 hover:bg-amber-400 font-medium rounded text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Ya, lanjutkan
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="tolak-verifikasi<?= $no ?>" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded border border-gray-200 text-sm font-medium px-5 py-2.5 ">Tidak,
                                                        batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>