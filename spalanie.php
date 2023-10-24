<?php
include_once('script.php');

if(isset($_SESSION['User']))
{	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Spalanie</title>
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
				<button type="button" class="navbar-toggler none" data-bs-toggle="collapse" data-bs-target="#Dodaj">
                    <span class="">Dodaj</span>
                </button>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#myNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
				<div id="Dodaj" class="collapse navbar-collapse topnav-right none">
					<ul class="navbar-nav">
						<form action="script.php" method="post" enctype="multipart/form-data" class="dodaj none" style="color:white; padding:15px; margin:5px; background-color:#595959; border-radius:10px;">
						<div class="row">
							<div class="col-12 col-sm-15 col-md-18">
								<div class="row">
									<div class="col-6 col-sm-2 col-md-3">
										<label for="date" style="margin-right:20px;">Samochod</label>
										<select id='auto' name='auto' required>
										<option value=''>Wybierz</option>
										<?php $result = mysqli_query($conn,"SELECT * FROM auta");
										while($row = mysqli_fetch_assoc($result)){
											$id = $row['ID'];
											$nazwa = $row['nazwa'];
											$status = $row['status'];
											if($status == 1)
											{
												echo "<option value='$id'>".$nazwa."</option>";
											}
										}?> </select>
									</div>
									<div class="col-6 col-sm-2 col-md-3">
										<label for="Stan">Stan Licznika</label>
										<input type="number" size = "8" min="1" max="999999" name="Stan" id="Stan" required />
									</div>
									<div class="col-6 col-sm-2 col-md-3">
										<label for="Ilosc">Ilosc Litrow</label>
										<input type="number" size = "8" min="1" max="9999" step="0.01" name="Ilosc" id="Ilosc" required />
									</div>
									<div class="col-6 col-sm-4 col-md-3">
										<label for="date">Data</label>
										<input type="date" autocomplete="on" size="50" name="Data" id="Dzism" style="width: 130px;" required placeholder="rrrr-mm-dd" />
									</div>
								</div>
								<div class="row" style="margin-top:10px;">
									<div class="col-6 col-sm-2 col-md-1" style="text-align:center;" onchange="this.form.submit()">
										<input type="submit" name='kategoria' value='Dodaj'/>
									</div>
									<div class="col-6 col-sm-2 col-md-2" style="text-align:center;" >
										<input type="reset" value="Wyczysc" />
									</div>
								</div>
							</div>
						</div>
					</form>
					</ul>
                </div>
				
				
                <div id="myNav" class="collapse navbar-collapse topnav-right" style="flex-grow: 0;">
					<ul class="navbar-nav" >
						<li class="nav-item" style="width:130px;">
							<a href="spalanie.php" class="nav-link active" style="width:80px;margin:0px;display:inline-block;" >Spalanie</a>
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
		</nav>
		<div class="container">
		<?php
			if(isset($_SESSION['info']))
			{
			echo "<div class='alert alert-success alert-dismissible' id='popup'>
					<strong>".$_SESSION['info']."</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert'></button>
				</div>";
			unset($_SESSION['info']);
			}
		?>
					<form action="script.php" method="post" enctype="multipart/form-data" class="dodaj none_small" style="margin-top:10px;">
						<div class="row dodawanie">
							<div class="col-12 col-sm-15 col-md-18">
								<div class="row" style="text-align:center;">
									<div  class="col-sm-12 col-md-12">
									<h1 class="header">Dodaj Tankowanie</h1>
									
									</div>
									<div class="col-5 col-sm-6 col-md-3">
										<label for="date" style="margin-right:10px;padding-bottom:5px;">Samochod</label>
										<select id='auto' name='auto' required>
										<option value=''></option>
										<?php $result = mysqli_query($conn,"SELECT * FROM auta");
										while($row = mysqli_fetch_assoc($result)){
											$id = $row['ID'];
											$nazwa = $row['nazwa'];
											$status = $row['status'];
											if($status == 1)
											{
												echo "<option value='$id'>".$nazwa."</option>";
											}
										}?> </select>
									</div>
									<div class="col-6 col-sm-6 col-md-3">
										<label for="Stan">Stan Licznika</label>
										<input type="number"  min="1" max="999999" name="Stan" id="Stan" required />
									</div>
									<div class="col-5 col-sm-6 col-md-3">
										<label for="Ilosc">Ilosc Litrow</label>
										<input type="number"  min="1" max="9999" step="0.01" name="Ilosc" id="Ilosc" required />
									</div>
									<div class="col-6 col-sm-6 col-md-3">
										<label for="date">Data</label>
										<input type="date" autocomplete="on" size="50" name="Data" id="Dzisd" style="width: 140px;" required placeholder="rrrr-mm-dd"/>
									</div>
								</div>
								<div class="row" style="margin-top:10px; " >
									<div class="col-3 col-sm-6 col-md-6" style="text-align:right;" onchange="this.form.submit()">
										<input type="submit" name='kategoria' value='Dodaj'/>
									</div>
									<div class="col-3 col-sm-6 col-md-6" style="text-align:left;">
										<input type="reset" value="Wyczysc" />
									</div>
								</div>
							</div>
						</div>
					</form>
		
		
		
		
		
			<div class = "row" style="margin-top:15px;">
			<br>
				<form action="" method="get" enctype="multipart/form-data" >
					<select id='auto' name='auto' style="min-width:100%; padding:15px 0 15px 0 ;font-size:30px;" onchange="this.form.submit()">
					<option value=''>Wybierz auto</option>
						<?php $result = mysqli_query($conn,"SELECT * FROM auta Where status = '1'");
							while($row = mysqli_fetch_assoc($result)){
							$id = $row['ID'];
							$nazwa = $row['nazwa'];
							$status = $row['status'];
							$wybierz = '' ;
								if($_GET['auto'] == $id)
								{
									$wybierz = 'selected';
								}
							echo "<option value='$id' $wybierz>".$nazwa."</option>";
							}
						?> 
					</select>
				</form>
			</div>
			<div class = "row" style="margin:15px 0 -20px -12px;">
			<?php
				$id_auta = 0;
				$ilosc= 0;
				$suma_paliwa = 0;
				if(isset($_GET['auto']))$id_auta = $_GET['auto'];
				if($id_auta != 0){
					$result = mysqli_query($conn,"SELECT s.id,s.stanLicznika,s.iloscLitrow,s.DataTankowania,a.nazwa,a.ID FROM spalanie s INNER JOIN auta a ON s.id_auta = a.ID where id_auta=$id_auta ");
					$max_id_auto = mysqli_query($conn,"SELECT max(s.id) FROM spalanie s INNER JOIN auta a ON s.id_auta = a.ID where id_auta=$id_auta ");
					$row = mysqli_fetch_array($max_id_auto);
					$max_id_auto = $row[0];
					$min_id_auto = mysqli_query($conn,"SELECT min(s.id) FROM spalanie s INNER JOIN auta a ON s.id_auta = a.ID where id_auta=$id_auta ");
					$row = mysqli_fetch_array($min_id_auto);
					$min_id_auto = $row[0];
					$max_Licznik = mysqli_query($conn,"SELECT max(s.stanLicznika) FROM spalanie s INNER JOIN auta a ON s.id_auta = a.ID where id_auta=$id_auta ");
					$row = mysqli_fetch_array($max_Licznik);
					$max_Licznik = $row[0];
					if(mysqli_num_rows($result) > 1){
					$poczatkowy_stanLicznika = mysqli_query($conn,"SELECT StanLicznika FROM spalanie where id=$min_id_auto ");
					$row = mysqli_fetch_array($poczatkowy_stanLicznika);
					$poczatkowy_stanLicznika = $row[0];}
					while($row = mysqli_fetch_assoc($result)){
							$suma_paliwa += $row['iloscLitrow'];
							if($row['id'] != $max_id_auto){
								$ilosc += $row['iloscLitrow'];
							}
							
					}
					if(mysqli_num_rows($result) > 1){
					$srednia = ($ilosc/($max_Licznik-$poczatkowy_stanLicznika))*100;
					$srednia = round($srednia, 2);
					echo "<p class='info'>Średnie spalanie auta z całości: ".$srednia."</p><p class='info'>Suma przejechanych kilometrów: ".$max_Licznik."</p><p class='info'>Suma zatankowanych litrów: ".$suma_paliwa."</p>";}
				}
				
				 ?>
			
				
			</div>
			
			
			
			<div class="table-responsive table-responsive-sm">
				<?php
				$id_auta = 0;
				if(isset($_GET['auto']))$id_auta = $_GET['auto'];
				if($id_auta != 0){
				$result = mysqli_query($conn,"SELECT s.id,s.stanLicznika,s.iloscLitrow,s.DataTankowania,a.nazwa,a.ID FROM spalanie s INNER JOIN auta a ON s.id_auta = a.ID where id_auta=$id_auta order by s.DataTankowania");
				}
				$i=0;
				$ile_r = mysqli_num_rows($result);
				if($id_auta != 0){
				if ($ile_r > 0) 
				{
				
				
				 ?><div class='fixed-width content'>
						<div>
							<table class='col-12 col-sm-12 col-md-12'>
								<thead>
									<tr >
										<!--<th class='col-1 col-sm-1 col-md-1'>ID</th>-->
										<th class='col-1 col-sm-1 col-md-1'>Auto</th>
										<th class='col-1 col-sm-2 col-md-2'>KM</th>
										<th class='col-1 col-sm-2 col-md-2'>L</th>
										<th class='col-2 col-sm-3 col-md-2'>Data</th>
										<th class='col-2 col-sm-2 col-md-2'>L/ 100km</th>
										<th class='col-1 col-sm-1 col-md-1' ></th>
									</tr>
								</thead>
								<tbody><?php
									while($row = mysqli_fetch_assoc($result)){
										$id_auta = $row['ID'];
										$nazwa_auta = $row['nazwa'];
										$id = $row['id'];
										$Stan = $row['stanLicznika'];
										$stara_ilosc = 0;
										if($i > 0 && $id_auta == $temp_id_auta){
											$srednia = ($ilosc/($Stan-$temp))*100;
											$srednia = round($srednia, 2);
											$stara_ilosc = $ilosc;
											}
										$ilosc = $row['iloscLitrow'];
										$data = date("d-m-Y", strtotime($row['DataTankowania']));
										if($i > 0){
											?><tr>
												<input type="hidden" id="id" value='<?php echo $id; ?>'>
												<!--<td id="id"></td>-->
												<td id="nazwa"><?php echo $nazwa_auta; ?></td>
												<td id="stan"><?php echo $Stan; ?></td>
												<td id="ilosc"><?php echo $ilosc; ?></td>
												<td id="data"><?php echo $data; ?></td>
												<td id="srednia"><?php echo $stara_ilosc." / ".($Stan-$temp); ?><p><?php echo $srednia; ?></p></td>
												<td class="butt">
													<ul>
														<li><button type="submit" class="edit btn btn-warning btn-sm" name='kategoria' id="edit">Edytuj</button></li>
														<li><button type="submit" class="hide btn btn-danger btn-sm" name='kategoria' id="<?php echo $id; ?>">Usun</button></li>
													</ul>
												</td>
												<!--<td class="butt">
													<ul>
														<li><form action='edit.php' method='get' ><input type='hidden' name='id' value='<?php echo $id; ?>'><input type='submit' value='Edytuj'></form></li>
														<li><form action='script.php' method='get' ><input type='hidden' name='id' value='<?php echo $id; ?>'><input type='submit' class='zapytaj_czy_usunac' name='kategoria' value='Usun' ></form></li>
													</ul>
												</td>-->
											</tr>
											<?php }
										else{
											?><tr>
												<!--<td id="id"></td>-->
												<input type="hidden" id="id" value='<?php echo $id; ?>'>
												<td id="nazwa"><?php echo $nazwa_auta; ?></td>
												<td id="stan"><?php echo $Stan; ?></td>
												<td id="ilosc"><?php echo $ilosc; ?></td>
												<td id="data"><?php echo $data; ?></td>
												<td id="srednia"></td>
												<td class="butt">
													<ul>
														<li><button type="submit" class="edit btn btn-warning btn-sm" name='kategoria' id="edit">Edytuj</button></li>
														<li><button type="submit" class="hide btn btn-danger btn-sm" name='kategoria' id="<?php echo $id; ?>">Usun</button></li>
													</ul>
												</td>
												<!--<td class="butt">
													<ul>
														<li><form action='edit.php' method='get' ><input type='hidden' name='id' value='<?php echo $id; ?>'><input type='submit' value='Edytuj'></form></li>
														<li><form action='script.php' method='get' ><input type='hidden' name='id' value='<?php echo $id; ?>'><input type='submit' class='zapytaj_czy_usunac' name='kategoria' value='Usun'></form></li>
													</ul>
												</td>-->
											</tr><?php
										}
										if($i>0){
											$srednia = 0;
											}
											$temp_id_auta = $id_auta;
											$temp = $Stan;
											$i=$i+1;
										}?>
								</tbody>
							</table>
						</div>
					</div>	
			</div>
<?php	} else {echo "<div id='popup'> Brak tankowań! </div>";}} ?>
				</br>

					
					<div class="row">
					
					</div>
					
				</br>
		</div>
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
		
		
		
	</body>
</html>
<?php } else header("location:index.php");
 ?>
