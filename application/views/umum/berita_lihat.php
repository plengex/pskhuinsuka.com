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
            <h3 class="tittle" style="word-wrap: break-word;"><?= $data[0]["berita_judul"] ?></h3>
            <h5 class="mt-4"><?= $data[0]["divisi_keterangan"] ?> | <?= $data[0]["berita_waktu"] ?></h5>
            <div class="row inner-sec-wthree m-0"><?php
                if (@is_file("../pskhuinsuka.com/assets/berita/".$data[0]["berita_id"].".png")) { ?>
                    <div class="d-flex justify-content-center text-center col-md-12 mt-4">
                        <img src="<?= base_url("assets/berita/").$data[0]["berita_id"].".png"?>" alt="Gambar Berita"  style="height: 100%; max-width: 1000px;">
                    </div>
                <?php } ?>
                <div class="mt-3">
                    <h4>
                        <p style="text-align: justify">
                            <?= $data[0]["berita_isi"] ?>
                        </p>
                        <span>Penerbit: <?= $data[0]["keanggotaan_nama"] ?></span>
                    </h4>
                </div>
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