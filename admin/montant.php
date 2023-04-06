<?php
session_start();
if(empty($_SESSION["USER_admin"])){
    $USER_admin=$_SESSION["USER_admin"];
      
    header("location: a-01/a-00/sign_in.php");
  
     
     
          
          
     
    }


$id_client=$type_c=$clmo="";
$conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
if ($conn->connect_error){
    die("error de connecte base de donnee :".$conn->connect_error);
}
if ((isset($_GET['id_client']))&&(isset($_GET['type_c']))){
    $id_client=$_GET['id_client'];
    $type_c=$_GET['type_c'];
    if($type_c==0){
        $clmo=7000;
    }else{
        $clmo=15000;
    }
$sql = "UPDATE client SET validation=1 WHERE id_client=$id_client";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully 0";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

$sql = "SELECT id_pere FROM family where (id_son=$id_client)";
					$result = mysqli_query($conn, $sql); 
					if (mysqli_num_rows($result) > 0) {
							 while($row = mysqli_fetch_assoc($result)) {
                                 $id_pere=$row['id_pere'];
                             }
                             $sql = "SELECT count(id_pere) AS nbr_son FROM family where(id_pere=$id_pere) ";
                             $result = mysqli_query($conn, $sql); 
                             if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $nbr_son=$row['nbr_son'];
                                }
                             }

                            $sql = "SELECT type_c,price FROM client where (id_client=$id_pere)";
                            $result = mysqli_query($conn, $sql); 
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $type_c_P=$row['type_c'];
                                    $price=$row['price'];
                                    if($type_c_P==0){
                                        $price=$price+(($clmo*15)/100);
                                    }else{
                                        $price=$price+(($clmo*30)/100);
                                    }
                                }
                            }

                            $sql = "UPDATE client SET price=$price WHERE id_client=$id_pere";

                            if (mysqli_query($conn, $sql)) {
                              echo "Record updated successfully 1";
                            } 

                        while (($nbr_son<5)&&($id_pere!=0)){
                            $id_client=$id_pere;
                            
                            $sql = "SELECT id_pere FROM family where (id_son=$id_client)";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0){
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id_pere=$row['id_pere'];
                                    
                                }
                                $sql = "SELECT count(id_pere) AS nbr_son FROM family where(id_pere=$id_pere) ";
                                $result = mysqli_query($conn, $sql); 
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $nbr_son=$row['nbr_son'];
                                    }
                                } 
                               
                                if($nbr_son>=5) {
                                    $sql = "SELECT type_c,price FROM client where (id_client=$id_pere)";
                                    $result = mysqli_query($conn, $sql); 
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $type_c_P=$row['type_c'];
                                            $price=$row['price'];
                                            if($type_c_P==0){
                                                $price=$price+(($clmo*15)/100);
                                            }else{
                                                $price=$price+(($clmo*30)/100);
                                            }
                                        }
                                        $sql = "UPDATE client SET price=$price WHERE id_client=$id_pere";

                                if (mysqli_query($conn, $sql)) {
                                  echo "Record updated successfully 2";
                                } 
                                        }
                                }
                            
                                
                        }else
                        {
                            $id_pere = 0;  
                            echo ("id pere is :$id_pere , price is :0 ");
                        }
                        }                   

                        
                    }

                    echo "<script type='text/javascript'> window.location.href = 'client.php'; </script>";


}

?>