<div class="container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="height-200px">
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
                <h2 class="text-blue h2" style="text-align: center;">Masukkan Data Pendaftaran</h2>
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-black h4 mt-3">Course &nbsp; &nbsp;: <?= $course['nama_mapel'] ?></h4>
                        <h4 class="text-black h4">Pengajar : <?= $course['nama_pengajar'] ?></h4>
                    </div>
                </div>
                <hr style="height: 1px; background-color: black;">
                <div class="form-create">
                    <form class="create-subject mt-4" action="<?= base_url('home/addstudent'); ?>" method="post">
                    <div class="clearfix">
                            <div class="pull-left">
                                <h5 class="text-black h5">Data Student</h5>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Id Siswa</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control" type="text" name="id_siswa" value="<?= $max['id_siswa'] + 1 ?>" readonly>
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('id_siswa'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Nama Lengkap</label>
                            <div class="col-sm-12 col-md-7">
                                <input class="form-control" type="text" name="nama_siswa" value="<?= old('nama_siswa'); ?>">
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
                                    <input type="radio" id="customRadio4" name="jk" value="Laki-Laki" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadio4">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio5" name="jk" value="Perempuan" class="custom-control-input">
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
                                <input class="form-control" type="text" name="tmpt_lahir" value="<?= old('tmpt_lahir'); ?>">
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
                                <input class="form-control date-picker" name="tgl_lahir" placeholder="Select Date" type="text" value="<?= old('tgl_lahir'); ?>" autocomplete="off">
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
                                <input class="form-control" type="email" name="email" value="<?= old('email'); ?>">
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
                                <input class="form-control" type="text" name="no_hp_siswa" value="<?= old('no_hp_siswa'); ?>">
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
                                <textarea class="form-control" type="text" name="alamat"><?= old('alamat'); ?></textarea>
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
                                <input class="form-control" type="text" name="nama_ortu" value="<?= old('nama_ortu'); ?>">
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
                                <input class="form-control" type="text" name="no_hp_ortu" value="<?= old('no_hp_ortu'); ?>">
                                <!-- Error -->
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <label style="color: red;">
                                        <?= $error = $validation->getError('no_hp_ortu'); ?>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr style="height: 1px; background-color: black;">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h5 class="text-black h5">Data Course</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Pilih Course</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="custom-select col-12" name="id_pengajar">
                                    <option disabled selected="">Choose Course</option>
                                    <?php
                                    foreach ($pengajar as $m) { ?>
                                        <option disabled value="<?= $m['id_pengajar'] ?>" <?= $m['id_pengajar'] == $id_pengajar ? "selected" : "" ?>><?= $m['nama_mapel'] ?> - <?= $m['nama_pengajar'] ?></option>
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
                        <div class="button-create" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                            <a href="<?= base_url('home/courselog') ?>" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>