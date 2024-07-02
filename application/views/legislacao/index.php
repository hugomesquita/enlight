<section class="banner_slider" style="background: #090979;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                <div class="full">
                    <div class="vertical-center">
                        <div class="page_inform wow fadeInLeft" data-wow-duration="2s">
                            <h2>Legislação</h2>
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
                        <form action="<?= base_url('legislacao') ?>" method="GET">
                            <div class="input-group stylish-input-group">
                                <input type="text" name="s" value="<?= $search ?>" class="form-control" placeholder="Buscar Legislação">
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
            <?php if (strlen($search) > 0) { ?>
                <div class=" col-off-3 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="side_bar_blog">
                        <div class="side_bar_search">
                            <div class="input-group" style="background: none !important;">
                                <span class="input-group-addon">Resultado: <?= count($rows); ?></span>
                                <span class="input-group-addon">
                                    <?php if ($currentId > 1) { ?>
                                        <a href="<?= base_url('legislacao/' . ($currentId - 1) . '/?s=' . $search . '') ?>">
                                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                        </a>
                                    <?php } else { ?>
                                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                    <?php } ?>
                                </span>
                                <span class="input-group-addon"><?= $currentId ?></span>
                                <span class="input-group-addon">
                                    <?php if ($currentId < count($rows)) { ?>
                                        <a href="<?= base_url('legislacao/' . ($currentId + 1) . '/?s=' . $search . '') ?>">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </a>
                                    <?php } else { ?>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php
    $Ids = array();
    if($id === 0) {
        foreach ($rows as $r) { $Ids[] = $r->id; }
    } else {
        $Ids[] = $rows[0]->id;
    }
?>

<div class="section contant_section">
    <div class="container wow fadeIn" data-wow-duration="2s">
        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="accordion" id="accordionTreeview">
                    <ul class="treeview light_silver_2" id="myUL">
                        <?php foreach ($treeview as $item_0) { ?>
                            <li class="treeview-li">
                                <?php if (count($item_0['dependencia']) > 0) { ?>
                                    <div class="treeview-item <?=(array_search($item_0['id'], $Ids) > -1 ? 'active': '' )?>" data-item-id="<?= $item_0['id']; ?>">
                                        <a href="<?= base_url('legislacao/1/' . $item_0['id']) ?>">
                                            <i class="fa fa-angle-down text-gray" aria-hidden="true"></i>
                                            <?= $item_0['titulo']; ?>
                                        </a>
                                    </div>
                                    <ul class="nested">
                                        <?php foreach ($item_0['dependencia'] as $item_1) { ?>
                                            <li class="treeview-li" data-item-dependency="<?= $item_1['pai_id']; ?>">
                                                <?php if (count($item_1['dependencia']) > 0) { ?>
                                                    <div class="treeview-item <?=(array_search($item_1['id'], $Ids) > -1 ? 'active': '' )?>" data-item-id="<?= $item_1['id']; ?>">
                                                        <a href="<?= base_url('legislacao/1/' . $item_1['id']) ?>">
                                                            <i class="fa fa-angle-down text-gray" aria-hidden="true"></i>
                                                            <?= $item_1['titulo']; ?>
                                                        </a>
                                                    </div>
                                                    <ul class="nested">
                                                        <?php foreach ($item_1['dependencia'] as $item_2) { ?>
                                                            <li class="treeview-li" data-item-dependency="<?= $item_2['pai_id']; ?>">
                                                                <?php if (count($item_2['dependencia']) > 0) { ?>
                                                                    <div class="treeview-item <?=(array_search($item_2['id'], $Ids) > -1 ? 'active': '' )?>" data-item-id="<?= $item_2['id']; ?>">
                                                                        <a href="<?= base_url('legislacao/1/' . $item_2['id']) ?>">
                                                                            <i class="fa fa-angle-down text-gray" aria-hidden="true"></i>
                                                                            <?= $item_2['titulo']; ?>
                                                                        </a>
                                                                    </div>
                                                                    <ul class="nested">
                                                                        <?php foreach ($item_2['dependencia'] as $item_3) { ?>
                                                                            <li class="treeview-li" data-item-dependency="<?= $item_2['pai_id']; ?>">
                                                                                <?php if (count($item_3['dependencia']) > 0) { ?>
                                                                                    <div class="treeview-item <?=(array_search($item_3['id'], $Ids) > -1 ? 'active': '' )?>" data-item-id="<?= $item_3['id']; ?>">
                                                                                        <a href="<?= base_url('legislacao/1/' . $item_3['id']) ?>">
                                                                                            <i class="fa fa-angle-down text-gray" aria-hidden="true"></i>
                                                                                            <?= $item_3['titulo']; ?>
                                                                                        </a>
                                                                                    </div>
                                                                                    <ul class="nested">
                                                                                        <?php foreach ($item_3['dependencia'] as $item_4) { ?>
                                                                                            <li class="treeview-li <?=(array_search($item_4['id'], $Ids) > -1 ? 'active': '' )?>" data-item-dependency="<?= $item_4['pai_id']; ?>">
                                                                                                <a href="<?= base_url('legislacao/1/' . $item_4['id']) ?>" class="treeview-item">
                                                                                                    <?= $item_4['titulo']; ?>
                                                                                                </a>
                                                                                            </li>
                                                                                        <?php } ?>
                                                                                    </ul>
                                                                                <?php } else { ?>
                                                                                    <div class="treeview-item <?=(array_search($item_3['id'], $Ids) > -1 ? 'active': '' )?>">
                                                                                        <a href="<?= base_url('legislacao/1/' . $item_3['id']) ?>">
                                                                                            <?= $item_3['titulo']; ?>
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                <?php } else { ?>
                                                                    <div class="treeview-item <?=(array_search($item_2['id'], $Ids) > -1 ? 'active': '' )?>">
                                                                        <a href="<?= base_url('legislacao/1/' . $item_2['id']) ?>">
                                                                            <?= $item_2['titulo']; ?>
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } else { ?>
                                                    <div class="treeview-item <?=(array_search($item_1['id'], $Ids) > -1 ? 'active': '' )?>" data-item-id="<?= $item_1['id']; ?>">
                                                        <a href="<?= base_url('legislacao/1/' . $item_1['id']) ?>">
                                                            <?= $item_1['titulo']; ?>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <div class="treeview-item <?=(array_search($item_0['id'], $Ids) > 0 ? 'active': '' )?>" data-item-id="<?= $item_0['id']; ?>">
                                        <a href="<?= base_url('legislacao/1/' . $item_0['id']) ?>">
                                            <?= $item_0['abrev']; ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" id="result">
                <?php $row = $rows[$currentId - 1];  ?>

                <div class="row">
                    <div class="offset-md-10 col-lg-2 col-md-2 col-sm-2 col-xs-12"> 
                        <a class="read_more float-right" href="<?= base_url($row->caminhoArquivo) ?>" target="_blank">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Download
                        </a> 
                    </div>
                </div>

                <div class="row" style="background: #090979;">
                    <div class="col-sm-12"> 
                        <div class="full">
                            <div class="vertical-center">
                                <div class="page_inform wow fadeInLeft" data-wow-duration="2s">
                                    <h3 style="color: #FFFFFF; padding: 10px 10px  0 10px">
                                        <?php echo $row->titulo; ?>
                                    </h3>
                                    <h4 style="color: #FFFFFF; padding: 0px 10px 10px 10px">
                                        <?php echo $row->descricao; ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="artefato_section">
                    <div class="artefato_feature_cantant light_silver_2" data-item-text="<?= $row->id; ?>">
 
                        <?php if ($search !== '') {  ?>
                            <?php echo str_ireplace($search, '<span class="text-find">' . $search . '</span>', nl2br($row->conteudo));  ?>
                        <?php } else { ?>
                            <?php echo nl2br($row->conteudo); ?>
                        <?php } ?>
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



                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 