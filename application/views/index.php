<section class="banner_slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="full">
					<div class="vertical-center">
						<div class="page_inform wow fadeInLeft" data-wow-duration="2s">

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text_align_center logo-center-find">
				<img style="height: 150px;" src="<?= base_url('assets/images/chatbot_center.png') ?>" alt="#">
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<? print_r($livre)?>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"></div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text_align_right">
				<div class="side_bar_blog">
					<div class="side_bar_search">
						<form action="<?= base_url('buscar') ?>" method="get">

							<div class="d-flex" style="margin:auto 25%; padding:25px 0">
								<p>Busca livre</p>
								<div class="form-check form-switch form-check-inline" style="margin:0px 10px">
									<input name="type" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"> 
								</div>
								<p>Busca por termo</p>
							</div>

							<div class="input-group stylish-input-group">
								<input type="text" name="s" class="form-control" placeholder="Buscar">
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