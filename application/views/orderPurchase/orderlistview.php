<?php
open_page($title, ""); //icono
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div >
                    <table  class="table table-striped table-bordered table-hover" id="datatable_orders" cellspacing="0" width="100%">
                        <thead>
                            <tr class="dimension5">
                                <th >Code</th>
                                <th >Supplier</th>
                                <th >Approved</th>
                                <th >Date Order</th>
                                <th >Status</th>
                                <th >Edit</th>
                                <th >Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ordert as $list_ordert) {
                                ?>
                                <tr class="dimension2">
                                    <td width="120px"><?php echo $list_ordert->CodeOrder; ?></td>
                                    <td width="450px" class="dimension3"><?php echo $list_ordert->supplier; ?></td>
                                    <td width="150px"><?php if($list_ordert->CodeAproveOrder == '0'){echo 'Not'; }else echo 'Yes';?></td>
                                    <td width="120px"><?php echo $list_ordert->DateOrder; ?></td>
                                    <td width="120px"><?php echo $list_ordert->status; ?></td>
                                    <?php if($list_ordert->CodeAproveOrder == '0'){
                                     ?>
                                      <td width="150px"><a class="editar" href="<?= base_url() ?>index.php/Order/approve_order_edit/<?php echo $list_ordert->CodeOrder; ?>"><center><img src="<?= base_url() ?>img/edit.gif" width="20px" height="20px"/></center></a></td>
                                    <?php
                                    }else if($list_ordert->CodeAproveOrder == '1'){
                                    ?>
                                     <td width="150px">Locked</td>
                                    <?php
                                    };
                                    ?>
                                    <?php if($list_ordert->CodeAproveOrder == '0'){
                                     ?>
                                     <td width="150px"><a class="eliminar" href="<?= base_url() ?>index.php/Order/delete_orderProduct/<?php echo $list_ordert->idOrder; ?>"><center><img src="<?= base_url() ?>img/delete.gif" width="20px" height="20px"/></center></a></td>
                                    <?php
                                    }else if($list_ordert->CodeAproveOrder == '1'){
                                    ?>
                                     <td width="150px">Approved</td>
                                    <?php
                                    };
                                    ?>
                                    
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            <div class="panel-heading">
                <button style="" class="btn btn-success" id="retornar" type="button"> To Return </button>
                <button style="" class="btn btn-success" id="ListApprove" type="button">Lis Order Approve</button>
            </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
</div> 
<?php
close_page();
?> 
<script src="<?= base_url() ?>js/script_orderPurchase.js"></script>
