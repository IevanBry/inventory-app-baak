<div class="p-3 ml-12 md:ml-3 w-full">
    <div>
        <div class=" w-full mb-4">
            <div class="div grid grid-cols-1 mb-3">
                <div class=" p-4 bg-white shadow-md rounded border flex items-center gap-2">
                    <div class="flex gap-2 items-center">
                        <div>
                            <select id="countries"
                                class="bg-gray-50  border-gray-300 shadow-md text-gray-900 text-sm rounded border focus:ring-sky-400 focus:border-sky-400 block w-full px-3 py-1">
                                <option selected>Perbulan</option>
                                <option value="minggu">Perminggu</option>
                                <option value="bulan">Pertahun</option>
                            </select>
                        </div>

                        <button type="button" id="tambahPemasukan" data-modal-target="tambah-pemasukan"
                            data-modal-toggle="tambah-pemasukan"
                            class="bg-amber-300 text-white hover:bg-amber-500 flex items-center shadow-md font-medium rounded border text-sm px-3 py-1">
                            <span>tambah pemasukan</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="  grid md:grid-cols-3  gap-4">
                <div class=" p-4 bg-white shadow-md rounded border flex items-center gap-2">
                    <i class='bx bx-wallet text-3xl bg-yellow-100 w-12 text-yellow-500 p-2 rounded border'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Kas</p>
                        <?php
                        $kas = $total_pemasukan - $total_pengeluaran;
                        ?>
                        <h1 class="text-sm xl:text-2xl font-semibold">Rp
                            <?= number_format($kas); ?>
                        </h1>
                    </div>
                </div>
                <div class=" p-4 bg-white shadow-md rounded border flex items-center gap-2 ">
                    <i class='bx bx-money text-3xl w-12 bg-green-100 text-green-500 p-2 rounded border'></i>
                    <div>
                        <p class="text-gray-500 text-sm sm:text-base">Pemasukan</p>
                        <h1 class="text-sm xl:text-2xl font-semibold">
                            <?php
                            if ($total_pemasukan !== null) {
                                echo number_format($total_pemasukan);
                            } else {
                                echo 'Rp 0';
                            }
                            ?>
                        </h1>
                    </div>
                </div>
                <div class=" p-4 bg-white shadow-md rounded border flex items-center gap-2">
                    <i class='bx bx-money text-3xl  bg-red-100 text-red-500 p-2  rounded border'></i>
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
                    </div>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 mb-4">
            <div class="overflow-x-auto bg-white shadow-md rounded border p-4">
                <div class="flex justify-between items-center">
                    <div class="flex p-2 items-center gap-2 font-semibold">
                        <i class='bx bx-up-arrow-alt  bg-green-100 text-green-500 p-2  rounded border'></i>

                        <div>
                            <p class=" text-sm sm:text-base">Daftar Pemasukan</p>
                        </div>
                    </div>
                    <button id="exportDataUser" type="button"
                        class=" flex items-center bg-sky-400 text-white hover:bg-sky-500 shadow-md font-medium rounded border text-sm px-3 py-1">
                        <i class='bx bxs-file-export text-md'></i>

                        <span>Export</span>
                    </button>
                </div>



                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden border">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray">
                                <tr>
                                    <th scope="col" class="p-4 text-sm font-semibold text-left  uppercase">
                                        No.
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-semibold text-left  uppercase">
                                        Pemasukan
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-semibold text-left  uppercase">
                                        Tanggal
                                    </th>

                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <?php foreach ($history_pemasukan as $item): ?>
                                <tr class="hover:bg-gray-100 ">
                                    <td scope="col" class="p-4 border-r text-sm  font-medium text-gray-900">
                                        <?= $no ?>
                                    </td>
                                    <td scope="col" class="p-4 text-sm font-medium text-gray-900">Rp
                                        <?= number_format($item['jumlah']) ?>
                                    </td>
                                    <td scope="col" class="p-4 text-sm font-medium text-gray-900">
                                        <?= $item['tanggal'] ?>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto bg-white shadow-md rounded border p-4">
                <div class="flex justify-between items-center">
                    <div class="flex p-2 items-center gap-2 font-semibold">
                        <i class='bx bx-down-arrow-alt  bg-red-100 text-red-500 p-2  rounded border'></i>
                        <div>
                            <p class=" text-sm sm:text-base">Daftar Pengeluaran</p>
                        </div>
                    </div>
                    <button id="exportDataUser" type="button"
                        class=" flex items-center bg-sky-400 text-white hover:bg-sky-500 shadow-md font-medium rounded border text-sm px-3 py-1">
                        <i class='bx bxs-file-export text-md'></i>

                        <span>Export</span>
                    </button>
                </div>

                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden border">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray ">
                                <tr>
                                    <th scope="col" class="p-4 text-sm font-semibold text-left  uppercase">
                                        No.
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-semibold text-left  uppercase">
                                        Pengeluaran
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-semibold text-left  uppercase">
                                        Tanggal</th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <?php foreach ($history_pengeluaran as $item): ?>
                                <tr class="hover:bg-gray-100 ">
                                    <td scope="col" class="p-4 border-r text-sm  font-medium text-gray-900">
                                        <?= $no ?>
                                    </td>
                                    <td scope="col" class="p-4 text-sm font-medium text-gray-900">Rp
                                        <?= number_format($item['jumlah']) ?>
                                    </td>
                                    <td scope="col" class="p-4 text-sm font-medium text-gray-900">
                                        <?= $item['tanggal'] ?>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <div class="grid grid-cols-1 rounded border shadow-md bg-white p-4">

            <div class="mb-6 flex justify-between items-center">
                <h1 class="font-semibold ">Pengeluaran Bulanan</h1>
            </div>
            <div class="">
                <canvas id="barChart" class="w-[600px] h-[100px]"></canvas>
            </div>

        </div>

    </div>


