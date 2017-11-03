<?php include '../includes/db.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Items List | Admin Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin-style.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <style media="screen">
      .btn {
        background: red;
        border-radius: 0;
      }
    </style>
    
  </head>
  <body>
    <?php include "includes/header.php"; ?>
    <div class="container">
      <button class="btn btn-danger">Add New Item</button>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr class="item-head">
            <th>S.no</th>
            <th>Image</th>
            <th>Item Title</th>
            <th>Item Description</th>
            <th>Item Categroy</th>
            <th>Item Qty</th>
            <th>Item Cost</th>
            <th>Item Discount</th>
            <th>Item Price</th>
            <th>Item Delivery</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $sel_sql = "SELECT * FROM items";
            $sel_run = mysqli_query($conn, $sel_sql);
            $c = 1;
            while ($sel_rows = mysqli_fetch_assoc($sel_run)) {
              $discounted_price = $sel_rows['item_price'] - $sel_rows['item_discount'];
              echo "
              <tr>
                <td>$c</td>
                <td><img src='../$sel_rows[item_image]' style='width: 60px;'/></td>
                <td>$sel_rows[item_title]</td>
                <td>"; echo strip_tags($sel_rows['item_description']); echo "</td>
                <td>"; echo ucwords($sel_rows['item_cat']); echo "</td> 
                <td>$sel_rows[item_qty]</td>
                <td>$sel_rows[item_cost]</td>
                <td>$sel_rows[item_discount]</td>
                <td>$discounted_price ($sel_rows[item_price])</td>
                <td>$sel_rows[item_delivery]</td>            
                <td>
                <div class='dropdown'>
                  <button class='btn btn-danger dropdown-toggle' data-toggle='dropdown'>Actions<span class='caret'></span></button>
                  <ul class='dropdown-menu dropdown-menu-right'>
                    <li><a href='#'>Edit</a></li>
                    <li><a href='#'>Delete</a></li>
                  </ul>
                </div>
                </td>
              </tr>                
              ";
              $c++;
            }
          ?>
        </tbody>
      </table>
    </div>
    <?php include "includes/footer.php"; ?>
  </body>
</html>