<?php
open_page($title, "dashboard");
?>
<style>
    .demo2{
        height: 200px !important;
    }


    .list-group-item
    {
        padding:4px 4px;
    }
</style>


<div class="row">
    <form method="post" action="" target="" id="form_consultores" name="form_consultores">
    <div id="content" style="display:block">
        <div class="col-lg-12">
             <span class="bold">CONSULTOR</span>
             
        <div class="panel panel-default">
            <div class="panel-heading">
                <span >Periodos</span>
                
                <div class="row" style="height: 30px">
                    
                    <div class="form-group col-sm-10 " >
                        
                        <div class="form-group col-sm-4 ">
                            <div class="input-group">
                                <input type="text" name="dateOrder" id="dateOrder" required class="form-control" value=""  maxlength="20" style="font-size: 11px;" placeholder="Fecha de Inicio">
                                <span class="input-group-addon"></span>
                            </div>
                        </div>
                     
                        <div class="form-group col-sm-4 ordtil">
                            <div class="input-group">
                                <input type="text" name="dateDelyver" id="dateDelyver" required class="form-control" value=""  maxlength="20" style="font-size: 11px;" placeholder="Fecha Final">
                                <span class="input-group-addon"></span>
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-4 ordtil">
                            <div class="input-group">
                                    <button type="button" id="act_consult" class="btn btn-primary">Actualizar Consultores</button>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
            <div class="panel-body">
                <div class="form-body">
                    
                    <div class="form-group row col-sm-12 ">
                        
                         <table  class="table table-striped " id="datatable_colsultores" cellspacing="0" width="100%">
                            <tr>
                                <td>
                                    <span >Listado de Consultores</span><br>
                                    <select multiple size="8" name="list1" id="list1" class="form-control" >
                                        <?php
                                        foreach ($usuarios as $list_usuarios) {
                                            ?>
                                            <option value="<?php echo $list_usuarios->co_usuario; ?>"><?php echo $list_usuarios->co_usuario; ?></option>
                                            <?php
                                        };
                                        ?>
                                        
                                    </select>
                                </td>
                                <td align="center" valign="middle">
                                    <br><br>
                                    <input name="button" type="button" class="btn btn-neutral"  onClick="move(list1,list2)" value=">>">
                                    <br><br>
                                    <input name="button" type="button" class="btn btn-neutral"  onClick="move(list2,list1)" value="<<" id="retorn">
                                </td>
                                <td >
                                    <span >Consultores Seleccionados</span><br>
                                    <div id="filtros">
                                         <select multiple size="8" name="list2" id="list2" class="form-control">
                                    </select>
                                    </div>
                                   
                                </td>
                                <td style="text-align: center;">
                                     <br>
                                    <div style="width:50;">
                                        <button type="button" id="relat" class="btn btn-danger">Bt Relatorio</button>
                                    </div>
                                    <br>
                                    <div style="width:50;">
                                        <button type="button" id="graf" class="btn btn-danger">Bt Grafico</button>
                                    </div>
                                    <br>
                                    <div style="width:50;">
                                        <button type="button" id="redon" class="btn btn-danger">Bt Pizza</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
          
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    </div>
    </form>        
</div>
<div id="resultado" style="display:none">
    <span >Resultado de Consultores</span><br>
         <div id="contenido">
            <br>
              <table  class="table table-striped " id="relatorios" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th style='text-align: left;'>Empleado</th>
                          <th>Fecha</th>
                          <th style='text-align: right;'>Receita Líquida</th>
                          <th style='text-align: right;'>Comissão</th>
                          <th style='text-align: right;'>Lucro</th>
                      </tr> 
                  </thead>
             </table>
         </div>
</div>
<div id="resultadografica" style="display:none">
    <span >Consultores Graficas Pizza</span><br>
    <div id="contenidografpiz" style="text-align: center;">
            <canvas id="pie" height="400" width="350"></canvas>
             
    </div>
    <input type="hidden" name="totalelement" id="totalelement" class="form-control">
</div>

