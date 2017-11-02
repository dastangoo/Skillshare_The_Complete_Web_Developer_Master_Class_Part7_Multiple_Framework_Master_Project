<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Product detail</title>
    <?php include 'includes/links.php' ?>
    <style media="screen">
      .btn {
        border-radius: 0;
      }
    </style>
  </head>
  <body>

    <?php include 'includes/header.php' ?>
    <div class="container">
      <div class="row">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <?php 
            if (isset($_GET['item_id'])) {
              $sql = "SELECT * FROM items WHERE item_id='$_GET[item_id]'";
              $run = mysqli_query($conn, $sql);
              while ($rows = mysqli_fetch_assoc($run)) {
                $item_cat = ucwords($rows['item_cat']);
                $item_id = $rows['item_id'];
                echo "
                  <li><a href='category.php?category=$item_cat'>$item_cat</a></li>
                  <li class='active'>$rows[item_title]</li>
                ";
          ?>
        </ol>
      </div>
      <?php
                echo "
                  <div class='row'>
                    <div class='col-md-8'>
                      <h3 class='pp-title'>$rows[item_title]</h3>
                      <img src='$rows[item_image]' class='pp-img img-responsive'>
                      <h4 class='pp-desc-head'>Description</h4>
                    <div class='pp-desc-detail'>$rows[item_description]</div>
                  </div>                  
                ";
          }
      ?>
        <aside class="col-md-4">
          <a href="buy.php?chk_item_id=<?php echo $item_id; ?>" class="btn btn-success btn-block" id="buy_btn">Buy</a>
          <br>
          <ul class="list-group">
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-3"><i class="fa fa-truck fa-3x"></i></div>
                <div class="col-md-9">Delivered within 5 days</div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-3"><i class="fa fa-refresh fa-3x"></i></div>
                <div class="col-md-9">Easy return in 7 days</div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-3"><i class="fa fa-phone fa-3x"></i></div>
                <div class="col-md-9">Call at 123456789</div>
              </div>
            </li>
          </ul>
        </aside>
      </div>
      <div class="page-header">
        <h4>Related Items</h4>
      </div>
      <section class="row">
        <?php 
          $rel_sql = "SELECT * FROM items ORDER BY rand() LIMIT 4";
          $rel_run = mysqli_query($conn, $rel_sql);
          while ($rel_rows = mysqli_fetch_assoc($rel_run)) {
            $discounted_price = $rel_rows['item_price'] - $rel_rows['item_discount'];
            $item_title = str_replace(' ', '-', $rel_rows['item_title']);
            echo "
              <div class='col-md-3'>
                <div class='col-md-12 single-item noPadding'>
                  <div class='top'>
                    <img src='$rel_rows[item_image]' alt='Watch for Men' class='img-responsive' title='Watch for Men'>
                  </div>
                  <div class='bottom'>
                    <h3 class='item-title'><a href='item.php?item_title=$item_title&item_id=$rel_rows[item_id]'>$rel_rows[item_title]</a></h3>
                    <div class='pull-right cutted-price text-muted'><del>$ $rel_rows[item_price]/=</del></div>
                    <div class='clearfix'></div>
                    <div class='pull-right discounted-price'>$ $discounted_price/=</div>
                  </div>
                </div>
              </div>              
            ";
          }
        ?>
      </section>
    <?php } ?>
    </div>
    <br><br><br><br><br><br>
    <?php include 'includes/footer.php' ?>
  </body>
</html>
