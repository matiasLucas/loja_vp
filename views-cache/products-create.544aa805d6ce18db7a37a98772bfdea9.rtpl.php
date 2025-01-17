<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cadastro de Produtos
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/categories">Categorias</a></li>
        <li class="active"><a href="/admin/categories/create">Cadastrar</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Novo Produto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formProduct" action="/admin/products/create" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nome do produto</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do produto">
                </div>                
                <div class="form-group">
                  <label for="price">Preço</label>
                  <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="0.00">
                </div>
                <div class="form-group">
                  <label for="desc">Descrição</label>
                  <input type="text" class="form-control" id="desc" name="desc" placeholder="Escreva uma descrição">
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