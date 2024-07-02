<div class="card"> 
    <form action="<?= base_url($tela . 'save') ?>" method="POST" enctype="multipart/form-data" name="frmRegistroModal" id="frmRegistroModal<?= date('dmY') ?>" data-form="frmRegistroModal">
        <div class="card-body">
            <div class="row" style="padding:10px"> 
                <div class="col-sm-2">
                    <label>Código *</label>
                    <input readonly name="Register[id]" value="<?= $row->id ?>" type="text" class="form-control">
                </div> 

                <div class="col-sm-7">
                    <label>Nome*</label>
                    <input required name="Register[name]" value="<?= $row->name ?>" type="text" class="form-control"  />
                </div>

                <div class="col-sm-3">
                    <label>Data</label>
                    <input name="Register[date]" value="<?= $row->date ?>" type="date" class="form-control"  />
                </div>


                <div class="col-sm-12 mt-2">
                    <label class="col-form-label">Descrição</label>
                    <textarea rows="10" name="Register[description]" class="form-control form-control-sm"><?= $row->description ?></textarea>
                </div>


                <div class="col-sm-12">
                    <label>URL</label>
                    <input name="Register[url]" value="<?= $row->url ?>" type="text" class="form-control"  />
                </div>

                <div class="col-sm-12">
                    <label>Arquivo</label>
                    <input name="arquivo" type="file" class="form-control"  />
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
 