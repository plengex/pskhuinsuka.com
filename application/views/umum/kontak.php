<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("umum/_partials/head.php") ?>
    
    <link href="<?= base_url("assets/umum/") ?>css/contact.css" rel="stylesheet" type="text/css" />

    <style>
        .text-wrap {
            word-wrap: break-word; 
        }
    </style>
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
        <div class="container">
            <h3 class="tittle">Kontak Kami</h3>

            <div class="row inner-sec-wthree"><?php if ($organisasi["kontak"]["peta"]) { ?>
                <div class="contact-map">
                    <iframe src="<?= $organisasi["kontak"]["peta"] ?>" class="map" style="border:0" allowfullscreen=""></iframe>
                </div><?php } ?>

                <div class="col-sm-4" style="padding: 10px;">
                    <div class="icon_info" style="background: black; height: 100%;">
                        <div class="bottom-sub-grid text-center aos-init aos-animate" data-aos="zoom-in">
                            <div class="bt-icon">
                                <span class="fas fa-map-marker-alt"></span>
                            </div>
                            <br>
                            <h3 class="sub-tittle" style="color: white;">Alamat</h3>
                            <p class="text-wrap"><?= !empty($organisasi["kontak"]["alamat"]) ? $organisasi["kontak"]["alamat"] : "&mdash;"  ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="padding: 10px;">
                    <div class="icon_info" style="background: black; height: 100%;">
                        <div class="bottom-sub-grid text-center aos-init aos-animate" data-aos="zoom-in">
                            <div class="bt-icon">
                                <span class="fas fa-phone-volume"></span>
                            </div>
                            <br>
                            <h3 class="sub-tittle" style="color: white;">Telepon</h3>
                            <p class="text-wrap"><?= !empty($organisasi["kontak"]["telepon"]) ? $organisasi["kontak"]["telepon"] : "&mdash;"  ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="padding: 10px;">
                    <a href="mailto:<?= !empty($organisasi["kontak"]["email"]) ? $organisasi["kontak"]["email"] : ""  ?>">
                        <div class="icon_info" style="background: black; height: 100%;">
                            <div class="bottom-sub-grid text-center aos-init aos-animate" data-aos="zoom-in">
                                <div class="bt-icon">
                                    <span class="far fa-envelope"></span>
                                </div>
                                <br>
                                <h3 class="sub-tittle" style="color: white;">Email</h3>
                                <p class="text-wrap"><?= !empty($organisasi["kontak"]["email"]) ? $organisasi["kontak"]["email"] : "&mdash;"  ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-4" style="padding: 10px;">
                    <a href="//www.facebook.com/<?= !empty($organisasi["kontak"]["facebook"]) ? $organisasi["kontak"]["facebook"] : ""  ?>">
                        <div class="icon_info" style="background: black; height: 100%;">
                            <div class="bottom-sub-grid text-center aos-init aos-animate" data-aos="zoom-in">
                                <div class="bt-icon" style>
                                    <span class="fab fa-facebook-f"></span>
                                </div>
                                <br>
                                <h3 class="sub-tittle" style="color: white;">Facebook</h3>
                                <p class="text-wrap">www.facebook.com/<?= !empty($organisasi["kontak"]["facebook"]) ? $organisasi["kontak"]["facebook"] : ""  ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4" style="padding: 10px;">
                    <a href="//www.twitter.com/<?= !empty($organisasi["kontak"]["twitter"]) ? $organisasi["kontak"]["twitter"] : ""  ?>">
                        <div class="icon_info" style="background: black; height: 100%;">
                            <div class="bottom-sub-grid text-center aos-init aos-animate" data-aos="zoom-in">
                                <div class="bt-icon" style>
                                    <span class="fab fa-twitter"></span>
                                </div>
                                <br>
                                <h3 class="sub-tittle" style="color: white;">Twitter</h3>
                                <p class="text-wrap">www.twitter.com/<?= !empty($organisasi["kontak"]["twitter"]) ? $organisasi["kontak"]["twitter"] : ""  ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4" style="padding: 10px;">
                    <a href="//www.instagram.com/channel/<?= !empty($organisasi["kontak"]["instagram"]) ? $organisasi["kontak"]["instagram"] : ""  ?>">
                        <div class="icon_info" style="background: black; height: 100%;">
                            <div class="bottom-sub-grid text-center aos-init aos-animate" data-aos="zoom-in">
                                <div class="bt-icon" style>
                                    <span class="fab fa-instagram"></span>
                                </div>
                                <br>
                                <h3 class="sub-tittle" style="color: white;">Instagram</h3>
                                <p class="text-wrap">www.instagram.com/<?= !empty($organisasi["kontak"]["instagram"]) ? $organisasi["kontak"]["instagram"] : ""  ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="contact_grid_right">
                    <br><br>
                    <h2>Silakan isi formulir ini untuk berkomunikasi dengan kami.</h2>
                    <form action="" method="POST">
                        <div class="contact_left_grid">
                            <input type="text" id="nama" name="nama" placeholder="Nama" required="">
                            <input type="email" id="email" name="email" placeholder="Email" required="">
                            <input type="text" id="judul" name="judul" placeholder="Judul" required="">
                            <textarea id="pesan" name="pesan" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Pesan...';}" required="">Pesan...</textarea>
                            <button type="button" id="kirim" class="col-md-12" style="background-color: #30c39e; outline: none; color: #fff; font-size: 14px; padding: 20px 0; border: none; letter-spacing: 2px; cursor: pointer; text-transform: uppercase; font-weight: 600">Kirim</button>
                        </div>
                    </form>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var site_api = `<?= $api ?>`;
        
        $(document).ready(function() {
            $("#kirim").click(function() {
                $.ajax({
                    url: site_api+"/pesan",
                    dataType: "json",
                    type: "POST",
                    data : {
                        "nama": $("#nama").val(),
                        "email": $("#email").val(),
                        "judul": $("#judul").val(),
                        "pesan": $("#pesan").val()
                    },
                    beforeSend: function (e) {
                        $("#kirim").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan pengiriman pesan...");
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            var judul = "Pesan berhasil dikirim."
                            var icon = "success";
                        } else {
                            var judul = "Pesan gagal dikirim."
                            var icon = "error";
                        }

                        swal({
                            title: judul,
                            text: response.keterangan,
                            icon: icon,
                            button: "Tutup",
                        });
                    },
                    error: function (jqXHR, exception) {
                        if (jqXHR.status === 0) {
                            keterangan = "Not connect (verify network).";
                        } else if (jqXHR.status == 404) {
                            keterangan = "Requested page not found.";
                        } else if (jqXHR.status == 500) {
                            keterangan = "Internal Server Error.";
                        } else if (exception === "parsererror") {
                            keterangan = "Requested JSON parse failed.";
                        } else if (exception === "timeout") {
                            keterangan = "Time out error.";
                        } else if (exception === "abort") {
                            keterangan = "Ajax request aborted.";
                        } else {
                            keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                        }

                        swal({
                            title: "Pesan gagal dikirim.",
                            text: keterangan,
                            icon: "error",
                            button: "Tutup",
                        })
                        .then((value) => {
                            window.location.assign(`<?= base_url() ?>`);
                        });
                    }
                });
            });
        });
    </script>
    <!-- //javascript -->
</body>

</html>