<!-- HEADER -->
<?php include "includes/sub-header.php" ?>

<body>

    <div id="wrapper">

        <!-- NAVIGATION -->

        <?php include "includes/sub-navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                            <small>Subscriber / <?=$_SESSION['username']?></small>
                        </h1>

                        <?php 

                          if(isset($_GET['source'])){
                            $source = $_GET['source'];
                          }else {
                            $source = "";
                          }

                          switch($source){
                            case "add_post" : 
                              include "includes/add_post.php";
                              break;
                            case "edit_post" : 
                                include "includes/edit_post.php";
                                break;
                            default :
                                include "includes/view_all_posts.php";
                          }

                        ?>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <?php include "includes/sub-footer.php" ?>

</body>


