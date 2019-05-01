<?php
    defined("BASEPATH") OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("umum/_partials/head.php") ?>

    <style>
        pre {
            font-family: "M PLUS Rounded 1c", sans-serif;
            text-align: justify;
            font-size: 13pt;
            white-space: pre-wrap;       /* css-3 */
            white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
            white-space: -pre-wrap;      /* Opera 4-6 */
            white-space: -o-pre-wrap;    /* Opera 7 */
            word-wrap: break-word;       /* Internet Explorer 5.5+ */
        }<?php
    if (!empty($data["berita"])) {
        $i = 1;
        foreach ($data["berita"] as $berita) {
            $berita_foto[$i] = base_url("assets/berita/");
            if (@is_file("../pskhuinsuka.com/assets/berita/".$berita["berita_id"].".png")) {
                $berita_foto[$i] .= $berita["berita_id"];
            } else {
                $berita_foto[$i] .= "_standar";
            }
            $berita_foto[$i] .= ".png"; ?>


        .carousel-item<?= $i === 1 ? "" : ".item".$i ?> {
            background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= $berita_foto[$i] ?>) no-repeat;
            background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= $berita_foto[$i] ?>) no-repeat;
            background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= $berita_foto[$i] ?>) no-repeat;
            background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= $berita_foto[$i] ?>) no-repeat;
            background-size: cover;
        }<?php
            $i++;
        }
    } else { 
        $berita_foto = base_url("assets/gambar/organisasi/");
        if (@is_file("../pskhuinsuka.com/assets/gambar/organisasi/".$organisasi["periode"]."_landscape.png")) {
            $berita_foto .= $organisasi["periode"];
        } else {
            $berita_foto .= "_standar";
        }
        $berita_foto .= "_landscape.png"; ?>


        .carousel-item {
            background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= $berita_foto ?>) no-repeat;
            background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= $berita_foto ?>) no-repeat;
            background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= $berita_foto ?>) no-repeat;
            background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= $berita_foto ?>) no-repeat;
            background-size: cover;
        }<?php } ?>

    </style>
