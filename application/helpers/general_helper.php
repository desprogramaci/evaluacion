<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('element'))
{
	function open_page($title, $icono = '', $btn = array())
	{
		?>
			
<div id="page-wrapper" style="padding-top: 0px;">
            
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <div class="row">
                        <div id="open_title" class="<?php if(count($btn) > 0){ echo "col-lg-7";}else{ echo "col-lg-12";}?> hidden-xs tex_tm">
						<?php if($icono != ''){ ?>
                        	<i class="fa fa-<?php echo $icono?> fa-fw"></i>
						<?php } ?>
                                                <?php echo $title?>
                        </div>
                        <?php
                        if(count($btn) != 0){
							?>
                            <div class="col-lg-5" style="text-align:right">
                            <?php
							$cel = 12/count($btn);
                            foreach($btn as $b){
								?>
								<div class="col-sm-<?php echo $cel?>">
									<a href="<?php echo $b["url"]?>">
									<input type="button" name="<?php echo $b["name"]?>" id="<?php echo $b["id"]?>" value="<?php echo $b["value"]?>" class="btn btn-primary">
									</a>
								</div>
								<?php
							}
							?>
                            </div>
							<?php	
						}
						?>
                        </div>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
		<?php
	}
	
	
	
	function close_page(){
		?>
		    
                <!-- /.container-fluid -->
                <br /><br />
                <div class="footer">
                   
                </div>
            </div>
            <!-- jQuery -->
            <script src="<?php echo base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
        
            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            
            <script src="<?php echo base_url()?>bower_components/bootstrap/dist/js/bootbox.js"></script>
            <!-- Metis Menu Plugin JavaScript -->
            <script src="<?php echo base_url()?>bower_components/metisMenu/dist/metisMenu.min.js"></script>
            
            <!-- Custom Theme JavaScript -->
            <script src="<?php echo base_url()?>dist/js/sb-admin-2.js"></script>
            
            <script src="<?php echo base_url()?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
            
    		<!-- DataTables JavaScript -->
			<script src="<?php echo base_url()?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
            
            <script src="<?php echo base_url()?>js/script.js"></script>
            
		<?php	
	}
	
	
	function num_format($n) {
        // first strip any formatting;
        $n = (0+str_replace(",","",$n));
       
        // is this a number?
        if(!is_numeric($n)) return false;
       
        // now filter it;
        if($n>=1000000000000) return round(($n/1000000000000),1).'T';
        else if($n>=1000000000) return round(($n/1000000000),1).'B';
        else if($n>=1000000) return round(($n/1000000),1).'M';
        else if($n>1000) return round(($n/1000),1).'K';
       
        return number_format($n);
    }
	

	function url_friend($string, $object){
		$string = url_title($string, 'dash', TRUE);
		$ban = TRUE;
		while($ban == TRUE){
			if(count($object) > 0){
				foreach($object as $ob){
					if($ob->tags == $string){
						$ban = TRUE;
						$string .= "-".random_string("numeric", 4);
					}else{
						$ban = FALSE;	
					}// end else	
				}// end foreach
			}else{
				$ban = FALSE;	
			}
		}// end while
		return $string;
	}
	
	
	
	
	function open_panel($arr = array(), $msj_top, $tipo_panel = '', $icono = '', $id = '')
	{
		
		if($tipo_panel == ''){
			$tipo_panel = "default";	
		}
		?>
        <div class="panel panel-<?php echo $tipo_panel?>" id="<?=$id?>">
		<div class="panel-heading">
            <span style="font-weight:normal;">
			<?php
            if($icono != ''){
				?>
				<span class='glyphicon glyphicon-<?php echo $icono?>'></span>&nbsp;
				<?php	
			}
			?>
			<?php echo $msj_top?>
            </span>
            <?php
            if(count($arr) != 0){
			foreach($arr as $ar){
				if(!isset($ar["js"])){
					$ar["js"] = "no";	
				}
				if(!isset($ar["class"])){
					$class = "success";	
				}else{
					$class = $ar["class"];
				}
			?>
            <div class="pull-right btn btn-<?php echo $class?> btn-xs hidden-print" style="margin-right:5px;">
                <?php
                if($ar["js"] == 'no'){
					?>
					<a href="<?php echo base_url()?>index.php/<?php echo $ar["url"]?>" style="color:#FFF" title="<?php echo $ar["title"]?>">
					<?php
				}else{
					?>
					<a href="javascript:;" onclick="<?php echo $ar["url"]?>" style="color:#FFF" title="<?php echo $ar["title"]?>">
					<?php	
				}
				?>
                <span class="glyphicon glyphicon-<?php echo $ar["icon"]?>"></span>
                </a>
            </div>
            <?php
			}
			}
			?>
        </div>
        <div class="panel-body">
		<?php	
	}
	
	
	
	function close_panel(){
		?>
		</div>
    	</div>
		<?php	
	}
	
	
	function load_modal($id, $titulo, $contenido, $funct){
		?>
			
            <div class="modal fade" id="<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo $titulo?></h4>
                        </div>
                        <div class="modal-body">
                            <?php echo $contenido?>
                        </div>
                        <div class="modal-footer">
                            
                            <?php
                            if($funct == "solo_cerrar"){
                                ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <?php	
			    }else{
			    ?>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="<?php echo $funct?>">Yes</button>
                            <?php
							}
							?>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
		
		<?php	
	}
	
	

// ESTA FUNCION VERIFICA EL CONTENIDO QUE SE LE PASE COMO parametro y lo censura segun el array de palabras prohibidas

	function tipo_menu($tipo){
		$tipo_menu = array();
		
		$CI = & get_instance();
		$CI->load->database();
		$CI->db->from("im_menu_tipo");
		$get = $CI->db->get();
		$res = $get->result();
		
		foreach($res as $r){
			$tipo_menu[$r->id] = array("id" => $r->id,
											"tabla" => $r->tabla,
											"pagina" => $r->pagina);
		}
		
		return $tipo_menu[$tipo];
	}
	
	function get_fecha($fecha) {
		$nombres_mes=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo",   "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre",  "Diciembre"  );
		
		$ano=substr($fecha,0,4);
		$mes=substr($fecha,5,2);
		$dia=substr($fecha,8,2);
		
		$dia=(integer)$dia;
		$mes=(integer)$mes;
		$mes=$nombres_mes[$mes];
		
		
		$cadena=$dia."/".$mes."/".$ano;
		return($cadena);
	  }  
	  
	  
	  function fecha_actual()
		{
			$CI = & get_instance();
			$CI->load->helper('date');
			 
			$esVerano = date('I', now()); //Obtenemos TRUE si es horario de verano
			$fechaGMTUnix = now(); //Fecha actual en GMT
			$fechaLocalUnix = gmt_to_local($fechaGMTUnix, "UM45", $esVerano); //Convertimos la fecha GMT a local a partir del código de zona horaria
			$fechaLocalFormateada = mdate("%Y-%m-%d %H:%i:%s", $fechaLocalUnix); //Formato español (dd/mm/yyyy HH:mm:ss)
			return $fechaLocalFormateada;
		}
                
                
         

                
           
        function listhtml($form,$fields,$field,$list) {  
        $html = '';
        $html .='<form id="'.$form.'">'
              .'<div class="row">'
                    .'<div class="col-lg-12">'
                        .'<div class="panel panel-default">'
                           .' <div class="panel-heading">'
                            .'</div>'
                            .'<div class="panel-body">'
                                .'<div class="dataTable_wrapper">'
                                    .'<table class="table table-striped table-bordered table-hover" id="datatable">'
                                        .'<thead>'
                                            .'<tr>';
                                              
                                                for ($i=0;$i < count($fields);$i++) {
                                                    
                                                    $html .='<th>'.$fields[$i].'</th>';
                                                }  
                                            $html .='</tr>'
                                        .'</thead>'
                                        .'<tbody>';
                                                                                      
                                            foreach ($list as $sales_order) {
                                                
                                               
                                                $html .='<tr>';
                                                    
                                                        for($i=0;$i< count($field);$i++){
                                                        
                                                           $html .='<td>'.$sales_order->$field[$i].'</td>';
                                                        }

                                                $html .='</tr>';
                                            }
                                            
                                        $html .='</tbody>'
                                    .'</table>'
                                .'</div>'
                            .'</div>'
                        .'</div>'
                    .'</div>'
                .'</div>' 
                     //.'<button type="button" id="import" class="btn btn-success" style=" text-align: right"  > Import </button>&nbsp;&nbsp;'
                     .'<a href="'.base_url().'index.php/exportToExcel" target="_blank"><button type="button" id="export" class="btn btn-success" style=" text-align: right"> Export </button></a>' 
              .'</form>';

        return $html;
        }
        
        
        
        function export_to_xls($field_data, $num_rows, $result, $file = 'export'){
           //var_dump($query);
            
            $headers = ''; // just creating the var for field headers to append to below
            $data = ''; // just creating the var for field data to append to below

            $fields = $field_data;
            //var_dump($fields);
            if ($num_rows == 0) {
                echo '<p>La tabla al parecer no contiene datos.</p>';
            }
            else {
                foreach ($fields as $field) {
                    $headers .= $field->name . "\t";
                }

                foreach ($result as $row) {
                    $line = '';
                    foreach($row as $value) {
                        if ((!isset($value)) OR ($value == "")) {
                            $value = "\t";
                        } else {
                            $value = str_replace('"', '""', $value);
                            $value = '"' . $value . '"' . "\t";
                        }
                            $line .= $value;
                        }
                    $data .= trim($line)."\n";
                }

            $data = str_replace("\r","",$data);

            header("Content-type: application/x-msdownload");
            header("Content-Disposition: attachment; filename=$file.xls");
            echo "$headers\n$data";
            }
            }
        }
        
        
        function user_is_logged(){   
            $CI =& get_instance();
            $CI->load->library('session');
            if ($CI->session->userdata('idUser') == ''){
                return false;// indicamos no is_logged
            }else{
                return true;    
            }
            $CI->db->close();
            unset($CI);
        }
        
        
        // ********************************************************************************************
        // Description: Devuelve una lista desplegable con las opciones de hora militar, recibe tres parametros
        // el ID y el nombre que se usara para el input SELECT y un ultimo parametro que define si se va a seleccionar
        // un registro en especifico o no, y este parametro es el registro a seleccionar
        // Autor: Yonti Testa
        // Fecha: 12-08-2017
        // ********************************************************************************************
        
        function get_select_hour($id, $name, $sel = NULL){
           ?>
            <select name="<?=$name?>" id="<?=$id?>" class="form-control">
               <?php
            for($i=0; $i<= 23; $i++){
                for($k=0; $k<60; $k=$k+30){
                    if($i<10){
                        $mI = "0".$i;
                    }else{
                        $mI = $i;
                    }
                    
                    if($k == 60){
                        $mK = '00';
                    }else if($k == "0"){
                        $mK = "00";
                    }else{
                        $mK = $k;
                    }
                    
                    $hF = $mI.":".$mK;
                    ?>
                    <option value="<?=$hF?>" <?php if($sel == $hF){ echo "selected";}?>><?=$hF?></option>    
                    <?php
                }
            }
            ?>  
            </select>
            <?php 
        }
        
        
        
        // ********************************************************************************************
        // Description: Devuelve automaticamente un boton de atras para la vista en que sea llamado
        // Autor: Yonti Testa
        // Fecha: 12-08-2017
        // ********************************************************************************************
        
        function get_btn_back(){
            ?>
            <input type="button" name="btn-atras" id="btn-atras" value="Back" class='btn btn-warning' onclick='javascrit:window.history.back()'>
            <?php
        }
        
        
        
        // ********************************************************************************************
        // Description: Esta función completa el arreglo generado para la inserción o edición de un registro
        // con la información de auditoria, el mismo captura de manera automatica los datos del usuario y ademas
        // los datos de la fecha de la ejecución para ser insertados en la BD. Recibe dos parametros el primero es 
        // el array que se ha cargado hasta el momento para seguir cargandolo, el segundo parametro es el tipo de acción
        // que la funcion va a generar, existen dos tipos de acciones las cuales son "CREATE" y "UPDATE", create se usa
        // cuando se hace el llamado a la función en un insert y el update cuando se usa en un update.
        // Autor: Yonti Testa
        // Fecha: 12-08-2017
        // ********************************************************************************************
        
        function get_data_log_user($data, $acc){
            $CI =& get_instance();
            $CI->load->library('session');
            if($acc == 'create'){
                $data["CreatedDate"] = date("Y-m-d H:i:s");
                $data["CreatedUser"] = $CI->session->userdata("ID_User");
                $data["LastModDate"] = date("Y-m-d H:i:s");
                $data["LastModUser"] = $CI->session->userdata("ID_User"); 
                //$this->input->ip_address();
            }else if($acc == 'update'){
                $data["LastModDate"] = date("Y-m-d H:i:s");
                $data["LastModUser"] = $CI->session->userdata("ID_User"); 
            }
            return $data;
        }
        
        
        
        // ********************************************************************************************
        // Description: Esta funcion recibe el valor de un checkbox desde el modelo que ha sido recibido 
        // desde un formulario y revisa si el check fue seleccionado, de ser asi retorna un valor 1 de lo contrario
        // retorna cero
        // Autor: Yonti Testa
        // Fecha: 12-08-2017
        // ********************************************************************************************
        
        function val_checkbox($check){
            if($check){
                return 1;
            }else{
                return 0;
            }
        }
        
        
        
        // ********************************************************************************************
        // Description: Esta funcion recibe dos horas en formato militar (13:30) y retorna la cantidad de horas
        // de diferencia entre ambos registros
        // Autor: Yonti Testa
        // Fecha: 12-08-2017
        // ********************************************************************************************
        
        
        function cal_dif_hour($hour_start, $hour_end){
            $exp_hs = explode(":", $hour_start); 
            $exp_he = explode(":", $hour_end);
            //var_dump($exp_hs);
            $horas = 0;
            $final = 0;
            $hs_h = (int) $exp_hs[0];
            $he_h = (int) $exp_he[0];
            $hs_m = (int) $exp_hs[1];
            $he_m = (int) $exp_he[1];

            if($hs_h == '0'){
                $hs_h = 24;
            }
            if($he_h == '0'){
                $he_h = 24;
            }
            
            $hs_m = $hs_m/60;
            $he_m = $he_m/60;
            
            $hs = $hs_h+$hs_m;
            $he = $he_h+$he_m;
            
            if($hs > $he){
                $horas = (24-$hs)+$he;
            }else{
                $horas = $he-$hs;
            }
            
            $horas = (float) $horas;     
            
            $f = explode(".", $horas);
            if(isset($f[1])){
                if($f[0] == 0){
                   $h = "00";
                }else if($f[0] < 10){
                    $h = "0".$f[0];
                }else{
                    $h = $f[0];
                }
                $final = $h.":".($f[1]*60);
                $final = substr($final,0, -1);
            }else{
                if($horas == 0){
                   $h = "00";
                }else if($horas < 10){
                   $h = "0".$horas;
                }else{
                    $h = $horas;
                }
                $final = $h.":00";
            }
            
            return $final;
        }
        
        
        
        
        // ********************************************************************************************
        // Description: Recibe dos fechas y retorna la cantidad de dias entre ambas. Ademas recibe un tercer
        // parametro que por defecto es NO, si se le setea el valor SI el sistema entiende que si la cantidad
        // de dias arrojada es CERO (0) devolvera UNO (1)
        // Autor: Yonti Testa
        // Fecha: 12-08-2017
        // ********************************************************************************************
        
        function dias_transcurridos($fecha_i,$fecha_f, $val_cero = 'no')
        {
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
        if($val_cero == 'si' and $dias == 0){
            $dias = 1;
        }
        return $dias;
        }
        
        
        
        // ********************************************************************************************
        // Description: Recibe una fecha con formato AAAA-mm-dd y devuelve una fecha continua sin guiones
        // Autor: Yonti Testa
        // Fecha: 12-08-2017
        // ********************************************************************************************
        
        
        function clear_date_sqlserver($date){
            $date = explode("-", $date);
            $fdate = $date[0].$date[1].$date[2];
            return $fdate;
        }
        
        
        
        
        // ********************************************************************************************
        // Description: Esta funcion recibe un parametro booleano y retorna un HTML formado con check o X
        // visualmente atractivo al usuario, recibiendo un valor CERO (0) que lo reconoce como una X y un valor
        // UNO (1) que lo reconoce como un check. Con esta función el programador se olvida de la comparación
        // por cada modulo que se necesite mostrar visualmente la selección de un dato, simplemente llama a esta
        // funcion y le pasa el valor recibido y la respuesta sera el icono
        // Autor: Yonti Testa
        // Fecha: 12-08-2017
        // ********************************************************************************************
        
        
        function mostrar_check($boolean){
            if($boolean == '0'){
                $class = "fa fa-times";
                $color = "red";
            }else if($boolean == '1'){
                $class = "fa fa-check";
                $color = "green";
            }
            $html = "<i class='".$class."' style='color:".$color."; font-size:18px'></i>";
            return $html;
        }
        
        
        
        
        function get_btn_panel($color, $id, $name, $url, $icono, $idbtn = ''){
            ?>
            <div class="col-lg-3" id='<?=$id?>'>
                <div class="panel panel-<?=$color?>">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-<?=$icono?> fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div  style="height: 80px"><h2><?=$name?></h2></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=$url?>" id='<?=$idbtn?>'>
                        <div class="panel-footer"> 
                            <div class="clearfix"> <?=$name?> &nbsp; >></div>
                        </div>
                    </a>
                </div>  
           </div>      
            <?php
        }
		

        
        function btl() {
            $html = '';
            $html .='<button type="button" id="" class="btn btn-success" style=" text-align: right"> Import </button>&nbsp;&nbsp;'
                    . '<a href="' . base_url() . 'index.php/exportToExcel" target="_blank"><button type="button" id="export" class="btn btn-success" style=" text-align: right"> Export </button></a>';

            return $html;
        }
		
		
?>
