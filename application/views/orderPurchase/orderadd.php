<?php 
open_page($title, "");
?>

<div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-info">
                    <form id='form_win_superior' >
                    <table  class="table table-striped "  cellspacing="0" width="100%">
                        <tr class="ordtil">
                            <td width="25%">
                                
                                        <div class="row">
                                            <div class="form-group col-sm-8 ordtil">
                                                <label>Code Order</label>
                                                <div class="input-group">
                                                    <input  type="text" name="codeOrder" id="codeOrder" required class="form-control"  value="<?php  echo 'ORD-RR-00'.(($codeadd[0]->codOrder)+1); ?>" onkeypress="return alfanumerico(event)" maxlength="150" onkeyup="aMays(event, this)" onblur="aMays(event, this)" style="font-size: 11px;">
                                                    <span class="input-group-addon"></span>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-8 ordtil">
                                                <label>Date Order</label>
                                                <div class="input-group">
                                                    <input type="text" name="dateOrder" id="dateOrder" required class="form-control" value=""  maxlength="20" style="font-size: 11px;">
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
                                            <select class="form-control input-sm ordtil" id="supplier" name="supplier">
                                              <option value="0">Select</option>
                                            <?php
                                            foreach ($supplier as $supplier_list) {
                                                ?>
                                                    <option value="<?= $supplier_list->CodSupplier ?>"><?= $supplier_list->NameCompany ?></option>
                                                <?php
                                            }
                                            ?> 
                                           </select>
                                           <span class="input-group-addon"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Moneda</label>
                                        <div class="input-group">
                                            <select class="form-control input-sm ordtil" id="mony" name="mony">
                                             <option value="0">Select</option>
                                            <?php
                                            foreach ($mony  as $mony_list) {
                                                ?>
                                                    <option value="<?= $mony_list->CodeCoin ?>"><?= $mony_list->NameCoin ?></option>
                                                <?php
                                            }
                                            ?>   
                                            </select>
                                            <span class="input-group-addon"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Condicion de Pago</label>
                                        <div class="input-group">
                                            <select class="form-control input-sm ordtil" id="pagos" name="pagos">
                                              <option value="0">Select</option>
                                            <?php
                                            foreach ($pagos as $pagos_list) {
                                                ?>
                                                    <option value="<?= $pagos_list->CodePayment ?>"><?= $pagos_list->NamePayment ?></option>
                                                <?php
                                            }
                                            ?> 
                                           </select>
                                           <span class="input-group-addon"></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                     </table>
                   </form>
                  </div>
                    
                    
                     <div class="panel panel-info">
                    <form id='form_win_detalleOrder' >
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
                                                    <th width="50px" class="ordBtin">Delete</th>
                                                </tr>
                                            </thead>
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
                   </form>
                  </div>
                    
                    
                    
                    <div class="panel panel-info">
                        <form id='form_win_inferior' >
                        <table  class="table table-striped"  cellspacing="0" width="100%">
                            <tr>
                                <td >
                                    <div class="row">
                                        <div class="form-group col-sm-3 ordtil">
                                            <div class="input-group">
                                                <input type="text" name="dateDelyver" id="dateDelyver" required class="form-control" value=""  maxlength="20" style="font-size: 11px;" placeholder="Date of Delivery">
                                                <span class="input-group-addon"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-7 ordtil">
                                            <div class="input-group">
                                                <input type="text" name="lugarEntrega" id="lugarEntrega" required class="form-control" value=""  maxlength="150" style="font-size: 11px;" onkeypress="return alfanumerico(event)" onkeyup="aMays(event, this)" onblur="aMays(event, this)" placeholder="Place of Delivery">
                                                <span class="input-group-addon"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2 ordtil">
                                            <label style="font-size: 11px;">Afecta Almacen</label>&nbsp;&nbsp;<input type="checkbox" value="1" name="almacen" id="almacen" checked="checked">
                                        </div>
                                    </div>
                                    <BR>
                                    <div class="row">
                                         <div class="form-group col-sm-6 ordtil">
                                            <div class="input-group">
                                                <textarea class="form-control" rows="5" type="text" name="observ" id="observ" autocomplete="0" value="" maxlength="2500" onkeypress="return alfanumerico(event)" onkeyup="aMays(event, this)" onblur="aMays(event, this)" placeholder="Record observations of the purchase order" style="font-size: 11px;"></textarea>
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
                                                                    <input type="text" name="subt" id="subt" required class="form-control" value="" style="font-size: 11px;" readonly>
                                                                    <input type="text" name="dto" id="dto" required class="form-control" value="" style="font-size: 11px;" readonly>
                                                                    <input type="text" name="iva" id="iva" required class="form-control" value="" style="font-size: 11px;" readonly>
                                                                    <input type="text" name="tot" id="tot" required class="form-control" value="" style="font-size: 11px;" readonly>
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
                       </form>
                        <input type="button" name="regOrder" id="regOrder" value="Register Order" class="btn btn-success">
                  </div>

                </div>
           
            </div>

