<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktyka";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
session_start();

$kategoria='';
if(isset($_POST["kategoria"])){
	$kategoria = $_POST["kategoria"];}
		
if(isset($_GET["kategoria"])){
	$kategoria = $_GET["kategoria"];}
	
if($kategoria == "Zaloguj")
{
	$Login = $_POST["Login"];
	$Paswd = $_POST["Paswd"];
	$result = mysqli_query($conn, "SELECT id FROM user WHERE login='$Login' AND pass='$Paswd'");
	//$row = mysqli_fetch_array($result);
	//$id = $row['id'];
	$ile_u = mysqli_num_rows($result);
	if ($ile_u > 0){
		$_SESSION['User']=$Login;
		$sesj = session_id();
		$data = date('Y-m-d');
		$result = mysqli_query($conn, "SELECT id FROM sesja WHERE sesja='$sesj'");
		$ile_s = mysqli_num_rows($result);
		if ($ile_s == 0 ) {mysqli_query($conn, "INSERT INTO sesja SET sesja='$sesj', data='$data'");}
		$result = mysqli_query($conn, "SELECT data FROM rutyna order by data desc");
		$row = mysqli_fetch_assoc($result);
		$miesiac_z_bazy = date('m', strtotime($row['data']));
		$aktualny_miesiac = date('m');
		if($aktualny_miesiac != $miesiac_z_bazy){
			$ilosc_dni_w_miesiacu = date("t");
			$i=0;
			$pierwszy_dzien_w_miesiacu = date('Y-m-01');
			while($i < $ilosc_dni_w_miesiacu){
			mysqli_query($conn, "INSERT INTO `rutyna`(`data`, `pierwsza`, `druga`, `trzecia`, `czwarta`, `piata`, `szosta`, `siodma`, `osma`,`dziewiata`,`dziesiata`,`jedenasta`,`dwunasta`,`trzynasta`,`czternasta`,`pietnasta`) VALUES ('$pierwszy_dzien_w_miesiacu',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)");
			$pierwszy_dzien_w_miesiacu = date('Y-m-d', strtotime($pierwszy_dzien_w_miesiacu . ' +1 day'));
			$i++;
			}
		}
		header("location:start.php");
	} 
	else{header("location:index.php");}
}
if(isset($_SESSION['User']))
{		
	if($kategoria == "usunAjax"){
		$id = $_POST['id'];
		mysqli_query($conn,"DELETE FROM spalanie WHERE id='$id'");
		echo 1;
	}
	if($kategoria == "edytujAjax"){
		$id = $_POST['id'];
		$stan = intval($_POST["stan"]);
		$ilosc = floatval($_POST["ilosc"]);
		$rawdate = htmlentities($_POST['data']);
		$date = date('Y-m-d', strtotime($rawdate));
		
		$zapisz = mysqli_query($conn,"UPDATE spalanie SET stanLicznika='$stan', iloscLitrow='$ilosc', DataTankowania='$date' Where spalanie.id='$id'");
		
		$result = mysqli_query($conn,"select min(id) from spalanie");
		$row = mysqli_fetch_row($result);
		$min_id = $row[0];
		
		$result = mysqli_query($conn,"select max(id) from spalanie");
		$row = mysqli_fetch_row($result);
		$max_id = $row[0];
		
		if($min_id < $id){
			$result = mysqli_query($conn,"SELECT id , (SELECT id FROM spalanie spalanieInner WHERE spalanieInner.id < spalanie.id ORDER BY id desc LIMIT 0, 1 ) AS previous_id FROM spalanie ORDER BY spalanie.id asc");//select id, lag(id) over (order by id) as previous_id from spalanie
			while ($row = mysqli_fetch_array($result)) {
				if( $row["id"] == $id ){ $p_id = $row["previous_id"];}
			}
			$result = mysqli_query($conn,"SELECT stanLicznika,iloscLitrow FROM spalanie Where id='$p_id'");
			$row = mysqli_fetch_array($result);
			$p_stan = $row["stanLicznika"];
			$p_litr = $row["iloscLitrow"];
			$srednia = ($p_litr/($stan-$p_stan))*100;
			$srednia = round($srednia, 2);
			
		}else {$srednia = null;}
		if($id < $max_id){
			$result = mysqli_query($conn,"SELECT id , (SELECT id FROM spalanie spalanieInner WHERE spalanieInner.id > spalanie.id ORDER BY id ASC LIMIT 0, 1 ) AS next_id FROM spalanie ORDER BY spalanie.id ASC");//"select id, lead(id) over (order by id) as next_id from spalanie"
			while ($row = mysqli_fetch_array($result)) {
				if( $row["id"] == $id ){ $n_id = $row["next_id"];}
			}
			$result = mysqli_query($conn,"SELECT stanLicznika FROM spalanie Where id='$n_id'");
			$row = mysqli_fetch_array($result);
			$n_stan = $row["stanLicznika"];
			$n_srednia = ($ilosc/($n_stan-$stan))*100;
			$n_srednia = round($n_srednia, 2);
		}else {$n_srednia = null;}
		
		if($zapisz == 1){
		$tab = array(
			"srednia" => $srednia,
			"nowasrednia" => $n_srednia,
			"stan" => $zapisz
		);}
		echo json_encode($tab);
	}
	
	if($kategoria == "edytujautoAjax"){
		$id = $_POST['id'];
		$nazwa = $_POST["nazwa"];
		$stan = $_POST["status"];
		
		$zapisz = mysqli_query($conn,"UPDATE auta SET nazwa='$nazwa', status=b'$stan' Where auta.id='$id'");
		
		echo 1;
	}
	
	if($kategoria == "edytujikoneAjax"){
		$id = $_POST['id'];
		$nazwa = $_POST["nazwa"];
		$stan = $_POST["status"];
		
		$zapisz = mysqli_query($conn,"UPDATE ikony SET nazwa='$nazwa', status=b'$stan' Where id_ikony='$id'");
		
		echo 1;
	}
	
	if($kategoria == "pustaAjax"){
		$id = $_POST['id'];
		$szklanka = $_POST["szklanka"];
		if($szklanka == 'pierwsza'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET pierwsza=b'0' Where id='$id'");}
		if($szklanka == 'druga'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET druga=b'0' Where id='$id'");}
		if($szklanka == 'trzecia'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET trzecia=b'0' Where id='$id'");}
		if($szklanka == 'czwarta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET czwarta=b'0' Where id='$id'");}
		if($szklanka == 'piata'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET piata=b'0' Where id='$id'");}
		if($szklanka == 'szosta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET szosta=b'0' Where id='$id'");}
		if($szklanka == 'siodma'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET siodma=b'0' Where id='$id'");}
		if($szklanka == 'osma'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET osma=b'0' Where id='$id'");}
		if($szklanka == 'dziewiata'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET dziewiata=b'0' Where id='$id'");}
		if($szklanka == 'dziesiata'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET dziesiata=b'0' Where id='$id'");}
		if($szklanka == 'jedenasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET jedenasta=b'0' Where id='$id'");}
		if($szklanka == 'dwunasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET dwunasta=b'0' Where id='$id'");}
		if($szklanka == 'trzynasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET trzynasta=b'0' Where id='$id'");}
		if($szklanka == 'czternasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET czternasta=b'0' Where id='$id'");}
		if($szklanka == 'pietnasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET pietnasta=b'0' Where id='$id'");}
		
		if($zapisz == 1){
		$tab = array(
			"szklanka" => $szklanka,
			"stan" => 1
		);
		}else {echo 0;}
		
		echo json_encode($tab);
	}
	if($kategoria == "dodajramkeAjax"){
		$id = $_POST['id'];
		$data = $_POST["data"];
		$zapisz = mysqli_query($conn,"INSERT INTO ikony_user SET data='$data', id_ikony='$id'");
		
		if($zapisz == 1){
		$tab = array(
			"stan" => 1
		);
		}else {echo 0;}
		
		echo json_encode($tab);
	}
	
	if($kategoria == "bezAjax"){
		$id = $_POST['id'];
		$zapisz = mysqli_query($conn,"DELETE FROM ikony_user WHERE id_ikony='$id'");
		
		if($zapisz == 1){
		$tab = array(
			"stan" => 1
		);
		}else {echo 0;}
		
		echo json_encode($tab);
	}
	if($kategoria == "pelnaAjax"){
		$id = $_POST['id'];
		$szklanka = $_POST["szklanka"];
		if($szklanka == 'pierwsza'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET pierwsza=b'1' Where id='$id'");}
		if($szklanka == 'druga'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET druga=b'1' Where id='$id'");}
		if($szklanka == 'trzecia'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET trzecia=b'1' Where id='$id'");}
		if($szklanka == 'czwarta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET czwarta=b'1' Where id='$id'");}
		if($szklanka == 'piata'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET piata=b'1' Where id='$id'");}
		if($szklanka == 'szosta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET szosta=b'1' Where id='$id'");}
		if($szklanka == 'siodma'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET siodma=b'1' Where id='$id'");}
		if($szklanka == 'osma'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET osma=b'1' Where id='$id'");}
		if($szklanka == 'dziewiata'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET dziewiata=b'1' Where id='$id'");}
		if($szklanka == 'dziesiata'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET dziesiata=b'1' Where id='$id'");}
		if($szklanka == 'jedenasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET jedenasta=b'1' Where id='$id'");}
		if($szklanka == 'dwunasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET dwunasta=b'1' Where id='$id'");}
		if($szklanka == 'trzynasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET trzynasta=b'1' Where id='$id'");}
		if($szklanka == 'czternasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET czternasta=b'1' Where id='$id'");}
		if($szklanka == 'pietnasta'){$zapisz = mysqli_query($conn,"UPDATE rutyna SET pietnasta=b'1' Where id='$id'");}
		
		if($zapisz == 1){
		$tab = array(
			"szklanka" => $szklanka,
			"stan" => 1
		);
		}else {echo 0;}
		
		echo json_encode($tab);
	}
	
	
	
	
	
	
	if($kategoria == "Usun"){
		$id = $_GET['id'];
		mysqli_query($conn,"DELETE FROM spalanie WHERE id='$id'");
		header('Location:spalanie.php');
	}
	if($kategoria == "Dodaj"){
		$Stan = intval($_POST["Stan"]);
		$Ilosc = floatval($_POST["Ilosc"]);
		$rawdate = htmlentities($_POST['Data']);
		$date = date('Y-m-d', strtotime($rawdate));
		$auto = $_POST["auto"];
		$zapisz = mysqli_query($conn, "INSERT INTO spalanie SET stanLicznika='$Stan', iloscLitrow='$Ilosc', DataTankowania='$date', id_auta='$auto' ");
		if($zapisz == 1){
		$_SESSION['info']="Zapisano pomyslnie";
		header("Location:spalanie.php?auto=$auto");;}
		else{
		header("Location:spalanie.php?auto='$auto'");}
	}	
	if($kategoria == "Dodaj auto"){
		$nazwa = $_POST["Nazwa"];
		$stan = 1;
		mysqli_query($conn, "INSERT INTO auta SET nazwa='$nazwa', status='$stan'");
		header('Location:auta.php');
	}
	
	if($kategoria == "Dodaj ikone"){
		$nazwa = $_POST["Nazwa"];
		$stan = 1;
		mysqli_query($conn, "INSERT INTO ikony SET nazwa='$nazwa', status='$stan'");
		header('Location:ikony.php');
	}
	
	if($kategoria == "Zapisz"){
		$id = $_GET['id'];
		$Stan = intval($_GET["Stan"]);
		$Ilosc = floatval($_GET["Ilosc"]);
		$rawdate = htmlentities($_GET['Data']);
		$date = date('Y-m-d', strtotime($rawdate));
		mysqli_query($conn,"UPDATE spalanie SET stanLicznika='$Stan', iloscLitrow='$Ilosc', DataTankowania='$date' Where spalanie.id='$id'");
		header('Location:spalanie.php');
	}
}else{header("location:index.php");}
if(isset($_GET['logout'])){
		session_destroy();
		header("location:index.php");
}
?>
