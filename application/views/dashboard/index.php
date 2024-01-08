<div class="p-3 ml-12 md:ml-3 w-full ">

    <div class="w-full grid grid-cols-1 lg:grid-cols-2  gap-4 mb-4">
        <!-- box 1 -->
        <div class="shadow-md bg-white  p-4 rounded border">
            <h1 class="font-semibold text-base mb-2 ">Barang</h1>
            <div class=" rounded grid grid-cols-2 gap-4">

                <div class="shadow-md p-4 rounded flex items-center gap-2 border ">
                    <i class='bx bx-line-chart text-3xl bg-sky-200 w-12 text-sky-500 p-2 rounded-lg'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Barang Masuk</p>
                        <h1 class="text-sm xl:text-2xl font-semibold"><?= $jumlah_stok->total_stok; ?></h1>
                    </div>
                </div>
                <div class="shadow-md p-4 rounded flex items-center gap-2 border ">
                    <i class='bx bx-line-chart-down text-3xl bg-yellow-100 w-12 text-yellow-500 p-2 rounded-lg'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Barang Keluar</p>
                        <h1 class="text-sm xl:text-2xl font-semibold"><?= $barang_keluar; ?></h1>
                    </div>
                </div>
                <div class="shadow-md p-4 rounded flex items-center gap-2 border ">
                    <i class='bx bx-message-check text-3xl w-12 bg-orange-100 text-orange-500 p-2 rounded-lg'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Permintaan</p>
                        <h1 class="text-sm xl:text-2xl font-semibold">
                            <?= $total_request; ?>
                        </h1>
                    </div>
                </div>
                <div class="shadow-md p-4 rounded flex items-center gap-2 border ">
                    <i class='bx bx-package text-3xl w-12 bg-green-100 text-green-500 p-2 rounded-lg'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Jumlah Barang</p>
                        <h1 class="text-sm xl:text-2xl font-semibold">
                            <?= $stok_barang; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- box  2 -->
        <div class="shadow-md bg-white  p-4 rounded border">
            <h1 class="font-semibold text-base mb-2">Transaksi</h1>
            <div class=" rounded grid grid-cols-2 gap-4">

                <div class="shadow-md p-4 rounded flex items-center gap-2 border ">
                    <i class='bx bx-line-chart text-3xl bg-sky-200 w-12 text-sky-500 p-2 rounded-lg'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Pengeluaran</p>
                        <h1 class="text-sm xl:text-2xl font-semibold">
                            <?php
                            if ($total_pengeluaran !== null) {
                                echo number_format($total_pengeluaran);
                            } else {
                                echo 'Rp 0';
                            }
                            ?>
                        </h1>
                    </div>
                </div>
                <div class="shadow-md p-4 rounded flex items-center gap-2 border ">
                    <i class='bx bx-wallet text-3xl bg-yellow-100 w-12 text-yellow-500 p-2 rounded-lg'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Kas</p>
                        <?php
                        $kas = $total_pemasukan - $total_pengeluaran;
                        ?>
                        <h1 class="text-sm xl:text-2xl font-semibold">
                            <?= number_format($kas); ?>
                        </h1>
                    </div>
                </div>
                <div class="shadow-md p-4 rounded flex items-center gap-2 border ">
                    <i class='bx bx-message-x text-3xl w-12 bg-red-100 text-red-500 p-2 rounded-lg'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Total Reject</p>
                        <h1 class="text-sm xl:text-2xl font-semibold">
                            <?= $total_reject; ?>
                    </div>
                </div>
                <div class="shadow-md p-4 rounded flex items-center gap-2 border ">
                    <i class='bx bx-paper-plane text-3xl w-12 bg-pink-100 text-pink-500 p-2 rounded-lg'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Transaksi</p>
                        <h1 class="text-sm xl:text-2xl font-semibold">
                            <?php
                            if ($total_transaksi !== null) {
                                echo number_format($total_transaksi);
                            } else {
                                echo '0';
                            }
                            ?>
                        </h1>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="w-full grid grid-cols-1  lg:grid-cols-3 gap-4 mb-3">
        <div class="bg-white shadow-md p-3 rounded border">
            <div>
                <h1 class="font-semibold mb-3">Ringkasan Inventaris</h1>
            </div>
            <div class=" h-32 grid grid-cols-2 gap-4">
                <div class="p-3 bg-gray-100 rounded lg">
                    <i class='bx bxs-package text-4xl text-green-500'></i>
                    <p>Barang Tersedia</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                        <?php
                        if ($barang_tersedia !== null) {
                            echo number_format($barang_tersedia);
                        } else {
                            echo '0';
                        }
                        ?>
                    </h1>
                </div>
                <div class="p-3 bg-gray-100 rounded lg">
                    <i class='bx bxs-group text-4xl text-sky-500'></i>
                    <p>Pemesan</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                        <?php
                        if ($pemesan !== null) {
                            echo number_format($pemesan);
                        } else {
                            echo '0';
                        }
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md p-3 rounded border">
            <h1 class="font-semibold mb-3">Keterangan Barang</h1>
            <div class=" h-32 grid grid-cols-1">
                <div class="p2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <i class='bx bxs-hourglass-bottom'></i>
                            <span class="text-sm sm:text-base">Stock Barang Sedikit</span>
                        </div>
                        <h1 class="font-semibold text-sm xl:text-2xl">
                            <?= $stok_rendah; ?>
                        </h1>
                    </div>
                </div>
                <div class="p2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <i class='bx bx-category-alt'></i>
                            <span class="text-sm sm:text-base">Kategori Barang</span>
                        </div>
                        <h1 class="font-semibold text-sm xl:text-2xl">
                            <?= $total_kategori; ?>
                        </h1>
                    </div>
                </div>
                <div class="p2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <i class='bx bxl-dropbox'></i>
                            <span class="text-sm sm:text-base">Barang Habis</span>
                        </div>

                        <h1 class="font-semibold text-sm xl:text-2xl">
                            <?= $barang_habis; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md p-3 rounded border">
            <div>
                <h1 class="font-semibold mb-3">User dan Staff</h1>
            </div>
            <div class=" h-32 grid grid-cols-2 gap-4">
                <div class="p-3 bg-gray-100 rounded lg">
                    <i class='bx bxs-group text-4xl text-green-500'></i>
                    <p>Total User</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                        <?= $total_user; ?>
                    </h1>
                </div>
                <div class="p-3 bg-gray-100 rounded lg">
                    <i class='bx bxs-group text-4xl text-sky-500'></i>
                    <p>Total Staff</p>
                    <h1 class="text-sm xl:text-2xl font-semibold">
                        <?= $total_staff; ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="grid  grid-cols-1  shadow-md bg-white p-4 rounded border">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="font-semibold ">Pengeluaran Bulanan</h1>
            <a href="<?= base_url('baseController/report') ?>"
                class="flex items-center  text-sm hover:bg-gray-200 rounded-lg p-1 ">
                Lihat Detail
                <i class='bx bx-chevron-right'></i>
            </a>
        </div>
        <div class="">
            <canvas id="barChart" class="w-[600px] h-[600px]"></canvas>
        </div>
    </div>
