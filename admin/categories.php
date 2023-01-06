<!-- HEADER -->
<?php include "includes/admin-header.php" ?>

<?php 
    $message_edit = ""; 
    $message_add = "";
?>


<!-- CREATE Category -->

    <?php

        if(isset($_POST['submit_cat'])){
            $cat_title = $_POST['new_cat'];

            $query = "INSERT INTO categories(cat_title) VALUE ('$cat_title')";
            $create_cat = mysqli_query($connection,$query);

            $message_add = "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Success!</strong> Category has been created.
                <br>
                <a href='categories.php'>Add New</a>
            </div> 
        ";
        }

    ?>

<!-- UPDATE Category -->

    <?php

        if(isset($_POST['submit_update'])){
            $edit_cat_id = $_GET['edit'];
            $cat_new_title = $_POST['edit_cat'];

            $query = "UPDATE categories SET cat_title = '$cat_new_title' WHERE cat_id = '$edit_cat_id'";
            $create_cat = mysqli_query($connection,$query);

            // header("Location: categories.php");

            $message_edit = "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Success!</strong> Category has been edited.
                <br>
                <a href='categories.php'>Add New</a>
            </div> 
        ";
        }

    ?>

<!-- DELETE Category -->

    <?php

        if(isset($_GET['delete'])){
            $del_cat_id = $_GET['delete'];
            
            $query = "DELETE FROM categories WHERE cat_id = '$del_cat_id'";
            $delete_cat = mysqli_query($connection,$query);
        }

    ?>

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
                            Categories
                            <small>Admin / <?=$_SESSION['username']?></small>
                        </h1>

                        <div class="col-md-6">

                            <?=$message_edit?>

                            <!-- Update Category FORM -->

                            <?php

                                if(isset($_GET['edit'])){
                                    $edit_input_id = $_GET['edit'];

                                    $query = "SELECT * FROM categories WHERE cat_id = $edit_input_id";
                                    $edit_input_query = mysqli_query($connection,$query);
                                    $row = mysqli_fetch_assoc($edit_input_query);
                                    $edit_input_title = $row['cat_title'];
                                    
                            ?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Edit Category</label>
                                            <input type="text" name="edit_cat" class="form-control" value="<?=$edit_input_title?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Edit" class="btn btn-primary" name="submit_update">
                                        </div>
                                    </form>

                            <?php
                                }else {
                            ?>
                            
                            <?=$message_add?>
                            <!-- Create Category FORM -->

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Add Category</label>
                                            <input type="text" name="new_cat" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Add" class="btn btn-primary" name="submit_cat">
                                        </div>
                                    </form>
                            <?php
                                }
                            ?>

                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Category Title</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <!-- READ Categories Info -->
                                        <?php 
                                            $query = "SELECT * FROM categories";
                                            $read_cat = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($read_cat)){
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];
                                        ?>
                                            <tr>
                                                <td class="text-center"><?=$cat_id?></td>
                                                <td class="text-center"><?=$cat_title?></td>
                                                <td class="text-center"><a href="categories.php?edit=<?=$cat_id?>">Edit</a></td>
                                                <td class="text-center"><a href="categories.php?delete=<?=$cat_id?>">Delete</a></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <?php include "includes/admin-footer.php" ?>

</body>


