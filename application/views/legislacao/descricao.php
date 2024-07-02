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

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="accordion" id="accordionTreeview">
                    <ul class="treeview" id="myUL">
                        <?php foreach ($treeview as $item_0) { ?>
                            <li class="treeview-li">
                                <?php if (count($item_0['dependencia']) > 0) { ?>
                                    <div class="treeview-item" data-item-id="<?= $item_0['id']; ?>">
                                        <a href="<?= base_url('legislacao/descricao/' . $item_0['id']) ?>">
                                            <span class="caret"><?= $item_0['abrev']; ?></span>
                                        </a>
                                    </div>
                                    <ul class="nested">
                                        <?php foreach ($item_0['dependencia'] as $item_1) { ?>
                                            <li class="treeview-li">
                                                <?php if (count($item_1['dependencia']) > 0) { ?>
                                                    <div class="treeview-item" data-item-id="<?= $item_1['id']; ?>"><span class="caret"><?= $item_1['abrev']; ?></span></div>
                                                    <ul class="nested">
                                                        <?php foreach ($item_1['dependencia'] as $item_2) { ?>
                                                            <li class="treeview-li">
                                                                <?php if (count($item_2['dependencia']) > 0) { ?>
                                                                    <div class="treeview-item" data-item-id="<?= $item_2['id']; ?>"><span class="caret"><?= $item_2['abrev']; ?></span></div>
                                                                    <ul class="nested">
                                                                        <?php foreach ($item['dependencia'] as $i) { ?>
                                                                            <li class="treeview-li">
                                                                                <a href="<?= base_url('legislacao/descricao/' . $r->id) ?>" class="treeview-item"><?= $item_2['abrev']; ?></a>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                <?php } else { ?>
                                                                    <div class="treeview-item"><?= $item_2['abrev']; ?></div>
                                                                <?php } ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } else { ?>
                                                    <div class="treeview-item"><?= $item_1['abrev']; ?></div>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <div class="treeview-item"><?= $item_0['abrev']; ?></div>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
 
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
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

                                <a class="read_more" href="<?= base_url('legislacao') ?>">
                                    <i class="fa fa-angle-left"></i>
                                    Voltar a Legislações
                                </a>

                                |

                                <a class="read_more" href="<?= base_url($row->caminhoArquivo) ?>" target="_blank">
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