<section class="banner_slider" style="background: #090979;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="full">
					<div class="vertical-center">
						<div class="page_inform wow fadeInLeft" data-wow-duration="2s">
							<h2>Resultado de busca livre: { <?= $chave ?> } </h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="side_bar_blog">
					<div class="side_bar_search">
						<form action="<?= base_url('buscar') ?>" method="get">
							<div class="input-group stylish-input-group">
								<input name="type"  type="checkbox" style="display:none"> 
								<input type="text" value="<?= $chave; ?>" name="s" class="form-control" placeholder="Buscar">

								<span class="input-group-addon">
									<button type="submit">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="tab-content" id="pills-tabContent">
	<div class="section contant_section tab-pane fade show active" id="pills-glossario" role="tabpanel" aria-labelledby="pills-glossario-tab">
		<div class="container wow fadeIn" data-wow-duration="2s">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page_inform wow fadeInLeft mb-4" data-wow-duration="2s">
						<h3> Resultado da busca Livre: { <?= $chave ?> } </h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="artefato_section">
						<div class="artefato_feature_cantant light_silver_2">
							<blockquote>
								<em data-item-id="livre"> Consultando IA aguarde... </em>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script>
	$.ajax({
		url: "https://enlight-homolog.uea.edu.br/api/answer_question",
		type: "POST",
		dataType : "json",
    	contentType: "application/json; charset=utf-8",
		data:  JSON.stringify({'question': '<?= $chave ?>'}),
		success: function(data) {
			$('[data-item-id="livre"]').html(data.answer);
			console.log(data);
		},
		error: function(data) {
			// alert("Algum erro ocorreu, consulte o log.");
			$('[data-item-id="livre"]').html('Algum erro ocorreu, consulte o log.');
		},
		complete: function() {
			loading.hide();
		}
	});
</script>