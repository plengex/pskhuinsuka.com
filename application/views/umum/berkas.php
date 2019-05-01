<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("umum/_partials/head.php") ?>
    
    <link href="<?= base_url("assets/umum/") ?>css/contact.css" rel='stylesheet' type='text/css' />

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
            <h3 class="tittle">Berkas</h3>

            <div class="row inner-sec-wthree">
                <?php if (!empty($data)) { ?>
                
                <div><?php
                    for ($i=1; $i<=count($data) ; $i++) { ?>

                    <h4 class="m-2">
                        <?= $i ?>. <a href="<?= $data[$i-1]["berkas_tautan"] ?>" target="_blank"><?= $data[$i-1]["berkas_nama"] ?></a>
                    </h4><?php } ?>

                </div><?php } else { ?>

                <div class="col-sm-12 text-center">
					<h2>Berkas tidak ditemukan.</h2>
                </div><?php } ?>

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