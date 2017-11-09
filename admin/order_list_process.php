<?php include '../includes/db.php';
  if (isset($_REQUEST['order_status'])) {
    $up_sql = "UPDATE orders SET order_status='$_REQUEST[order_status]' WHERE order_id = '$_REQUEST[order_id]'";
    mysqli_query($conn, $up_sql);
  }
?>
<table class="table table-bordered table-striped table-hover">
  <thead class="item-head">
    <tr>
      <th>S.no</th>
      <th>Buyer Name</th>
      <th>Buyer Email</th>
      <th>Buyer Contact</th>
      <th>Buyer State</th>
      <th>Buyer Delivery Address</th>
      <th>Order Ref</th>
      <th class="text-right">Total Payment</th>
      <th>Order Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql = "SELECT * FROM orders";
      $run = mysqli_query($conn, $sql);
      $c = 1;
      while ($rows = mysqli_fetch_assoc($run)) {
        if ($rows['order_status'] == 0) {
          $btn_class = 'btn-warning';
          $btn_value = 'Pending';
        } else {
          $btn_class = 'btn-success';
          $btn_value = 'Sent';
        }
        echo "
          <tr>
            <td>$c</td>
            <td>$rows[order_name]</td>
            <td>$rows[order_email]</th>
            <td>$rows[order_contact]</td>
            <td>$rows[order_state]</td>
            <td>$rows[order_delivery_address]</td>
            <td>$rows[order_checkout_ref]</td>
            <td class='text-right'>$rows[order_total]</td>"; ?>
            <td class='text-center'><button class='btn <?php echo $btn_class ?> btn-block btn-sm' onclick="order_status(<?php echo $rows['order_status'] ?>, <?php echo $rows['order_id'] ?>);"><?php echo $btn_value ?></button></td>
          </tr>        
          <?php 
          $c++;
      }
    ?>
  </tbody>
</table>
