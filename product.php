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
          <li class="active">Beautiful Watch</li>
        </ol>
      </div>
      <div class="row">
        <div class="col-md-8">
          <h3 class="pp-title">Beautiful Watch</h3>
          <img src="images/image1.jpg" class="pp-img img-responsive" alt="Watch for Men" title="Watch for Men">
          <h4 class="pp-desc-head">Description</h4>
          <div class="pp-desc-detail">
            <p>This is a very beautiful watch. It&apos;s purely made on metal. You can by this watch by clicking the buy button.</p>
            <ul>
              <li>It's beautiful</li>
              <li>Made of metal</li>
              <li>An original and branded quality</li>
              <li>Free shipping overall the country</li>
              <li>Pay Securely via <b>CASH on DELIVERY</b> method</li>
            </ul>
          </div>
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
              <h3 class="item-title"><a href="product.php">Beautiful Watch</a></h3>
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
              <h3 class="item-title"><a href="product.php">Beautiful Watch</a></h3>
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
              <h3 class="item-title"><a href="product.php">Beautiful Watch</a></h3>
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
              <h3 class="item-title"><a href="product.php">Beautiful Watch</a></h3>
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
