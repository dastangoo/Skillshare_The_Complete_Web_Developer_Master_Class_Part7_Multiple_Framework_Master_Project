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
    <br><br><br><br>
    <div class="container">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Watches</a></li>
          <li class="active">Beautiful Watch</li>
        </ol>
      </div>
      <div class="col-md-8">
        <h3 class="pp-title">Beautiful Watch</h3>
        <img src="images/image1.jpg" class="img-responsive" alt="Watch for Men" title="Watch for Men">
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
        <a href="#" class="btn btn-success btn-block">Buy</a>
        <br>
        <ul class="list-group">
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-3"><i class="fa fa-truck fa-2x"></i></div>
              <div class="col-md-9">Delivered within 5 days</div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-3"><i class="fa fa-refresh fa-2x"></i></div>
              <div class="col-md-9">Easy return in 7 days</div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-3"><i class="fa fa-phone fa-2x"></i></div>
              <div class="col-md-9">Call at 123456789</div>
            </div>
          </li>
        </ul>
      </aside>
    </div>
    <br><br><br><br><br><br>
    <?php include 'includes/footer.php' ?>
  </body>
</html>
