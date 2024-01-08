<div class="w-full ml-12 sm:ml-0 p-3">
    <div class="w-full  mb-3  p-2 rounded">
        <div class="items-center justify-between block sm:flex ">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="post" autocomplete="off">
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
    <div class=" rounded border shadow-md ml-2">
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden p-6 shadow">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed" id="example">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        No
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


                                </tr>
                            </thead>
                            <tbody class="bg-white " id="tableBody">
                              
                                    <?php $no = 1; ?>
                                    <?php foreach ($history as $h): ?>
                                <tr class="border-b ">
                                        <td class="p-2 py-6 text-sm font-medium pl-6 text-gray-900">
                                            <?= $no ?>
                                        </td>
                                        <td class="p-2 text-sm font-medium text-gray-900">
                                            <?= $h['nama'] ?>
                                        </td>
                                        <td class="p-2 text-sm font-medium text-gray-900">
                                            <?= date('d F Y H:i:s', strtotime($h['tanggal'])); ?>
                                        </td>
                                        <td class="p-2 text-sm pl-4 font-medium text-gray-900">
                                            <?= $h['nama_barang'] ?>
                                        </td>
                                        <td class="p-2 pl-10 text-sm font-medium text-gray-900">
                                            <?= $h['jumlah'] ?>
                                        </td>
                                        <td class="p-2 text-sm font-medium text-gray-900">
                                            <?php
                                            $status = strtolower($h['status']);
                                            if (strcasecmp($status, 'proses') == 0): ?>
                                                <span class="bg-amber-300 text-white shadow-md p-1 px-3 rounded">
                                                    <?= $h['status'] ?>
                                                </span>
                                            <?php elseif (strcasecmp($status, 'accepted') == 0): ?>
                                                <span class="bg-green-400 text-white shadow-md p-1 px-3 rounded">
                                                    <?= $h['status'] ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="bg-red-400 text-white shadow-md p-1 px-3 rounded">
                                                    <?= $h['status'] ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
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
</div>