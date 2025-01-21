<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center justify-content-between flex-wrap">
			<div class="mb-3 mb-xl-0">
				<h3 class="card-title">Lista de Ciclos</h3>
			</div>
			<div class="mb-3 mb-xl-0">
				<a href="<?= base_url($tela . 'cadastro') ?>" class="btn btn-success">
					Adicionar
				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<?= $this->session->flashdata('register') ?>
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-hover" id="DataTableResult">
						<thead>
							<tr>
								<th scope="col" style="width:10%">#</th>
								<th scope="col">Nome</th>
								<th scope="col">Ordem</th>
								<th style="width:10%"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rows as $r) { ?>
								<tr>
									<td><?= $r->id; ?></td>
									<td><?= $r->name; ?></td>
									<td><?= $r->order; ?></td>
									<td>
										<div class="d-flex gap-3">
											<a href="<?= base_url($tela . $r->id . '') ?>" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Editar">
												<i class="ti-pencil font-size-18"></i>
											</a>
											<a href="javascript:void(0);" 
											   class="text-danger" 
											   data-bs-toggle="tooltip" 
											   data-bs-placement="top" 
											   title="" 
											   data-remote="<?= base_url($tela . 'save?Op=D&token='.$r->id . '') ?>"
											   data-bs-original-title="Excluir" 
											   data-item-token="<?=$r->id?>"
											   data-item-id="delete">
												<i class="ti-trash font-size-18"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
	$('#DataTableResult').DataTable();
</script>