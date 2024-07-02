<section class="banner_slider" style="background: #090979;">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
				<div class="full">
					<div class="vertical-center">
						<div class="page_inform wow fadeInLeft" data-wow-duration="2s">
							<h2>Glossário</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row mt-3">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form action="<?= base_url('glossario') ?>" method="GET">
					<input type="submit" value="A" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="B" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="C" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="D" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="E" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />

					<input type="submit" value="F" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="G" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="H" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="I" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="J" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="K" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="L" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="M" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />

					<input type="submit" value="N" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="O" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="P" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="Q" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="R" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="S" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="T" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="U" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="V" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />

					<input type="submit" value="W" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="X" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="Y" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />
					<input type="submit" value="Z" name="initial" class="btn btn-outline-info text-info" style="height: 40px !important; line-height: 0px !important; min-width:36px !important" />


					
				</form>
			</div>
		</div>
	</div>
</section>

<div class="section contant_section">
	<div class="container wow fadeIn" data-wow-duration="2s">
		<div class="row mt-3">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


				<?php

				if(count($rows) > 0){

				foreach ($rows as $r) {

					$param = [['campo' => 'termo_id', 'valor' => $r->id]];
					$ordem = ['campo' => 'significado', 'ordem' => 'ASC'];
					$detalhe = $this->SignificadosModel->filtrar($param, $ordem)->result_object();

				?>
					<div class="artefato_section">
						<div class="artefato_feature_cantant light_silver_2">
							<p class="artefato_head"><?= $r->termo ?></p>

							<svg class="bd-placeholder-img card-img-top d-none" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#898999"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Sem ilustração</text></svg>
							<?php foreach ($detalhe as $row) { ?>
								<blockquote>
									<em><?= $row->significado ?></em> 
								</blockquote>
							<?php } ?>
						</div>
					</div>
				<?php }}else{ ?>
					<blockquote>Não há registros com essa inicial</blockquote>
				<?php } ?>
			</div>
		</div>
	</div>
</div>