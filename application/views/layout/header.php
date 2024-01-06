<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baak System Inventory</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
    <script src="<?= base_url('Chart/Chart.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('dist/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {

                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                }
            }
        } 
    </script>

</head>


<body class="font-poppins bg-gray-50">

    <nav class="fixed top-0 z-30 w-full bg-white shadow-sm ">
        <div class="px-3 py-2">
            <div class="flex">
                <div class="flex items-center justify-start rtl:justify-end">
                    <a href="" class="flex items-center ms-2 md:me-24 text-amber-400 text-xl font-semibold">
                        <i class='bx bxl-bootstrap text-4xl  text-sky-400'></i>
                        <span class="self-center hidden text-sky-400  md:inline-block whitespace-nowrap">Basis</span>
                        <span class="hidden underline decoration-amber-400 md:inline-block whitespace-nowrap">PCR</span>
                    </a>
                </div>

                <div class="ml-3 flex items-center justify-between w-full">
                    <div class="flex items-center gap-2">
                        <i class="<?= $icon ?>"></i>
                        <h1 class="font-semibold text-xl">
                            <?= $title ?>
                        </h1>
                    </div>


                    <div class="flex gap-4 items-center mr-6">

                        <?php if ($user['role'] == 'User' && $title == 'Barang') { ?>
                            <div class="text-center">
                                <button class="font-medium" type="button" data-drawer-target="keranjang"
                                    data-drawer-show="keranjang" data-drawer-placement="right" aria-controls="keranjang">
                                    <i class='bx bx-cart text-[30px]'></i>
                                </button>
                            </div>
                        <?php } ?>

                        <div class="avatar online">
                            <button type="button" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                aria-hidden="true">
                                <div class="w-10 rounded-full">
                                    <img src="<?= base_url('dist/muka abu.jpg') ?>" alt="" class="rounded-full">
                                </div>
                            </button>
                        </div>

                        <div>
                            <h6 class="text-sm font-semibold">
                                <?= $user['nama'] ?>
                            </h6>
                            <p class="text-sm text-gray-500">
                                <?= $user['email'] ?>
                            </p>
                        </div>

                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('auth/logout') ?>"
                                        class="block px-4 py-2 hover:bg-gray-100">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-10 md:w-64 w-[70px] h-screen pt-20 transition-transform  bg-white  shadow-md">
        <div class="h-full px-3 pb-4 flex flex-col justify-between">
            <?php if ($user['role'] == 'User') { ?>
                <!-- user sidebar start -->
                <ul class="space-y-2  " id="list-menu">

                    <li class="active:text-gray-900 focus:text-gray-900">
                        <a href="<?= base_url('user') ?>"
                            class="dashboard flex items-center p-2 text-amber-400  group hover:text-amber-300 ">
                            <i class="bx bx-home text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Home</span>
                        </a>
                    </li>
                    <li class="active:text-gray-900 focus:text-gray-900">
                        <a href="<?= base_url('user/barang') ?>"
                            class="flex items-center p-2 text-gray-500 group hover:text-amber-300 ">
                            <i class="bx bx-store text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Barang</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('user/request') ?>"
                            class="flex items-center p-2 text-gray-500 group hover:text-amber-300 ">
                            <i class="bx bx-chat text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Pengajuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('user/history') ?>"
                            class="flex items-center p-2 text-gray-500 group hover:text-amber-300">
                            <i class="bx bx-bell text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">History</span>
                        </a>
                    </li>
                </ul>

                <ul class="font-medium pb-3">
                    <li>
                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="flex items-center p-2 text-gray-500 hover:text-amber-300 group">
                            <i class="bx bx-log-out text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Logout</span>
                        </button>
                    </li>
                </ul>

                <!-- user sidebar end -->
            <?php } else { ?>

                <!-- admin sidebar start -->

                <ul class="space-y-2" id="list-menu">
                    <li>
                        <a href="<?= base_url('BaseController') ?>"
                            class="flex items-center p-2 <?= current_url() == base_url('BaseController') ? 'text-amber-400' : 'text-gray-500' ?> group hover:text-amber-300">
                            <i class="bx bx-home text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('BaseController/stock') ?>"
                            class="flex items-center p-2 <?= current_url() == base_url('Stock') ? 'text-amber-400' : 'text-gray-500' ?> group hover:text-amber-300">
                            <i class="bx bx-package text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Stock</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('BaseController/user') ?>"
                            class="flex items-center p-2 <?= current_url() == base_url('user') ? 'text-amber-400' : 'text-gray-500' ?> group hover:text-amber-300">
                            <i class="bx bx-user text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('BaseController/report') ?>"
                            class="flex items-center p-2 <?= current_url() == base_url('report') ? 'text-amber-400' : 'text-gray-500' ?> group hover:text-amber-300">
                            <i class="bx bx-file-find text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('BaseController/request') ?>"
                            class="flex items-center p-2 <?= current_url() == base_url('request') ? 'text-amber-400' : 'text-gray-500' ?> group hover:text-amber-300 ">
                            <i class="bx bx-chat text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('BaseController/notif') ?>"
                            class="flex items-center p-2 <?= current_url() == base_url('notif') ? 'text-amber-400' : 'text-gray-500' ?> group hover:text-amber-300">
                            <i class="bx bx-bell text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Notification</span>
                        </a>
                    </li>
                </ul>


                <ul class="font-medium pb-3">
                    <li>
                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="flex items-center p-2 text-gray-500 hover:text-amber-300 group">
                            <i class="bx bx-log-out text-[24px] "></i>
                            <span class="ms-3 hidden md:inline-block flex-nowrap">Logout</span>
                        </button>
                    </li>
                </ul>

                <!-- admin sidebar end -->
            <?php } ?>
        </div>
    </aside>

    <div class="p-4 ml-2 md:ml-60 mt-14 ">


        <div id="popup-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow ">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 ">Yakin ingin Logout ?</h3>
                        <a href="<?= base_url('auth/logout') ?>"
                            class="bg-amber-400 text-white shadow-md  focus:outline-none  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Ya, lanjutkan
                        </a>
                        <button data-modal-hide="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 rounded-lg border shadow-md text-sm font-medium px-5 py-2.5 ">Tidak,
                            batal</button>
                    </div>
                </div>
            </div>
        </div>