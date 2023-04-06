<?php
session_start();
if(empty($_SESSION["USER_admin"])){
  $USER_admin=$_SESSION["USER_admin"];
    
  header("location: a-01/a-00/sign_in.php");

   
   
        
        
   
  }
$id_client=$price=$clmo=$d_p=$paie=$p="";
$conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
if ($conn->connect_error){
    die("error de connecte base de donnee :".$conn->connect_error);
}
if ((isset($_GET['id_client']))&&(isset($_GET['price']))){
    $id_client=$_GET['id_client'];
    $price=$_GET['price'];
    $sql = "SELECT first_n,last_n,code,price FROM client where (id_client=$id_client)";
						 $result = mysqli_query($conn, $sql); 
						 if (mysqli_num_rows($result) > 0) {
							 while($row = mysqli_fetch_assoc($result)) {
                                $first_n=$row['first_n'];
                                $last_n=$row['last_n'];
                                $code=$row['code'];
                                $price=$row['price'];

                                
                             }
                            }
    if ((isset($_POST['paie']))&&(isset($_POST['d_p']))){
        $paie= $_POST['paie'];   
        $d_p= $_POST['d_p']; 
        if(($paie!="")&&($d_p!="")){
        if($paie<=$price){
        $p=$price-$paie;
        $sql = "UPDATE client SET price=$p WHERE id_client=$id_client";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('L`opération a réussi ... voir le transaction')</script>";
            header("Location: cal_pai.php?id_client=$id_client&price=$price");
        } 
        }else{
            echo "<script>alert('alert : le paiement superieur au total svp verfier bien ')</script>";

        }
        }else{
         echo "<script>alert('alert ')</script>";
         header("Location: cal_pai.php?id_client=$id_client&price=$price");
        }
    }


}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bank Check Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">cheque du paiement </h4>
              <form action="" method="POST">
                <div class="form-group row">
                  <label for="pay-to" class="col-sm-4 col-form-label">utilisateur id:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pay-to" value="<?=$id_client?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                        <label for="memo" class="col-sm-4 col-form-label">nom utilisateur:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="memo" value="<?=$first_n?> <?=$last_n?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="memo" class="col-sm-4 col-form-label">code du compte:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="memo" value="<?=$code?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="memo" class="col-sm-4 col-form-label">total du compte:</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="memo" value="<?=$price?>.00 Da" readonly>
                        </div>
                      </div>
                      
                <div class="form-group row">
                  <label for="date" class="col-sm-4 col-form-label">Date:</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="date" name="d_p">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="amount" class="col-sm-4 col-form-label">paie:</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Da</span>
                      </div>
                      <input type="text" class="form-control" id="amount" name="paie">
                    </div>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary float-right">faire transaction</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
