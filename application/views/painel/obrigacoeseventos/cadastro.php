<div class="card"> 
    <form action="<?= base_url($tela . 'save') ?>" method="POST" enctype="multipart/form-data" name="frmRegistroModal" id="frmRegistroModal<?= date('dmY') ?>" data-form="frmRegistroModal">
        <div class="card-body">
            <div class="row" style="padding:10px"> 
                <div class="col-sm-2">
                    <label class="col-form-label">Código *</label>
                    <input readonly name="Register[id]" value="<?= @$row->id ?>" type="text" class="form-control">
                </div> 

                <div class="col-sm-7">
                    <label class="col-form-label">Nome / Evento *</label>
                    <input required name="Register[evento]" value="<?= @$row->evento ?>" type="text" class="form-control"  />
                </div>

                <div class="col-sm-3">
                    <label class="col-form-label">Classificação</label>
                    <select require name="Register[classificacao]" class="form-control form-control-sm"> 
                        <option <?= ((@$row->classificacao == 'Comprovação') ? 'selected' : '') ?> value="Comprovação">Comprovação</option>
                        <option <?= ((@$row->classificacao == 'Deliberação') ? 'selected' : '') ?> value="Deliberação">Deliberação</option>
                        <option <?= ((@$row->classificacao == 'Fiscalização') ? 'selected' : '') ?> value="Fiscalização">Fiscalização</option>
                        <option <?= ((@$row->classificacao == 'Investimento') ? 'selected' : '') ?> value="Investimento">Investimento</option>
                        <option <?= ((@$row->classificacao == 'Penalização') ? 'selected' : '') ?> value="Penalização">Penalização</option>
                        <option <?= ((@$row->classificacao == 'Regulamentação') ? 'selected' : '') ?> value="Regulamentação">Regulamentação</option>
                        <option <?= ((@$row->classificacao == 'Vigência') ? 'selected' : '') ?> value="Vigência">Vigência</option>
                    </select>
                </div>

                <div class="col-sm-12 mt-2">
                    <label class="col-form-label">Agentes</label>
                    <select name="Register[agente][]" class="form-control form-control-sm" multiple>
                        <option></option>
                        <?php foreach ($agentes as $p) { ?>
                            <option <?= ((in_array($p->name, (array)@$row->agente)) ? 'selected' : '') ?> value="<?= $p->name ?>"><?= $p->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-sm-12 mt-2">
                    <label class="col-form-label">Prazo</label>
                    <input name="Register[prazo]" value="<?= @$row->prazo ?>" type="text" class="form-control"  />
                </div>


                <div class="col-sm-10 mt-2">
                    <label class="col-form-label">Base Normativa</label>
                    <input name="Register[base_normativa]" value="<?= @$row->base_normativa ?>" type="text" class="form-control"  />
                </div>

                <div class="col-sm-2 mt-2">
                    <label class="col-form-label">Ano Base</label>
                    <input name="Register[ano_base]" value="<?= @$row->ano_base ?>" type="text" class="form-control"  />
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
        <input name="Op" type="hidden" value="<?= (@$row->id == '' ? 'I' : 'E') ?>" />
    </form> 
</div>
 