<?php 
open_page($title, "");
?>
<!--modal Order-->

<div class="modal fade " id="m_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-sm centrar">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Table Conte Order</h4>
            </div>
            <div class="modal-body">

                <!-- Tabla de Conte -->

                <table class="table table-bordered  table-condensed" id="table_notifications">
                    <thead>
                        <tr>
                            <td><b>Purchase Order Process</b></td>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        foreach ($conteOrder as $cont) {
                            ?>
                            <tr style="text-align: left">
                                <td><?= $cont->NameConte ?></td>
                                <td style=" padding-top:auto; text-align: center">
                                    <input type="radio" name="obtenerTipo" value="<?= $cont->codeConte ?>" id="pieces" > </td>
                            </tr>
                            <?php
                        }
                        ?> 

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" id="mxsClose" data-dismiss="modal" >Close</button>
                <button type="button" id="mxsProcess" class="btn btn-primary"  >Process</button>
            </div> 
        </div>

    </div>
</div>

<!-- fin modal order-->

<?php close_page(); ?>
<script src="<?=base_url()?>js/script_orderPurchase.js"></script>

</div>
