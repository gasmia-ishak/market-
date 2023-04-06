<?php
session_start();
$birthday=$birthday0=$birthday1=$pass=$datee=$id_client_pere=$code=$code_pere=$date_cre=$Email=$first_N=$id_client=$last_N=$n_ccp=$N_d_c=$password=$price=$tlph=$type_c=$validation=$willaya="";
$nbr_son=$price=0;
 if(!empty($_SESSION["id"])){
$id=$_SESSION["id"];

  


$conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
if ($conn->connect_error){
    die("error de connecte base de donnee :".$conn->connect_error);
}

if ((isset($_GET['i']))&&(isset($_GET['p']))){
$CD=$_GET['p'];
$id_client=$_GET['i'];

$sql = "SELECT * FROM client where (id_client=$id_client and code='$CD') ";
						 $result = mysqli_query($conn, $sql); 
						 if (mysqli_num_rows($result) > 0) {
							 while($row = mysqli_fetch_assoc($result)) {
								 $id_client=$row['id_client'];
                 $code=$row['code'];
                 $willaya=$row['willaya'];
								 $code_pere=$row['code_pere'];
								 $date_cre=$row['date_cre'];
								 $Email=$row['Email'];
								 $first_N=$row['first_N'];
								 $last_N=$row['last_N'];
								 $n_ccp=$row['n_ccp'];
								 $N_d_c=$row['N_d_c'];
								 $price=$row['price'];
								 $tlph=$row['tlph'];
								 $type_c=$row['type_c'];
								 $validation=$row['validation'];
								 $birthday=$row['birthday'];


								 if ($type_c==false){
									$tc="basique";
								 }else{
									$tc="prenium";
								 }
								 if (($validation==false)||($validation==null)){
									$vl="<span class='waiting'>En attente d'affectation</span>";
								 }else{
									$vl="<span class='active'>Active</span>";
                 }
                }
              }else{
                
                echo "<script type='text/javascript'> window.location.href = '../index.html'; </script>";
              }
              $sql = "SELECT count(id_pere) AS nbr_son FROM family where(id_pere=$id_client) ";
              $result = mysqli_query($conn, $sql); 
              if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
                     $nbr_son=$row['nbr_son'];
                 }
              }


            }else{
              echo "<script type='text/javascript'> window.location.href = '../index.html'; </script>";
            }
          }
          else{
            echo "<script type='text/javascript'> window.location.href = '../index.html'; </script>";
          }

?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Form-v5 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->


<title>about me - Bootdey.com</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    color: #6F8BA4;
    margin-top:20px;
}
.btn{

}
.status .active {
    background: #cff6dd;
    color: #1fa750;
   }
.status .active:after {
      background: #23bd5a; 
}
.status .waiting {
    background: #fdf5dd;
    color: #cfa00c; }
.status .waiting:after {
      background: #f2be1d; }

.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}

.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}


    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="../client/dashbord/dashbord/dashbord.php">futur business company</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="log_out.php">se déconnecter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<section class="section about-section gray-bg" id="about">
<div class="container">
<div class="row align-items-center flex-row-reverse">
<div class="col-lg-6">
<div class="about-text go-to">
<h3 class="dark-color"><?php echo "$first_N $last_N";?></h3>
<h6 class="theme-color lead">Page de profile et toutes mes informations</h6>
<?php echo "<div class='status'>Etat de compte : $vl" ?>
    
</div>
<br>
<div class="row about-list">
<div class="col-md-6">
<div class="media">
<label>Date De Naissance</label>
<p><?=$birthday?></p>
</div>
<div class="media">
<label>Ville</label>
<p><?=$willaya?></p>
</div>
<div class="media">
<label>Numéro de piéce d'identité</label>
<p><?=$N_d_c?></p>
</div>
</div>
<div class="col-md-6">
<div class="media">
<label>E-mail</label>
<p><a href="mailto:<?=$Email?>" class="__cf_email__" data-cfemail="adc4c3cbc2edc9c2c0ccc4c383cec2c0"><?=$Email?></a></p>
</div>
<div class="media">
<label>Téléphone</label>
<p><?=$tlph?></p>
</div>
<div class="media">
<label>Numéro CCP</label>
<p><?=$n_ccp?></p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="about-avatar">
<img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt=""><br>
</div>

</div>
</div>
<div class="counter">
<div class="row">
<div class="col-6 col-lg-3">
    
<div class="count-data text-center">
<h6 class="count h2" data-to="500" data-speed="500"><?=$code?></h6>
<p class="m-0px font-w-600">Code d'invitation</p>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="150" data-speed="150"><?=$price?>.00 Da</h6>
<p class="m-0px font-w-600">Montant Total</p>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="850" data-speed="850"><?=$nbr_son?></h6>
<p class="m-0px font-w-600">Nombre des invités directs</p>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="190" data-speed="190"><?=$tc?></h6>
<p class="m-0px font-w-600">Type de compte</p>
</div>
</div>
</div>
</div>
</div>
</section>

<section>
<div class="row">
  <div class="col-sm-6 float-left">
    <table class="table">
      <thead>
        <tr>
          <th>N client </th>
          <th>nom </th>
          <th>date de creation</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * from client where(code_pere='$code') ";
        $result = mysqli_query($conn, $sql);
        if ($result != false) { 
        if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
               $id=$row['id_client'];
               $nom=$row['first_N'];
               $prnom=$row['last_N'];
               $dct=$row['date_cre'];
               echo "<tr>
          <td>$id</td>
          <td>$nom $prnom</td>
          <td>$dct</td>
        </tr>";
           }
        }}
        else {
          echo "<tr>
          <td>0</td>
          <td>0</td>
          <td>0</td>
        </tr>";
        }
        
        ?>
      </tbody>
    </table>
  </div>
 




</section>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>