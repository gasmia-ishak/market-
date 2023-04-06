<?php
session_start();
if(empty($_SESSION["USER_admin"])){
  $USER_admin=$_SESSION["USER_admin"];
    
  header("location: a-01/a-00/sign_in.php");

   
   
        
        
   
  }
  else{
    if (isset($_GET['U'])){
    
    $USER_admin=$_SESSION["USER_admin"];
  }else{
    header("location: a-01/a-00/sign_in.php");
  }

}

?>



<!DOCTYPE html>
<html>
  <head>
    <title>admin page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../client/log_out.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container mt-4">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4 mt-5">
          <a href=<?php echo "get_all.php?U=$USER_admin";?>><button class="btn btn-primary btn-lg btn-block ">tous les utlisateurs</button></a>
        </div>
        <div class="col-md-4 mt-5">
                <a href=<?php echo "get_no_active.php?U=$USER_admin";?>><button class="btn btn-success btn-lg btn-block">valider les comptes</button></a>
        </div>
        <div class="col-md-4 mt-5">
                <a href=<?php echo "pai_ment.php?U=$USER_admin";?>><button class="btn btn-danger btn-lg btn-block">fiare un paiement</button></a>
        </div><div class="col-md-4 mt-5">
                <a href=<?php echo "list_demande.php?U=$USER_admin";?>><button class="btn btn-lg btn-block">demande du paiement</button></a>
        </div>
      </div>
    </div>
    
  </body>
</html>
