<?php
require_once('../connections/conn.php'); 
require_once ('../config/config.php');
//print_r($_SESSION);
Class_restrict::restrict_page();
//include('header.php'); 
$mostrar_msn=false;
$msn='';
if(isset($_POST['insert_user'])){
    
    $mostrar_msn = true;
    $usuario = new class_admin_user();
    $result=$usuario->createUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['id_profile'], $_POST['estado']);
    if($result === true){
        $msn = 'Usuario creado satisfactoriamente';
    }else{
        $msn = 'Error en la creación del usuario';
    }
}

//$cuadernos =  notas_utility::getNotebookUser($_SESSION['nt_user_id']);
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
						<a href="<?php echo ROOT_URL; ?>index.php">Inicio</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo ROOT_URL; ?>admin/crear_usuario/">Crear Usuario</a>
					</li>
				</ul>
			</div>
    
    <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Crear Usuario</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                            <form class="form-horizontal" method="post" name="form1" id="form1">
						  <fieldset>
                                                      <?php if($mostrar_msn == true){ 
                                                          ?>
                                                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong><?php echo $msn; ?></strong>
                                                       </div>
                                                        <?php } else{
                                                            $none = 'style="display:none"';
                                                        ?>
                                                      <div class="alert alert-error" <?php echo $none; ?>>
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong><?php echo $msn; ?></strong>
                                                      </div>
                                                       <?php } ?>
                                                       <div class="control-group">
							  <label class="control-label" for="typeahead" name="nameuser">Nombre de usuario </label>
							  <div class="controls">
                                                              <input type="text" name="username" class="validate[required]">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead" name="password">Contraseña </label>
							  <div class="controls">
                                                              <input type="password" name="password" id="password" class="validate[required,minSize[8],maxSize[16],custom[onlyPassword]]"><br>
                                                              <font size="1">(La contraseña debe contener números y letras)</font>
							  </div>
							</div>
                                                      <div class="control-group">
							  <label class="control-label" for="typeahead" name="re-password">Confirmar contraseña </label>
							  <div class="controls">
                                                              <input type="password" name="re-password" class="validate[required,equals[password]">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead" name="email">Correo electrónico </label>
							  <div class="controls">
                                                              <input type="text" name="email" class="validate[required,minSize[7],maxSize[250],custom[email]]">
							  </div>
							</div>
                                                        <input type="hidden" name="id_profile" value="2">
                                                        <input type="hidden" name="estado" value="1">
							<div class="form-actions">
							  <button type="submit" name="insert_user" class="btn btn-primary">Guardar</button>
                                                          <a href="<?php echo ROOT_URL; ?>admin/admin_user.php" class="btn">Cancelar</a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>
    
    
<?php include('../footer.php'); ?>
    <script>
                
		$(document).ready(function(){
			// binds form submission and fields to the validation engine
			$("#form1").validationEngine('attach',{promptPosition : "topRight"});
		});
    </script>
</body>
</html>