<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Transactions</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/listsubject') ?>">List Transaction</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Transaction</li>
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
                        <h4 class="text-blue h4">Edit Subject</h4>
                    </div>
                </div>
                <div class="form-create">
                    <form class="create-subject mt-4" action="<?= base_url('admin/updatetransaction'); ?>" method="post">
                        <div class="form-group row" hidden>
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">ID Transaksi</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control" type="text" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>" readonly>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('id_transaksi'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">ID Siswa</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control" type="text" name="id_siswa" value="<?= $transaksi['id_siswa']; ?>" readonly>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('id_siswa'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Nama Siswa</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control" type="text" name="nama_siswa" value="<?= $transaksi['nama_siswa']; ?>" readonly>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('nama_siswa'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Pilih Course</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="custom-select col-12" name="id_pengajar">
                                    <option disabled selected="">Choose Course</option>
                                    <?php
                                    foreach ($pengajar as $m) { ?>
                                        <option value="<?= $m['id_pengajar'] ?>" <?= $m['id_pengajar'] == $transaksi['id_pengajar'] ? "selected" : "" ?>><?= $m['nama_mapel'] ?> - <?= $m['nama_pengajar'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('id_pengajar'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Tanggal Transaksi</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control date-picker" name="tgl_transaksi" placeholder="Select Date" type="text" value="<?= $transaksi['tgl_transaksi'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style=" color: red;">
                                <?= $error = $validation->getError('tgl_transaksi'); ?>
                                </label>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Status Pembayaran</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="custom-select col-12" name="status">
                                    <option disabled selected="">Choose Status Pembayaran</option>
                                        <option value="Belum Bayar" <?= $transaksi['status'] == 'Belum Bayar' ? "selected" : "" ?>>Belum Bayar</option>
                                        <option value="Sudah Bayar" <?= $transaksi['status'] == 'Sudah Bayar' ? "selected" : "" ?>>Sudah Bayar</option>
                                </select>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('status'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="button-create" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="<?= base_url('admin/listtransaction') ?>" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>