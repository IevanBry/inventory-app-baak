<div class="p-3 ml-12 md:ml-0 w-full ">

    <div class="ml-2">

        <div class="grid grid-cols-3 gap-2">
            <?php foreach ($barang as $item): ?>
                <div class="bg-white shadow-md rounded border">
                    <?php
                    echo form_open('Keranjang/add');
                    echo form_hidden('id', $item['id_barang']);
                    echo form_hidden('qty', 1);
                    echo form_hidden('harga', $item['harga']);
                    echo form_hidden('name', $item['nama_barang']);
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>
                    <div class="p-2 flex items-center">
                        <img src="<?= base_url('dist/') . $item['gambar'] ?>" alt="" class="w-32 h-32 rounded-lg  p-1">
                        <div class="p-3">
                            <h1 class=" font-semibold">
                                <?= $item['nama_barang'] ?>
                            </h1>
                            <p class="text-gray-500 text-sm ">
                                <?= $item['deskripsi'] ?>
                            </p>

                            <div class="text-xs  mt-2 font-medium ">
                                <p class="mb-3">Tersedia <span class="text-green-500 ">
                                        <?= $item['stok'] ?>
                                    </span></p>
                                <button type="submit"
                                    class="tambah-barang px-3 w-full mb-3 py-2 shadow-md rounded  bg-amber-300 hover:bg-amber-400 text-white">Tambah
                                    ke keranjang</button>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const addToCartButtons = document.querySelectorAll('.tambah-barang');

                                        addToCartButtons.forEach(button => {
                                            button.addEventListener('click', function (event) {
                                                event.preventDefault();

                                                Swal.fire({
                                                    title: 'Tambah ke Keranjang',
                                                    text: 'Apakah Anda ingin menambahkan item ini ke keranjang?',
                                                    icon: 'question',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Ya, tambahkan!',
                                                    cancelButtonText: 'Batal',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // If the user clicks "Ya", submit the form
                                                        const form = button.closest('form');
                                                        form.submit();
                                                    }
                                                });
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>



<!-- pop up keranjang barang -->
<?php $jml_item = 1; ?>
<div id="keranjang"
    class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] duration-500"
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

    <form action="<?= base_url('request/insertRequest') ?>" method="POST">
        <input type="hidden" value="<?= $user['id_user'] ?>" name="id_user">
        <div class="h-[600px] px-3 pb-4 flex flex-col justify-between">
            <div class="text-sm ">
                <table class="w-full">
                    <?php $keranjang = $this->cart->contents();
                    foreach ($keranjang as $key => $value) {
                        $jml_item = $jml_item + $value['qty'];
                    }
                    ?>
                    <tbody>
                        <?php foreach ($keranjang as $key => $value) { ?>
                            <tr class="border-b product">
                                <td class="px-2 py-4">
                                    <span class=" w-8 h-8 rounded">
                                        <a href="<?= base_url('keranjang/delete/' . $value['rowid']) ?>">
                                            <i class="bx bx-x text-2xl text-gray-500"></i>
                                        </a>
                                    </span>
                                </td>
                                <!-- <td class="px-6 py-4"><img alt="" class="w-36"></td> -->
                                <td class="px-4 py-4">
                                    <?= $value['name'] ?>
                                </td>
                                <td><input name="qty[]" type="number"
                                        class="w-20 p-1 rounded focus:ring-sky-400 focus:border-sky-400" value="1" min="1">
                                </td>
                                <td class="px-3 py-4">Rp.
                                    <?= $value['price'] ?>
                                </td>
                                <input type="hidden" name="id_barang[]" value="<?= $value['id'] ?>">
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="w-full pb-28">
                <button
                    class=" bg-amber-400 font-medium p-2 w-full text-md rounded hover:bg-amber-500 text-white mb-2 keranjang-cart-btn">Minta
                    Barang</button>
                <button
                    class="bg-red-500 font-medium p-2 hover:bg-red-600 w-full text-md rounded text-white clear-cart-btn">
                    <a href="<?= base_url('keranjang/deleteAll') ?>" class="hover:text-white">Clear All</a>
                </button>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelector('.clear-cart-btn').addEventListener('click', function (event) {
                            event.preventDefault();

                            Swal.fire({
                                title: 'Clear Cart',
                                text: 'Apakah Anda yakin ingin menghapus semua barang dari keranjang?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, hapus semua!',
                                cancelButtonText: 'Batal',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // If the user clicks "Ya", navigate to the clearAll URL
                                    window.location.href = '<?= base_url("keranjang/deleteAll") ?>';
                                }
                            });
                        });
                    });
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelector('.keranjang-cart-btn').addEventListener('click', function (event) {
                            event.preventDefault();

                            Swal.fire({
                                title: 'Clear Cart',
                                text: 'Apakah Anda ingin membuat request?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Tambahkan!',
                                cancelButtonText: 'Batal',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    <input type="hidden" name="id_barang[]" value="<?= $value['id'] ?>">
                                    // If the user clicks "Ya", navigate to the clearAll URL
                                    window.location.href = '<?= base_url('request/insertRequest') ?>';
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </form>
</div>