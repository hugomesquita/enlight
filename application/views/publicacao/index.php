<section class="banner_slider" style="background: #090979;">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
				<div class="full">
					<div class="vertical-center">
						<div class="page_inform wow fadeInLeft" data-wow-duration="2s">
							<h2>Publicações</h2>
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
						<form action="<?= base_url('publicacao') ?>" method="GET">
							<div class="input-group stylish-input-group">
								<input type="text" name="s" class="form-control" value="<?=$search?>" placeholder="Buscar Publicações">
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
	<div class="container wow fadeIn" data-wow-duration="2s">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php foreach ($rows as $r) { ?>
					<div class="artefato_section">
						<div class="artefato_feature_cantant light_silver_2">
							<p class="artefato_head"><?=$r->titulo?></p> 
							<p><?=$r->descricao?></p>
							<div class="bottom_info">
								<div class="pull-left">
									<?php if($r->caminhoArquivo !== ""){ ?>
									<a class="read_more" href="<?=base_url(''.$r->caminhoArquivo.'')?>" target="_blank">
										<i class="fa fa-download" aria-hidden="true"></i>
										Download
									</a>
									| 
									<?php } ?>
									<a class="read_more" href="<?=base_url('publicacao/descricao/'.$r->id.'')?>">
										LEIA MAIS
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