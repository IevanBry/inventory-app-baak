<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0">
<div class="flex items-center mb-3">
        <a href="" class="flex items-center text-4xl text-amber-400 font-semibold">
            <i class='bx bxl-bootstrap text-5xl  text-sky-400 '></i>
            <span class="self-center hidden   md:inline-block whitespace-nowrap text-sky-400 ">
                Basis
            </span>
            <span class="underline decoration-amber-400">
                PCR
            </span>
        </a>
    </div>
    <!-- Card -->
    <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-900">
            Daftar Akun Baru
        </h2>
        <form class="mt-8 space-y-6" method="POST" action="<?= base_url('auth/register'); ?>">
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Masukan nama lengkap</label>
                <input type="text" name="nama" id="nama" value="<?= set_value('nama'); ?>"
                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 shadow-md focus:border-sky-400 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5"
                    placeholder="nama">
                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Masukan
                    email</label>
                <input type="email" name="email" id="email" value="<?= set_value('email'); ?>"
                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 shadow-md focus:border-sky-400 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5"
                    placeholder="email">
                    <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Atur
                    Password</label>
                <input type="password" name="password1" id="password1" placeholder="password" value="<?= set_value('password1'); ?>"
                    class="bg-gray-50 border border-gray-300 focus:ring-sky-400 shadow-md focus:border-sky-400 text-gray-900 sm:text-sm rounded-lg   block w-full p-2.5 ">
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div>
                <label for="konfirmasi_password"
                    class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" placeholder="konfirmasi" value="<?= set_value('password2'); ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5 focus:ring-sky-500 shadow-md focus:border-sky-500">
                    <?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <button type="submit"
                class="w-full  px-5 py-3 text-base font-semibold text-center shadow-md rounded-lg bg-amber-300 hover:bg-amber-400 text-white">Buat Akun</button>
            <div class="text-sm font-medium text-gray-500 text-center">
                Sudah punya akun ? <a href="<?= base_url('auth/') ?>" class="text-amber-400 hover:underline ">Login disini</a>
            </div>
        </form>
    </div>
</div>