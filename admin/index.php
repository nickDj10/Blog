<!-- HEADER -->
<?php include "includes/admin-header.php" ?>

<body>

    <div id="wrapper">

        <!-- NAVIGATION -->

        <?php include "includes/admin-navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <?=ucfirst($_SESSION['username'])?> / <small>Admin</small>
                        </h1>
                        
                        <!-- Panel div -->
                        <?php include "includes/panel.php";?>     

                        <!-- Dashboard div -->
                        <?php include "includes/dashboard.php";?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- FOOTER -->

    <?php include "includes/admin-footer.php" ?>

</body>


