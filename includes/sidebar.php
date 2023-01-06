<div class="sidebar">
  <div class="search">
    <!-- User Search -->
    <form class="search-form" action="search.php" method="POST">
        <input
          type="text"
          placeholder="Blog Search..."
          name="search_input"
          class="search-btn"
        />
        <button type="submit" name="search_submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  <div class="categories">
    <div class="categories-info">
        <div class="categories-info__line"></div>
        <div><h3>Search By Categories</h3></div>
        <div class="categories-info__line"></div>
    </div>
    <div class="categories-list">
        <ul>
          <?php 
          
            $query = "SELECT * FROM categories";
            $display_cat_list = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($display_cat_list)){
              $category_id = $row['cat_id'];
              $category_name = $row['cat_title'];
              echo "<li><a href='category.php?category_id=$category_id'>$category_name </a></li>";
            }

          ?>
        </ul>
    </div>
  </div>
</div>

