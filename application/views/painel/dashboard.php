<div class="container">

	<div class="row">
		<div class="col-md-12 grid-margin">
			<div class="row">
				<div class="col-12 col-xl-5 mb-4 mb-xl-0">
					<h4 class="font-weight-bold">Olá, <?= $this->session->userdata('name') ?>!</h4>
					<h4 class="font-weight-normal mb-0">Bem vindo ao Enlight,</h4>
				</div>
				<div class="col-12 col-xl-7">
					<div class="d-flex align-items-center justify-content-between flex-wrap">
						<div class="border-right pe-4 mb-3 mb-xl-0">
							<p class="text-muted">Palavras Chaves</p>
							<h4 class="mb-0 font-weight-bold">0</h4>
						</div>
						<div class="border-right pe-4 mb-3 mb-xl-0">
							<p class="text-muted">Termos</p>
							<h4 class="mb-0 font-weight-bold">0</h4>
						</div>
						<div class="border-right pe-4 mb-3 mb-xl-0">
							<p class="text-muted">Publicações</p>
							<h4 class="mb-0 font-weight-bold">0</h4>
						</div>
						<div class="pe-3 mb-3 mb-xl-0">
							<p class="text-muted">Usuários</p>
							<h4 class="mb-0 font-weight-bold">0</h4>
						</div>
						<div class="pe-3 mb-3 mb-xl-0">
							<p class="text-muted">Acessos</p>
							<h4 class="mb-0 font-weight-bold">0</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-title text-md-center text-xl-left">Obrigações</p>
					<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
						<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3>
						<i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					</div>
					<p class="mb-0 mt-2 text-warning">2.00% <span class="text-black ms-1"><small>(30 dias)</small></span></p>
				</div>
			</div>
		</div>
		<div class="col-md-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-title text-md-center text-xl-left">Pesquisas</p>
					<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
						<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">47033</h3>
						<i class="ti-search icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					</div>
					<p class="mb-0 mt-2 text-danger">0.22% <span class="text-black ms-1"><small>(30 dias)</small></span></p>
				</div>
			</div>
		</div>
		<div class="col-md-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-title text-md-center text-xl-left">Downloads</p>
					<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
						<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">40016</h3>
						<i class="ti-download icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					</div>
					<p class="mb-0 mt-2 text-success">10.00%<span class="text-black ms-1"><small>(30 dias)</small></span></p>
				</div>
			</div>
		</div>
		<div class="col-md-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-title text-md-center text-xl-left">Transições</p>
					<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
						<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">61344</h3>
						<i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					</div>
					<p class="mb-0 mt-2 text-success">22.00%<span class="text-black ms-1"><small>(30 dias)</small></span></p>
				</div>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card position-relative">
				<div class="card-body">
					<p class="card-title">Apontamentos Mensais</p>
					<div class="row"> 
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-7">
									<div class="table-responsive mb-3 mb-md-0">
										<table class="table table-borderless report-table">
											<tbody>
												<tr>
													<td class="text-muted">Inovações Tecnológicas</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">613</h5>
													</td>
												</tr>
												<tr>
													<td class="text-muted">Desenvolvimento Tecnológico</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">483</h5>
													</td>
												</tr>
												<tr>
													<td class="text-muted">Investimento</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">824</h5>
													</td>
												</tr>
												<tr>
													<td class="text-muted">Incentivos</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">564</h5>
													</td>
												</tr>

												<tr>
													<td class="text-muted">Pesquisa, Desenvolvimento e Inovação</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">560</h5>
													</td>
												</tr>
												<tr>
													<td class="text-muted">Benefício fiscal</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">793</h5>
													</td>
												</tr>
												





												<tr>
													<td class="text-muted">indicadores de resultados</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">483</h5>
													</td>
												</tr>
												<tr>
													<td class="text-muted">plano de reinvestimento</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">824</h5>
													</td>
												</tr>
												<tr>
													<td class="text-muted">Decreto Regulamentador</td>
													<td class="w-100 px-0">
														<div class="progress progress-md mx-4">
															<div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</td>
													<td>
														<h5 class="font-weight-bold mb-0">564</h5>
													</td>
												</tr> 
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-md-5 mt-3">
									<div class="chartjs-size-monitor">
										<div class="chartjs-size-monitor-expand">
											<div class=""></div>
										</div>
										<div class="chartjs-size-monitor-shrink">
											<div class=""></div>
										</div>
									</div>
									<canvas id="south-america-chart" style="display: block; width: 382px; height: 191px;" height="191" class="chartjs-render-monitor" width="382"></canvas>
									<div id="south-america-legend">
										<div class="report-chart">
											<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
												<div class="d-flex align-items-center">
													<div class="me-3" style="width:20px; height:20px; border-radius: 50%; background-color: #ffc100"></div>
													<p class="mb-0">Offline sales</p>
												</div>
												<p class="mb-0">495343</p>
											</div>
											<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
												<div class="d-flex align-items-center">
													<div class="me-3" style="width:20px; height:20px; border-radius: 50%; background-color: #248afd"></div>
													<p class="mb-0">Online sales</p>
												</div>
												<p class="mb-0">630983</p>
											</div>
											<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
												<div class="d-flex align-items-center">
													<div class="me-3" style="width:20px; height:20px; border-radius: 50%; background-color: #71c016"></div>
													<p class="mb-0">Returns</p>
												</div>
												<p class="mb-0">290831</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>

<script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>