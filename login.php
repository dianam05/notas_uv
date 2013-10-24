<?php  
require_once('connections/conn.php'); 
require_once ('config/config.php');

if(isset($_POST['guardar']) && $_POST['guardar'] == "si" ){
    notas_utility::login( $_POST['username'] , $_POST['password'] );
}
$no_visible_elements=true;
include('header.php'); ?>

			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Notas Para Siempre</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						Inicia sesión con tu nombre de usuario y contraseña.
					</div>
					<form class="form-horizontal" action="" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text"  />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Recordar</label>
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">Ingresar</button>
                                                        <input type="hidden" name="guardar" value="si">
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>
