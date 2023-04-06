<?php
session_start();
$error=$error= $UserName=$FirstName=$Email=$password=$LastName="";
$conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
  if($conn->connect_error){
      die("error de connecte base de donnee :".$conn->connect_error);
    }
  if((!empty($_SESSION["id"]))&&(!empty($_SESSION["code"]))){
	  $code=$_SESSION["code"];
      $id=$_SESSION["id"];
     header("location: ../client/dashbord/dashbord/dashbord.php");

     
     
          
          
     
    }
    
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["Email"])){
           echo '<script>alert("connecter a votre compte par Email est obligé")</script>';
        }
        else{
            $Email=$_POST["Email"];
            
            if(empty($_POST["password"])){
          echo '<script>alert("vous avez oublié votre mot de passe")</script>';
           }
           else{
            $password=$_POST["password"];
            
          }
		}}
		
		if(($Email!="")&&($password!="")){

			
			$sql="SELECT Email FROM client WHERE Email='$Email' ";
			$result=$conn->query($sql);
			$row=mysqli_fetch_assoc($result);
			if($Email!=$row["Email"]){
				
				$sql="SELECT tlph FROM client WHERE tlph='$Email' ";
				$result=$conn->query($sql);
				$row=mysqli_fetch_assoc($result);
				if($Email!=$row["tlph"]){
					
				echo "<script>alert('il n y a pas compte par le contact  : $Email')</script>";

				
			  }
			  else{
				
				$sql="SELECT `password` FROM client WHERE tlph='$Email'";
				$result=$conn->query($sql);
				$row=mysqli_fetch_assoc($result);
				if(!password_verify($password,$row["password"])){
					echo "<script>alert('erreur: mot de passe n`est correcte ')</script>";
					
				  } else{
					$sql = "SELECT id_client,code FROM client WHERE (tlph=$Email)";
					$result = mysqli_query($conn, $sql); 
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							$id=$row['id_client'];
							$code=$row['code'];
							$_SESSION["id"]=$row['id_client'];
							$_SESSION["code"]=$row['code'];
						}}
					
					
						header("Location: ../client/about_me.php?p=$code&i=$id");
				  }
			  }}
			  else{
				
				$sql="SELECT `password` FROM client WHERE Email='$Email'";
				$result=$conn->query($sql);
				$row=mysqli_fetch_assoc($result);
				if(!password_verify($password,$row["password"])){
					echo "<script>alert('erreur : mot de passe n`est pas correcte')</script>";
				  }  
				else{
					$sql = "SELECT id_client,code FROM client WHERE (Email='$Email')";
		$result = mysqli_query($conn, $sql); 
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$id=$row['id_client'];
				$code=$row['code'];
				$_SESSION["id"]=$row['id_client'];
				$_SESSION["code"]=$row['code'];
			}}
					
			header("Location: ../client/dashbord/dashbord/dashbord.php");
				  }
			  }
		}
	
?>



<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>log in</title>
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
			<form class="form-detail" action="" method="post">
				<h2>Accéder à votre compte</h2>
				
				<div class="form-row">
					<label for="your-email"> Email / Numéro De Téléphone</label>
					<input type="text" name="Email" id="your-email" class="input-text" placeholder="votre Email,phone...." required >
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="password">Mot de passe</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="votre mot de passe" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row-last">
					<input type="submit" name="entre" class="register" value="Se connecter">
				</div>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>