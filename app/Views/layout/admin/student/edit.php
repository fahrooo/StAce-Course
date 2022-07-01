<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Students</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/listteacher') ?>">List Student</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
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
                        <h4 class="text-blue h4">Edit Student</h4>
                    </div>
                </div>
                <div class="form-create">
                    <form class="create-subject mt-4" action="<?= base_url('admin/updatestudent'); ?>" method="post">
                    <div class="clearfix">
                            <div class="pull-left">
                                <h5 class="text-black h5">Data Student</h5>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Id Siswa</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control" type="text" name="id_siswa" value="<?= $siswa['id_siswa'] ?>" readonly>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('id_siswa'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Id Pengajar</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control" type="text" name="id_pengajar" value="<?= $siswa['id_pengajar'] ?>" readonly>
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
                                <input class="form-control" type="text" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('nama_siswa'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Jenis Kelamin</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio4" name="jk" value="Laki-Laki" <?= ($siswa['jk'] == 'Laki-Laki' ? 'checked' : 'Laki-Laki');?> class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadio4">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio5" name="jk" value="Perempuan" <?= ($siswa['jk'] == 'Perempuan' ? 'checked' : 'Perempuan');?> class="custom-control-input">
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
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Tempat Lahir</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="text" name="tmpt_lahir" value="<?= $siswa['tmpt_lahir'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('tmpt_lahir'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Tanggal Lahir</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control date-picker" name="tgl_lahir" placeholder="Select Date" type="text" value="<?= $siswa['tgl_lahir'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style=" color: red;">
                                <?= $error = $validation->getError('tgl_lahir'); ?>
                                </label>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="email" name="email" value="<?= $siswa['email'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('email'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Telephone</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="text" name="no_hp_siswa" value="<?= $siswa['no_hp_siswa'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('no_hp_siswa'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Alamat</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control" type="text" name="alamat"><?= $siswa['alamat'] ?></textarea>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('alamat'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr style="height: 1px; background-color: black;">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h5 class="text-black h5">Data Orang Tua</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Nama Orang Tua</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="text" name="nama_ortu" value="<?= $siswa['nama_ortu'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('nama_ortu'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Telephone</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="text" name="no_hp_ortu" value="<?= $siswa['no_hp_ortu'] ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('no_hp_ortu'); ?>
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