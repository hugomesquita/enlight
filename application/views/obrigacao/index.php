<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.min.css') ?>">
<section class="banner_slider" style="background: #090979;">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
				<div class="full">
					<div class="vertical-center">
						<div class="page_inform wow fadeInLeft" data-wow-duration="2s">
							<h2>Obrigações</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="section contant_section mt-5">
	<div class="container wow fadeIn" data-wow-duration="2s">
		<form action="<?= base_url('obrigacao') ?>" method="POST">
			<div class="row mb-5">
				<div class="col-md-2 col-sm-2 col-xs-12"> 
					<div class="form-group">
						<label for="anoBase">Ano-Base</label>
						<select class="form-control" id="anoBase" name="anoBase">
							<option value=''>Todos</option>
							<?php foreach($filters['anoBase'] as $f) { ?>
								<option value="<?=$f?>" <?php echo  set_select('anoBase', $f); ?>><?=$f?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="col-md-4 col-sm-3 col-xs-12">
					<div class="form-group">
						<label for="perfil">Agente</label>
						<select class="select-mult" id="perfil" name="perfil[]" multiple title="Todos">
							<?php foreach($filters['agente'] as $f) { ?>
								<option value="<?=$f->name?>" <?php echo set_select('perfil[]', $f->name); ?>><?=$f->name?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="col-md-2 col-sm-2 col-xs-12">
					<div class="form-group">
						<label for="evento">Classificação</label>
						<select class="form-control" id="evento" name="evento">
							<option value=''>Todos</option>
							<?php foreach($filters['evento'] as $f) { ?>
								<option value="<?=$f?>" <?php echo  set_select('evento', $f); ?>><?=$f?></option>
							<?php } ?>
						</select>
					</div> 
				</div>

				<div class="col-md-3 col-sm-2 col-xs-12">
					<div class="form-group">
						<label for="evento">Termo</label>
						<input class="form-control" id="termo" value="<?php echo set_value('termo',''); ?>" name="termo" /> 
					</div>
				</div>

				<div class="col-md-1 col-sm-1 col-xs-12">
					<button type="submit" class="btn btn-primary btn-enlight btn-sm">Buscar</button>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
							Eventos com Data
							<span class="badge badge-light bg-primary"><?= count($dados) ?></span>
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="eventos-tab" data-bs-toggle="tab" data-bs-target="#eventos" type="button" role="tab" aria-controls="profile" aria-selected="false">
							Todos os Eventos 
							<span class="badge badge-light bg-primary"><?= count($eventos) ?></span>
						</button>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div id="calendar" class="mt-5"></div>
					</div>
					<div class="tab-pane fade" id="obrigacoes" role="tabpanel" aria-labelledby="obrigacoes-tab">
						<div id="listView" class="mt-5">
							<ol class="list-group list-group-numbered">
								<?php foreach ($dados as $d) { ?>
									<li class="list-group-item d-flex justify-content-between align-items-start">
										<div class="ms-2 me-auto">
											<div class="fw-bold"><?= $d->name ?></div>
											<div class="fw-bold">Data: <?= date('d/m/Y', strtotime($d->date)) ?></div>
											<div class="fw-bold">Ano Base: <?= $d->baseyear ?></div>
											<?= $d->description ?>
										</div>
									</li>
								<?php } ?>
							</ol>
						</div>
					</div>

					<div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
						<div id="listView" class="mt-5">
							<ol class="list-group list-group-numbered">

							<?php foreach ($dados as $d) { ?>
									<li class="list-group-item d-flex justify-content-between align-items-start">
										<div class="ms-2 me-auto">
											<div class="fw-bold"><?= $d->name ?></div>
											<div class="fw-bold">Data: <?= date('d/m/Y', strtotime($d->date)) ?></div>
											<div class="fw-bold">Ano Base: <?= $d->baseyear ?></div>
											<?= $d->description ?>
										</div>
									</li>
								<?php } ?>

								<?php foreach ($eventos as $evt) { ?>
									<li class="list-group-item d-flex justify-content-between align-items-start">
										<div class="ms-2 me-auto">
											<div class="fw-bold"><?= $evt->evento ?></div>
											<div>Classificação: <?= $evt->classificacao ?></div>
											<div>Agente: <?= $evt->agente ?></div>
											<div>Prazo: <?= $evt->prazo ?></div>
											<div>Base Normativa: <?= $evt->base_normativa ?></div>											
										</div>
									</li>
								<?php } ?>

								
							</ol>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div id="calendarModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 id="modalTitle" class="modal-title" style="margin: 10px 0 10px 0;"></h4>
			</div>
			<div id="modalBody" class="modal-body">
				<p><small>Ano Base: </small><strong data-item-id="base"></strong></p>
				<small>Descrição: </small>
				<p><strong data-item-id="description"></strong></p>
				<p class="d-none">
					<a class="read_more" data-item-id="download" target="_blank">
						<i class="fa fa-download" aria-hidden="true"></i> Download
					</a>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
	$('.select-mult').selectpicker();
	document.addEventListener('DOMContentLoaded', function() {
		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			initialView: 'dayGridMonth',
			initialDate: '<?=$ano.'-'.date('m-d')?>',
			headerToolbar: {
				left: 'prev,next',
				center: 'title',
				right: 'dayGridMonth,dayGridWeek'
			},
			locale: 'pt-br',
			events: '<?= base_url('obrigacao/eventsJson') ?>',
			eventClick: function({
				event,
				jsEvent,
				view
			}) {
				$('#modalTitle').html(event.title);
				$('[data-item-id="base"]').html(event.extendedProps.base);
				$('[data-item-id="description"]').html(event.extendedProps.description);
				$('a[data-item-id="download"]').attr('href', event.extendedProps.url);
				$('#calendarModal').modal("show");
			},
		});
		calendar.render();
	});
</script>

