<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="<?= base_url('assets/images/logo-splash.svg') ?>" />
	<title>Painel - Enlight</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/vendor.bundle.base.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap4.css') ?>" />
	<!-- endinject -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-style.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.css') ?>" />
	<script src="//code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body>
	<div class="container-scroller">
		<div class="horizontal-menu">
			<nav class="navbar top-navbar col-lg-12 col-12 p-0">
				<div class="container">
					<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
						<a class="navbar-brand brand-logo" href="<?= base_url('painel/main') ?>">
							<img src="<?= base_url('assets/images/logo-enl.png') ?>" alt="logo" />
						</a>
						<a class="navbar-brand brand-logo-mini" href="<?= base_url('painel/main') ?>">
							<img src="<?= base_url('assets/images/logo-enl.png') ?>" alt="logo" />
						</a>
					</div>
					<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
						<ul class="navbar-nav navbar-nav-right">
							<li class="nav-item nav-profile dropdown">
								<a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
									<i class="ti-user"></i>
									<?= $this->session->userdata('name') ?>
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
									<a class="dropdown-item">
										<i class="ti-settings text-primary"></i>
										Mudar Senha
									</a>
									<a class="dropdown-item" href="<?= base_url('painel/login/logout') ?>">
										<i class="ti-power-off text-primary"></i>
										Logout
									</a>
								</div>
							</li>
						</ul>
						<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
							<span class="ti-menu"></span>
						</button>
					</div>
				</div>
			</nav>
			<nav class="bottom-navbar">
				<div class="container">
					<ul class="nav page-navigation">
						<!--<li class="nav-item">
							<a class="nav-link" href="<?= base_url('painel/main') ?>">
								<i class="ti-home menu-icon"></i>
								<span class="menu-title">Dashboard</span>
							</a>
						</li>-->
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ti-package menu-icon"></i>
								<span class="menu-title">Cadastros</span>
								<i class="menu-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/categorias') ?>">Categorias</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/ciclos') ?>">Ciclos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/palavrachave') ?>">Palavra Chave</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class=" ti-harddrives  menu-icon"></i>
								<span class="menu-title">Fontes de Dados</span>
								<i class="menu-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/artefatos') ?>">Artefatos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/termos') ?>">Termos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/significados') ?>">Significados</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="ti-harddrives   menu-icon"></i>
								<span class="menu-title">Obrigações</span>
								<i class="menu-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/agentes') ?>">Agentes</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/obrigacoes') ?>">Obrigações</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/obrigacoeseventos') ?>">Obrigações Eventos</a>
									</li>
								</ul>
							</div>
						</li>
						<!--<li class="nav-item">
							<a href="#" class="nav-link">
								<i class=" ti-lock  menu-icon"></i>
								<span class="menu-title">Controle de acesso</span>
								<i class="menu-arrow"></i>
							</a>
							<div class="submenu">
								<ul class="submenu-item">
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/perfis') ?>">Perfis</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('painel/usuarios') ?>">Usuários</a>
									</li>
								</ul>
							</div>
						</li>-->
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('painel/login/logout') ?>">
								<i class="ti-unlock  menu-icon"></i>
								<span class="menu-title">Sair do Sistema</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<nav class="bg-info" aria-label="breadcrumb">
					<div class="container">
						<ol class="breadcrumb bg-info">
							<li class="breadcrumb-item"><a href="<?= base_url('painel/main') ?>">Main</a></li>
							<li class="breadcrumb-item d-none active" aria-current="page">Data</li>
						</ol>
					</div>
				</nav>
				<div class="content-wrapper">
					<div class="container">
						<?= $contents ?>
					</div>
				</div>
				<!-- content-wrapper ends -->
				<footer class="footer">
					<div class="d-sm-flex justify-content-between justify-content-sm-between">
						<span class="text-muted">Copyright © 2023.
						</span>
					</div>
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="<?= base_url('assets/js/vendor.bundle.base.js') ?>"></script>
	<!-- endinject -->
	<!-- inject:js -->
	<script src="<?= base_url('assets/js/off-canvas.js') ?>"></script>
	<script src="<?= base_url('assets/js/hoverable-collapse.js') ?>"></script>
	<script src="<?= base_url('assets/js/template.js') ?>"></script>
	<script src="<?= base_url('assets/js/settings.js') ?>"></script>
	<script src="<?= base_url('assets/js/todolist.js') ?>"></script>
	<script src="<?= base_url('assets/js/tooltips.js') ?>"></script>
	<script src="<?= base_url('assets/js/sweetalert2.js') ?>"></script>
	<script src="<?= base_url('assets/js/app.js') ?>"></script>
	
	<!-- endinject -->
	<!-- End custom js for this page-->
</body>

</html>
