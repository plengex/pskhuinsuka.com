<div class="main-navbar sticky-top bg-white">
						<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
							<div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex"></div>
							<ul class="navbar-nav border-left flex-row ">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<img class="user-avatar rounded-circle mr-2" src="<?= base_url().$pengguna["foto"] ?>" style="width: 40px; height: 40px;" alt="User Avatar">
										<span class="d-none d-md-inline-block"><?= $pengguna["nama"] ?></span>
									</a>
									<div class="dropdown-menu dropdown-menu-small">
										<a class="dropdown-item" href="<?= base_url("pengurus/") ?>profil">
											<i class="material-icons">&#xE7FD;</i>
											Profil
										</a>
										<button type="button" class="btn dropdown-item text-danger" id="keluar">
											<i class="material-icons text-danger">&#xE879;</i>
											Keluar
										</button>
									</div>
								</li>
							</ul>
							<nav class="nav">
								<a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
									<i class="material-icons">&#xE5D2;</i>
								</a>
							</nav>
						</nav>

						<div id="status">
							
						</div>
					</div>