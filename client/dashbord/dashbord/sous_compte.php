<?php
session_start();
$birthday=$id1=$id_client1=$ps=$birthday0=$birthday1=$pass=$datee=$id_client_pere=$code=$code_pere=$date_cre=$Email=$first_N=$id_client=$last_N=$n_ccp=$N_d_c=$password=$price=$tlph=$type_c=$validation=$willaya="";
$nbr_son=$price=0;
 if(!empty($_SESSION["id"])){
$id=$_SESSION["id"];

  


$conn=new mysqli("fdb1030.awardspace.net","4290187_mark","Chaouia1996@","4290187_mark");
if ($conn->connect_error){
    die("error de connecte base de donnee :".$conn->connect_error);
}

if (isset($_POST['id_v'])){

$id1=$_POST['id_v'];
$sql = "SELECT * FROM client where (id_client=$id1) ";
						 $result = mysqli_query($conn, $sql); 
						 if (mysqli_num_rows($result) > 0) {
							 while($row = mysqli_fetch_assoc($result)) {
								 $id_client1=$row['id_client'];
                 $code=$row['code'];
                 
								 $date_cre=$row['date_cre'];
								 $Email=$row['Email'];
								 $first_N=$row['first_N'];
								 $last_N=$row['last_N'];
								 
								 $type_c=$row['type_c'];
								 $validation=$row['validation'];
								


								 if ($type_c==false){
                  $tc="basique";
                  $ps=15;
								 }else{
                  $tc="prenium";
                  $ps=30;
								 }
								 if (($validation==false)||($validation==null)){
									$vl="<span class='waiting'>En attente d'affectation</span>";
								 }else{
									$vl="<span class='active'>Active</span>";
                 }
                }
              }else{
                
                echo "<script type='text/javascript'> window.location.href = 'dashbord.php'; </script>";
              }
              $sql = "SELECT count(id_pere) AS nbr_son FROM family where(id_pere=$id_client1) ";
              $result = mysqli_query($conn, $sql); 
              if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
                     $nbr_son=$row['nbr_son'];
                 }
              }


            
          }
        else{
          echo "<script type='text/javascript'> window.location.href = '../../../../index.html'; </script>";
        }
        }
          else{
            echo "<script type='text/javascript'> window.location.href = '../../../index.html'; </script>";
          }


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sous_compte </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/overlayscrollbars/css/OverlayScrollbars.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-inner">
        <!-- Sidebar Header    -->
        <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="person">
            <h2 class="h5 text-white text-uppercase mb-0"><?=$last_N?> <?=$first_N?></h2>
            
          </div>
          <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center" href="index.html">
            <p class="h1 m-0">F B</p></a>
        </div>
        <!-- Sidebar Navigation Menus--><span class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
        <ul class="list-unstyled">                  
          <li class="sidebar-item"><a class="sidebar-link" href="dashbord.php"> 
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                <use xlink:href="#real-estate-1"> </use>
              </svg>Dashbord </a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="mailto:Future.b.company@gmail.com?subject=demande de mise à niveau Subject&body=Je suis {<?=$first_N?> <?=$last_N?> }le numéro de compte  {<?=$id_client?>}, le numéro de carte d`identité {<?=$N_d_c?>} et le numéro de compte{<?=$n_ccp?>}
