<?php
session_start();
$error=$error= $UserName=$FirstName=$USER_admin=$password=$LastName="";
$conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
  if($conn->connect_error){
      die("error de connecte base de donnee :".$conn->connect_error);
    }
  if(!empty($_SESSION["USER_admin"])){
	  $USER_admin=$_SESSION["USER_admin"];
      
     header("location: ../../admin2023.php?U=$USER_admin");

     
     
          
          
     
    }
    
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["USER_admin"])){
           echo '<script>alert("connecter a votre compte par USER_admin est obligé")</script>';
        }
        else{
            $USER_admin=$_POST["USER_admin"];
            
            if(empty($_POST["password"])){
          echo '<script>alert("vous avez oublié votre mot de passe")</script>';
           }
           else{
            $password=$_POST["password"];
            
          }
		}}
		
		if(($USER_admin!="")&&($password!="")){

			
			$sql="SELECT USER_admin FROM `admin` WHERE USER_admin='$USER_admin' ";
			$result=$conn->query($sql);
			$row=mysqli_fetch_assoc($result);
			if($USER_admin!=$row["USER_admin"]){
				
				
					
				echo "<script>alert('il n y a pas compte par le contact  : $USER_admin')</script>";

				
			  }
			  else{
				
				$sql="SELECT `PASSWORD` FROM `admin` WHERE USER_admin='$USER_admin'";
				$result=$conn->query($sql);
				$row=mysqli_fetch_assoc($result);
				if(!password_verify($password,$row["PASSWORD"])){
					echo "<script>alert('erreur: mot de passe n`est correcte ')</script>";
					
				  } else{
						$_SESSION["USER_admin"]=$USER_admin;
						header("Location: ../../admin2023.php?U=$USER_admin");
				  }
			  }}
			 
		else{
			echo '<script>alert("FR : attention cette page gardez pour administrateur Toute tentative d`entrée, toutes vos données seront envoyées à l`équipe technique, et cela sera considéré comme une tentative d`enfreindre les règles générales")</script>';
			echo '<script>alert("AR : انتبه هذه الصفحة للمسؤول أي محاولة للدخول ، سيتم إرسال جميع بياناتك إلى الفريق الفني ، وسيعتبر هذا محاولة لكسر القواعد العامة")</script>';
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
	<link rel="stylesheet" type="text/css" href="../../../sign_in/css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="../../../sign_in/fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="../../../sign_in/css/style.css"/>
</head>
<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">
			<form class="form-detail" action="" method="post">
				<h1>se connecter  ADMIN</h1>
				
				<div class="form-row">
					<label for="your-USER_admin">UserName</label>
					<input type="text" name="USER_admin" id="your-USER_admin" class="input-text" placeholder="UserName" required >
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="password">Mot de passe</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Password" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row-last">
					<input type="submit" name="entre" class="register" value="entre">
				</div>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>