<?php
require_once('../connections/conn.php'); 
require_once ('../config/config.php');
//print_r($_SESSION);
Class_restrict::restrict_page();
//include('header.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
        
<?php include_once '../public_head.php'; ?>    
		
</head>

<body>
<?php include_once '../header.php'; ?> 

                        <div>
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Inicio</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="admin/notas/">Admin Notas</a>
					</li>
				</ul>
                            <div class="row-fluid">
				<div class="box span12">
                                    <div class="box-header well" data-original-title>
						<h2><i class="icon-page"></i> Notas</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
                                    <div class="box-content">
                                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Usuario</th>
								  <th>Cuaderno</th>
								  <th>Nombre</th>
								  <th>Descripción</th>
								  <th>Recursos</th>
                                                                  <th></th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>David R</td>
								<td class="center">2012/01/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-success">Activo</span>
								</td>
                                                                <td class="center">Member</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Eliminar
									</a>
								</td>
							</tr>
							
						  </tbody>
					  </table>  
                                        <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>admin/crear_nota/">
					 Crear                                           
					</a>
                                    </div>
				</div>
			</div>
			</div>
<?php include('../footer.php'); ?>
</body>
</html>