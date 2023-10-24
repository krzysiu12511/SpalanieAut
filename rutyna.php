<?php
include_once('script.php');

if(isset($_SESSION['User']))
{	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Rutyna</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="style.css?ver=0.5" >
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
		
		<script src="https://momentjs.com/downloads/moment.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="jquery-3.6.1.min.js"></script>
		<script src="jquery.js?ver=0.5"></script>
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
							<a href="rutyna.php" class="nav-link active" style="width:80px;margin:0px;display:inline-block;" >Rutyna</a>
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
		<div class="container">

		<div class="table-responsive table-responsive-sm">
					<div class='fixed-width content'>
						<div>
							<table class='col-12 col-sm-12 col-md-12' style="font-size:15px;">
								<thead>
									<tr >
										<th class='col-2 col-sm-2 col-md-2'>Data</th>
										<th class='col-10 col-sm-7 col-md-7'>Szklanki</th>
									</tr>
								</thead>
								<tbody><?php
									$data = date('Y-m');
									$result = mysqli_query($conn,"SELECT * FROM rutyna where data <= '$data' order by data desc ");
									
									$resultikony = mysqli_query($conn,"SELECT id_ikony,nazwa FROM ikony where status = 1");
									$nazwy = array();
									$id_ikon = array();
									while ($row = mysqli_fetch_array($resultikony)) {
										$id = $row['id_ikony'];
										$nazwa = $row["nazwa"];
										$nazwy[] = $nazwa;
										$id_ikon[] = $id;
									}
									$ilosc_ikon = count($nazwy) - 1;
									for($i=0;$i<15;$i++){
									}
									while($row = mysqli_fetch_assoc($result)){
										$x = 0;
										$id = $row['id'];
										$data = $row['data'];
										$p = $row['pierwsza'];
										$d = $row['druga'];
										$t = $row['trzecia'];
										$c = $row['czwarta'];
										$pi = $row['piata'];
										$s = $row['szosta'];
										$si = $row['siodma'];
										$o = $row['osma'];
										$dz = $row['dziewiata'];
										$dzi = $row['dziesiata'];
										$je = $row['jedenasta'];
										$dw = $row['dwunasta'];
										$tr = $row['trzynasta'];
										$cz = $row['czternasta'];
										$pie = $row['pietnasta'];
										
											?><tr>
												<input type="hidden" id="id" value='<?php echo $id; ?>'>
												<td class='col-1 col-sm-2 col-md-1' id="data"><?php echo $data; ?></td>
												<td class='col-10 col-sm-8 col-md-8'>
													<ul class='rutyna'>
														<li id="pierwsza">
															<?php if($p == 1){echo "<div class='pusta' id='pierwsza'><img src='pelna.png'> </div> ";} else{echo "<div class='pelna' id='pierwsza'><img src='pusta.png' ></div>";} ?>
														</li>
														<li id="druga">
															<?php if($d == 1){echo "<div class='pusta' id='druga'><img src='pelna.png'> </div> ";} else{echo "<div class='pelna' id='druga'><img src='pusta.png' ></div>";} ?>
														</li>
														<li id="trzecia">
															<?php if($t == 1){echo "<div class='pusta' id='trzecia'><img src='pelna.png'></div> ";} else{echo "<div class='pelna' id='trzecia'><img src='pusta.png' ></div>";} ?>
														</li>
														<li id="czwarta">
															<?php if($c == 1){echo "<div class='pusta' id='czwarta'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='czwarta'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="piata">
															<?php if($pi == 1){echo "<div class='pusta' id='piata'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='piata'><img src='pusta.png' ></div>";} ?>
														</li>
														<li id="szosta">
															<?php if($s == 1){echo "<div class='pusta' id='szosta'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='szosta'><img src='pusta.png' ></div>";} ?>
														</li>
														<li id="siodma">
															<?php if($si == 1){echo "<div class='pusta' id='siodma'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='siodma'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="osma">
															<?php if($o == 1){echo "<div class='pusta' id='osma'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='osma'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="dziewiata">
															<?php if($dz == 1){echo "<div class='pusta' id='dziewiata'><img src='pelna.png'></div>";} else{echo "<div class='pelna' id='dziewiata'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="dziesiata">
															<?php if($dzi == 1){echo "<div class = 'pusta' id='dziesiata'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='dziesiata'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="jedenasta">
															<?php if($je == 1){echo "<div class = 'pusta' id='jedenasta'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='jedenasta'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="dwunasta">
															<?php if($dw == 1){echo "<div class = 'pusta' id='dwunasta'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='dwunasta'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="trzynasta">
															<?php if($tr == 1){echo "<div class = 'pusta' id='trzynasta'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='trzynasta'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="czternasta">
															<?php if($cz == 1){echo "<div class = 'pusta' id='czternasta'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='czternasta'><img src='pusta.png' ></div>";}?>
														</li>
														<li id="pietnasta">
															<?php if($pie == 1){echo "<div class = 'pusta' id='pietnasta'><img src='pelna.png'> </div>";} else{echo "<div class='pelna' id='pietnasta'><img src='pusta.png' ></div>";} ?>
														</li>
														
													</ul>
													<ul class='czynnosci'>
														<?php 
															for($i = 0; $i <= $ilosc_ikon; $i++){
															$resultl = mysqli_query($conn,"SELECT * FROM ikony_user where data = '$data' and id_ikony = $id_ikon[$i] ");
															if(mysqli_num_rows($resultl)>0){
																?><li id="ikona">
																	<span class='material-symbols-outlined ramka bez' id='ikona' data-data="<?=$data?>" data-id_ikony="<?=$id_ikon[$i]?>"><?php echo $nazwy[$i] ;?></span>
																</li><?php
															}else{
															?> 
																<li id="ikona">
																	<span class='material-symbols-outlined dodajramke' id='ikona' data-data="<?=$data?>" data-id_ikony="<?=$id_ikon[$i]?>"><?php echo $nazwy[$i] ;?></span>
																</li>
															<?php
															}
															}
														?>
													</ul>
												</td>
											</tr>
											<?php }?>
								</tbody>
							</table>
						</div>
					</div>	
			</div>
		
		</div>
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
		
		
		
	</body>
</html>
<?php } else header("location:index.php");
 ?>
