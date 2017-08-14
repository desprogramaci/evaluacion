<?php 
open_page($title, "");

?>
<div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-info">
                    <table  class="table table-striped "  cellspacing="0" width="100%">
                        <tr class="ordtil">
                            <td width="25%">
                                
                                        <div class="row">
                                            <div class="form-group col-sm-8 ordtil">
                                                <label>Code Order</label>
                                                <div class="input-group">
                                                    <input  type="text" name="codeOrder" id="codeOrder" required class="form-control"  value="<?php echo $Principal[0]->CodeOrder  ?>" onkeypress="return alfanumerico(event)" maxlength="150" onkeyup="aMays(event, this)" onblur="aMays(event, this)" style="font-size: 11px;" readonly>
                                                    <span class="input-group-addon"></span>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-8 ordtil">
                                                <label>Date Order</label>
                                                <div class="input-group">
                                                    <input type="text" name="dateOrder" id="dateOrder" required class="form-control" value="<?php echo $Principal[0]->DateOrder  ?>"  maxlength="20" style="font-size: 11px;" readonly>
                                                    <span class="input-group-addon"></span>
                                                </div>
                                            </div>
                                        </div>

                               
                            </td>
                            
                            <td >
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label>Proveedor</label>
                                        <div class="input-group">
                                           <input type="text" name="dateOrder" id="dateOrder" required class="form-control" value="<?php echo $Principal[0]->Supplier  ?>"  maxlength="20" style="font-size: 11px;" readonly>
                                           <span class="input-group-addon"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Moneda</label>
                                        <div class="input-group">
                                            <input type="text" name="dateOrder" id="dateOrder" required class="form-control" value="<?php echo $Principal[0]->Mony  ?>"  maxlength="20" style="font-size: 11px;" readonly>
                                            <span class="input-group-addon"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Condicion de Pago</label>
                                        <div class="input-group">
                                            <input type="text" name="dateOrder" id="dateOrder" required class="form-control" value="<?php echo $Principal[0]->Pagos  ?>"  maxlength="20" style="font-size: 11px;" readonly>
                                           <span class="input-group-addon"></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                     </table>
                   
                  </div>
                    
                    
                     <div class="panel panel-info">
                   
                    <table  class="table table-striped "  cellspacing="0" width="100%">
                        <tr>
                            <td width="85%">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <table  class="table table-striped table-bordered table-hover table-responsive" id="tabla" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="dimension5" style="background:#EAEAEA;">
                                                    <th width="80px" class="ordBtin">Code</th>
                                                    <th width="350px">Descripcion</th>
                                                    <th width="80px" class="ordBtin">Cant</th>
                                                    <th width="80px" class="ordBtin">Precio</th>
                                                    <th width="80px" class="ordBtin">Descto %</th>
                                                    <th width="80px" class="ordBtin">Total</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <tr class="dimension5" style="background:#EAEAEA;">
                                                <td style="text-align: center">
                                                    <?php foreach ($CodProduct as $Product) { ?>
                                                    <?= $Product->CodProduct ?><br>
                                                    <?php } ?> 
                                                </td>
                                                <td style="text-align: left">
                                                    <?php foreach ($ItemNameProduct as $ItemName) { ?>
                                                    <?= $ItemName->ItemNameProduct ?><br>
                                                    <?php } ?> 
                                                </td>
                                                <td style="text-align: center">
                                                    <?php foreach ($Cantd as $Cantdt) { ?>
                                                    <?= $Cantdt->Cantd ?><br>
                                                    <?php } ?> 
                                                </td>
                                                <td style="text-align: right">
                                                    <?php foreach ($PriceRegular as $PriceR) { ?>
                                                    <?= number_format($PriceR->PriceRegular,2) ?><br>
                                                    <?php } ?> 
                                                </td>
                                                <td style="text-align: right">
                                                    <?php foreach ($DsctRegular as $DsctR) { ?>
                                                    <?= number_format($DsctR->DsctRegular,2) ?><br>
                                                    <?php } ?> 
                                                </td>
                                                <td style="text-align: right">
                                                    <?php foreach ($TotalCant as $TotalC) { ?>
                                                    <?= number_format($TotalC->TotalCant,2) ?><br>
                                                    <?php } ?> 
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </td>
                            <td >
                                <div class="row">
                                    
                                    <div class="form-group col-sm-8">
                                        <div class="input-group ordBt">
                                            <input type="button" name="addCol" id="addCol" value="Add" class="btn btn-info">
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                     </table>
                   
                  </div>
                    
                    
                    
                    <div class="panel panel-info">
                       
                        <table  class="table table-striped"  cellspacing="0" width="100%">
                            <tr>
                                <td >
                                    <div class="row">
                                        <div class="form-group col-sm-3 ordtil">
                                            <div class="input-group">
                                                <input type="text" name="dateOrder" id="dateOrder" required class="form-control" value="<?php echo $Principal[0]->DateDelyver  ?>"  maxlength="20" style="font-size: 11px;" readonly>
                                                <span class="input-group-addon"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-7 ordtil">
                                            <div class="input-group">
                                                <input type="text" name="dateOrder" id="dateOrder" required class="form-control" value="<?php echo $Principal[0]->LugarEntrega  ?>"  maxlength="20" style="font-size: 11px;" readonly>
                                                <span class="input-group-addon"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2 ordtil">
                                            <label style="font-size: 11px;">Afecta Almacen</label>&nbsp;&nbsp;<input type="checkbox" value="1" name="almacen" id="almacen" <?php if( $Principal[0]->Almacen == '1'){?> checked="checked" <?php }else if( $Principal[0]->Almacen == '0'){ ?>  <?php } ?>  readonly>
                                        </div>
                                    </div>
                                    <BR>
                                    <div class="row">
                                         <div class="form-group col-sm-6 ordtil">
                                            <div class="input-group">
                                                <textarea class="form-control" rows="5" type="text" name="observ" id="observ" autocomplete="0" value="" maxlength="2500" onkeypress="return alfanumerico(event)" onkeyup="aMays(event, this)" onblur="aMays(event, this)" placeholder="Record observations of the purchase order" style="font-size: 11px;" readonly><?php echo $Principal[0]->Observ  ?></textarea>
                                                <span class="input-group-addon"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2 ordtil">
                                            
                                        </div>
                                        <div class="form-group col-sm-4 ordtil">
                                            <div class="input-group">
                                                <div class="panel panel-info">
                                                <table  class="table table-striped"  cellspacing="0" width="100%">
                                                    <tr>
                                                    
                                                        <td width="28%"> 
                                                            <div class="form-group col-sm-12 ordtil">
                                                                <div class="input-group">
                                                                    <label class="ordlc">Sub Total:</label>
                                                                    <label class="ordlc">Descto:</label>
                                                                    <label class="ordlc">IVA:</label>
                                                                    <label class="ordlc">TOTAL:</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td width="50%"> 
                                                            <div class="form-group col-sm-12 ordtil">
                                                                <div class="input-group">
                                                                    <input type="text" name="subt" id="subt" required class="form-control" value="<?php echo $Principal[0]->Subt  ?>" style="font-size: 11px;" readonly>
                                                                    <input type="text" name="dto" id="dto" required class="form-control" value="<?php echo $Principal[0]->Dto  ?>" style="font-size: 11px;" readonly>
                                                                    <input type="text" name="iva" id="iva" required class="form-control" value="<?php echo $Principal[0]->Iva  ?>" style="font-size: 11px;" readonly>
                                                                    <input type="text" name="tot" id="tot" required class="form-control" value="<?php echo $Principal[0]->Tot  ?>" style="font-size: 11px;" readonly>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                 </table>
                                            </div>
                                         </div>
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                         </table>
 
                        <input type="button" name="salirt" id="salirt" value="Salir" class="btn btn-success">
                  </div>

                </div>
           
            </div>


<?php close_page(); ?>
<script src="<?=base_url()?>js/script_orderPurchase.js"></script>

</div>
