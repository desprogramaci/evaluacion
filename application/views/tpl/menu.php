<style>
    .alert {
        margin-bottom: 0 !important;
        padding: 0 !important;
    }
    .dropdown-menu > li > a {
        font-weight: 300 !important;
        line-height: 1.5 !important;
    }
    
    .dropdown-alerts{
        /*background-color: red !important;*/
        margin-bottom: 0 !important;
        padding: 0 !important;
    }
</style>
<div class="modal fade" id="mo_salir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Desconectar</h4>
            </div>
            <div class="modal-body">
                ¿Seguro que quieres cerrar sesión?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="ses_out()">Si</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; ">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> 
            <img src="<?= base_url() ?>dist/img/logo.gif" width="200px" height="35px" valign="top">
        </a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
         
          
        </li>

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu dropdown-user">
                <li style="background:#069; color:#FFF">
                    <span class="datos_per_menu">
                        <div class="row">
                            <div class="col-sm-4">
                                <?php
                                if ($this->session->userdata("image") != '') {
                                    ?>
                                    <div class="img-circle" style="background:url(<?= base_url() ?>files/users/<?= $this->session->userdata("image") ?>) center no-repeat; background-size:contain; width:60px; height:60px; border:#CCC solid 1px; background-color:#FFF"></div>
                                    <?php
                                } else {
                                    ?>

                                    <div class="img-circle" style="background:url(<?= base_url() ?>img/person.jpg) center no-repeat; background-size:contain; width:60px; height:60px; border:#CCC solid 1px; background-color:#FFF"></div>

                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-sm-8">
                                <?= $this->session->userdata("Name") ?> <?= $this->session->userdata("Surname") ?><br />
                            </div>
                        </div>
                    </span>
                </li>
               
                <li class="divider"></li>
                <li><a href="#" data-toggle="modal" data-target="#mo_salir"><i class="fa fa-sign-out fa-fw"></i> Salir del Sistema</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <?php
            echo $this->session->userdata("mods");
            ?>   
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>