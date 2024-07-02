<div class="card">
    <form action="<?= base_url($tela . 'save') ?>" method="POST" enctype="multipart/form-data" name="frmRegistroModal" id="frmRegistroModal<?= date('dmY') ?>" data-form="frmRegistroModal">
        <div class="card-body">
            <div class="row" style="padding:10px">
                <div class="col-sm-2">
                    <label class="col-form-label">Código *</label>
                    <input readonly name="Register[id]" value="<?= $row->id ?>" type="text" class="form-control form-control-sm">
                </div>

                <div class="col-sm-6">
                    <label class="col-form-label">Titulo*</label>
                    <input required name="Register[titulo]" value="<?= $row->titulo ?>" type="text" class="form-control form-control-sm" />
                </div>
                <div class="col-sm-4">
                    <label class="col-form-label">Categoria*</label>
                    <select required name="Register[categoria_id]" class="form-control form-control-sm">
                        <option></option>
                        <? foreach ($categoria as $c) { ?>
                            <option <?= (($c->id == $row->categoria_id) ? 'selected' : '') ?> value="<?= $c->id ?>"><?= $c->nome ?></option>
                        <? } ?>
                    </select>
                </div>


                <div class="col-sm-6 mt-2">
                    <label class="col-form-label">URL</label>
                    <input name="Register[url]" value="<?= $row->url ?>" type="text" class="form-control form-control-sm" />
                </div>

                <div class="col-sm-6 mt-2">
                    <label class="col-form-label">Dependência (registro de origem)</label>
                    <select name="Register[pai_id]" class="form-control form-control-sm">
                        <option></option>
                        <? foreach ($parents as $p) { ?>
                            <option <?= (($p->id == $row->pai_id) ? 'selected' : '') ?> value="<?= $p->id ?>"><?= $p->titulo ?></option>
                        <? } ?>
                    </select>
                </div>
                

                <div class="col-sm-12 mt-2">
                    <label class="col-form-label">Descrição</label>
                    <textarea rows="10" name="Register[descricao]" class="form-control form-control-sm"><?= $row->descricao ?></textarea>
                </div>

                <div class="col-sm-12 mt-2">
                    <label class="col-form-label">Referência</label>
                    <textarea rows="10" name="Register[referencia]" class="form-control form-control-sm"><?= $row->referencia ?></textarea>
                </div>

                <div class="col-sm-12 mt-2">
                    <label class="col-form-label">Objetivo</label>
                    <textarea rows="10" name="Register[objetivo]" class="form-control form-control-sm"><?= $row->objetivo ?></textarea>
                </div>

                <div class="col-sm-12 mt-2">
                    <label class="col-form-label">Conclusão</label>
                    <textarea rows="10" name="Register[conclusao]" class="form-control form-control-sm"><?= $row->conclusao ?></textarea>
                </div>

                <div class="col-sm-12 mt-2">
                    <label class="col-form-label">Conteúdo</label>
                    <textarea rows="10" name="Register[conteudo]" class="form-control form-control-sm"><?= $row->conteudo ?></textarea>
                </div>


            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?= base_url($tela) ?>" class="btn btn-outline-danger">
                Cancelar
            </a>
            <button type="submit" class="btn btn-success">
                Salvar
            </button>
        </div>
        <input name="Op" type="hidden" value="<?= ($row->id == '' ? 'I' : 'E') ?>" />
    </form>
</div>