<div id="resgraflinea" style="display:none">
    <span >Consultores Graficas Lineas</span><br>
    <div id="contenidografline" style="text-align: center;">
            <canvas id="bar" height="300" width="450"></canvas>
             
         </div>
</div>


<?php
close_page();
?> 


<link href="<?= base_url() ?>css/jquery-ui.css" rel="stylesheet">
<script src="<?= base_url() ?>js/jquery-ui.js"></script>
<script src="<?= base_url() ?>js/bootstrap-filestyle.min.js"></script>
<script src="<?php echo base_url()?>bower_components/newsbox/jquery.bootstrap.newsbox.js"></script>
<script src="<?= base_url() ?>js/Chart.js"></script>

<script>
    $(document).ready(function () {
        var TUser = $('#relatorios').dataTable({
            responsive: true
        });
        
        $("#dateOrder").datepicker({
             minDate: ""
                //maxDate: "+0" 
        });
        
        $("#dateDelyver").datepicker({
             minDate: ""
        });
        
        
     
        $("#act_consult").click(function () {   
             open_loading();
                msj_exito("Listado Actualizado", 4000);
             close_loading();
            redirect("dashboard/", 0);

        });
        
         $("#retorn").click(function () {
             TUser.fnDeleteRow(0);
         });
        
         
         $("#redon").click(function () {
             var totalelement=document.getElementById("totalelement").value;
   
            $('#resultadografica').show(3000);
            $('#resultado').hide(3000);
            $('#resgraflinea').hide(3000);
         });
         
        
         
         $("#graf").click(function () {
            $('#resgraflinea').show(3000);
            $('#resultadografica').hide(3000);
            $('#resultado').hide(3000);
         });
        
        
        
       $("#relat").click(function () {
           var concatValor = '';
                $("#filtros select option").attr("selected","selected");

                $("#filtros select option").each(function(){
                    if ($(this).val() != "" ){        
                     concatValor += ''+$(this).val()+'-';
                    }
                 });
                 
                var dateOrder=document.getElementById("dateOrder").value;
                var dateDelyver=document.getElementById("dateDelyver").value;
                var elementd='';

                 
                  $('#resultado').show(3000);
                  $('#resultadografica').hide(3000);
                  $('#resgraflinea').hide(3000);
                
                open_loading();
                msj_exito("Buscando Datos", 200);
                
                $.post(base_url() + "Order/getRelatorio", {datoA:dateOrder,datoB:dateDelyver,lista:concatValor}, function (data) {

                    if (data.success == 'ok') {
                       
                        close_loading();
                       var tamanio=data.consult.length;
                       
                        document.getElementById("totalelement").value=tamanio;
                   
                   for (var i = 0; i < tamanio; i++) { 
                        var co_usuario = data.consult[i].co_usuario;

                        var year = data.consult[i].year;
                        var month = data.consult[i].month;
                        var fecha= data.consult[0].month+'-'+data.consult[0].year;
                      
                        var res_salario = data.consult[i].res_salario;
                        var res_lucro = data.consult[i].lucro;
                        var res_liquida = data.consult[i].res_liquida;
                        var res_comissao = data.consult[i].res_comissao;

                       var nuevaFila = "<tr id='elmentost_'"+i+"'>";
                       nuevaFila += "<td style='text-align: left;'><input type='text' name='co_usuario' id='co_usuario' value='"+co_usuario+"' class='ordBintr'></td>";
                       nuevaFila += "<td ><input type='text' name='fecha' id='fecha' value='"+fecha+"' class='ordBintrf'></td>";
                       nuevaFila += "<td style='text-align: right;'><input type='text' name='res_liquida' id='res_liquida' value='R$ "+res_liquida+"' class='ordBintr'></td>";
                       nuevaFila += "<td style='text-align: right;'><input type='text' name='res_comissao' id='res_comissao' value='R$ "+res_comissao+"' class='ordBintr'></td>";
                       nuevaFila += "<td style='text-align: right;'><input type='text' name='res_salario' id='res_salario' value='R$ "+res_lucro+"' class='ordBintr'></td>";
                       
                       nuevaFila += "</tr>";
                       
                       $("#relatorios").append(nuevaFila);
                       
                   }
                   
                 
                   
                    } else if (data.success == "error") {
                        msj_advertencia("<strong>Warning!</strong> Errorrrrrr", 3000);
                        close_loading();
                    } else {
                        msj_error("<strong>Opps!</strong> No hay datos Revisar!!!!", 4000);
                        close_loading();
                    }
                    
                }, 'json'); 
                
       });
       
       
        
        
           /*
       $("#redon").click(function () {
           var concatValor = '';
                $("#filtros select option").attr("selected","selected");

                $("#filtros select option").each(function(){
                    if ($(this).val() != "" ){        
                     concatValor += ''+$(this).val()+'-';
                    }
                 });
                 
                var dateOrder=document.getElementById("dateOrder").value;
                var dateDelyver=document.getElementById("dateDelyver").value;
                var elementd='';

                 
                  $('#resultado').show(3000);
                  $('#resultadografica').hide(3000);
                  $('#resgraflinea').hide(3000);
                
                open_loading();
                msj_exito("Buscando Datos", 200);
                
                $.post(base_url() + "Order/getgraficapizza", {datoA:dateOrder,datoB:dateDelyver,lista:concatValor}, function (data) {

                    if (data.success == 'ok') {
                       
                        close_loading();
                       var tamanio=data.grafpizz.length;
    
                   
                   for (var i = 0; i < tamanio; i++) { 
                        var co_usuario = data.grafpizz[i].co_usuario;
                        var month = data.grafpizz[i].mess;


                        $('#resultadografica').show(3000);
                        $('#resultado').hide(3000);
                        $('#resgraflinea').hide(3000);

                   }
                   
                 
                   
                    } else if (data.success == "error") {
                        msj_advertencia("<strong>Warning!</strong> Errorrrrrr", 3000);
                        close_loading();
                    } else {
                        msj_error("<strong>Opps!</strong> No hay datos Revisar!!!!", 4000);
                        close_loading();
                    }
                    
                }, 'json'); 
                
       });
        
        */
        
        
        
        
        
    });