</head>
<body>    
    <!-- header -->
    <?php $this->load->view("umum/_partials/header.php") ?>

    <!-- //header -->

    <!-- banner -->
    <div class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators"><?php if (!empty($data["berita"]) && count($data["berita"]) > 1) {
                $i = 1;
                foreach ($data["berita"] as $berita) { ?>

                <li data-target="#carouselExampleIndicators" data-slide-to="0"<?= $i === 1 ? " class=\"active\"" : "" ?>></li><?php $i++; } } ?>

            </ol>
            <div class="carousel-inner" role="listbox"><?php if (!empty($data["berita"])) {
                $i = 1;
                foreach ($data["berita"] as $berita) { ?>

                <div class="carousel-item <?= $i === 1 ? "active" : "item".$i ?>">
                    <div class="carousel-caption">
                        <a href="<?= base_url() . "berita/" . date("Y/m", strtotime($berita["berita_waktu"]))."/".$berita["berita_id"]."/".@substr($berita["berita_judul"], 0, 30) ?>">
                        <h3 style="word-wrap: break-word; color: white;"><?= @strlen($berita["berita_judul"]) <= 48 ? $berita["berita_judul"] : @substr($berita["berita_judul"], 0, 47)."..." ?></h3>
                        </a>
                        <br><br>
                        <h5>
                            <i><?= date("l, d F Y", strtotime($berita["berita_waktu"])) ?> | <?= $berita["keanggotaan_nama"] ?></i>
                        </h5>
                    </div>
                </div><?php $i++; } } else { ?>

                <div class="carousel-item active">
                    <div class="carousel-caption">
                        <h3 style="word-wrap: break-word;"></h3>
                        <br><br>
                        <h5>
                            <i></i>
                        </h5>
                    </div>
                </div>

                <?php } ?>

            </div><?php
            if (!empty($data["berita"]) && count($data["berita"]) > 1) { ?>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
            </a><?php } ?>

        </div>
    </div>
    <!-- //banner -->

    <!-- field --><?php if (
        !empty($organisasi["sejarah"]) && !empty($organisasi["nama_panjang"])
        && !empty($organisasi["visi"]) && !empty($organisasi["misi"])) { ?>

    <!-- organisasi -->
    <section class="banner-bottom">
        <div class="container">
            <div class="row inner-sec-wthree"><?php if (!empty($organisasi["sejarah"])) { ?>

                <div class="col-lg-5 bt-bottom-info" data-aos="fade-right">
                    <h5><?= $organisasi["nama_panjang"] ?></h5>
                </div>
                <div class="col-lg-7 bt-bottom-info" data-aos="fade-left">
                    <pre><p><?= $organisasi["sejarah"] ?><p></pre>
                </div>
            </div><?php } if (!empty($organisasi["visi"]) && !empty($organisasi["misi"])) { ?>

            <div class="row inner-sec-wthree">
                <div class="col-lg-6 bottom-sub-grid text-center aos-init aos-animate" data-aos="zoom-in">
                    <div class="bt-icon">
                        <span class="fas fa-trophy"></span>
                    </div>
                    <h4 class="sub-tittle font-weight-bold">Visi Organisasi</h4>
                    <p><?= $organisasi["visi"] ?></p>
                    <p></p>
                </div>
                <div class="col-lg-6 bottom-sub-grid text-center aos-init aos-animate" data-aos="zoom-in">
                    <div class="bt-icon">
                        <span class="far fa-thumbs-up"></span>
                    </div>
                    <h4 class="sub-tittle font-weight-bold">Misi Organisasi</h4>
                    <p><?= $organisasi["misi"] ?></p>
                    <p></p>
                </div>
            </div><?php } ?>

        </div>
    </section>
    <!-- //organisasi --><? } if (!empty($data["jpendapat"])) { ?>


    <!-- divisi -->
    <section class="services">
        <div class="container">
            <h3 class="tittle">Divisi</h3>
            <div class="row inner-sec-wthree">
                <div class="col-lg-4 grid_info_main" data-aos="flip-left">
                    <div class="grid_info">
                        <div class="icon_info">
                            <h5><?= $data["divisi"][1]["divisi_keterangan"] ?></h5>
                            <p><?= $data["divisi"][1]["divisi_penjelasan"] ?></p>
                        </div>
                    </div>
                    <div class="grid_info second">
                        <div class="icon_info">
                            <h5><?= $data["divisi"][2]["divisi_keterangan"] ?></h5>
                            <p><?= $data["divisi"][2]["divisi_penjelasan"] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 grid_info_main mid" data-aos="flip-down">
                    <img src="<?= base_url().$data["portrait"] ?>" class="img-fluid" alt=" ">
                </div>
                <div class="col-lg-4 grid_info_main" data-aos="flip-right">
                    <div class="grid_info">
                        <div class="icon_info">
                            <h5><?= $data["divisi"][3]["divisi_keterangan"] ?></h5>
                            <p><?= $data["divisi"][3]["divisi_penjelasan"] ?></p>
                        </div>
                    </div>
                    <div class="grid_info second">
                        <div class="icon_info">
                            <h5><?= $data["divisi"][4]["divisi_keterangan"] ?></h5>
                            <p><?= $data["divisi"][4]["divisi_penjelasan"] ?></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- //divisi --><?php } if (!empty($data["jpendapat"])) { ?>


    <!-- jejak pendapat -->
    <section class="reviews_sec" id="testimonials">
        <h3 class="tittle cen">Jejak Pendapat</h3>
        <div class="inner-sec-wthree">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides"><?php for ($i=0; $i<count($data["jpendapat"]) ; $i++) { ?>

                        <li>
                            <div class="testimonials_grid">
                                <div class="testimonials_grid-inn">
                                    <img src="<?= base_url("assets/gambar/jejakpendapat/").(@is_file("../pskhuinsuka.com/assets/gambar/jejakpendapat/".($i+1).".png") ? ($i+1) : "_standar").".png" ?>" alt=" " class="img-fluid" style="height: 90px; width: 90px;" />
                                </div>
                                <h3><?= $data["jpendapat"][$i]["jpendapat_nama"] ?></h3>
                                <i><?= $data["jpendapat"][$i]["jpendapat_jabatan"] ?></i>
                                <p><?= $data["jpendapat"][$i]["jpendapat_pendapat"] ?></p>
                            </div>
                        </li> <?php } ?>

                    </ul>
                </div>
            </section>
        </div>
    </section>
    <!-- //jejak pendapat --><?php } ?>

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

    <!-- stats -->
    <script src="<?= base_url("assets/umum/") ?>js/jquery.waypoints.min.js"></script>
    <script src="<?= base_url("assets/umum/") ?>js/jquery.countup.js"></script>
    <script>
        $('.counter').countUp();

    </script>
    <!-- //stats -->
</body>

</html>