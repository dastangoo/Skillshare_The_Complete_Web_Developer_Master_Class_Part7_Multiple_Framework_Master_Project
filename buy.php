<?php 
  session_start();
  include 'includes/db.php'; 
  if (isset($_GET['chk_item_id'])) {
      $date = date('Y-m-d h:i:s'); 
      $rand_num = mt_rand();
      if (isset($_SESSION['ref'])) {
        # code...
      } else {
        $_SESSION['ref']= $date. '_' . $rand_num;
      }
      
      $chk_sql = "INSERT INTO checkout (chk_item, chk_ref, chk_timing) VALUES ('$_GET[chk_item_id]', '$_SESSION[ref]', '$date')";
      $chk_run = mysqli_query($conn, $chk_sql);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <?php include 'includes/links.php' ?>
    <script>
      function ajax_func() {
          xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
            }
          }
          
          
          xmlhttp.open('GET', 'buy_process.php', true);
          xmlhttp.send();
      }
      function del_func(chk_id) {
        xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
          }
        }
        
        xmlhttp.open('GET', 'buy_process.php?chk_del_id=' + chk_id, true);
        xmlhttp.send();
      }
      function up_chk_qty(chk_qty, chk_id) {
        xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
          }
        }
        
        xmlhttp.open('GET', 'buy_process.php?up_chk_qty=' + chk_qty + '&up_chk_id=' + chk_id, true);
        xmlhttp.send();        
      }
    </script>
  </head>
  <body onload="ajax_func();">
    <?php include 'includes/header.php' ?>
    <div class="container">
      <div class="page-header">
        <h2 class="pull-left">Checkout</h2>
        <div class="pull-right">
          <button class="btn btn-success" data-target="#proceed_modal" data-toggle="modal" data-backdrop="static" data-keyboard="false">Proceed</button>
        </div>
        <div class="modal fade" id="proceed_modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Full Name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" placeholder="Email" id="email">
                  </div>
                  <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input type="text" class="form-control" placeholder="Contact Number" id="contact">
                  </div>
                  <div class="form-group">
                    <label for="contact">City</label>
                    <input list="states" class="form-control">
                    <datalist id="states">
                      <option>Washington</option>
                      <option>New York</option>
                      <option>Florida</option>
                      <option>Kansas</option>
                      <option>Nebraska</option>
                      <option>Oregon</option>
                      <option>Indiana</option>
                    </datalist>
                  </div>
                  <div class="form-group">
                    <label for="address">Delivery Address</label>
                    <textarea id="address" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-danger form-control">
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Order Detail</div>
        <div class="panel-body">
          <div id="get_processed_data">
            
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br>
    <?php include 'includes/footer.php' ?>
  </body>
</html>
¡