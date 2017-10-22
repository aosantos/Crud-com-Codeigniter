<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Usuários </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>O</b>LI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Crud </b>&nbsp;Usuários</span>
    </a>
   
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
  
        </div>
        <div class="pull-left info">
          <p></p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
       <ul class="sidebar-menu">
        <li>
          <a href="<?php echo base_url() ?>home">
            <i class="fa fa-home"></i> <span>HOME</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
            </span>
          </a>
        </li>
       
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuários
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() ?>home">Usuários</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista De Usuários</h3>
              <?php if ($this->session->flashdata('erro')) { ?>
                  <div class="alert alert-danger">
                      <?= $this->session->flashdata('erro') ?>
                  </div>
                  <?php if (validation_errors()) { ?>
                      <div class="alert alert-danger">
                      <?= validation_errors() ?>
                      </div>
                      <?php } ?>
              <?php } ?>
              
            </div>
              <div class="box">
            <div class="box-header">              
              <?php if ($this->session->flashdata('erro2')) { ?>
                  <div class="alert alert-danger">
                      <?= $this->session->flashdata('erro2') ?>
                  </div>
                  <?php if (validation_errors()) { ?>
                      <div class="alert alert-danger">
                      <?= validation_errors() ?>
                      </div>
                      <?php } ?>
              <?php } ?>
              
            </div>
              <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="cadastrar_" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:green;"><span class="glyphicon glyphicon-lock"></span> Cadastrar Usuários</h4>
        </div>          
        <div class="modal-body">
          <form action='<?php echo base_url() ?>cadastrar' method='POST' method="get" role="form">
              <form method="get" action=".">
            <div class="form-group">
              <label for="nome"><span class="glyphicon glyphicon-education"></span> Nome</label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome ">
            </div>
            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-education"></span>Email</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Email ">
            </div>
            <div class="form-group">
              <label for="cpf"><span class="glyphicon glyphicon-education"></span>Cpf</label>
              <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Cpf ">
            </div>            
            
            <button style="color:white;" type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Cadastrar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        </div>
      </div>
    </div>
  </div> 
</div>
              <?php foreach ($lista as  $list):?>
              <div class="modal fade" id="editar_<?= $list['id']  ?>" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:green;"><span class="glyphicon glyphicon-lock"></span> Cadastrar Usuários</h4>
        </div>
          
        <div class="modal-body">
          <form action='<?php echo base_url() ?>editar' method='POST' method="get" role="form">
           <input type="hidden" id="id" name="id" value="<?= $list['id']; ?>" >
              <form method="get" action=".">
         <div class="form-group">
              <label for="nome"><span class="glyphicon glyphicon-education"></span> Nome</label>
              <input type="text" name="nome" value="<?= $list['nome']; ?>" class="form-control" id="nome" placeholder="Nome ">
            </div>
            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-education"></span>Email</label>
              <input type="text" name="email" value="<?= $list['email']; ?>" class="form-control" id="email" placeholder="Email ">
            </div>
            <div class="form-group">
              <label for="cpf"><span class="glyphicon glyphicon-education"></span>Cpf</label>
              <input type="text" name="cpf" value="<?= $list['cpf']; ?>" class="form-control" id="cpf" placeholder="Cpf ">
            </div>
            
            <button style="color:white;" type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Cadastrar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        </div>
      </div>
    </div>
  </div> 
  <?php endforeach; ?>
            <div class="box-body">
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Cpf</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    
                <?php
                
              foreach ($lista as $list):              
                       ?> 
                    <tr class="<?php ?>" id="odd_gradeX_" data-id="">
                     <td><?= $list['nome']; ?></td>
                     <td><?= $list['email'];  ?></td>
                     <td><?= $list['cpf'];  ?></td>                                          
                     
<!-- Modal -->                  
<td>    
    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editar_<?php echo $list['id'] ?>">
    <span class="glyphicon glyphicon-edit"></span> 
    </button>    
<button type="button" class="btn btn-danger"  data-toggle="modal" title="Excluir Usu&aacute;rio" data-target="#remover_<?php echo $list['id']?>">
    <span class="glyphicon glyphicon-trash"></span> 
</td>
                       
                </tr>
                            <div class="modal fade" id="remover_<?php echo $list['id']; ?>" role="dialog">
                                  <input type="hidden" name="id"  value="<?php echo $list['id']; ?>">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 style="color:red;">Delete User  (<?php echo $list['nome'] ?>) </h4>
                                        </div>          
                                        <div class="modal-body">
                                            <form method="get" action=".">
                                                <h4 style="color:#161517;" align="center">Are you sure you want to delete user (<?php echo $list['nome']; ?>)</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
                                            <a href="<?= base_url('remover/'.$list['id']);  ?>" class="btn btn-danger " data-click="panel-exclude" data-toggle="modal">Delete</a>                                          
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>             
    <?php
    endforeach;
    ?>      
          

                 </tbody>
                <tfoot>
               </tfoot>
              </table>
                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#cadastrar_">Cadastrar Usuários</button>
            </div>
          </div>
                    
    <div class="pager" >
        <li><?= $links_paginacao ?></li>
    </div>
        </div>
            
      </div>
          
    </section>
  </div>
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b>1.0
    </div>
    <strong>Copyright &copy; 2017-<?php echo date('Y') ?> <a href="">Crud de Usuários</a>.</strong>Todos direitos
    reservados.
  </footer>
<div class="control-sidebar-bg"></div>
</div>

<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>

<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>

<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>

</body>
</html>
