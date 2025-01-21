<section class="banner_slider" style="background: #090979;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="full">
                    <div class="vertical-center">
                        <div class="page_inform wow fadeInLeft" data-wow-duration="2s">
                            <h2><?php echo $row->titulo; ?></h2>
                            <?= $row->descricao ?>
                            <br />
                            <br />
                        </div>
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
                <div class="artefato_section">
                    <div class="artefato_feature_cantant light_silver_2"> 
                        <?php echo nl2br($row->conteudo); ?>

                        <div class="bottom_info">
                            <div class="pull-left">
                            <br />
                            <br />
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                Referência: <?php echo $row->referencia; ?>
                                <br />
                                <br />
                            </div>
                        </div>
                        

                        <div class="bottom_info">
                            <div class="pull-left">
                                                                
                                <a class="read_more" href="<?= base_url('publicacao') ?>">
                                    <i class="fa fa-angle-left"></i>
                                    Voltar a Publicação
                                </a>

                                | 

                                <a class="read_more" href="<?=base_url($row->caminhoArquivo) ?>" target="_blank">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
