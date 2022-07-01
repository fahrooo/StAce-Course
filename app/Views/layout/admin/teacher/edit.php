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
                                <li class="breadcrumb-item active" aria-current="page">Edit Teacher</li>
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
                        <h4 class="text-blue h4">Edit Teacher</h4>
                    </div>
                </div>
                <div class="form-create">
                    <form class="create-subject mt-4" action="<?= base_url('admin/updateteacher'); ?>" method="post">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Kode Pengajar</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control" type="text" name="id_pengajar" value="<?= $pengajar['id_pengajar'] ?>" readonly>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('id_pengajar'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Nama Lengkap</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="text" name="nama_pengajar" value="<?= $pengajar['nama_pengajar'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('nama_pengajar'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Jenis Kelamin</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio4" name="jk" value="Laki-Laki" <?= ($pengajar['jk'] == 'Laki-Laki' ? 'checked' : 'Laki-Laki');?> class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadio4">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio5" name="jk" value="Perempuan" <?= ($pengajar['jk'] == 'Perempuan' ? 'checked' : 'Perempuan');?> class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio5">Perempuan</label>
                                </div>
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('jk'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Telephone</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="text" name="no_hp" value="<?= $pengajar['no_hp'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('no_hp'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="email" name="email" value="<?= $pengajar['email'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('email'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Alamat</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" type="text" name="alamat"><?= $pengajar['alamat'] ?></textarea>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('alamat'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Subject</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="custom-select col-12" name="kode_mapel">
                                    <option disabled selected="">Choose Subject</option>
                                    <?php
                                    foreach ($mapel as $m) { ?>
                                        <option value="<?= $m['kode_mapel'] ?>" <?= $m['kode_mapel'] == $pengajar['kode_mapel'] ? "selected" : "" ?>><?= $m['nama_mapel'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('kode_mapel'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="button-create" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="<?= base_url('admin/listteacher') ?>" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>