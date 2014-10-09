<?php 
require_once 'config.php'; 
require 'proses.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tugas Akhir</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="">
  <meta name="author" content="Ardha Herdianto"/>

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
    
    <!--FONT AWESOME-->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/mail-edit-icon.png"/>
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
<div class="container">


<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">E-Letter - Surat Keluar Masuk</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
                        <?php if(isset($_SESSION['login']) && $_SESSION['login']==true){?>
                        
		                <li><a href="./?page=dashboard"><i class="fa fa-home"></i> Dashboard</a></li> 
                        <li><a href="./?page=dashboard"><i class="fa fa-book"></i> Laporan</a></li>
                        <li><a href="./?page=dashboard"><i class="fa fa-folder"></i> Arsip</a></li>  
					    <li><a href="./?page=dashboard"><i class="fa fa-info"></i> Pengumuman</a></li>
                        <li><a href="./?page=dashboard"><i class="fa fa-cloud"></i> Singkronisasi</a></li>
                        <?php }else{?>
					    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-info"></i> About</a></li>   
					    <?php } ?>
						
                        
                        <!-- HANYA PAS LOGIN -->
                        <!--
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" />
						</div> <button type="submit" class="btn btn-default">Submit</button>
					</form>
                    -->
                    </ul>
                    
					<?php if(isset($_SESSION['login']) && $_SESSION['login']==true){?>
		                  <ul class="nav navbar-nav navbar-right">	
    						<li class="dropdown">
    							 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Akun<strong class="caret"></strong></a>
    							<ul class="dropdown-menu">
    								<li><a href="#"><i class="fa fa-lock"></i> Ubah sandi</a></li>
    								<li class="divider"></li>
    								<li><a href="./?page=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
    							</ul>
    						</li>
    					</ul>
					<?php } ?>
                    
                    
				</div>
				
			</nav>
            
            <div class="well"></div>
            <!--
			<div class="jumbotron">
				<h1>
					Hello, world!
				</h1>
				<p>
					This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>-->
		</div>
	</div>