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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Teacher</li>
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
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">List Teacher</h4>
                    <a href="<?= base_url('admin/createteacher') ?>" type="button" class="btn btn-success float-right"><i class="icon-copy fa fa-plus" aria-hidden="true"></i> Add</a>
                </div>
                <br>
                <br>
                <div class="pb-20">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Teacher</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>email</th>
                                <th>Subject</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengajar as $user) { ?>
                                <tr>
                                    <td class="table-plus"><?= $no++; ?></td>
                                    <td><?= $user['id_pengajar']; ?></td>
                                    <td><?= $user['nama_pengajar']; ?></td>
                                    <td><?= $user['jk']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['nama_mapel']; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('admin/detailteacher/' . $user['id_pengajar']) ?>"><i class="dw dw-eye"></i> View</a>
                                                <a class="dropdown-item" href="<?= base_url('admin/editteacher/' . $user['id_pengajar']) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="<?= base_url('admin/deleteteacher/' . $user['id_pengajar']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data teacher <?= $user['nama_pengajar']; ?>?')"><i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <th>No</th>
                            <th>Kode Teacher</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>email</th>
                            <th>Subject</th>
                            <th class="datatable-nosort">Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>