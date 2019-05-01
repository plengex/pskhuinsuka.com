<footer>
        <div class="container">
            <div class="row footer-top-w3layouts">
                <div class="col-lg-4 footer-grid-w3ls" data-aos="zoom-in"><?php
                    if (!empty($organisasi["tentang"])) { ?>

                    <div class="footer-title">
                        <h2>Tentang Kami</h2>
                    </div>
                    <div class="footer-text">
                        <p><?= $organisasi["tentang"] ?></p>

                    </div><?php } ?>
                    
                </div>
                <div class="col-lg-4 footer-grid-w3ls" data-aos="zoom-in"><?php
                    if (
                        !empty($organisasi["kontak"]["alamat"])
                        || !empty($organisasi["kontak"]["telepon"])
                        || !empty($organisasi["kontak"]["email"])
                    ) { ?>

                    <div class="footer-title">
                        <h3>Kontak Kami</h3>
                    </div>
                    <div class="footer-office-hour"><?php
                        if (!empty($organisasi["kontak"]["alamat"])) { ?>
                        <ul>
                            <li class="hd">Alamat :</li>
                            <li><?= $organisasi["kontak"]["alamat"] ?></li>
                        </ul><?php } 
                        if (!empty($organisasi["kontak"]["telepon"])) { ?>

                        <ul>
                            <li class="hd">Telepon:</li>
                            <li><?= $organisasi["kontak"]["telepon"] ?></li>
                        </ul><?php }
                        if (!empty($organisasi["kontak"]["email"])) { ?>

                        <ul>
                            <li class="hd">Email:
                                <a href="mailto:<?= $organisasi["kontak"]["email"] ?>"><?= $organisasi["kontak"]["email"] ?></a>
                            </li>
                        </ul><?php } } ?>

                    </div>
                </div>
                <div class="col-lg-4 footer-grid-w3ls" data-aos="zoom-in">
                    <div class="footer-title">
                        <h3>Berlangganan</h3>
                    </div>
                    <form action="#" method="post" class="newsletter">
                        <input class="email" type="email" placeholder="Email anda..." required="">
                        <button class="btn1">
							<i class="far fa-envelope"></i>
						</button>
                    </form>
                    <div class="clearfix"></div>
                </div>

            </div>

        </div>
    </footer>