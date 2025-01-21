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
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
							Eventos com Data
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
						Eventos com Data
						</button>
					</li> 
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">.a.</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">.b..</div> 
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
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>



<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
	/*
	document.addEventListener('DOMContentLoaded', function() {
		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			initialView: 'dayGridYear',
			headerToolbar: {
				left: 'prev,next',
				center: 'title',
				right: 'dayGridYear,dayGridWeek,dayGridDay'
			},
			locale: 'pt-br',
			events: '<?= base_url('obrigacao/eventsJson') ?>',
			eventClick: function({ event, jsEvent, view }) { 
				$('#modalTitle').html(event.title);
				$('[data-item-id="base"]').html(event.extendedProps.base);
				$('[data-item-id="description"]').html(event.extendedProps.description);
				$('a[data-item-id="download"]').attr('href', event.extendedProps.url);
				$('#calendarModal').modal("show");
			},
		});
		calendar.render();
	});
	*/
</script>