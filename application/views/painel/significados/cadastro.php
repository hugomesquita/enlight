<div class="card">
    <form action="<?= base_url($tela . 'save') ?>" method="POST" enctype="multipart/form-data" name="frmRegistroModal" id="frmRegistroModal<?= date('dmY') ?>" data-form="frmRegistroModal">
        <div class="card-body">
            <div class="row" style="padding:10px">
                <div class="col-sm-2">
                    <label class="col-form-label">Código *</label>
                    <input readonly name="Register[id]" value="<?= $row->id ?>" type="text" class="form-control form-control-sm">
                </div>

                <div class="col-sm-10">
                    <label class="col-form-label">Significado*</label>
                    <input required name="Register[significado]" value="<?= $row->significado ?>" type="text" class="form-control form-control-sm" />
                </div>

                <div class="col-sm-12">
                    <label class="col-form-label">Artefato*</label>
                    <select required name="Register[artefato_id]" class="form-control form-control-sm">
                        <option></option>
                        <? foreach ($artefatos as $at) { ?>
                            <option <?= (($at->id == $row->artefato_id) ? 'selected' : '') ?> value="<?= $at->id ?>"><?=$at->titulo ?></option>
                        <? } ?>
                    </select>
                </div>

                <div class="col-sm-12">
                    <label class="col-form-label">Termos*</label>
                    <select required name="Register[termo_id]" class="form-control form-control-sm">
                        <option></option>
                        <? foreach ($termos as $c) { ?>
                            <option <?= (($c->id == $row->termo_id) ? 'selected' : '') ?> value="<?= $c->id ?>"><?= $c->id.' - '.$c->exemplo_textual ?></option>
                        <? } ?>
                    </select>
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