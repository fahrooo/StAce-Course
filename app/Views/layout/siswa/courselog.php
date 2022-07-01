<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Our Courses</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('home/home') ?>">Home</a></li>
                                        <li class="breadcrumb-item"><a>Courses</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Courses area start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Our Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($course as $crs) { ?>
                    <div class="col-lg-4">
                        <div class="properties properties2 mb-30">
                            <div class="properties__card">
                                <div class="properties__img overlay1">
                                    <a href="#"><img src="<?= base_url('imagescourse/' . $crs['foto_course']) ?>" alt=""></a>
                                </div>
                                <div class="properties__caption">
                                    <p>Programming</p>
                                    <h3><a href="#"><?= $crs['nama_mapel'] ?></a></h3>
                                    <p><?= $crs['nama_pengajar'] ?></p>
                                    <div class="properties__footer d-flex justify-content-between align-items-center">
                                        <div class="restaurant-name">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half"></i>
                                                <p><span>(4.5)</span></p>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span>Rp <?= $crs['harga_course'] ?></span>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('home/daftarcourse/' . $crs['id_pengajar']) ?>" class="border-btn border-btn2">Daftar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Courses area End -->
                <!-- ? services-area -->
                <div class="services-area services-area2 section-padding40">
                    <div class="container">
                        <div class="row justify-content-sm-center">
                            <div class="col-lg-4 col-md-6 col-sm-8">
                                <div class="single-services mb-30">
                                    <div class="features-icon">
                                        <img src="<?= base_url('assets/img/icon/icon1.svg') ?>" alt="">
                                    </div>
                                    <div class="features-caption">
                                        <h3>10+ courses</h3>
                                        <p>Pelajari berbagai ilmu.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-8">
                                <div class="single-services mb-30">
                                    <div class="features-icon">
                                        <img src="<?= base_url('assets/img/icon/icon2.svg') ?>" alt="">
                                    </div>
                                    <div class="features-caption">
                                        <h3>Expert instructors</h3>
                                        <p>Mentor dengan sertifikat resmi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-8">
                                <div class="single-services mb-30">
                                    <div class="features-icon">
                                        <img src="<?= base_url('assets/img/icon/icon3.svg') ?>" alt="">
                                    </div>
                                    <div class="features-caption">
                                        <h3>Life time access</h3>
                                        <p>Bisa diakses kapanpun.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</main>