</script>
<SCRIPT language="JavaScript">

function move(fbox, tbox) {
    
    var arrFbox = new Array();
    var arrTbox = new Array();
    var arrLookup = new Array();
    var i;
    
    for (i = 0; i < tbox.options.length; i++) {
        arrLookup[tbox.options[i].text] = tbox.options[i].value;
        arrTbox[i] = tbox.options[i].text;
    }
    
    var fLength = 0;
    var tLength = arrTbox.length;
    for(i = 0; i < fbox.options.length; i++) {
        arrLookup[fbox.options[i].text] = fbox.options[i].value;
        if (fbox.options[i].selected && fbox.options[i].value != "") {
            arrTbox[tLength] = fbox.options[i].text;
            tLength++;
        }else {
            arrFbox[fLength] = fbox.options[i].text;
            fLength++;
       }
    }

    arrFbox.sort();
    arrTbox.sort();
    fbox.length = 0;
    tbox.length = 0;
    var c;
    for(c = 0; c < arrFbox.length; c++) {
        var no = new Option();
        no.value = arrLookup[arrFbox[c]];
        no.text = arrFbox[c];
        fbox[c] = no;
    }
    for(c = 0; c < arrTbox.length; c++) {
        var no = new Option();
        no.value = arrLookup[arrTbox[c]];
        no.text = arrTbox[c];
        tbox[c] = no;
   }
}


	var pieData =
        [
            {
                    value: 30,
                    color:"#F38633",
		    label: "Red"

            },
            {
                    value : 50,
                    color : "#E7E4CC",
		    label: "Red"
            },
            {
                    value : 100,
                    color : "#69D2E7",
		    label: "Red"
            },
            {
                    value : 40,
                    color : "#19CDF7",
		    label: "Red"
            }
			
        ];
        new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        var barChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					data : [65,59,90,81,56,55,40]
				},
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					data : [28,48,40,19,96,27,100]
				}
			]
			
		};
        
        
        
       	new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
        
        
</script>