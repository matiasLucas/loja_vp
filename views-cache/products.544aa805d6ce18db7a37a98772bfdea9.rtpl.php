<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Produtos
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/products">Produtos</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
                
                <div class="box-header">
                  <a href="/admin/products/create" class="btn btn-success">Cadastrar Produto</a>
                </div>
    
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>                       
                        <th>Nome do Produto</th>                                             
                        <th>Preço</th>
                        <th>Descrição</th>                        
                        <th style="width: 140px">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td><?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>                                          
                        <td><?php echo htmlspecialchars( $value1["price"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["desc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>                                            
                        <td>
                          <a href="/admin/products/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                          <a href="/admin/products/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->