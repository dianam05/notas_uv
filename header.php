<?php
require_once('../connections/conn.php'); 
require_once ('../config/config.php');
//print_r($_SESSION);
Class_restrict::restrict_page();

$cantidad_user =  notas_utility::countmodules('users');
$cantidad_cuadernos =  notas_utility::countmodules('cuadernos');
$cantidad_notas =  notas_utility::countmodules('notas');

 if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a  href="index.php"> <img src="<?php echo ROOT_URL;?>img/logo20.png" /> <span>Notas Para Siempre</span></a>
				
			
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"><?php echo $_SESSION['nt_username']; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Perfil</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo ROOT_URL;?>login.php">Salir</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#">Visit Site</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Menu</li>
						<li><a class="ajax-link" href="index.php"><i class="icon-home"></i><span class="hidden-tablet"> Inicio</span></a></li>
						<li><a class="ajax-link" href="<?php echo ROOT_URL;?>admin/admin_users/"><i class="icon-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>
						<li><a class="ajax-link" href="form.php"><i class="icon-book"></i><span class="hidden-tablet"> Cuadernos</span></a></li>
						<li><a class="ajax-link" href="<?php echo ROOT_URL;?>admin/notas/"><i class="icon-page"></i><span class="hidden-tablet"> Notas</span></a></li>
						<li><a class="ajax-link" href="typography.php"><i class="icon-image"></i><span class="hidden-tablet"> Recursos</span></a></li>
<!--						<li><a class="ajax-link" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
						<li class="nav-header hidden-tablet">Sample Section</li>
						<li><a class="ajax-link" href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
						<li><a class="ajax-link" href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a class="ajax-link" href="grid.html"><i class="icon-th"></i><span class="hidden-tablet"> Grid</span></a></li>
						<li><a class="ajax-link" href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="tour.html"><i class="icon-globe"></i><span class="hidden-tablet"> Tour</span></a></li>
						<li><a class="ajax-link" href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="error.html"><i class="icon-ban-circle"></i><span class="hidden-tablet"> Error Page</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>-->
					</ul>
<!--					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>-->
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php } ?>
<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo ROOT_URL;?>index.php">Inicio</a> <span class="divider">/</span>
					</li>
					
				</ul>
			</div>
			<div class="sortable row-fluid">
				<a data-rel="tooltip" class="well span3 top-block" href="<?php echo ROOT_URL;?>admin/admin_users/">
					<span class="icon32 icon-red icon-user"></span>
					<div>Usuarios</div>
					
					<span class="notification"><?php echo $cantidad_user; ?></span>
				</a>

				<a data-rel="tooltip"  class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-book"></span>
					<div>Cuadernos</div>
					<span class="notification green"><?php echo $cantidad_cuadernos; ?></span>
				</a>

				<a data-rel="tooltip" class="well span3 top-block" href="<?php echo ROOT_URL;?>admin/notas/">
					<span class="icon32 icon-color icon-page"></span>
					<div>Notas</div>
					<span class="notification yellow"><?php echo $cantidad_notas; ?></span>
				</a>
				
				<a data-rel="tooltip" t class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-image"></span>
					<div>Recursos</div>
					<span class="notification red"><?php echo $cantidad_notas; ?></span>
				</a>
			</div>