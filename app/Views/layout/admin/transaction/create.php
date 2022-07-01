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
                                <li class="breadcrumb-item active" aria-current="page">Add Transaction</li>
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
                        <h4 class="text-blue h4">Add Subject</h4>
                    </div>
                </div>
                <div class="form-create">
                    <form class="create-subject mt-4" action="<?= base_url('admin/addtransaction'); ?>" method="post">
                    <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Nama Siswa</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="custom-select col-12" name="id_siswa">
                                    <option disabled selected="">Choose Student</option>
                                    <?php
                                    foreach ($siswa as $m) { ?>
                                        <option value="<?= $m['id_siswa'] ?>"><?= $m['nama_siswa'] ?></option>
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
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Pilih Course</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="custom-select col-12" name="id_pengajar">
                                    <option disabled selected="">Choose Course</option>
                                    <?php
                                    foreach ($pengajar as $m) { ?>
                                        <option value="<?= $m['id_pengajar'] ?>"><?= $m['nama_mapel'] ?> - <?= $m['nama_pengajar'] ?></option>
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
                                <input class="form-control date-picker" name="tgl_transaksi" placeholder="Select Date" type="text" value="<?= old('tgl_transaksi'); ?>">
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
                                        <option value="Belum Bayar">Belum Bayar</option>
                                        <option value="Sudah Bayar">Sudah Bayar</option>
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
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="<?= base_url('admin/listtransaction') ?>" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>