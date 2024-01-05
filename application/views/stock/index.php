<div class="p-3 ml-12 md:ml-3 w-full">
    <div class="mb-3">
        <div class=" rounded grid grid-cols-2 xl:grid-cols-4 gap-4">
            <div class="shadow-md p-4 bg-white rounded flex items-center gap-2 border">
                <i class='bx bx-line-chart text-3xl bg-sky-200 w-12 text-sky-500 p-2 rounded'></i>
                <div>
                    <p class="text-gray-500 text-sm sm:text-base">Barang masuk</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">50</h1>
                </div>
            </div>
            <div class="shadow-md p-4 bg-white rounded flex items-center gap-2 border ">
                <i class='bx bx-line-chart-down text-3xl bg-yellow-100 w-12 text-yellow-500 p-2 rounded'></i>
                <div>
                    <p class="text-gray-500 text-sm sm:text-base">Barang Keluar</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">30</h1>
                </div>
            </div>
            <div class="shadow-md p-4 bg-white rounded flex items-center gap-2 border ">
                <i class='bx bx-package text-3xl w-12 bg-green-100 text-green-500 p-2 rounded'></i>
                <div>
                    <p class="text-gray-500 text-sm sm:text-base">Total Barang</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                        <?= $total; ?>
                    </h1>
                </div>
            </div>
            <div class="shadow-md p-4 bg-white rounded flex items-center gap-2 border ">
                <i class='bx bxs-hourglass-bottom text-3xl w-12 bg-red-100 text-red-500 p-2 rounded'></i>
                <div>
                    <p class="text-gray-500 text-sm sm:text-base">Stock Sedikit</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                        <?= $stok_rendah; ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded border shadow-md">
        <div class="p-4  block sm:flex items-center justify-between border-b border-gray-200 ">
            <div class="w-full mb-1">
                <div class="items-center justify-between block sm:flex ">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <form class="sm:pr-3" action="#" method="post" autocomplete="off">
                            <label for="products-search" class="sr-only">Search</label>
                            <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                                <input type="text" name="email" id="products-search"
                                    class="bg-gray-50 border  text-gray-900 sm:text-sm rounded shadow-md  block w-full p-2.5 border-gray-300 focus:ring-sky-500 focus:border-sky-500"
                                    placeholder="Cari Barang..">
                            </div>
                        </form>

                    </div>
                    <div class="flex gap-2">
                        <button id="deleteAlll" type="button" onclick="confirmDeleteAll()"
                            class="bg-red-400 text-white hover:bg-red-500 flex  items-center shadow-md font-medium rounded text-sm px-3 py-1">
                            <i class='bx bx-trash'></i>
                            <span>Hapus Semua</span>
                        </button>
                        <button type="button" id="tambahBarang" data-modal-target="tambahBarangModal"
                            data-modal-toggle="tambahBarangModal"
                            class="bg-amber-400 text-white hover:bg-amber-500 flex items-center shadow-md font-medium rounded text-sm px-3 py-1 ">
                            <i class='bx bx-plus'></i>
                            <span> Tambah Barang Baru</span>
                        </button>
                        <button id="exportDataUser" type="button"
                            class="bg-sky-400 text-white hover:bg-sky-500 flex  items-center shadow-md font-medium rounded text-sm px-3 py-1">
                            <i class='bx bxs-file-export text-md'></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>
                <?php if ($this->session->flashdata('status')): ?>
                    <div class="flex h-16 items-center">
                        <div class="p-2 mt-4 w-full flex items-center gap-2 text-sm font-medium text-green-800 rounded-lg bg-green-100"
                            role="alert"><i class="bx bx-check-circle text-xl"></i>
                            <?= $this->session->flashdata('status'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                onchange="checkAll()"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50  checked:bg-sky-400 focus:ring-sky-400 focus:bg-sky-400">
                                            <script>
                                                function checkAll() {
                                                    var checkboxAll = document.getElementById('checkbox-all');
                                                    var checkboxes = document.querySelectorAll('[name="checkbox_value[]"]');

                                                    for (var i = 0; i < checkboxes.length; i++) {
                                                        checkboxes[i].checked = checkboxAll.checked;
                                                    }
                                                }
                                            </script>

                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-center  uppercase">
                                        No
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Barang
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Gambar
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Description
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Stock
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Satuan
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Kategori
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                        Harga
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-center  uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <?php $no = 1; ?>
                            <?php foreach ($barang as $item): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-<?= $item['id_barang'] ?>" name="checkbox_value[]"
                                                value="<?= $item['id_barang'] ?>" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 checked:bg-sky-400 focus:ring-sky-400 focus:bg-sky-400">
                                            <script>
                                                function confirmDeleteAll() {
                                                    var checkboxes = document.getElementsByName('checkbox_value[]');
                                                    var checked_ids = [];

                                                    for (var i = 0; i < checkboxes.length; i++) {
                                                        if (checkboxes[i].checked) {
                                                            checked_ids.push(checkboxes[i].value);
                                                        }
                                                    }

                                                    var deleteButton = document.getElementById('deleteAlll');

                                                    if (checked_ids.length > 0 && confirm('Apakah Anda yakin ingin menghapus semua?')) {
                                                        window.location.href = '<?= base_url('Stock/deleteAll'); ?>?ids=' + checked_ids.join(',');
                                                    } else {
                                                        for (var i = 0; i < checkboxes.length; i++) {
                                                            checkboxes[i].checked = false;
                                                        }
                                                    }
                                                }
                                            </script>
                                            <label for="" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="p-2 text-sm font-medium text-center text-gray-900">
                                        <?= $no ?>
                                    </td>
                                    <td class="p-2 text-sm font-medium text-gray-900">
                                        <?= $item['nama_barang'] ?>
                                    </td>
                                    <td class="p-2 text-sm font-medium text-gray-900"><img
                                            src="<?= base_url('dist/') . $item['gambar'] ?>" alt="" width="80"></td>
                                    <td class="p-2 text-sm font-medium text-gray-900">
                                        <?= $item['deskripsi'] ?>
                                    </td>
                                    <td class="p-2 text-sm font-medium text-gray-900">
                                        <?= $item['stok'] ?>
                                    </td>
                                    <td class="p-2 text-sm font-medium text-gray-900">
                                        <?= $item['satuan'] ?>
                                    </td>
                                    <td class="p-2 text-sm font-medium text-gray-900">
                                        <?= $item['nama_kategori'] ?>
                                    </td>
                                    <td class="p-2 text-sm font-medium text-gray-900">
                                        <?= $item['harga'] ?>
                                    </td>

                                    <td scope="" class="p-4 space-x-2 text-center">
                                        <button id="updateBarangButton" type="button"
                                            data-modal-target="updateBarangModal<?= $no ?>"
                                            data-modal-toggle="updateBarangModal<?= $no ?>"
                                            class="inline-flex items-center px-3 py-1 text-sm font-medium rounded shadow-md bg-sky-400 text-white border hover:bg-sky-500">
                                            <i class="bx bx-edit"></i>
                                            Update
                                        </button>

                                        <button type="button" id="deleteProductButton"
                                            data-modal-target="hapusBarangModal<?= $no ?>"
                                            data-modal-toggle="hapusBarangModal<?= $no ?>"
                                            aria-controls="drawer-delete-product-default"
                                            class="inline-flex items-center px-3 py-1 text-sm font-medium rounded shadow-md bg-red-400 text-white border hover:bg-red-500">
                                            <i class="bx bx-trash"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <!-- update barang modal -->
                                <div id="updateBarangModal<?= $no ?>" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded shadow pb-1">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <h3 class="text-lg font-semibold text-gray-90">
                                                    Update Barang
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-toggle="updateBarangModal<?= $no ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="<?= base_url('Stock/editStock'); ?>" method="POST"
                                                class="p-4 md:p-5" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $item['id_barang']; ?>">
                                                <div class="grid gap-4 mb-4 ms-4 me-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-90">Nama
                                                            barang</label>
                                                        <input type="text" name="name" id="name"
                                                            class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded  block w-full p-2.5 "
                                                            placeholder="" required="" value="<?= $item['nama_barang'] ?>">
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="price"
                                                            class="block mb-2 text-sm font-medium  text-gray-900 ">Jumlah</label>
                                                        <input type="number" name="amount" id="amount"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                                                            placeholder="0" required="" value="<?= $item['stok'] ?>">
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="category"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">Kategori</label>
                                                        <select id="category" name="category"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500  block w-full p-2.5 focus:ring-sky-400 focus:border-sky-400">
                                                            <?php foreach ($kategori as $k): ?>
                                                                <option value="<?= $k['id_kategori']; ?>"
                                                                    <?= ($k['id_kategori'] == $item['id_kategori']) ? 'selected' : ''; ?>>
                                                                    <?= $k['nama_kategori']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="category"
                                                            class="block mb-2 text-sm font-medium text-gray-90">Harga</label>
                                                        <input type="number" name="price" id="price"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                                                            placeholder="Rp." required="" value="<?= $item['harga'] ?>">
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="category"
                                                            class="block mb-2 text-sm font-medium text-gray-90">Satuan</label>
                                                        <select name="satuan" id="satuan"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-sky-400 focus:border-sky-400  block w-full p-2.5 ">
                                                            <option selected="<?= $item['satuan'] ?>">
                                                                <?= $item['satuan'] ?>
                                                            <option value="Buah">Buah</option>
                                                            <option value="Lembar">Lembar</option>
                                                            <option value="Kg">kg</option>
                                                            </option>

                                                        </select>
                                                    </div>

                                                    <div class="col-span-2">
                                                        <label for="description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                                            Description</label>
                                                        <textarea name="description" id="description" rows="4"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-sky-400 focus:border-sky-400"
                                                            placeholder="Write product description here"
                                                            value="<?= $item['deskripsi'] ?>"><?= $item['deskripsi'] ?></textarea>
                                                    </div>

                                                    <div class="col-span-2">
                                                        <div class="flex items-center justify-center w-full">
                                                            <label for="dropzone-file"
                                                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100">
                                                                <div
                                                                    class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                    <!-- <svg class="w-8 h-8 mb-4 text-gray-500"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 20 16">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                    </svg>
                                                                    <p class="mb-2 text-sm text-gray-500">
                                                                        upload gambar barang</p> -->
                                                                    <input type="file" class="" name="gambar"
                                                                        value="<?= $item['gambar'] ?>" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-end me-4 mb-4">
                                                    <button type="button" data-modal-hide="updateBarangModal<?= $no ?>"
                                                        class="text-end bg-white shadow-md hover:bg-gray-100 border text-gray-500 font-medium rounded text-sm px-3 py-2">
                                                        Batal
                                                    </button>
                                                    <button type="submit"
                                                        class="text-end bg-amber-400 shadow-md text-white font-medium rounded text-sm px-3 py-2">
                                                        Update Barang
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Penutup Update Barang  -->

                                <!-- hapus barang -->
                                <div id="hapusBarangModal<?= $no ?>" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded shadow ">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="hapusBarangModal<?= $no ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Yakin
                                                    ingin menghapus barang -
                                                    <span class="text-red-500">
                                                        <?= $item['nama_barang'] ?>
                                                    </span>?
                                                </h3>
                                                <form action="<?= base_url('Stock/deleteStock'); ?>" method="post">
                                                    <input type="hidden" name="id_barang" value="<?= $item['id_barang'] ?>">
                                                    <button type="submit"
                                                        class="bg-amber-400 text-white shadow-md  focus:outline-none  font-medium rounded text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                        Ya, lanjutkan
                                                    </button>
                                                    <button data-modal-hide="hapusBarangModal<?= $no ?>" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 rounded border shadow-md text-sm font-medium px-5 py-2.5 ">Tidak,
                                                        batal</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Penutup Hapus Barang -->
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class=" bottom-0 right-0 items-center w-full p-4 flex sm:justify-between border-t">
            <div class="flex items-center mb-4 sm:mb-0">
                <a href="#" class="inline-flex justify-center p-1  rounded cursor-pointer">

                </a>
                <a href="#" class="inline-flex justify-center p-1 mr-2  rounded cursor-pointer">

                </a>
                <span class="text-sm font-normal ">Showing <span class="font-semibold text-gray">1-5</span> of <span
                        class="font-semibold text-gray">100</span></span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="#"
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-ce rounded bg-white border shadow-md hover:bg-gray-100  text-gray-700">
                    Previous
                </a>
                <a href="#"
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-ce rounded bg-white border shadow-md hover:bg-gray-100  text-gray-700">
                    Next

                </a>
            </div>
        </div>
    </div>

    <!-- tambah barang modal -->
    <div id="tambahBarangModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded shadow">

                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Tambah Barang Baru
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="tambahBarangModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="<?= base_url('Stock/insertStock'); ?>" method="post" enctype="multipart/form-data"
                    class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama
                                barang</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                placeholder="barang" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah</label>
                            <input type="number" name="amount" id="amount"
                                class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="0" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Kategori</label>
                            <select name="category" id="category"
                                class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded block w-full p-2.5 "
                                required>
                                <option value="" selected hidden>Pilih Kategori Barang</option>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= $k['id_kategori']; ?>">
                                        <?= $k['nama_kategori']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Harga</label>
                            <input type="number" name="price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                                placeholder="Rp." required="">
                        </div>
                        <div class="col-span-1">
                            <label for="satuan" class="block mb-2 text-sm font-medium text-gray-900 ">Satuan</label>
                            <select name="satuan" id="satuan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5"
                                required>
                                <option value="" disabled selected hidden>Pilih satuan Barang</option>
                                <option value="buah">Buah</option>
                                <option value="lembar">Lembar</option>
                                <option value="kg">kg</option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-sky-400 focus:border-sky-400"
                                placeholder="Tulis Deskripsi dari barang"></textarea>
                        </div>

                        <div class="col-span-2">
                            <label for="dropzone-file" class="block mb-2 text-sm font-medium text-gray-900 ">Upload
                                Gambar Barang</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <input name="gambar" id="dropzone-file" type="file" class="absolute">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <!-- <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg> -->
                                        <!-- <p class="mb-2 text-sm text-gray-500">Upload Gambar Barang</p> -->
                                    </div>

                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button data-modal-hide="tambahBarangModal" type="button"
                            class="text-end bg-white shadow-md hover:bg-gray-100 border text-gray-500 font-medium rounded text-sm px-3 py-2">
                            Batal
                        </button>
                        <button type="submit"
                            class="text-end bg-amber-400 shadow-md text-white font-medium rounded text-sm px-3 py-2">
                            Tambah Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>