<?php
include_once('script.php');
if(isset($_SESSION['User']))
{
?>


<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Edycja</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="style.css">
		
		<script src="https://momentjs.com/downloads/moment.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="jquery-3.6.1.min.js"></script>
		<script src="jquery.js"></script>
		
	</head>
	<body>
		<?php
			$id = $_GET['id'];
			$result = mysqli_query($conn, "SELECT * FROM spalanie WHERE id='$id'");
			$ile_o = mysqli_num_rows($result);
			if ($ile_o > 0){
				while($row = mysqli_fetch_assoc($result)){
					$id = $row['id'];
					$Stan = $row['stanLicznika'];
					$ilosc = $row['iloscLitrow'];
					$data = date("Y-m-d", strtotime($row['DataTankowania']));
				}
			}
		?>
		<div class="container">
				<div class="row">
					<form action="script.php" method="get" style="padding-top:10px;">
						<div class="col-12 col-sm-12 col-md-12">
							<div class="row">
							<input type='hidden' name='id' value="<?php echo $id ?>">
							<div class="col-6 col-sm-2 col-md-3">
								<label for="Stan">Stan Licznika</label>
								<input type="number" size = "6" min="1" max="999999" name="Stan" id="Stan" value="<?php echo $Stan ?>"/>
							</div>
							<div class="col-6 col-sm-3 col-md-3">
								<label for="Ilosc">Ilosc Litrow</label>
								<input type="number" size = "6" min="1" max="9999" step="0.01" name="Ilosc" id="Ilosc" value="<?php echo $ilosc ?>"/>
							</div>
							<div class="col-12 col-sm-4 col-md-3">
								<label for="date">Data</label>
								<input type="date" size="60" name="Data" id="date" value="<?php echo $data ?>"/>
							</div>
							</div>
							<div class="row" style="margin-top:5px;">
							<div class="col-3 col-sm-2 col-md-2">
								<input type="submit" class='zapytaj_czy_zapisac' id="btnEdit" name="kategoria" value="Zapisz" />	
							</div>
							<div class="col-3 col-sm-1 col-md-1">
								<input type="button" class="reset" value="Wyczysc" />
							</div>
							</br>
							</div>
						</div>
					</form>
				</div>
				<div class="row">
					<div class="col-1 col-sm-1 col-md-1" style="padding-top:10px;">
					<input type="submit" onclick="history.go(-1);" value="Anuluj" />
					</div>
				</div>
		</div>
	<?php
	$conn->close();
	?>
	</body>
</html>

<?php
}
else{
		header("location:login.php");
}
 ?>