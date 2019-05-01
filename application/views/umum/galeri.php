<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$array_hari = array(0 => "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
	$array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("umum/_partials/head.php") ?>

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
			<h3 class="tittle">Galeri</h3>
			<div class="row inner-sec-wthree"><?php
			if (!empty($data) && count($data) >= 3) {
				for ($i=0; $i<(count($data)-(count($data)%3)); $i++) {
					$waktu = $data[$i]["created_time"];
					$hari = $array_hari[date("w", $waktu)];
					$tanggal = date("j", $waktu);
					$bulan = $array_bulan[date("n", $waktu)];
					$tahun = date("Y", $waktu);?>
	
					<div class="col-md-4 proj_gallery_grid d-flex  align-items-center" data-aos="zoom-in" style="padding: 0px;">
						<div class="section_1_gallery_grid" style="margin: 0px;">
							<a title="<?= $data[$i]["caption"]["text"] ?>" target="_blank" href="<?= $data[$i]["link"] ?>">
								<div class="section_1_gallery_grid1" style="padding: 1px;">
									<img src="<?= $data[$i]["images"]["standard_resolution"]["url"] ?>" alt=" " class="img-responsive" />
									<div class="proj_gallery_grid1_pos">
										<h3 class="pb-2"><?= $hari.", ".$tanggal." ".$bulan." ".$tahun ?></h3>
										<p>
											<span class="fa fa-heart" aria-hidden="true"></span>
											<?= $data[$i]["likes"]["count"] ?>
											&nbsp;&nbsp;&nbsp;
											<span class="fa fa-comments" aria-hidden="true"></span>
											<?= $data[$i]["comments"]["count"] ?>
										</p>
									</div>
								</div>
							</a>
						</div>
					</div><? } 
			} else { ?>

				<div class="col-sm-12 text-center">
					<h2>Galeri tidak ditemukan.</h2>
				</div><?php	} ?>
			
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