<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $array_hari   = array(0 => "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $array_bulan  = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
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
            <h3 class="tittle">Artikel</h3>
            <div class="row inner-sec-wthree"><?php
            if (!empty($data)) {
            foreach ($data as $key => $artikel) {
                $key = $key+1;

                if (($key%6) === 1 || ($key%6) === 4) { ?>
                    
                <div class="col-lg-8 blog-sp" data-aos="zoom-in">
                    <article class="blog-x row">
                        <div class="col-md-6 blog-img">
                            <a href="<?= base_url().'artikel/'.date("Y/m", strtotime($artikel["artikel_waktu"]))."/".$artikel["artikel_id"]."/".@substr($artikel["artikel_judul"], 0, 30); ?>">
								<img src="<?= base_url("assets/")."artikel/".(@is_file("../pskhuinsuka.com/assets/artikel/".$artikel["artikel_id"].".png") ?  $artikel["artikel_id"] : "_standar").".png" ?>" class="img-responsive" style="height: 100%; width: 100%"/>
							</a>
                        </div>
                        <div class="col-md-6 blog_info">
                            <h5 class="text-justify" style="word-wrap: break-word;">
                                <a href="<?= base_url().'artikel/'.date("Y/m", strtotime($artikel["artikel_waktu"]))."/".$artikel["artikel_id"]."/".@substr($artikel["artikel_judul"], 0, 30); ?>"><?php  if (!empty($artikel["artikel_judul"])) {
                                    if (@strlen($artikel["artikel_judul"]) <= 70) {
                                        echo $artikel["artikel_judul"];
                                    } else {
                                        echo @substr($artikel["artikel_judul"], 0, 68)."...";
                                    }
                                } else {
                                    echo "&nbsp;";
                                } ?></a>
                            </h5>
                            <p>
                                Penerbit:
                                <a><?= $artikel["keanggotaan_nama"] ?></a>
                                <br><?= $artikel["divisi_keterangan"] ?>
                            </p><?php
                                $hari       = $array_hari[DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("w")];
                                $tanggal    = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("d");
                                $bulan      = $array_bulan[DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("n")];
                                $tahun      = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("Y");
                                $waktu      = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("(H:i:s")." WIB)";
                            ?>

                            <h4><?= $hari.", ".$tanggal." ".$bulan." ".$tahun."<br>".$waktu ?></h4>
                        </div>
                    </article><?php }
                else if (($key%6) === 2 || ($key%6) === 5) { ?>

                    <article class="blog-x br-mar row">
                        <div class="col-md-6 blog_info">
                            <h5 class="text-justify" style="word-wrap: break-word;">
                                <a href="<?= base_url().'artikel/'.date("Y/m", strtotime($artikel["artikel_waktu"]))."/".$artikel["artikel_id"]."/".@substr($artikel["artikel_judul"], 0, 30); ?>"><?php  if (!empty($artikel["artikel_judul"])) {
                                    if (@strlen($artikel["artikel_judul"]) <= 70) {
                                        echo $artikel["artikel_judul"];
                                    } else {
                                        echo @substr($artikel["artikel_judul"], 0, 68)."...";
                                    }
                                } else {
                                    echo "&nbsp;";
                                } ?></a>
                            </h5>
                            <p>
                                Penerbit:
                                <a><?= $artikel["keanggotaan_nama"] ?></a>
                                <br><?= $artikel["divisi_keterangan"] ?>
                            </p><?php
                                $hari       = $array_hari[DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("w")];
                                $tanggal    = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("d");
                                $bulan      = $array_bulan[DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("n")];
                                $tahun      = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("Y");
                                $waktu      = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("(H:i:s")." WIB)";
                            ?>

                            <h4><?= $hari.", ".$tanggal." ".$bulan." ".$tahun."<br>".$waktu ?></h4>
                        </div>
                        <div class="col-md-6 blog-img img1">
                            <a href="<?= base_url().'artikel/'.date("Y/m", strtotime($artikel["artikel_waktu"]))."/".$artikel["artikel_id"]."/".@substr($artikel["artikel_judul"], 0, 30); ?>">
                                <img src="<?= base_url("assets/")."artikel/".(@is_file("../pskhuinsuka.com/assets/artikel/".$artikel["artikel_id"].".png") ?  $artikel["artikel_id"] : "_standar").".png" ?>" class="img-responsive" style="height: 100%; width: 100%"/>
							</a>
                        </div>
                    </article>
                </div><?php }
                else if (($key%6) === 3 || ($key%6) === 0) { ?>

                <div class="col-lg-4 blog-side blog-top-right" data-aos="zoom-in">
                    <article class="blog-top-right">
                        <div class="blog-img">
                            <a href="<?= base_url().'artikel/'.date("Y/m", strtotime($artikel["artikel_waktu"]))."/".$artikel["artikel_id"]."/".@substr($artikel["artikel_judul"], 0, 30); ?>">
                                <img src="<?= base_url("assets/")."artikel/".(@is_file("../pskhuinsuka.com/assets/artikel/".$artikel["artikel_id"].".png") ?  $artikel["artikel_id"] : "_standar").".png" ?>" class="img-responsive" style="height: 100%; width: 100%"/>
							</a>
                        </div>
                        <div class="blog_info  blog-right">
                            <h5 class="text-justify" style="word-wrap: break-word;">
                                <a href="<?= base_url().'artikel/'.date("Y/m", strtotime($artikel["artikel_waktu"]))."/".$artikel["artikel_id"]."/".@substr($artikel["artikel_judul"], 0, 30); ?>"><?php  if (!empty($artikel["artikel_judul"])) {
                                    if (@strlen($artikel["artikel_judul"]) <= 70) {
                                        echo $artikel["artikel_judul"];
                                    } else {
                                        echo @substr($artikel["artikel_judul"], 0, 68)."...";
                                    }
                                } else {
                                    echo "&nbsp;";
                                } ?></a>
                            </h5>
                            <p>
                                Penerbit:
                                <a><?= $artikel["keanggotaan_nama"] ?></a>
                                <br><?= $artikel["divisi_keterangan"] ?>
                            </p><?php
                                $hari       = $array_hari[DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("w")];
                                $tanggal    = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("d");
                                $bulan      = $array_bulan[DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("n")];
                                $tahun      = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("Y");
                                $waktu      = DateTime::createFromFormat("Y-m-d H:i:s", $artikel["artikel_waktu"])->format("(H:i:s")." WIB)";
                            ?>

                            <h4><?= $hari.", ".$tanggal." ".$bulan." ".$tahun."<br>".$waktu ?></h4>
                        </div>
                    </article>
                </div><?php }
            } } else { ?>

                    <article class="blog-top-right col-sm-12 text-center">
                        <div class="col">
                            <h2>Artikel tidak ditemukan.</h2>
                        </div>
                    </article><?php } ?>

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
        </div>
    </section>

    <div class="flexslider">
       	<ul class="slides">
        	<li>
                <div class="testimonials_grid">
                    <p><br><br><br></p>
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