<?php
session_start();
if(empty($_SESSION["USER_admin"])){
  $USER_admin=$_SESSION["USER_admin"];
    
  header("location: a-01/a-00/sign_in.php");

   
   
        
        
   
  }
  else{
    if (isset($_GET['U'])){
    
    $USER_admin=$_SESSION["USER_admin"];
    $conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
if ($conn->connect_error){
    die("error de connecte base de donnee :".$conn->connect_error);
}
  }else{
    header("location: a-01/a-00/sign_in.php");
  }

}

?>



<!DOCTYPE html>
<html>
  <head>
    <title>liste du demENDE </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
  <section class="py-5">
        <div class="container-fluid">
          <div class="row align-items-stretch gy-4">
          <div class="col-sm-12 float-left">
    <table class="table">
      <thead>
        <tr>
          <th>N demande </th>
          <th>nom </th>
          <th>montant total</th>
          <th>date de demande</th>
          <th>n ccp</th>
          <th>contacte</th>
          <th>montant demande</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * from demande  ";
        $result = mysqli_query($conn, $sql);
        if ($result != false) { 
        if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
               $id=$row['id_client'];
               $id_demande=$row['id_demande'];
               $montant=$row['montant'];
               $datew=$row['date_dem'];
               $sql1 = "SELECT * FROM client where (id_client=$id) ";
               $result1 = mysqli_query($conn, $sql1); 
               if (mysqli_num_rows($result1) > 0) {
                   while($row = mysqli_fetch_assoc($result1)) {
                    $first_N=$row['first_N'];
                    $last_N=$row['last_N'];
                    $n_ccp=$row['n_ccp'];
                    $N_d_c=$row['N_d_c'];
                    $email=$row['Email'];
                    $price=$row['price'];
                    $tlph=$row['tlph'];}
        }
               echo "<tr>
          <td>$id_demande</td>
          <td>$first_N $last_N</td>
          <td>$price,00 Da</td>
          <td>$datew</td>
          <td>$n_ccp</td>
          <td>tlph: $tlph<br>Email: $email</td>
          <td>$montant,00 Da</td>
        </tr>";
           }
                   }else {
          echo "<tr>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
        </tr>";
        }}
        
        
        ?>
      </tbody>
    </table>
    
          </div>
        </div>
      </section>



  </body>