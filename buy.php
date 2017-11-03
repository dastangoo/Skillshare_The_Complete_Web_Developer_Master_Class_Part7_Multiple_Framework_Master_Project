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
  </head>
  <body>
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
          <table class="table">
            <thead>
              <tr>
                <th>S.no</th>
                <th>Item</th>
                <th>qty</th>
                <th width="5%">Delete</th>
                <th class="text-right">Price</th>
                <th class="text-right">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                // $chk_sel_sql = "SELECT * FROM checkout WHERE chk_ref = '$_SESSION[ref]'";
                $chk_sel_sql = "SELECT * FROM checkout c JOIN items i ON c.chk_item = i.item_id WHERE c.chk_ref = '$_SESSION[ref]'";
                $chk_sel_run = mysqli_query($conn, $chk_sel_sql);
                $c = 1;
                while ($chk_sel_rows = mysqli_fetch_assoc($chk_sel_run)) {
                  $discounted_price = $chk_sel_rows['item_price'] - $chk_sel_rows['item_discount'];
                  echo "
                    <tr>
                      <td>$c</td>
                      <td>$chk_sel_rows[item_title]</td>
                      <td>1</td>
                      <td><button class='btn btn-danger btn-sm'>Delete</button></td>
                      <td class='text-right'><b>$discounted_price/=</b></td>
                      <td class='text-right'><b>100/=</b></td>
                    </tr>
                  ";
                  $c++;
                }
              ?>
            </tbody>
          </table>
          <table class="table">
            <thead>
              <tr>
                <th colspan="2" class="text-center">Order Summary</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Subtotal</td>
                <td class="text-right"><b>700/=</b></td>
              </tr>
              <tr>
                <td>Delivery Charges</td>
                <td class="text-right"><b>Free</b></td>
              </tr>
              <tr>
                <td>Grand Total</td>
                <td class="text-right"><b>700/=</b></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br><br><br><br>
    <?php include 'includes/footer.php' ?>
  </body>
</html>
¡