<!--Modal Producto-->    

<div class="modal fade " id="m_product" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-sm centrar">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Name Product&nbsp;&nbsp;
                <input type="radio" name="obtenerCode" value="1" id="nameProduct" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code Product&nbsp;&nbsp;
                <input type="radio" name="obtenerCode" value="2" id="CodeProduct" >
                </h5>
            </div>
            <div class="modal-body" id="cuerpo" style="display: none">
                <form id="productr" >
                <div class="row"  >
                    <div class="col-sm-11 " id="namep" >
                        <select class="form-control input-sm" id="nameprodt" name="nameprodt">
                         <option value="0" > Select Product</option>
                       <?php
                       foreach ($product as $product_list) {
                           ?>
                               <option value="<?= $product_list->CodProduct ?>"><?= $product_list->ItemNameProduct ?></option>
                           <?php
                       }
                       ?> 
                      </select>
                   </div>
                </div>
                <br>
                <div class="row" id="codep" >
                    <div class="col-sm-11 ">
                        <select class="form-control input-sm" id="codeprodt" name="codeprodt">
                         <option value="0" >Ingrese el Code Product</option>
                       <?php
                       foreach ($product as $product_list) {
                           ?>
                               <option value="<?= $product_list->CodProduct ?>"><?= $product_list->CodProduct ?></option>
                           <?php
                       }
                       ?> 
                      </select>
                   </div>
                </div>
                <br>
                <div class="row" id="cantP" >
                    <div class="col-sm-6 " >
                        Precio.&nbsp;&nbsp;
                        <input  type="text" name="priceRegular_t" id="priceRegular_t" required class="form-control"  value="" onkeypress="return soloNumero(event)" maxlength="10" onkeyup="aMays(event, this)" onblur="aMays(event, this)" style="font-size: 12px;" placeholder="Precio" >
                   </div> 
                    <div class="col-sm-5 " >
                        Dscto.&nbsp;&nbsp;
                        <input  type="text" name="dsctRegular_t" id="dsctRegular_t" required class="form-control"  value="" onkeypress="return soloNumero(event)" maxlength="10" onkeyup="aMays(event, this)" onblur="aMays(event, this)" style="font-size: 12px;" placeholder="Dscto" >
                   </div>
                    <!--
                    <div class="col-sm-3 " >
                        Impsto.&nbsp;&nbsp;
                        <input  type="text" name="ImpRegular_t" id="ImpRegular_t" required class="form-control"  value="" onkeypress="return soloNumero(event)" maxlength="4" onkeyup="aMays(event, this)" onblur="aMays(event, this)" style="font-size: 12px;" placeholder="Impsto" >
                   </div>
                    -->
               </div>
                
                <br>
                <div class="row" id="cantP" >
                    <div class="col-sm-11 " >
                        <input  type="text" name="cantProduct" id="cantProduct" required class="form-control"  value="" onkeypress="return soloNumero(event)" maxlength="10" onkeyup="aMays(event, this)" onblur="aMays(event, this)" style="font-size: 12px;" placeholder="Ingrese la Cantidad de Producto" readonly="readonly">
                   </div> 
               </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" id="mxCerrar" data-dismiss="modal" >Cerrar</button>
                <button type="button" id="mxSelect" class="btn btn-primary"  >Seleccionar</button>
            </div> 
        </div>

    </div>
</div>
<!-- Fin Modal Producto-->  

<?php close_page(); ?>

<script src="<?=base_url()?>js/jquery.numeric.js"></script>

<link href="<?= base_url() ?>css/jquery-ui.css" rel="stylesheet">
<script src="<?= base_url() ?>js/jquery-ui.js"></script>
<script src="<?= base_url() ?>js/bootstrap-filestyle.min.js"></script>

<script src="<?php echo base_url()?>bower_components/select/js/select2.js"></script>
<script src="<?php echo base_url()?>bower_components/select/js/select2_locale_es.js"></script>


<script src="<?=base_url()?>js/script_orderPurchase.js"></script>
<script>
    $(document).ready(function () {
      
      $('#mony,#pagos,#supplier,#nameprodt,#codeprodt').select2();
        
        $("#dateOrder").datepicker({
             minDate: ""
                //maxDate: "+0" 
        });
        
        $("#dateDelyver").datepicker({
             minDate: ""
        });

    });
</script>
</div>

