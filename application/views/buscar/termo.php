<section class="banner_slider" style="background: #090979;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="full">
					<div class="vertical-center">
						<div class="page_inform wow fadeInLeft" data-wow-duration="2s">
							<h2>Resultado de busca por termo: { <?= $chave ?> } </h2>
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
								<input name="type" checked type="checkbox" style="display:none"> 
								<input type="text" value="<?=$chave;?>" name="s" class="form-control" placeholder="Buscar">
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

<div class="section contant_section">
	<div class="container wow fadeIn mb-5" data-wow-duration="2s">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					<li class="nav-item" role="presentation">
						<button type="button" class="nav-link active" id="pills-glossario-tab nav-link" data-bs-toggle="pill" data-bs-target="#pills-glossario" type="button" role="tab" aria-controls="pills-glossario" aria-selected="true">
							Glossário <span class="badge badge-light bg-primary"><?= count($glossario) ?></span>
						</button>
					</li>

					<li class="nav-item" role="presentation">
						<button type="button" class="nav-link" id="pills-publicacao-tab" data-bs-toggle="pill" data-bs-target="#pills-publicacao" type="button" role="tab" aria-controls="pills-publicacao" aria-selected="false">
							Publicação <span class="badge badge-light bg-primary"><?= count($publicacao) ?></span>
						</button>
					</li>

					<li class="nav-item" role="presentation">
						<button type="button" class="nav-link" id="pills-legislacao-tab" data-bs-toggle="pill" data-bs-target="#pills-legislacao" type="button" role="tab" aria-controls="pills-legislacao" aria-selected="false">
							Legislação <span class="badge badge-light bg-primary"><?= count($legislacao) ?></span>
						</button>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>


<div class="tab-content" id="pills-tabContent">
	<div class="section contant_section tab-pane fade show active" id="pills-glossario" role="tabpanel" aria-labelledby="pills-glossario-tab">
		<div class="container wow fadeIn" data-wow-duration="2s">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page_inform wow fadeInLeft mb-4" data-wow-duration="2s">
						<h3>(<?= count($glossario) ?>) Resultado(s) de busca em Glossário: { <?= $chave ?> } </h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php

					foreach ($glossario as $r) {

						$param = [['campo' => 'termo_id', 'valor' => $r->id]];
						$ordem = ['campo' => 'significado', 'ordem' => 'ASC'];
						$detalhe = $this->SignificadosModel->filtrar($param, $ordem)->result_object();

					?>
						<div class="artefato_section">
							<div class="artefato_feature_cantant light_silver_2">
								<p class="artefato_head"><?= $r->termo ?></p>
  
								<?php foreach ($detalhe as $row) { ?>
									<blockquote>
										<em><?= $row->significado ?></em>
									</blockquote>
								<?php } ?>
							</div>
						</div>
					<?php }  ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section contant_section tab-pane fade" id="pills-publicacao" role="tabpanel" aria-labelledby="pills-publicacao-tab">
		<div class="container wow fadeIn" data-wow-duration="2s">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page_inform wow fadeInLeft mb-4" data-wow-duration="2s">
						<h3>(<?= count($publicacao) ?>) Resultado(s) de busca em Publicação: { <?= $chave ?> } </h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<?php foreach ($publicacao as $r) { ?>
						<div class="artefato_section">
							<div class="artefato_feature_cantant light_silver_2">
								<p class="artefato_head"><?= $r->titulo ?></p>
								<p><?= $r->descricao ?></p>
								<div class="bottom_info">
									<div class="pull-left">
										<a class="read_more" href="<?= base_url($r->caminhoArquivo) ?>" target="_blank">
											<i class="fa fa-download" aria-hidden="true"></i>
											Download
										</a>
										|
										<a class="read_more" href="<?= base_url('legislacao/descricao/' . $r->id) ?>">
											Leia mais
											<i class="fa fa-angle-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>


				</div>
			</div>
		</div>
	</div>

	<div class="section contant_section tab-pane fade" id="pills-legislacao" role="tabpanel" aria-labelledby="pills-legislacao-tab">
		<div class="container wow fadeIn" data-wow-duration="2s">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page_inform wow fadeInLeft mb-4" data-wow-duration="2s">
						<h3>(<?= count($legislacao); ?>) Resultado(s) de busca em Legislação: { <?= $chave ?> } </h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<?php foreach ($legislacao as $r) { ?>
						<div class="artefato_section">
							<div class="artefato_feature_cantant light_silver_2">
								<p class="artefato_head"><?= $r->titulo ?></p>
								<p><?= $r->descricao ?></p>
								<div class="bottom_info">
									<div class="pull-left">
										<a class="read_more" href="<?= base_url($r->caminhoArquivo) ?>" target="_blank">
											<i class="fa fa-download" aria-hidden="true"></i>
											Download
										</a>
										|
										<a class="read_more" href="<?= base_url('legislacao/1/' . $r->id.'/?s='.$chave.'') ?>">
											Leia mais
											<i class="fa fa-angle-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>


				</div>
			</div>
		</div>
	</div>
</div>

<script>
	//var elements = document.getElementsByClassName('tab-content');
	/*
	for (var i = 0; i < elements.length; i++) {
		if (elements[i].innerHTML.indexOf('<?= $chave ?>') > -1) {
			alert('found'); // popup
		}
	}*/
</script>