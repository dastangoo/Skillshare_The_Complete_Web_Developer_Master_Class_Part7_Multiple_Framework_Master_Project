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
          <li><a href="#">Watches</a></li>
          <li class="active"><?= $_GET['item_title'] ?></li>
        </ol>
      </div>
      <div class="row">
        <?php
          if (isset($_GET['item_id'])) {
            $sql = "SELECT * FROM items WHERE item_id='$_GET[item_id]'";
            $run = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($run)) {
              $item_title = $rows['item_title'];
              $item_image = $rows['item_image'];
              $item_desc = $rows['item_description'];
            }
          }
        ?>
        <div class="col-md-8">
          <h3 class="pp-title"><?= $item_title ?></h3>
          <img src=<?= $item_image ?> class="pp-img img-responsive" alt="Watch for Men" title="Watch for Men">
          <h4 class="pp-desc-head">Description</h4>
          <div class="pp-desc-detail"><?= $item_desc ?></div>
        </div>
        <aside class="col-md-4">
          <a href="buy.php" class="btn btn-success btn-block" id="buy_btn">Buy</a>
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
        <div class="col-md-3">
          <div class="col-md-12 single-item noPadding">
            <div class="top">
              <img src="images/image1.jpg" alt="Watch for Men" class="img-responsive" title="Watch for Men">
            </div>
            <div class="bottom">
              <h3 class="item-title"><a href="item.php">Beautiful Watch</a></h3>
              <div class="pull-right cutted-price text-muted"><del>$ 500/=</del></div>
              <div class="clearfix"></div>
              <div class="pull-right discounted-price">$ 450/=</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="col-md-12 single-item noPadding">
            <div class="top">
              <img src="images/image1.jpg" alt="Watch for Men" class="img-responsive" title="Watch for Men">
            </div>
            <div class="bottom">
              <h3 class="item-title"><a href="item.php">Beautiful Watch</a></h3>
              <div class="pull-right cutted-price text-muted"><del>$ 500/=</del></div>
              <div class="clearfix"></div>
              <div class="pull-right discounted-price">$ 450/=</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="col-md-12 single-item noPadding">
            <div class="top">
              <img src="images/image1.jpg" alt="Watch for Men" class="img-responsive" title="Watch for Men">
            </div>
            <div class="bottom">
              <h3 class="item-title"><a href="item.php">Beautiful Watch</a></h3>
              <div class="pull-right cutted-price text-muted"><del>$ 500/=</del></div>
              <div class="clearfix"></div>
              <div class="pull-right discounted-price">$ 450/=</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="col-md-12 single-item noPadding">
            <div class="top">
              <img src="images/image1.jpg" alt="Watch for Men" class="img-responsive" title="Watch for Men">
            </div>
            <div class="bottom">
              <h3 class="item-title"><a href="item.php">Beautiful Watch</a></h3>
              <div class="pull-right cutted-price text-muted"><del>$ 500/=</del></div>
              <div class="clearfix"></div>
              <div class="pull-right discounted-price">$ 450/=</div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <br><br><br><br><br><br>
    <?php include 'includes/footer.php' ?>
  </body>
</html>
