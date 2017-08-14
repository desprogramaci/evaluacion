<?php
open_page($title, "user");
?>
 <form id="frmusuario_update">
     <input type="hidden" class="form-control" id="ID_User" name="ID_User" value="<?=$user_detail->ID_User?>"> 
            <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Basic Data
                                </div>
                                <div class="panel-body"  style="height:6d00px" >
                                    <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group col-xs-12" style="padding:3px">
                                                    <label >Name</label>
                                                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?=$user_detail->Name?>"> 
                                                </div>
                                                <div class="form-group col-xs-12" style="padding:3px">
                                                    <label>Surname</label>
                                                    <input type="text" class="form-control" id="user_surname" name="user_surname" value="<?=$user_detail->Surname?>"> 
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group col-lg-12" style="padding:3px">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" id="user_mail" name="user_mail" value="<?=$user_detail->Mail?>" disabled="disabled">  
                                                </div>
                                                <div class="form-group col-xs-12" style="padding:3px">
                                                    <label>Locked</label>
                                                    <select class="form-control" id="user_status" name="user_status" value="<?=$user_detail->Activo?>">
                                                        <?php if($user_detail->Activo){
                                                        ?>
                                                        <option  value="1" selected="selected">Yes</option>
                                                        <option value="0" >No</option> 
                                                        <?php
                                                        }else{
                                                        ?>  
                                                        <option  value="1">Yes</option>
                                                        <option value="0" selected="selected">No</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>  
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                <button type="button" id="actualizar" class="btn btn-success" style=" text-align: right"  > Update </button> 
              </form>
<?php 
close_page(); 
?> 
    <script src="<?=base_url()?>js/script.js"></script>
    <script src="<?=base_url()?>js/user.js"></script>


