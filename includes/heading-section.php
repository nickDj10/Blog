<header
  style="
      background-image: linear-gradient(
            rgba(16, 29, 44, 0.7),
            rgba(16, 29, 44, 0.7)
        ),
        url(media/main-bg.jpg);
  "
  >
  <nav class="head-nav" id="mynav">
      <ul class="head-nav__ul">
        <li><a class="link-nav" href="index.php">Logo</a></li>

        <?php
            if(isset($_SESSION['username'])){
                if($_SESSION['role'] == "admin"){
            ?>
                <li><a href="admin" class="link-nav">Profile</a></li>
            <?php
                }else{
            ?>
                <li><a href="subscriber" class="link-nav">Profile</a></li>
            <?php
                }
                ?>
        <?php
            }else {
        ?>
            <li id="myButton">Profile</li>
        <?php
            }
        ?>
      </ul>
  </nav>
  <div class="head-title">
      <h1>tell us your story</h1>
  </div>
</header>