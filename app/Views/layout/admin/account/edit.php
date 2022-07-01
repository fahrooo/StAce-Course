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
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/listsubject') ?>">List Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
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
                        <h4 class="text-blue h4">Edit Account</h4>
                    </div>
                </div>
                <div class="form-create mt-4">
                    <?= form_open(base_url('admin/updateaccount')); ?>
                    <div class="form-group row" hidden>
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">ID User</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control" type="text" name="id_user" value="<?= $akun['id_user']; ?>">
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('id_user'); ?>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Nama Lengkap</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control" type="text" name="nama" value="<?= $akun['nama']; ?>">
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('nama'); ?>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Username</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control" type="text" name="username" value="<?= $akun['username']; ?>">
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('username'); ?>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control" type="text" name="email" value="<?= $akun['email']; ?>">
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('email'); ?>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size: 17px;">Role</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="mb-3">
                                <select class="custom-select col-12" name="role">
                                    <option disabled selected="">Choose Role</option>
                                    <option value="user" <?= 'user' == $akun['role'] ? "selected" : "" ?>>User</option>
                                    <option value="admin" <?= 'admin' == $akun['role'] ? "selected" : "" ?>>Admin</option>
                                </select>
                            </div>
                            <!-- Error -->
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <label style="color: red;">
                                    <?= $error = $validation->getError('role'); ?>
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