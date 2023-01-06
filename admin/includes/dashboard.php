<!-- Post Dashboard -->

<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChartPost);

    function drawChartPost() {
      var data = google.visualization.arrayToDataTable([
        ["", "", { role: "style" } ],

        // Published Post
        <?php
          $query = "SELECT * FROM posts WHERE  post_status = 'published'";
          $published_query = mysqli_query($connection,$query);

          $published_post = mysqli_num_rows($published_query);

          echo "['Published Post', $published_post, '#337ab7'],";

        ?>

        // Draft Post
        <?php
          $query = "SELECT * FROM posts WHERE  post_status = 'drafted'";
          $draft_query = mysqli_query($connection,$query);

          $draft_post = mysqli_num_rows($draft_query);

          echo "['Draft Post', $draft_post, 'stroke-color: #337ab7; stroke-width: 1; fill-color: #9fc5e5'],";

        ?>

      ]);

      var view = new google.visualization.DataView(data);
      var options = {
        title: "",
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("post_div"));
      chart.draw(view, options);
  }
</script>

<!-- Comment Dashboard -->

<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChartComment);
    function drawChartComment() {
      var data = google.visualization.arrayToDataTable([
        ["", "", { role: "style" } ],

        // Approved Comment
        <?php
          $query = "SELECT * FROM comments WHERE  comment_status = 'approved'";
          $approved_query = mysqli_query($connection,$query);

          $approved_comment = mysqli_num_rows($approved_query);

          echo "['Approved Comment', $approved_comment, '#5cb85c'],";

        ?>

        // Unapproved Comment
        <?php
          $query = "SELECT * FROM comments WHERE  comment_status = 'unapproved'";
          $unapproved_query = mysqli_query($connection,$query);

          $unapproved_comment = mysqli_num_rows($unapproved_query);

          echo "['Unapproved Comment', $unapproved_comment, 'stroke-color: #5cb85c; stroke-width: 1; fill-color: #c6e6c6'],";

        ?>

      ]);

      var view = new google.visualization.DataView(data);
      var options = {
        title: "",
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("comment_div"));
      chart.draw(view, options);
  }
</script>

<script>
    window.onresize = responsiveChart;
    function responsiveChart(){
      drawChartComment();
      drawChartPost();
    }
</script>


<div>
  <div>
    <h3 class="text-center">Posts</h3>
    <div id="post_div" style="width: auto;"></div>
  </div>

  <div>
    <h3 class="text-center">Comments</h3>
    <div id="comment_div" style="width: auto;"></div>
  </div>
</div>