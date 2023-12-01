<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 ">
    <div class="flex items-center mb-3">
        <a href="" class="flex items-center text-4xl text-amber-400 font-semibold">
            <i class='bx bxl-bootstrap text-5xl  text-sky-400 '></i>
            <span class="self-center hidden   md:inline-block whitespace-nowrap text-sky-400 ">Basis
            </span>
            <span class="underline decoration-amber-400">
                PCR
            </span>
        </a>
    </div>
    <!-- Card -->
    <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-md ">
        <h2 class="text-2xl font-bold text-gray-900 ">
            Login
        </h2>
        <?= $this->session->flashdata('message'); ?>
        <form class="mt-8 space-y-6" method="POST" action="<?= base_url('Auth'); ?>">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Masukan email</label>
                <input type="email" name="email" id="email"
                    class="bg-gray-50 shadow-md border border-gray-300 focus:ring-sky-400 focus:border-sky-400 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5 "
                    placeholder="email" required>
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Masukan password</label>
                <input type="password" name="password" id="password" placeholder="password"
                    class="bg-gray-50 shadow-md border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-400 focus:border-sky-400 block w-full p-2.5 "
                    required>
            </div>

            <button type="submit"
                class="w-full px-5 py-3 text-base font-semibold shadow-md hover:bg-amber-400 text-center bg-amber-300 text-white  rounded-lg">Login</button>
            <div class="text-sm font-medium text-gray-500 text-center">
                Belum mendaftar? <a href="<?= base_url('auth/register') ?>" class="text-amber-400 hover:underline ">Buat
                    akun</a>
            </div>
        </form>
    </div>
</div>