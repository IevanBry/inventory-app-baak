<div class="bg-white rounded  shadow-md">
    <div class="p-4  block sm:flex items-center justify-between border-b border-gray-200 ">
        <div class="w-full mb-1">
            <div class="items-center justify-between block sm:flex ">
                <div class="flex gap-2">
                    <button id="deleteAlll" type="button" onclick="confirmDeleteAll()"
                        class="bg-red-400 text-white hover:bg-red-500 flex  items-center shadow-md font-medium rounded text-sm px-3 py-1">
                        <i class='bx bx-trash'></i>
                        <span>Hapus Semua</span>
                    </button>
                    <button type="button" id="tambahUser" data-modal-target="tambahUserModal"
                        data-modal-toggle="tambahUserModal"
                        class="bg-amber-400 text-white hover:bg-amber-500 flex items-center shadow-md font-medium rounded text-sm px-3 py-1 ">
                        <i class='bx bx-plus'></i>
                        <span> Tambah User Baru</span>
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
            <div class="inline-block min-w-full ">
                <div class="overflow-hidden  p-4">
                    <table id="example" class="ui table ">
                        <thead>
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">

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
                                    User
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                    Account
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left  uppercase">
                                    Role
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-center  uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <?php $no = 1; ?>
                        <?php foreach ($user_list as $item): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-<?= $item['id_user'] ?>" name="checkbox_value[]"
                                            value="<?= $item['id_user'] ?>" type="checkbox"
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
                                                    window.location.href = '<?= base_url('AdminUser/deleteAll'); ?>?ids=' + checked_ids.join(',');
                                                } else {
                                                    window.location.href = '<?= base_url('AdminUser/deleteAll'); ?>'
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
                                    <?= $item['nama'] ?>
                                </td>
                                <td class="p-2 text-sm font-medium text-gray-900">
                                    <?= $item['email'] ?>
                                </td>
                                <td class="p-2 text-sm font-medium text-gray-900">
                                    <?= $item['role'] ?>
                                </td>

                                <td scope="" class="p-4 space-x-2 text-center">
                                    <button id="updateUserButton" type="button"
                                        data-modal-target="updateUserModal<?= $no ?>"
                                        data-modal-toggle="updateUserModal<?= $no ?>"
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium rounded shadow-md bg-sky-400 text-white border hover:bg-sky-500">
                                        <i class="bx bx-edit"></i>
                                        Update
                                    </button>

                                    <button type="button" id="deleteUserButton" data-modal-target="hapusUserModal<?= $no ?>"
                                        data-modal-toggle="hapusUserModal<?= $no ?>"
                                        aria-controls="drawer-delete-product-default"
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium rounded shadow-md bg-red-400 text-white border hover:bg-red-500">
                                        <i class="bx bx-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- update user modal -->
                            <div id="updateUserModal<?= $no ?>" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded shadow pb-1">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            <h3 class="text-lg font-semibold text-gray-90">
                                                Update User
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-toggle="updateUserModal<?= $no ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="<?= base_url('AdminUser/editUser'); ?>" method="POST"
                                            class="p-4 md:p-5" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $item['id_user']; ?>">
                                            <div class="grid gap-4 mb-4 ms-4 me-4 grid-cols-2">
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Nama
                                                        User</label>
                                                    <input type="text" name="name" id="name"
                                                        class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                                        placeholder="nama" required="" value="<?= $item['nama'] ?>">
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="email"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                        placeholder="example@gmail.com" required=""
                                                        value="<?= $item['email'] ?>">
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="role"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
                                                    <select name="role" id="role"
                                                        class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded block w-full p-2.5 ">
                                                        <option selected="<?= $item['role'] ?>">
                                                            <?= $item['role'] ?>
                                                        </option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="User">User</option>
                                                    </select>
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="password"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                                    <input type="password" name="password" id="password"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                                                        placeholder="*****" required="" value="<?= $item['password'] ?>">
                                                </div>
                                            </div>
                                            <div class="text-end me-4 mb-4">
                                                <button type="button" data-modal-hide="updateUserModal<?= $no ?>"
                                                    class="text-end bg-white shadow-md hover:bg-gray-100 border text-gray-500 font-medium rounded text-sm px-3 py-2">
                                                    Batal
                                                </button>
                                                <button type="submit"
                                                    class="text-end bg-amber-400 shadow-md text-white font-medium rounded text-sm px-3 py-2">
                                                    Update User
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Penutup Update User  -->

                            <!-- hapus user -->
                            <div id="hapusUserModal<?= $no ?>" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded shadow ">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                            data-modal-hide="hapusUserModal<?= $no ?>">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Yakin
                                                ingin menghapus user -
                                                <span class="text-red-500">
                                                    <?= $item['nama'] ?>
                                                </span>?
                                            </h3>
                                            <form action="<?= base_url('AdminUser/deleteUser'); ?>" method="post">
                                                <input type="hidden" name="id_user" value="<?= $item['id_user'] ?>">
                                                <button type="submit"
                                                    class="bg-amber-400 text-white shadow-md  focus:outline-none  font-medium rounded text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                    Ya, lanjutkan
                                                </button>
                                                <button data-modal-hide="hapusUserModal<?= $no ?>" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 rounded border shadow-md text-sm font-medium px-5 py-2.5 ">Tidak,
                                                    batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Penutup Hapus User -->
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- tambah user modal -->
    <div id="tambahUserModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded shadow">

                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Tambah User Baru
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="tambahUserModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="userForm" action="<?= base_url('AdminUser/insertUser'); ?>" method="post" enctype="multipart/form-data"
                    class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama
                                User</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900  text-sm rounded  block w-full p-2.5 "
                                placeholder="nama" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="example@gmail.com" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
                            <select name="role" id="role"
                                class="bg-gray-50 border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 text-sm rounded block w-full p-2.5 ">
                                <option selected="">Pilih Role User</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                                placeholder="*****" required="">
                        </div>
                    </div>
                    <div class="text-end">
                        <button data-modal-hide="tambahUserModal" type="button"
                            class="text-end bg-white shadow-md hover:bg-gray-100 border text-gray-500 font-medium rounded text-sm px-3 py-2">
                            Batal
                        </button>
                        <button type="submit"
                            class="text-end bg-amber-400 shadow-md text-white font-medium rounded text-sm px-3 py-2">
                            Tambah User
                        </button>
                    </div>
                </form>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        // Mendapatkan elemen formulir
                        var form = document.getElementById("userForm");

                        // Menangani submit formulir
                        form.addEventListener("submit", function (event) {
                            // Mencegah pengiriman formulir
                            event.preventDefault();

                            // Memeriksa nilai input
                            var name = document.getElementById("name").value;
                            var email = document.getElementById("email").value;
                            var role = document.getElementById("role").value;
                            var password = document.getElementById("password").value;

                            // Validasi sederhana (gunakan validasi yang lebih rumit sesuai kebutuhan Anda)
                            if (name.trim() === "") {
                                alert("Nama User harus diisi");
                                return;
                            }

                            if (email.trim() === "") {
                                alert("Email harus diisi");
                                return;
                            }

                            if (role === "") {
                                alert("Pilih Role User");
                                return;
                            }

                            if (password.trim() === "") {
                                alert("Password harus diisi");
                                return;
                            }

                            var minLength = 5;
                            if (password.length < minLength) {
                                alert("Password harus memiliki setidaknya " + minLength + " karakter");
                                return;
                            }
                            form.submit();
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>