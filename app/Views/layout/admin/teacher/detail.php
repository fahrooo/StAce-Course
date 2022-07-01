<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Teachers</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/listteacher') ?>">List Teacher</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Teacher</li>
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
                        <h4 class="text-blue h4">Detail Teacher</h4>
                        <h4 class="text-black h4">Dari : <?= $pengajar['nama_pengajar'] ?></h4>
                    </div>
                </div>
                <div class="form-create">
                    <form class="create-subject mt-4">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Kode Pengajar</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="text" readonly="" class="form-control-plaintext" value=": <?= $pengajar['id_pengajar'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Nama Lengkap</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="text" readonly="" class="form-control-plaintext" value=": <?= $pengajar['nama_pengajar'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Jenis Kelamin</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="text" readonly="" class="form-control-plaintext" value=": <?= $pengajar['jk'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Telephone</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="text" readonly="" class="form-control-plaintext" value=": <?= $pengajar['no_hp'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Email</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="text" readonly="" class="form-control-plaintext" value=": <?= $pengajar['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Alamat</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="text" readonly="" class="form-control-plaintext" value=": <?= $pengajar['alamat'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Subject</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="text" readonly="" class="form-control-plaintext" value=": <?= $pengajar['nama_mapel'] ?>">
                            </div>
                        </div>
                        <div class="button-create" style="text-align: right;">
                            <a href="<?= base_url('admin/listteacher') ?>" type="button" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>