Je vous demande de mettre à niveau mon compte vers prenuim svp"> 
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                <use xlink:href="#sales-up-1"> </use>
              </svg>UP-sgrade </a></li>
          <li class="sidebar-item "><a class="sidebar-link" href="groupe.php"> 
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg>Groupe </a></li>
              <li class="sidebar-item"><a class="sidebar-link" href='../../about_me.php?p=<?=$code?>&i=<?=$id?>'> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                </svg> profile </a></li>
                <li class="sidebar-item"> <a class="sidebar-link" href="demande.php"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                    <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
                  </svg>demande un paiement</a></li>
              <li class="sidebar-item"> <a class="sidebar-link" href=""> 
                <svg class="svg-icon svg-icon-xs svg-icon-heavy me-2">
                  <use xlink:href="#security-shield-1"> </use>
                </svg>suport</a></li>
        </ul>
          
        </ul>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header mb-5 pb-3">
        <nav class="nav navbar fixed-top">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between w-100">
              <div class="d-flex align-items-center"><a class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn" href="#">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                    <use xlink:href="#menu-1"> </use>
                  </svg></a><a class="navbar-brand ms-2" href="../../../index.html">
                  <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><strong class="text-primary text-sm">futur business </strong><span class="text-white fw-normal text-xs">company</span></div></a></div>
              <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <li class="nav-item dropdown"> <a class="nav-link text-white position-relative" id="notifications" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#chart-1"> </use>
                    </svg><span class="badge bg-warning">12</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="notifications">
                    <li><a class="dropdown-item py-3" href="#!"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-blue">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#envelope-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">You have 6 new messages </span><small class="small text-gray-600">4 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#!"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-green">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#chats-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span><small class="small text-gray-600">4 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#!"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-orange">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#checked-window-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">Server Rebooted</span><small class="small text-gray-600">8 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#!"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-green">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#chats-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span><small class="small text-gray-600">10 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item all-notifications text-center" href="#!"> <strong class="text-xs text-gray-600">view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages dropdown-->
                
                <!-- Languages dropdown    -->
               
                <!-- Log out-->
                <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="../../log_out.php"> <span class="d-none d-sm-inline-block">Logout</span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#security-1"> </use>
                    </svg></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      <section class="py-5">
        <div class="container-fluid">
          <div class="row align-items-stretch gy-4">
            <div class="col-lg-4">
              <!-- Income-->
              <div class="card text-center h-100 mb-0">
                <div class="card-body">
                               
                   
                  <p class="text-primary h2 fw-bold display-4"><?=$first_N?> <?=$last_N?></p>
                  <p class="text-gray-700 display-7">compte numero <?=$id_client1?></p>
                  <p >etat du compte : <?=$vl?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- Income-->
              <div class="card text-center h-100 mb-0">
                <div class="card-body">
                  <p class="text-gray-700 display-7">type du compte</p>
                  <p class="text-primary h1 fw-bold display-4"><?=$tc?></p>
                  <p class="text-xs text-gray-600 mb-0">15% benifice pour basique et 30% pour prenium  .</p>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </section>
      <!-- Statistics Section-->
      <section class="py-5">
        <div class="container-fluid">
          <div class="row align-items-stretch gy-4">
          <div class="col-sm-12 float-left">
    <table class="table">
      <thead>
        <tr>
          <th>N client </th>
          <th>nom </th>
          <th>date de creation</th>
          <th>type d'abonnement</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * from client where(code_pere='$code') ";
        $result = mysqli_query($conn, $sql);
        if ($result != false) { 
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $id2=$row['id_client'];
                $nom=$row['first_N'];
                $prnom=$row['last_N'];
                $dct=$row['date_cre'];
                $tce1=$row['type_c'];
                if ($tce1==false){
                 $tce="basique";
                
                }else{
                 $tce="prenium";
                 
                }
                echo "<tr>
           <td>$id2</td>
           <td>$nom $prnom</td>
           <td>$dct</td>
           <td>$tce</td>
           <td><form action='' method='post'><input type='hidden' name='id_v' value='$id2'><input type='submit' value='voir'></form></td>
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
      <!-- Updates Section -->
      
      <footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2" style="background: #222">
        <div class="container-fluid">
          <div class="row text-center gy-3">
            <div class="col-sm-6 text-sm-start">
              <p class="mb-0 text-sm text-gray-600">futur business company &copy; 2023</p>
            </div>
            <div class="col-sm-6 text-sm-end">
              <p class="mb-0 text-sm text-gray-600">Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">eurl mnsl</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="vendor/overlayscrollbars/js/OverlayScrollbars.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>