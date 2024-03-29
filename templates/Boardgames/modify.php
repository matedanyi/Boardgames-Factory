<div class="modal fade" id="modifyboardgame" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify boardgame</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row justify-content-center">
                    <div class="col-8">
                        <?php echo $this->Form->create($boardgame, array('id' => 'form-inside', 'method' => 'post')); ?>

                        <?php echo $this->Form->control('id', ['type' => 'hidden']); ?>

                        <?php echo $this->Form->label('Publisher'); ?>
                        <?php echo $this->Form->select("publisher_id", $publishers, array("label" => "Kiadó", "class" => "form-select")); ?>

                        <?php echo $this->Form->control('name', array('label' => 'Boardgame', 'class' => 'mb-3 form-control')); ?>
                        <?php echo $this->Form->end(); ?>
                        <div class="row justify-content-center">
                            <div class="col-8 d-flex justify-content-center mb-3">
                                <button type="button" data-bs-target="#newboardgame" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-outline-primary rounded">Add new part</button>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class>
                        <ul class="nav nav-tabs  d-flex justify-content-around" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="boardgames-tab" data-bs-toggle="tab" data-bs-target="#boardgames" type="button" role="tab" aria-controls="home" aria-selected="true">Gameparts</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tools-tab" data-bs-toggle="tab" data-bs-target="#tools" type="button" role="tab" aria-controls="profile" aria-selected="false">Tools</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productiondata-tab" data-bs-toggle="tab" data-bs-target="#productiondata" type="button" role="tab" aria-controls="contact" aria-selected="false">Production data</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="boardgames" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table table-success  table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name<span class="f-right">

                                                </span>
                                            </th>
                                            <th scope="col">Material<span class="f-right">

                                                </span>
                                            </th>
                                            <th scope="col">Quantity<span class="f-right">

                                                </span>
                                            </th>
                                            <th class="d-none d-lg-table-cell" scope="col">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($gameparts as $gamepart) : ?>
                                            <tr>
                                                <th scope="row"><?= $gamepart->name ?></th>
                                                <td scope="row"><?= $gamepart->materials->name ?></td>
                                                <td scope="row"><?= $gamepart->quantity ?></td>
                                                <td class="d-none d-lg-table-cell" align="center" valign="middle">
                                                    <span>
                                                        <?= $this->Html->image('delete.png', ['title' => 'törlés', 'alt' => 'delete']);  ?>
                                                    </span>
                                                </td>
                                            <?php // lapozót???   
                                        endforeach;
                                            ?>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="tools" role="tabpanel" aria-labelledby="profile-tab">
                                <table class="table table-success  table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name<span class="f-right">

                                                </span>
                                            </th>
                                            <th scope="col">Lifetime<span class="f-right">

                                                </span>
                                            </th>

                                            <th class="d-none d-lg-table-cell" scope="col">Expire date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($boardgame["lifetimes"] as $lifetime) : ?>
                                            <tr>
                                                <th scope="row"><?= $lifetime->name ?></th>

                                                <td>
                                                    <?= $lifetime->lifetime ?> %
                                                </td>

                                                <td><?= $lifetime->elevules ?> days left
                                                </td>


                                            <?php // lapozót???   
                                        endforeach;
                                            ?>


                                            </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="productiondata" role="tabpanel" aria-labelledby="contact-tab">
                                <table class="table table-success  table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date<span class="f-right">

                                                </span>
                                            </th>
                                            <th class="d-none d-lg-table-cell" scope="col">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($boardgame['products'] as $product) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= $product->production_date->i18nFormat('dd-MMM-yyyy') ?>
                                                </th>

                                                <td>
                                                    <?= $product->quantity ?> Pc
                                                </td>


                                            <?php // lapozót???   
                                        endforeach;
                                            ?>


                                            </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    <br>




                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="bgmodifybezar">Close</button>
                    <button class="btn btn-primary" id="bgmodifysave">Save</button>
                </div>

            </div>
        </div>
    </div>
</div>

<button id="shownewmodifybg" type="button" class="hidden" data-bs-toggle="modal" data-bs-target="#modifyboardgame">
    Új kiadó felvétele
</button>

<script>
    $('#bgmodifysave').click(function() {

        $.ajax({
            url: '<?= $this->Url->build(['controller' => 'Boardgames', 'action' => 'modify',]); ?>',
            data: $('#form-inside').serialize()

                ,
            type: "JSON",
            method: "post",
            success: function(response) {
                console.log(response);

                if (response.success) {
                    if (response.success == 1) {
                        /* window.location.href = "<?= $this->Url->build(['controller' => 'Boardgames', 'action' => 'index']); ?>";*/
                        $('#bgmodifybezar').trigger('click');
                        reloadBgList();
                    } else {
                        /* hibaüzenetek és validálás */
                    }
                }

                /*$('#modal-container').html(response);
                $('#bgmodifybezar').trigger('click');*/
            }
        });
    });

    $('#modifyboardgame').keydown(function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            $('#bgmodifysave').trigger('click');
        }
    })
</script>