<?php
require_once('../connections/conn.php'); 
require_once ('../config/config.php');
//print_r($_SESSION);
//Class_restrict::restrict_page();
//include('header.php'); 
$mostrar_msn=false;
$msn='';
if(isset($_POST['insert_note'])){
    
    $mostrar_msn = true;
	$nota = new class_admin_notas();
    $result = $nota->insert( $_POST['descripcion'], $_POST['id_user'], $_POST['id_cuaderno']);
    if($result === true){
        $msn = 'Nota creado satisfactoriamente';
    }else{
        $msn = 'Error en la creación de la nota';
    }
}

$cuadernos =  notas_utility::getNotebookUser($_SESSION['nt_user_id']);
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
						<a href="#">Inicio</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Crear Nota</a>
					</li>
				</ul>
			</div>
    
    <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Crear Nota</h2>
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
<!--							<div class="control-group">
							  <label class="control-label" for="typeahead" name="nombre">Nombre </label>
							  <div class="controls">
                                                              <input type="text" name="nombre">
							  </div>
							</div>-->
                                                       <div class="control-group">
							  <label class="control-label" for="typeahead" name="id_cuaderno">Cuaderno </label>
							  <div class="controls">
                                                              <select name="id_cuaderno" class="validate[required]">
                                                                  <option value="0">Seleccione</option>
                                                                  <?php foreach ($cuadernos as $cuaderno){ ?>
                                                                  <option value="<?php echo $cuaderno['id']; ?>"><?php echo $cuaderno['nombre']; ?></option>   
                                                                  <?php } ?>
                                                              </select>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2" name="descripcion">Nota</label>
							  <div class="controls">
                                                              <textarea class="cleditor validate[required]" id="textarea2" rows="8" name="descripcion"></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Agregar recurso</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div> 
                                                      <input type="hidden" name="id_user" value="<?php echo $_SESSION['nt_user_id'] ?>">
                                                      
							<div class="form-actions">
							  <button type="submit" name="insert_note" class="btn btn-primary">Guardar</button>
							  <button type="reset" class="btn">Cancelar</button>
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