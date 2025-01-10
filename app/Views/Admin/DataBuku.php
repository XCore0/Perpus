<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="<?= base_url('dist/images/logo.svg') ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Data Buku - Perpustakaan Digital</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?= base_url('dist/css/app.css') ?>" />
    <!-- END: CSS Assets-->
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- jQuery (diperlukan untuk Toastr) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<!-- END: Head -->

<body class="py-5">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Perpustakaan Digital" class="w-6" src="<?= base_url('dist/images/logo.svg') ?>">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex mt-[4.7rem] md:mt-0">

        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="LiteraSky" class="w-6" src="<?= base_url('dist/images/logo.svg') ?>">
                <span class="hidden xl:block text-white text-lg ml-3">LiteraSky</span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="<?= route_to('Admin.Dashboard') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                        <div class="side-menu__title">
                            Data Master
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?= route_to('Admin.Kategori') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                                <div class="side-menu__title"> Kategori Buku </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= route_to('Admin.Buku') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="book-open"></i> </div>
                                <div class="side-menu__title"> Data Buku </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= route_to('Admin.Laporan') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="side-menu__title"> Laporan </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                        <div class="side-menu__title">
                            Layanan
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?= base_url('peminjaman') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="shopping-cart"></i> </div>
                                <div class="side-menu__title"> Peminjaman </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pengembalian') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="corner-up-left"></i> </div>
                                <div class="side-menu__title"> Pengembalian </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="settings"></i> </div>
                        <div class="side-menu__title">
                            Pengaturan
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?= base_url('pengaturan/profil') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                                <div class="side-menu__title"> Profil </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pengaturan/pengguna') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="side-menu__title"> Pengguna </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('auth/logout') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="log-out"></i> </div>
                        <div class="side-menu__title"> Keluar </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <h2 class="intro-y text-lg font-medium mt-10">Data Buku</h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add-modal">
                        Tambah Buku
                    </button>
                </div>

                <!-- BEGIN: Data List -->
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">NO</th>
                                <th class="whitespace-nowrap">FOTO</th>
                                <th class="whitespace-nowrap">JUDUL</th>
                                <th class="whitespace-nowrap">PENULIS</th>
                                <th class="whitespace-nowrap">PENERBIT</th>
                                <th class="whitespace-nowrap">TAHUN</th>
                                <th class="whitespace-nowrap">KATEGORI</th>
                                <th class="whitespace-nowrap">STOK</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($bukus as $buku): ?>
                                <tr class="intro-x">
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <?php if (!empty($buku['Foto'])): ?>
                                            <img src="<?= base_url('uploads/buku/' . $buku['Foto']) ?>"
                                                alt="<?= $buku['Judul'] ?>"
                                                class="w-20 h-20 object-cover rounded">
                                        <?php else: ?>
                                            <span class="text-gray-500">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $buku['Judul'] ?></td>
                                    <td><?= $buku['Penulis'] ?></td>
                                    <td><?= $buku['Penerbit'] ?></td>
                                    <td><?= $buku['TahunTerbit'] ?></td>
                                    <td><?= $buku['NamaKategori'] ?? '-' ?></td>
                                    <td><?= $buku['Stok'] ?></td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <button class="flex items-center mr-3 btn-edit"
                                                onclick="editBuku(<?= $buku['BukuID'] ?>)">
                                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                            </button>
                                            <a href="javascript:;"
                                                onclick="confirmDelete('<?= base_url('Admin/Buku/delete/' . $buku['BukuID']) ?>')"
                                                class="flex items-center text-danger">
                                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- BEGIN: Add Modal -->
        <div id="add-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Buku</h2>
                    </div>
                    <form action="<?= base_url('Admin/Buku/store') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input id="judul" name="judul" type="text" class="form-control" required>
                            </div>
                            <div class="col-span-12">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input id="penulis" name="penulis" type="text" class="form-control" required>
                            </div>
                            <div class="col-span-12">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input id="penerbit" name="penerbit" type="text" class="form-control" required>
                            </div>
                            <div class="col-span-12">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                <input id="tahun_terbit" name="tahun_terbit" type="number" class="form-control" required>
                            </div>
                            <div class="col-span-12">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select id="kategori_id" name="kategori_id" class="form-select" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategoris as $kategori): ?>
                                        <option value="<?= $kategori['KategoriID'] ?>"><?= $kategori['NamaKategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-span-12">
                                <label for="stok" class="form-label">Stok</label>
                                <input id="stok" name="stok" type="number" class="form-control" required min="0">
                            </div>
                            <div class="col-span-12">
                                <label for="foto" class="form-label">Foto Buku</label>
                                <input type="file" id="foto" name="foto" class="form-control" accept="image/*" required>
                                <div class="mt-2">
                                    <img id="preview-add" src="" alt="" class="hidden max-w-xs">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                            <button type="submit" class="btn btn-primary w-20">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- BEGIN: Edit Modal -->
        <div id="edit-buku-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Edit Buku</h2>
                    </div>
                    <form id="form-edit" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" id="edit_buku_id" name="buku_id">
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12">
                                <label for="edit_judul" class="form-label">Judul Buku</label>
                                <input id="edit_judul" name="judul" type="text" class="form-control" required>
                            </div>
                            <div class="col-span-12">
                                <label for="edit_penulis" class="form-label">Penulis</label>
                                <input id="edit_penulis" name="penulis" type="text" class="form-control" required>
                            </div>
                            <div class="col-span-12">
                                <label for="edit_penerbit" class="form-label">Penerbit</label>
                                <input id="edit_penerbit" name="penerbit" type="text" class="form-control" required>
                            </div>
                            <div class="col-span-12">
                                <label for="edit_tahun_terbit" class="form-label">Tahun Terbit</label>
                                <input id="edit_tahun_terbit" name="tahun_terbit" type="number" class="form-control" required>
                            </div>
                            <div class="col-span-12">
                                <label for="edit_kategori_id" class="form-label">Kategori</label>
                                <select id="edit_kategori_id" name="kategori_id" class="form-select" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategoris as $kategori): ?>
                                        <option value="<?= $kategori['KategoriID'] ?>"><?= $kategori['NamaKategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-span-12">
                                <label for="edit_stok" class="form-label">Stok</label>
                                <input id="edit_stok" name="stok" type="number" class="form-control" required min="0">
                            </div>
                            <div class="col-span-12">
                                <label for="edit_foto" class="form-label">Foto Buku</label>
                                <div id="preview-container" class="mb-2"></div>
                                <input type="file" id="edit_foto" name="foto" class="form-control" accept="image/*">
                                <small class="text-gray-500">Biarkan kosong jika tidak ingin mengubah foto</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                            <button type="submit" class="btn btn-primary w-20">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- BEGIN: Script -->
        <script>
            $(document).ready(function() {
                // Preview untuk form tambah
                $("#foto").change(function() {
                    previewImage(this, 'preview-add');
                });

                // Preview untuk form edit
                $("#edit_foto").change(function() {
                    previewImage(this, 'preview-edit');
                });

                // Handle tombol edit
                $('.btn-edit').click(function() {
                    const id = $(this).data('id');
                    const judul = $(this).data('judul');
                    const penulis = $(this).data('penulis');
                    const penerbit = $(this).data('penerbit');
                    const tahun = $(this).data('tahun');
                    const kategori = $(this).data('kategori');
                    const foto = $(this).data('foto');

                    console.log('Edit data:', {
                        id,
                        judul,
                        penulis,
                        penerbit,
                        tahun,
                        kategori,
                        foto
                    }); // Debug

                    // Set nilai form
                    $('#edit_judul').val(judul);
                    $('#edit_penulis').val(penulis);
                    $('#edit_penerbit').val(penerbit);
                    $('#edit_tahun_terbit').val(tahun);
                    $('#edit_kategori_id').val(kategori);

                    // Set preview foto jika ada
                    if (foto) {
                        $('#preview-container').html(`
                            <img src="${foto}" alt="Preview" class="w-32 mb-2">
                        `);
                    } else {
                        $('#preview-container').empty();
                    }
                    console.log('Form elements:', {
                        judul: $('#edit_judul').length,
                        penulis: $('#edit_penulis').length,
                        penerbit: $('#edit_penerbit').length,
                        tahun: $('#edit_tahun_terbit').length,
                        kategori: $('#edit_kategori_id').length
                    });
                    // Set action form dengan ID yang benar
                    $('#form-edit').attr('action', `<?= base_url('Admin/Buku/update') ?>/${id}`);
                });

                // Preview foto baru yang diupload
                $('#edit_foto').change(function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $('#preview-container').html(`
                                <img src="${e.target.result}" alt="Preview" class="w-32 mb-2">
                            `);
                        }
                        reader.readAsDataURL(file);
                    }
                });
            });

            function previewImage(input, previewId) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(`#${previewId}`).attr('src', e.target.result).removeClass('hidden');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function confirmDelete(url) {
                if (confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
                    window.location.href = url;
                }
            }

            function editBuku(id) {
                fetch(`<?= base_url() ?>Admin/Buku/edit/${id}`)
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            const buku = result.data;
                            
                            // Set form values termasuk stok
                            document.getElementById('edit_buku_id').value = buku.BukuID;
                            document.getElementById('edit_judul').value = buku.Judul;
                            document.getElementById('edit_penulis').value = buku.Penulis;
                            document.getElementById('edit_penerbit').value = buku.Penerbit;
                            document.getElementById('edit_tahun_terbit').value = buku.TahunTerbit;
                            document.getElementById('edit_kategori_id').value = buku.KategoriID;
                            document.getElementById('edit_stok').value = buku.Stok;
                            
                            // Set preview foto if exists
                            const previewContainer = document.getElementById('preview-container');
                            if (buku.Foto) {
                                const fotoUrl = `<?= base_url('uploads/buku/') ?>/${buku.Foto}`;
                                previewContainer.innerHTML = `
                                    <img src="${fotoUrl}" alt="Preview" class="w-32 mb-2">
                                `;
                            } else {
                                previewContainer.innerHTML = '';
                            }

                            // Update form action URL
                            document.getElementById('form-edit').action = `<?= base_url() ?>Admin/Buku/update/${buku.BukuID}`;

                            // Show modal
                            const modal = tailwind.Modal.getInstance(document.querySelector('#edit-buku-modal'));
                            modal.show();
                        } else {
                            toastr.error(result.message || 'Gagal mengambil data buku');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        toastr.error('Terjadi kesalahan saat mengambil data');
                    });
            }

            // Preview foto yang akan diupload
            document.getElementById('edit_foto').addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview-container').innerHTML = `
                            <img src="${e.target.result}" alt="Preview" class="w-32 mb-2">
                        `;
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="<?= base_url('dist/js/app.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide-icons@latest/dist/lucide.umd.js"></script>
    <!-- END: JS Assets-->

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            lucide.set();
        });
    </script>

    <script>
        // Konfigurasi default Toastr
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Notifikasi Success
        <?php if (session()->getFlashdata('success')) : ?>
            toastr.success('<?= session()->getFlashdata('success') ?>', 'Berhasil!');
        <?php endif; ?>

        // Notifikasi Error
        <?php if (session()->getFlashdata('error')) : ?>
            toastr.error('<?= session()->getFlashdata('error') ?>', 'Error!');
        <?php endif; ?>

        // Notifikasi Warning
        <?php if (session()->getFlashdata('warning')) : ?>
            toastr.warning('<?= session()->getFlashdata('warning') ?>', 'Peringatan!');
        <?php endif; ?>

        // Notifikasi Info
        <?php if (session()->getFlashdata('info')) : ?>
            toastr.info('<?= session()->getFlashdata('info') ?>', 'Informasi');
        <?php endif; ?>

        // Konfirmasi Delete
        function confirmDelete(url) {
            if (confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
                $.get(url, function(result) {
                    toastr.success('Buku berhasil dihapus!', 'Berhasil!');
                    // Reload halaman setelah 1 detik
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }).fail(function() {
                    toastr.error('Gagal menghapus buku!', 'Error!');
                });
            }
            return false;
        }

        // Handle form submission
        $('form').on('submit', function() {
            toastr.info('Memproses...', 'Mohon tunggu');
        });
    </script>
</body>

</html>