</div>


<div id="tambah-pemasukan" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-90">
                    Tambah Pemasukan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="tambah-pemasukan">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('Report/insertPemasukan'); ?>" method="post" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-col-1">
                    <div class="grid-cols-">
                        <div class="mb-3">
                            <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-90">Tanggal</label>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $timestamp_sekarang = time();
                            ?>
                            <input type="text" name="tanggal" id="tanggal"
                                class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded-lg  block w-full p-2.5 "
                                placeholder="" value="<?= date('Y-m-d H:i:s', $timestamp_sekarang) ?>" required=""
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="block mb-2 text-sm font-medium  text-gray-900 ">Jumlah
                                Pemasukan</label>
                            <input type="number" name="jumlah" id="jumlah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                                placeholder="Rp.0">
                        </div>
                        <div class="col-span-1">
                            <button type="submit"
                                class="text-center w-full bg-amber-300 hover:bg-amber-400 shadow-md text-white font-medium rounded-lg text-sm px-3 py-2"
                                data-modal-toggle="tambah-pemasukan">
                                Tambah Pemasukan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // Data dummy inventaris barang kantor
    // Data dummy inventaris barang kantor
    const expenseData = {
        months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        amounts: [1200, 800, 1500, 1000, 2000, 1200, 900, 1300, 1100, 1800, 950, 2000],
    };

    const barData = {
        labels: expenseData.months,
        datasets: [{
            data: expenseData.amounts,
            backgroundColor: [
                'rgba(51, 153, 255, 0.4)', // Biru langit dengan 50% transparansi
                'rgba(255, 204, 0, 0.4)',  // Amber dengan 50% transparansi
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
            borderColor: '#fff',
            borderWidth: 1,
        }],
    };

    const barOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
        },
    };

    // Initializing the bar chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(barCtx, {
        type: 'bar',
        data: barData,
        options: barOptions,
    });

</script>