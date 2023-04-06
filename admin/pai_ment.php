<?php
session_start();
$birthday=$birthday0=$birthday1=$pass=$datee=$id_client_pere=$code=$code_pere=$date_cre=$Email=$first_N=$id_client=$last_N=$n_ccp=$N_d_c=$password=$price=$tlph=$type_c=$validation=$willaya="";
$conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
if ($conn->connect_error){
    die("error de connecte base de donnee :".$conn->connect_error);
}
if(empty($_SESSION["USER_admin"])){
	$USER_admin=$_SESSION["USER_admin"];
	  
	header("location: a-01/a-00/sign_in.php");
  
	 
	 
		  
		  
	 
	}else{
		if (isset($_GET['U'])){
		
		$USER_admin=$_SESSION["USER_admin"];
	  }else{
		header("location: a-01/a-00/sign_in.php");
	  }
	}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>paiement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img4.jpg');">
	<section class="ftco-section">
			
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9 text-center mb-9">
					<h2 class="heading-section">tous mes utilisateur qui n'est pas regeler ses feacture </h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-xl">
						  <thead>
						    <tr>
									<th>&nbsp;</th>	
									<th>identite</th>	
									<th>Numero ccp</th>
									<th>contacte</th>
									<th>montant</th>
						      		<th>Status</th>
						      
						    </tr>
						  </thead>
						  <tbody>
						   <?php
						 $sql = "SELECT * FROM client where (price>0)";
						 $result = mysqli_query($conn, $sql); 
						 if (mysqli_num_rows($result) > 0) {
							 while($row = mysqli_fetch_assoc($result)) {
								 $id_client=$row['id_client'];
								 $code=$row['code'];
								 $code_pere=$row['code_pere'];
								 $date_cre=$row['date_cre'];
								 $Email=$row['Email'];
								 $first_N=$row['first_N'];
								 $last_N=$row['last_N'];
								 $n_ccp=$row['n_ccp'];
								 $N_d_c=$row['N_d_c'];
								 $price=$row['price'];
								 $tlph=$row['tlph'];
								 $tlph=$row['tlph'];
								 
								 $validation=$row['validation'];
								 $birthday=$row['birthday'];


								 if ($type_c==false){
									$tc="basique";
								 }else{
									$tc="prenium";
								 }
								 if (($validation==true)&&($price>0)){
									$vl="<span class='active'>Active</span>";
									echo "<tr class='alert' role='alert'>
								<td>
											<div class='pl-3 email'>
													<span>$id_client</span>
													<span>Added: $date_cre</span>
												</div>
									</td>
									<td>
											<div class='pl-3 email'>
													<span>$first_N $last_N</span><br>
													<span>Nºcarte:$N_d_c</span>
												</div>
									</td>
									
									
									<td>
											<div class='pl-3 '>
													<span>$n_ccp</span>
	
												</div>
									</td>
									
							  <td >
								  
								  <div class='pl-3 '>
									  <span>Email: $Email</span><br>
									  <span>Tlph: $tlph</span>
								  </div>
									</td>

									<td>
											<div class='pl-3 '>
													<span>$tc</span><br>
													<span>$price.00 DA</span>
	
												</div>
									</td>

									<td class='status'>$vl</td>
									<td>
											<div class='pl-3 '>
											<form action='cal_pai.php' method='get'>
											<input type='hidden' name='id_client' value='$id_client'>
											<input type='hidden' name='price' value='$price'>
											<input type='submit' class='btn col-12 btn-primary' value='faire un paiement' >
										  </form>
	
												</div>
									</td>
							  
							</tr>";
								 }
								
								
	
							 }  


							 }
							 
						 
						 
						   ?>

						    
						    
						    
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
			
	</section>
</div>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

