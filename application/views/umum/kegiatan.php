<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?= base_url("assets/kegiatan/") ?>css/reset.css">
    <?php $this->load->view("umum/_partials/head.php") ?>
    
    <link rel="stylesheet" href="<?= base_url("assets/kegiatan/") ?>css/style.css">
</head>

<body>
    <!-- header -->
    <?php $this->load->view("umum/_partials/header.php") ?>

    <!-- //header -->
    
    <!-- breadcrumb -->
    <?php $this->load->view("umum/_partials/breadcrumb.php") ?>

    <!-- //breadcrumb -->
    
    <!-- field -->
    <section class="cd-horizontal-timeline">
        <h3 class="tittle">Kegiatan</h3><?php if (!empty($data)) { ?>

        <div class="timeline">
            <div class="events-wrapper">
                <div class="events">
                    <ol><?php
                    foreach ($data as $kegiatan) {
                        if (strtotime($kegiatan["kegiatan_tanggal"]) <= strtotime(date("Y-m-d"))) {
                            $selected = $kegiatan["kegiatan_tanggal"];
                        }
                    }

                    foreach ($data as $kegiatan) { ?>

                        <li>
                            <a href="#0" data-date="<?= date("d/m/Y", strtotime($kegiatan["kegiatan_tanggal"])); ?>"<?= ($kegiatan["kegiatan_tanggal"] === $selected) ? " class=\"selected\"" : "" ?>>
                                <?= date("d M", strtotime($kegiatan["kegiatan_tanggal"])); ?>

                            </a>
                        </li><?php } ?>

                    </ol>
                    <span class="filling-line" aria-hidden="true"></span>
                </div>
            </div>
                
            <ul class="cd-timeline-navigation">
                <li><a href="#0" class="prev inactive">Prev</a></li>
                <li><a href="#0" class="next">Next</a></li>
            </ul>
        </div>

        <div class="events-content" data-aos="fade-right">
            <ol><?php
                foreach ($data as $kegiatan) { ?>

                <li data-date="<?= date("d/m/Y", strtotime($kegiatan["kegiatan_tanggal"])); ?>"<?= ($kegiatan["kegiatan_tanggal"] === $selected) ? " class=\"selected\"" : "" ?>>
                    <h2><?= $kegiatan["kegiatan_nama"] ?></h2>
                    <em><?= date("F d, Y", strtotime($kegiatan["kegiatan_tanggal"])); ?></em>
                    <p><?= $kegiatan["kegiatan_keterangan"] ?></p>
                </li><?php } ?>

            </ol>
        </div><?php } else { ?>
            <div class="row inner-sec-wthree">
                <div class="col-sm-12 text-center">
                    <h2>Kegiatan tidak ditemukan.</h2>
                </div>
            </div>

            <div class="timeline">
                <div class="events-wrapper">
                    <div class="events">
                        <ol>
                            <li>
                                <a href="#0" data-date="" class="selected"></a>
                            </li>
                        </ol>
                        <span class="filling-line" aria-hidden="true"></span>
                    </div>
                </div>
            </div><?php } ?>

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

    <script src="<?= base_url("assets/kegiatan/") ?>js/main.js"></script>
</body>

</html>