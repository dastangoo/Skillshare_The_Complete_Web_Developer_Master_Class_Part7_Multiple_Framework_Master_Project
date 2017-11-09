<?php include '../includes/db.php';
  if (isset($_REQUEST['del_item_id'])) {
    $del_sql = "DELETE FROM items WHERE item_id = '$_REQUEST[del_item_id]'";
    mysqli_query($conn, $del_sql);
  }
?>
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
            <button class='btn btn-red btn-danger dropdown-toggle' data-toggle='dropdown'>Actions<span class='caret'></span></button>
            <ul class='dropdown-menu dropdown-menu-right'>
              <li><a href='#'>Edit</a></li>";?>
              <li><a href="javascript:;" onclick="del_item(<?php echo $sel_rows['item_id']; ?>);">Delete</a></li>
              <?php  echo "
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
