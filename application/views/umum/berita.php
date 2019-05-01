<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("umum/_partials/head.php") ?>

    <link href="<?= base_url("assets/umum/") ?>css/blog.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- header -->
    <?php $this->load->view("umum/_partials/header.php") ?>

    <!-- //header -->
    
    <!-- breadcrumb -->
    <?php $this->load->view("umum/_partials/breadcrumb.php") ?>

    <!-- //breadcrumb -->
    
    <!-- field -->
    <section class="services">
        <div class="container">
            <h3 class="tittle">Berita</h3>
            <div class="row inner-sec-wthree">
            <?php
            if (!empty($data)) {
            foreach ($data as $key => $berita) { ?>
                <article class="row align-items-center icon_info" style="padding: 0em 0em 1em 0em; margin: 1em;">
                    <div class="col-md-4 section_1_gallery_grid" data-aos="fade-right">
                        <a title="<?= $berita["berita_judul"] ?>" href="<?= base_url() . "berita/" . date("Y/m", strtotime($berita["berita_waktu"]))."/".$berita["berita_id"]."/".@substr($berita["berita_judul"], 0, 30) ?>">
                            <img src="<?= base_url("assets/berita/").(@is_file("../pskhuinsuka.com/assets/berita/".$berita["berita_id"].".png") ? $berita["berita_id"] : "_standar").".png"?>" class="img-fluid"  style="padding"/>
                            <div class="proj_gallery_grid1_pos">
                                <p><?= $berita["berita_waktu"] ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-8" data-aos="fade-left">
                        <a href="<?= base_url() . "berita/" . date("Y/m", strtotime($berita["berita_waktu"]))."/".$berita["berita_id"]."/".@substr($berita["berita_judul"], 0, 30) ?>">
                            <h5 style="font-size: 24pt;word-wrap: break-word;"><?= @strlen($berita["berita_judul"]) <= 41 ? $berita["berita_judul"] : @substr($berita["berita_judul"], 0, 40)."..." ?></h5>
                        </a>
                        <p>
                            Dipublikasi oleh
                            <a href="#" class="user-blog"><?= $berita["keanggotaan_nama"] ?></a>
                        </p>
                        <ul class="blog_list_info">
                            <li>
                                <a href="#">
                                    <span class="fa fa-tag" aria-hidden="true"></span>
                                    <?= $berita["berita_waktu"] ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </article>
            <?php } } else {?>

                <article class="blog-top-right col-sm-12 text-center">
                    <div class="col">
                        <h2>Berita tidak ditemukan.</h2>
                    </div>
                </article><?php } ?>

            </div>

            <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->
        </div>
    </section>

    <div class="flexslider">
       	<ul class="slides">
        	<li>
                <div class="testimonials_grid">
                    <p><br><br><br><br><br></p>
                </div>
            </li>
        </ul>
    </div>
    <!-- //field -->

    <!-- footer -->
    <?php $this->load->view("umum/_partials/footer.php") ?>

    <!-- //footer -->

    <!-- copyright -->
    <?php $this->load->view("umum/_partials/copyright.php") ?>

    <!-- //copyright -->

    <!-- javascript -->
    <?php $this->load->view("umum/_partials/javascript.php") ?>

    <!-- //javascript -->
</body>

</html>