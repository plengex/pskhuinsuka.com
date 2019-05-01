<title><?= $menu["judul"] ?><?= !empty($organisasi["nama_panjang"]) ? " &mdash; ".$organisasi["nama_panjang"] : "" ?></title>
    <link href="<?= base_url().$organisasi["logo"] ?>" rel="icon" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Hukum, Studi Hukum, Ilmu Hukum, Pusat Studi, Konsultasi, Konsultasi Hukum." />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="<?= base_url("assets/umum/") ?>css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?= base_url("assets/umum/") ?>css/flexslider.css" type="text/css" media="screen" property="" />
    <link href="<?= base_url("assets/umum/") ?>css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= base_url("assets/umum/") ?>css/simpleLightbox.css" rel='stylesheet' type='text/css' />
    <link href="<?= base_url("assets/umum/") ?>css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:100,300,400,500,700,800" rel="stylesheet">

    <style>
        .reviews_sec {
            background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url("assets/") ?>gambar/organisasi/<?= $organisasi["periode"] ?>_landscape.png) no-repeat;
            background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url("assets/") ?>gambar/organisasi/<?= $organisasi["periode"] ?>_landscape.png) no-repeat;
            background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url("assets/") ?>gambar/organisasi/<?= $organisasi["periode"] ?>_landscape.png) no-repeat;
            background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url("assets/") ?>gambar/organisasi/<?= $organisasi["periode"] ?>_landscape.png) no-repeat;
            background-size: cover;
            padding: 7em 0;
            background-attachment: fixed;
        }

        .banner-inner {
            background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url("assets/") ?>gambar/organisasi/<?= $organisasi["periode"] ?>_landscape.png) no-repeat;
            background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url("assets/") ?>gambar/organisasi/<?= $organisasi["periode"] ?>_landscape.png) no-repeat;
            background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url("assets/") ?>gambar/organisasi/<?= $organisasi["periode"] ?>_landscape.png) no-repeat;
            background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?= base_url("assets/") ?>gambar/organisasi/<?= $organisasi["periode"] ?>_landscape.png) no-repeat;
            background-size: cover;
            min-height: 250px;
        }
    </style>