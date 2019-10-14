<?php
  include("newconn.php");
  $conn = OpenCon();
  echo "Connected Successfully";

$search_sql="SELECT treats_steps FROM treats where treatmentid=(SELECT treatmentId from injuries where InjuryName like '%".$_POST['search']."%')";
$search_query=mysqli_query($conn,$search_sql);
if(mysqli_num_rows($search_query)!=0){
$search_rs=mysqli_fetch_assoc($search_query);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>APP-Les</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->

    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container h-100">
                    <a class="navbar-brand" href="index.php">
                        <h1 class="tm-site-title mb-0">APP-les</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars tm-nav-icon"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto h-100">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>





                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-block" href="login.php">
                                    <b>Logout</b>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </nav>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container ans">
            <form  method="post" action="firstaid.php"  name="form1">
     	        <input  type="text" name="search">
     	        <input  type="submit" name="submit" value="Search">
           </form>
            <h2 style="color:white">Follow these steps and you're through</h2>
<?php if(mysqli_num_rows($search_query)!=0){
    do{?>
      <p style="color:white"><?php echo $search_rs['treats_steps']; ?></p>


    <?php }while($search_rs=mysqli_fetch_assoc($search_query));

}
else {
    echo "No Results Found";
} ?>

            </div>
            <!-- table container -->


          </div>
        </div>

            <!-- table container -->

          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2019</b> All rights reserved.


        </p>
      </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script>
  </body>
</html>
