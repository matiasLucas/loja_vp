<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cadastro de Usuários
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/users">Usuários</a></li>
        <li class="active"><a href="/admin/users/create">Cadastrar</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Novo Usuário</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="formUser" name="formUser" id="formUser" action="/admin/users/create" method="post">
              <div class="box-body">                
                <div class="form-group">
                  <label for="name">Login</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Digite o login">
                </div>
                <div class="form-group">
                  <label for="password">Senha</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Digite a senha">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="admin" value="1"> Acesso de Administrador
                  </label>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Cadastrar</button>
              </div>
            </form>
          </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->