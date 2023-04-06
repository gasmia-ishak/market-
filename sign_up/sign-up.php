<?php
session_start();
$birthday=$birthday0=$birthday1=$pass=$datee=$id_client_pere=$code=$code_pere=$date_cre=$Email=$first_N=$id_client=$last_N=$n_ccp=$N_d_c=$password=$tlph=$type_c=$validation=$willaya="";
$price=0;
$conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
if ($conn->connect_error){
    die("error de connecte base de donnee :".$conn->connect_error);
}
if((!empty($_SESSION["id"]))&&(!empty($_SESSION["code"]))){
	$code=$_SESSION["code"];
	$id=$_SESSION["id"];
   header("location: ../client/about_me.php?p=$code&i=$id");

   
   
		
		
   
  }


if ((isset($_GET['birthday']))&&(isset($_GET['code_pere']))&&(isset($_GET['Email']))&&(isset($_GET['first_N']))&&(isset($_GET['last_N']))&&(isset($_GET['n_ccp']))&&(isset($_GET['N_d_c']))&&(isset($_GET['password']))&&(isset($_GET['tlph']))&&(isset($_GET['type_c']))&&(isset($_GET['willaya']))){
    $birthday=$_GET['birthday'];$code_pere=$_GET['code_pere'];$Email=$_GET['Email'];$first_N=$_GET['first_N'];$last_N=$_GET['last_N'];$n_ccp=$_GET['n_ccp'];$N_d_c=$_GET['N_d_c'];$password=$_GET['password'];$tlph=$_GET['tlph'];$type_c=$_GET['type_c'];$willaya=$_GET['willaya'];
    if(($birthday=="")||($Email=="")||($first_N=="")||($last_N=="")||($n_ccp=="")||($N_d_c=="")||($password=="")||($tlph=="")||($type_c=="")||($willaya==""))
    {
	   echo "<script type='text/javascript'> window.location.href = 'sign-up.php'; </script>";
       
    }else{
		
		$datee=date_create();
		$date_cre=date_format($datee,"Y/m/d");
		$birthday0=date_create("$birthday");
		$birthday1=date_format($birthday0,"Y/m/d");
		function getRandomString(){
    		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		$randomString = '';
    		for ($i = 0; $i < 10; $i++) {
        		$index = rand(0, strlen($characters) - 1);
        		$randomString .= $characters[$index];
    		}		

    		return $randomString;
		}
		$code=getRandomString();
		$pass=password_hash($password, PASSWORD_DEFAULT);
		$sql = "SELECT id_client FROM client WHERE (code='$code_pere')";
		$result = mysqli_query($conn, $sql); 
		if ((mysqli_num_rows($result) > 0)||($code_pere=="")) {
		$sql = "INSERT INTO client (birthday,code,code_pere,date_cre,Email,first_N,last_N,n_ccp,N_d_c,password,price,tlph,type_c,willaya)
                                                VALUES ('$birthday1','$code','$code_pere','$date_cre','$Email','$first_N','$last_N',$n_ccp,$N_d_c,'$pass',$price,$tlph,$type_c,'$willaya')";
                                                    if (mysqli_query($conn, $sql)) {
														$id_client = $conn->insert_id;
                                                        $_SESSION["id"]=$id_client;
														$_SESSION["cod"]=$code;
                                                    } else {
                                                         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
													}
													

		if ($code_pere!=""){
			
		$sql = "SELECT id_client FROM client WHERE (code='$code_pere')";
		$result = mysqli_query($conn, $sql); 
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$id_client_pere=$row['id_client'];
				$sql = "INSERT INTO family (id_son,id_pere)
                                                VALUES ($id_client,$id_client_pere)";
                                                    if (mysqli_query($conn, $sql)) {

														
                                                        echo "<script type='text/javascript'> window.location.href = '../client/dashbord/dashbord/dashbord.php?p=$code&i=$id_client'; </script>";
                                                    } else {
                                                         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                    }

			}
			
			}

		}
		header("Location: ../client/dashbord/dashbord/dashbord.php?p=$code&i=$id_client");
		
	
	}//hna na7i 
	 else{
				echo '​<script>alert("code d`invitation n`existe pas svp esseyez autre fois et  confirmez le code");</script>';
				echo "<script type='text/javascript'> window.location.href = 'sign-up.php'; </script>";
			}
		
	}



}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v5 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">
			<form class="form-detail" action="" method="GET">
				<h2>Formulaire d'enregistrement</h2>
				<div class="form-row">
					<label for="full-name">Nom</label>
					<input type="text" name="first_N" id="full-name" class="input-text" placeholder="votre nom" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="full-name">Prénom</label>
					<input type="text" name="last_N" id="full-name" class="input-text" placeholder="votre prénom" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="full-name">Date de naissance</label>
					<input type="date" name="birthday" id="full-name" class="input-text" placeholder="birthday" required>
					
				</div>
				<div class="form-row">
					<label for="full-name">Ville</label>
					<input type="text" name="willaya" id="full-name" class="input-text" placeholder="votre ville" required>
					<i class="fa fa-location-arrow" aria-hidden="true"></i>
				</div>
				<div class="form-row">
					<label for="full-name">Numero de la carte nationale ou de passport</label>
					<input type="number" name="N_d_c" id="full-name" class="input-text" placeholder="votre numero" required>
					<i class="fa fa-id-badge" aria-hidden="true"></i>

				</div>
				<div class="form-row">
					<label for="full-name">Numero de compte postal (Nºccp)</label>
					<input type="number" name="n_ccp" id="full-name" class="input-text" placeholder="votre Nºccp" required>
					<i class="fa fa-list-ol" aria-hidden="true"></i>

				</div>
				<div class="form-row">
					<label for="your-email">Adresse Email</label>
					<input type="text" name="Email" id="your-email" class="input-text" placeholder="votre boite mail" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="full-name">Numéro de téléphone</label>
					<input type="number" name="tlph" id="full-name" class="input-text" placeholder="votre Nº tlph" required>
					<i class="fa fa-phone" aria-hidden="true"></i>
				</div>

				<div class="form-row">
					<label for="password">Mot de passe</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="votre mot de passe " required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row">
						<label for="code_pere">code d'invitation</label>
						<input type="text" name="code_pere" id="code_pere" class="input-text" placeholder="code d'inviation " >
						<i class="fa fa-user-plus" aria-hidden="true"></i>

					</div>
				<div class="form-row">
						<label for="radio">type de compte</label>
					<label class="container-s">basique
						<input id="radio" type="radio"  name="type_c" value="0" checked>
						<span class="checkmark"></span>
					  </label>
					  <label class="container-s">premium
						<input id="radio" type="radio" name="type_c" name="type" value="1">
						<span class="checkmark"></span>
					  </label>
				</div>
				
				<div class="form-row-last">
					<input type="submit"  class="register" value="Inscrire" >
				</div>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>