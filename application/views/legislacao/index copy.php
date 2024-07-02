<style>
    ul,
    #myUL {
        list-style-type: none;
    }

    #myUL {
        margin: 0;
        padding: 0;
    }

    .caret {
        cursor: pointer;
        -webkit-user-select: none;
        /* Safari 3.1+ */
        -moz-user-select: none;
        /* Firefox 2+ */
        -ms-user-select: none;
        /* IE 10+ */
        user-select: none;
    }

    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
    }

    .caret-down::before {
        -ms-transform: rotate(90deg);
        /* IE 9 */
        -webkit-transform: rotate(90deg);
        /* Safari */
        transform: rotate(90deg);
    }

    .nested {
        display: none;
    }

    .active {
        display: block;
    }
</style>

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
        </div>
    </div>
</section>

<div class="section contant_section mb-5">
    <div class="container wow fadeIn" data-wow-duration="2s">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="tree" style="margin: auto 5%" data-item-id="binarytree"></div>
            </div>
        </div>
    </div>
</div>

<div class="section contant_section">
    <div class="container wow fadeIn" data-wow-duration="2s">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="accordion" id="accordionTreeview">
                    <ul class="treeview" id="myUL">
                        <?php foreach ($treeview as $item_0) { ?>
                            <li class="treeview-li">
                                <?php if (count($item_0['dependencia']) > 0) { ?>
                                    <div class="treeview-item" data-item-id="<?=$item_0['id'];?>">
                                        <a href="<?= base_url('legislacao/descricao/' . $item_0['id']) ?>">
                                            <span class="caret"><?= $item_0['abrev']; ?></span>
                                        </a>
                                    </div>
                                    <ul class="nested">
                                        <?php foreach ($item_0['dependencia'] as $item_1) { ?>
                                            <li class="treeview-li">
                                                <?php if (count($item_1['dependencia']) > 0) { ?>
                                                    <div class="treeview-item" data-item-id="<?=$item_1['id'];?>"><span class="caret"><?= $item_1['abrev']; ?></span></div>
                                                    <ul class="nested">
                                                    <?php foreach ($item_1['dependencia'] as $item_2) { ?>
                                                        <li class="treeview-li">
                                                            <?php if (count($item_2['dependencia']) > 0) { ?>
                                                                <div class="treeview-item" data-item-id="<?=$item_2['id'];?>"><span class="caret"><?= $item_2['abrev']; ?></span></div>
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
                <?php foreach ($rows as $r) { ?>
                    <div class="artefato_section">
                        <div class="artefato_feature_cantant light_silver_2">
                            <p class="artefato_head"><?= $r->titulo ?></p>
                            <p><?= $r->descricao ?></p>
                            <div class="bottom_info">
                                <div class="pull-left">
                                    <a class="read_more" href="<?= base_url($r->caminhoArquivo) ?>" target="_blank">
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                        Download
                                    </a>
                                    |
                                    <a class="read_more" href="<?= base_url('legislacao/descricao/' . $r->id) ?>">
                                        Leia mais
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    var toggler = document.getElementsByClassName("treeview-item");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            // this.classList.toggle("caret-down");
            this.classList.toggle("caret-down");
        });
    }
</script>