<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("pengurus/_partials/head.php") ?>
    
    </head>
	<body class="h-100">
		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
                <?php $this->load->view("pengurus/_partials/sidebar.php") ?>
				
                <!-- //sidebar -->

				<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
					<!-- navbar -->
                    <?php $this->load->view("pengurus/_partials/navbar.php") ?>

                    <!-- /navbar -->

                    <!-- field -->
                    <div class="error">
                        <div class="error__content">
                            <h2>404</h2>
                            <h3>Ups, ada yang salah!</h3>
                            <p>Halaman yang Anda minta tidak di temukan.</p>
                            <button id="kembali" type="button" class="btn btn-accent btn-pill">&larr; Kembali</button>
                        </div>
                    </div>
                    <!-- //field -->
				</main>
			</div>
        </div>

        <!-- javascript -->
        <?php $this->load->view("pengurus/_partials/javascript.php") ?>
        
        <script>
            $(document).ready(function() {
                $("#kembali").click(function(){
                    window.location.assign(`<?= base_url("pengurus") ?>`);
                });
            });
        </script>
        <!-- //javascript -->
	</body>
</html><?php exit; ?>