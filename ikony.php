<?php
include_once('script.php');

if(isset($_SESSION['User']))
{	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ikony</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="style.css?ver=0.4">
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
							<a href="spalanie.php" class="nav-link " style="width:80px;margin:0px;display:inline-block;" >Spalanie</a>
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
	
	
	
		<div class="container katalog_aut">
			<div class="table-responsive table-responsive-sm">
					<div class='fixed-width content'>
						<div>
							<table class='col-12 col-sm-12 col-md-12' style="font-size:15px;">
								<thead>
									<tr >
										<th class='col-2 col-sm-2 col-md-2'>Wyglad</th>
										<th class='col-2 col-sm-2 col-md-2'>Nazwa</th>
										<th class='col-2 col-sm-2 col-md-3'>Status</th>
										<th class='col-2 col-sm-2 col-md-3'></th>
									</tr>
								</thead>
								<tbody><?php
									$result = mysqli_query($conn,"SELECT * FROM ikony");
									while($row = mysqli_fetch_assoc($result)){
										$id = $row['id_ikony'];
										$nazwa = $row['nazwa'];
										$status = $row['status'];
											?><tr>
												<input type="hidden" id="id" value='<?php echo $id; ?>'>
												<td class='col-1 col-sm-2 col-md-1' id="wyglad"><span class="material-symbols-outlined"><?php echo $nazwa; ?></span></td>
												<td class='col-1 col-sm-2 col-md-1' id="nazwa"><?php echo $nazwa; ?></td>
												<td class='col-1 col-sm-2 col-md-1' id="status" ><?php if($status == 1){echo "Aktywny";} else{echo "Deaktywny";}?></td>
												<td class="butt">
													<button type="submit" class="editicon btn btn-warning btn-sm" name='kategoria' id="<?php echo $id; ?>">Edytuj</button>
												</td>
											</tr>
											<?php }?>
								</tbody>
							</table>
						</div>
					</div>	
			</div>
			
			<div class="row" style="margin-top:15px;">
					<div>
					<p>Wszystkie emotki znajdziesz <a href="https://fonts.google.com/icons?icon.platform=web" target="_blank">tutaj</a></p>
					<p>Nazwa znajduje sie w podpunkcie "Inserting the icon" pomiedzy znacznikiem &lt;span&gt; </p>
					<p> &lt;span class="material-symbols-outlined"&gt; <b>houseboat</b> &lt;/span&gt; </p>
					</div>
			</div>
			
					<form action="script.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12">
								<div class="row" class="">
									<div class="col-12 col-sm-8 col-md-5" style="margin:10px;">
										<label for="Nazwa">Nazwa ikony</label>
										<input type="text"  placeholder="wpisz nazwe" style="width: 180px;" size = "8" name="Nazwa" id="Nazwa" required />
									</div>
									<div class="col-6 col-sm-3 col-md-2" style="text-align:center; font-size:15px;">
										<input type="submit" name='kategoria' value='Dodaj ikone'/>
									</div>
									<div class="col-6 col-sm-2 col-md-2" style="text-align:center; font-size:15px;">
										<input type="reset" value = "Wyczysc"></input>
									</div>
								</div>
							</div>
						</div>
					</form>
					
					
					
				</br>
		</div>
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	</body>
</html>
<?php } else header("location:index.php");
 ?>
