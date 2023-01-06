<!-- HEADER -->
<?php include "includes/admin-header.php" ?>

<body>

    <div id="wrapper">

        <!-- NAVIGATION -->

        <?php include "includes/admin-navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small>Admin / John Doe</small>
                        </h1>

                        <?php 

                          if(isset($_GET['source'])){
                            $source = $_GET['source'];
                          }else {
                            $source = "";
                          }

                          switch($source){
                            case "add_user" : 
                              include "includes/add_user.php";
                              break;
                            case "edit_user" : 
                                include "includes/edit_user.php";
                                break;
                            default :
                                include "includes/view_all_users.php";
                          }

                        ?>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <?php include "includes/admin-footer.php" ?>

</body>


