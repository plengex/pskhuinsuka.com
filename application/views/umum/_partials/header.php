<header>
        <div class="header_top" id="home">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="logo text-left">
                    <h1>
                        <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>" >
                        <img src="<?= base_url().$organisasi["logo"] ?>" class="fas fa-podcast mr-2" style="height: 40px;"> <?= $organisasi["nama_pendek"] ?></a>
                    </h1>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-lg-auto text-right">
                        <li class="nav-item<?= $menu["judul"] === "Beranda" ? " active": "" ?>">
                            <a class="nav-link" href="<?= base_url() ?>">
                                Beranda
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item<?= $menu["judul"] === "Artikel" ? " active": "" ?>">
                            <a class="nav-link" href="<?= base_url() ?>artikel">Artikel</a>
                        </li>
                        <li class="nav-item<?= $menu["judul"] === "Berita" ? " active": "" ?>">
                            <a class="nav-link tooltip-blog" href="<?= base_url() ?>berita">
                                Berita
                                <span>Baru</span>
                            </a>
                        </li>
                        <li class="nav-item<?= $menu["judul"] === "Kegiatan" ? " active": "" ?>">
                            <a class="nav-link" href="<?= base_url() ?>kegiatan">Kegiatan</a>
                        </li>
                        <li class="nav-item<?= $menu["judul"] === "Galeri" ? " active": "" ?>">
                            <a class="nav-link" href="<?= base_url() ?>galeri">Galeri</a>
                        </li>
                        <li class="nav-item<?= $menu["judul"] === "Berkas" ? " active": "" ?>">
                            <a class="nav-link" href="<?= base_url() ?>berkas">Berkas</a>
                        </li>
                        <li class="nav-item<?= $menu["judul"] === "Kontak" ? " active": "" ?>">
                            <a class="nav-link" href="<?= base_url() ?>kontak">Kontak</a>
                        </li>
                    </ul>
                    <form action="" method="POST" class="form-inline my-2 my-lg-0 search">
                        <input class="form-control mr-sm-1" type="search" placeholder="Cari berita..." name="cari" required>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>