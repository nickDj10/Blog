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
                            Comments
                            <small>Admin / <?=$_SESSION['username']?></small>
                        </h1>

                        <?php 
                            include "includes/view_all_comments.php";
                        ?>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <?php include "includes/admin-footer.php" ?>

</body>


