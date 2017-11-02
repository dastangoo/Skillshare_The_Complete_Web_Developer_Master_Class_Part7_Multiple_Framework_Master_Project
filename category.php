<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Online Shopping</title>
    <?php include 'includes/links.php' ?>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
      <div class="row">
        <?php
          if (isset($_GET['category'])) {
            $sql = "SELECT * FROM items WHERE item_cat = '$_GET[category]'";
            $run = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($run)) {
              $item_title = str_replace(' ', '-', $rows['item_title']);
              echo "
                <div class='col-md-3'>
                  <div class='col-md-12 single-item noPadding'>
                    <div class='top'>
                      <img src='$rows[item_image]' alt='Watch for Men' class='img-responsive' title='Watch for Men'>
                    </div>
                    <div class='bottom'>
                      <h3 class='item-title'><a href='item.php?item_title=$item_title&item_id=$rows[item_id]'>$rows[item_title]</a></h3>
                      <div class='pull-right cutted-price text-muted'><del>$ $rows[item_price]/=</del></div>
                      <div class='clearfix'></div>
                      <div class='pull-right discounted-price'>$ " . ($rows['item_price'] - $rows['item_discount']) . "/=</div>
                    </div>
                  </div>
                </div>
              ";
            }
          }
        ?>
      </div>
    </div>
    <div class="clearfix"></div>
    <?php include 'includes/footer.php' ?>
  </body>
</html>
