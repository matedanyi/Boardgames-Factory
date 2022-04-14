<?php /*
include_once('Model/Generate.php');
$gen = new Generate();
//$gen->generateTools();
$gen->generateProducts();
*/ ?>

<div class="container col-lg-10 col-12" id="forthdiv">

    <div class="row align-items-center" id="sixthdiv">
        <span>Szerszámok listája</span>
    </div>

    <div class="row align-items-center" id="fifthdiv">

        <div class="col-6 row">

            <?= $this->Form->create($searchGame, array("class" => "row")) ?>
            <div class="col-6 ">
                <?= $this->Form->input('name', array("class" => "form-control rounded", "placeholder" => "Keresés", "aria-label" => "Search", "aria-describedby" => "search-addon", 'label' => __('Keresés', true) . ':')); ?>

            </div>
            <div class="col-3">

                <?= $this->Form->button(
                    'Keresés',
                    array(
                        "class" => "btn btn-outline-primary rounded",
                        "type" => "submit"
                    )
                ); ?>
            </div>

            <div class="col-3">

                <?php
                if (!$hideCancel)
                    echo $this->Html->link(
                        'Mégse',
                        '/tools/index',
                        ['class' => 'btn btn-outline-primary rounded megse ', "id" => "kereses", "role" => "button"]
                    );

                ?>
            </div>

        </div>
        <div class="col-6">

            <?= $this->Html->link(
                'Generálás',
                '/tools/startGenerateTools',
                array(
                    "class" => "btn btn-outline-primary rounded",
                    "type" => "button"
                )
            ); ?>

            <button type="button" class="btn btn-outline-primary f-right">Export</button>
        </div>
    </div>



    <div id="publist">

        <?= $this->element('Tools/table'); ?>



        <div class="col-12">
            <ul class="pagination">
                <?= $this->Paginator->prev("<<") ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(">>") ?>
            </ul>
        </div>

    </div>
</div>
</div>