</div>

<?php

$amounts = array();

foreach ($totalPengeluaranPerBulan as $result) {
    $amounts[] = $result;
}

$expenseData = array(
    'months' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    'amounts' => $amounts,
);

$barData = array(
    'labels' => $expenseData['months'],
    'datasets' => [
        [
            'data' => $expenseData['amounts'],
            'backgroundColor' => [
                'rgba(51, 153, 255, 0.4)',
                'rgba(255, 204, 0, 0.4)',
                'rgba(51, 153, 255, 0.4)',
                'rgba(255, 204, 0, 0.4)',
                'rgba(51, 153, 255, 0.4)',
                'rgba(255, 204, 0, 0.4)',
                'rgba(51, 153, 255, 0.4)',
                'rgba(255, 204, 0, 0.4)',
                'rgba(51, 153, 255, 0.4)',
                'rgba(255, 204, 0, 0.4)',
                'rgba(51, 153, 255, 0.4)',
                'rgba(255, 204, 0, 0.4)',
            ],
            'borderColor' => '#fff',
            'borderWidth' => 1,
        ],
    ],
);
?>

<script>
    // Gunakan data yang diperbarui untuk grafik batang
    const barData = <?php echo json_encode($barData); ?>;
    
    const barOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
        },
    };

    // Inisialisasi grafik batang dengan data yang diperbarui
    const barCtx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(barCtx, {
        type: 'bar',
        data: barData,
        options: barOptions,
    });
</script>
