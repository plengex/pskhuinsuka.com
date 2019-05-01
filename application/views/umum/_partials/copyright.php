<div class="copyright">
        <div class="container">
            <div class="copyrighttop" data-aos="fade-left">
                <ul><?php
                    if (
                        !empty($organisasi["kontak"]["facebook"])
                        || !empty($organisasi["kontak"]["twitter"])
                        || !empty($organisasi["kontak"]["instagram"])
                        || !empty($organisasi["kontak"]["youtube"])
                    ) { ?>

                    <li>
                        <h4>Ikuti kami di:</h4>
                    </li><?php
                    if (!empty($organisasi["kontak"]["facebook"])) { ?>

                    <li>
                        <a class="facebook" href="//www.facebook.com/<?= $organisasi["kontak"]["facebook"] ?>">
							<i class="fab fa-facebook-f"></i>
						</a>
                    </li><?php }
                    if (!empty($organisasi["kontak"]["twitter"])) { ?>

                    <li>
                        <a class="facebook" href="//www.twitter.com/<?= $organisasi["kontak"]["twitter"] ?>">
							<i class="fab fa-twitter"></i>
						</a>
                    </li><?php }
                    if (!empty($organisasi["kontak"]["instagram"])) { ?>

                    <li>
                        <a class="facebook" href="//www.instagram.com/<?= $organisasi["kontak"]["instagram"] ?>">
							<i class="fab fa-instagram"></i>
						</a>
                    </li><?php }
                    if (!empty($organisasi["kontak"]["youtube"])) { ?>

                    <li>
                        <a class="facebook" href="//www.youtube.com/channel/<?= !empty($organisasi["kontak"]["youtube"]) ? $organisasi["kontak"]["youtube"] : "" ?>">
							<i class="fab fa-youtube"></i>
						</a>
                    </li><?php }  } ?>

                </ul>
            </div>
            <div class="copyrightbottom" data-aos="fade-right">
                <p><?= !empty($organisasi["nama_panjang"]) ? $organisasi["nama_panjang"] : "" ?> © <?= date("Y") ?> | Made with
                    <a href="//hmkk.org"><span class="fa fa-heart" aria-hidden="true"></span></a>
                    by
                    <a href="//www.facebook.com/tegal6etar" target="_blank">Teknik Informatika 2016</a>
                </p>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>