<div class="container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="height-200px">
            <div class="invoice-wrap">
                <div class="invoice-box">
                    <div class="invoice-header">
                        <div class="logo text-center">
                            <img src="vendors/images/deskapp-logo.png" alt="">
                        </div>
                    </div>
                    <h4 class="text-center mb-30 weight-600">KWITANSI</h4>
                    <div class="row pb-30">
                        <div class="col-md-6">
                            <h5 class="mb-15"><?= $kwitansi['nama_siswa'] ?></h5>
                            <p class="font-14 mb-5">Date : <strong class="weight-600"><?= $kwitansi['tgl_transaksi'] ?></strong></p>
                            <p class="font-14 mb-5">No. Kwitansi : <strong class="weight-600"><?= $kwitansi['id_transaksi'] ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <!-- <p class="font-14 mb-5"><?= $kwitansi['alamat'] ?></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="invoice-desc pb-30">
                        <div class="invoice-desc-head clearfix">
                            <div class="invoice-sub">Course</div>
                            <div class="invoice-subtotal">Subtotal</div>
                        </div>
                        <div class="invoice-desc-footer">
                            <ul>
                                <li class="clearfix">
                                    <div class="invoice-sub"><?= $kwitansi['nama_mapel'] ?></div>
                                    <div class="invoice-subtotal"><span class="weight-600">Rp <?= $kwitansi['harga_course'] ?></span></div>
                                </li>
                            </ul>
                        </div>
                        <div class="invoice-desc-footer">
                            <div class="invoice-desc-head clearfix">
                                <div class="invoice-sub">Status Pembayaran</div>
                                <div class="invoice-subtotal">Total Due</div>
                            </div>
                            <div class="invoice-desc-body">
                                <ul>
                                    <li class="clearfix">
                                        <div class="invoice-sub"><?= $kwitansi['status'] ?>
                                        </div>
                                        <div class="invoice-subtotal"><span class="weight-600 font-20 text-danger">Rp <?= $kwitansi['harga_course'] ?></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="noPrint">
                        <h4 class="text-center pb-20"><a href="<?= base_url('home/home') ?>" type="button" class="btn btn-danger btn-lg btn-block">Kembali</a></h4>
                    </div>
                </div>
            </div>