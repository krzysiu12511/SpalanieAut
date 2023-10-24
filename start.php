<?php
include_once('script.php');

if(isset($_SESSION['User']))
{	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Start</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="style.css?ver=0.4" >
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
		
		<script src="https://momentjs.com/downloads/moment.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="jquery-3.6.1.min.js"></script>
		<script src="jquery.js?ver=0.4"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
            <div class="container-fluid">
                <a href="start.php" class="navbar-brand">Kalkulator</a>
				
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#myNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="myNav" class="collapse navbar-collapse topnav-right" style="flex-grow: 0;">
					<ul class="navbar-nav" >
						<li class="nav-item" style="width:130px;">
							<a href="spalanie.php" class="nav-link" style="width:80px;margin:0px;display:inline-block;" >Spalanie</a>
							<div class="dropdown" style="width:40px;float:right;">
								<button class="btn btn-dark dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" ></button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color:gray; font-size:16px;  margin-left:-80px;">
									<li><a class="dropdown-item" href="auta.php">Auta</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item" style="width:130px;">			
							<a href="rutyna.php" class="nav-link" style="width:80px;margin:0px;display:inline-block;" >Rutyna</a>
							<div class="dropdown" style="width:40px;float:right;">
								<button class="btn btn-dark dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" ></button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color:gray; font-size:16px;  margin-left:-80px;">
									<li><a class="dropdown-item" href="ikony.php">Ikony</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<?php echo '<a href="script.php?logout" class="nav-link" style="color:red;">Wyloguj</a>';?>
						</li>
					</ul>
                </div>
                </div>
		</nav>
		<div class="container start">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-6" >
				<div class="kafelek">
				<a href="spalanie.php"> Spalanie </a>
				</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6">
				<div class="kafelek">
				<a href="rutyna.php"> Rutyna </a>
				</div>
				</div>
			</div>
		</div>
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
		
		
		
	</body>
</html>
<?php } else header("location:index.php");
 ?>
