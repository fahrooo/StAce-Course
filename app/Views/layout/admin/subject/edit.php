<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Courses</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/listsubject') ?>">List Course</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <?php
            if (!empty(session()->getFlashdata('success'))) { ?>

                <div class="alert alert-success" style="text-align: center;">
                    <?php echo session()->getFlashdata('success'); ?>
                </div>

            <?php } ?>
            <?php if (!empty(session()->getFlashdata('info'))) { ?>

                <div class="alert alert-info" style="text-align: center;">
                    <?php echo session()->getFlashdata('info'); ?>
                </div>

            <?php } ?>

            <?php if (!empty(session()->getFlashdata('warning'))) { ?>

                <div class="alert alert-warning" style="text-align: center;">
                    <?php echo session()->getFlashdata('warning'); ?>
                </div>

            <?php } ?>
            <?php if (!empty(session()->getFlashdata('danger'))) { ?>

                <div class="alert alert-danger" style="text-align: center;">
                    <?php echo session()->getFlashdata('danger'); ?>
                </div>
            <?php } ?>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Edit Course</h4>
                    </div>
                </div>
                <div class="form-create mt-4">
                    <?= form_open_multipart(base_url('admin/updatesubject')); ?>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Kode Course</label>
                        <div class="col-sm-12 col-md-2">
                            <input class="form-control" type="text" name="kode_mapel" value="<?= $mapel['kode_mapel']; ?>" readonly>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('kode_mapel'); ?>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Nama Course</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control" type="text" name="nama_mapel" value="<?= $mapel['nama_mapel']; ?>">
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('nama_mapel'); ?>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Harga Course</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control" type="text" name="harga_course" id="harga" value="<?= $mapel['harga_course']; ?>">
                            <script type="text/javascript">
                                var harga = document.getElementById('harga');
                                harga.addEventListener('keyup', function(e) {
                                    // tambahkan 'Rp.' pada saat form di ketik
                                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                                    harga.value = formatRupiah(this.value, '');
                                });

                                /* Fungsi formatRupiah */
                                function formatRupiah(angka, prefix) {
                                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                        split = number_string.split(','),
                                        sisa = split[0].length % 3,
                                        rupiah = split[0].substr(0, sisa),
                                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                    if (ribuan) {
                                        separator = sisa ? '.' : '';
                                        rupiah += separator + ribuan.join('.');
                                    }

                                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
                                }
                            </script>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('harga_course'); ?>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Foto Course</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="mb-3">
                                <input type="file" class="form-control" id="foto_course" name="foto_course" value="<?= $mapel['foto_course']; ?>" required>
                            </div>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('foto_course'); ?>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="button-create" style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="<?= base_url('admin/listsubject') ?>" type="button" class="btn btn-danger">Cancel</a>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>