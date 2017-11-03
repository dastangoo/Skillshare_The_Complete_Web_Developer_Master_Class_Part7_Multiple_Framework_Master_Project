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
    
  </head>
  <body>
    <?php include "includes/header.php"; ?>
    <div class="container">
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
            <th>Item Price</th>
            <th>Item Discount</th>
            <th>Item Delivery</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Image</td>
            <td>Beautiful Watch</td>
            <td>We&apos;re selling Beautiful Watch</td>
            <td>Watch</td>
            <td>78</td>
            <td>450</td>
            <td>500</td>
            <td>50</td>
            <td>20</td>            
          </tr>
          <td>1</td>
          <td>Image</td>
          <td>Beautiful Watch</td>
          <td>We&apos;re selling Beautiful Watch</td>
          <td>Watch</td>
          <td>78</td>
          <td>450</td>
          <td>500</td>
          <td>50</td>
          <td>20</td>            
        </tr>

        </tbody>
      </table>
    </div>
    <?php include "includes/footer.php"; ?>
  </body>
</html>