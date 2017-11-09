<?php include '../includes/db.php';
  if (isset($_REQUEST['del_item_id'])) {
    $del_sql = "DELETE FROM items WHERE item_id = '$_REQUEST[del_item_id]'";
    mysqli_query($conn, $del_sql);
  }
  
  if (isset($_REQUEST['up_item_id'])) {
    
    $item_title = mysqli_real_escape_string($conn, strip_tags($_REQUEST['item_title']));
    $item_description = mysqli_real_escape_string($conn, $_REQUEST['item_description']);
    $item_category = mysqli_real_escape_string($conn, strip_tags($_REQUEST['item_category']));
    $item_quantity = mysqli_real_escape_string($conn, strip_tags($_REQUEST['item_quantity']));
    $item_cost = mysqli_real_escape_string($conn, strip_tags($_REQUEST['item_cost']));
    $item_price = mysqli_real_escape_string($conn, strip_tags($_REQUEST['item_price']));
    $item_discount = mysqli_real_escape_string($conn, strip_tags($_REQUEST['item_discount']));
    $item_delivery = mysqli_real_escape_string($conn, strip_tags($_REQUEST['item_delivery']));
    $item_id = $_REQUEST['up_item_id'];

    // $item_ins_sql = "INSERT INTO items (item_title, item_description, item_cat, item_qty, item_cost, item_price, item_discount, item_delivery) VALUES ( '$item_name', '$item_description', '$item_category', '$item_quantity', '$item_cost', '$item_price', '$item_discount', '$item_delivery')";
    
    $item_up_sql = "UPDATE items SET item_title = '$item_title', item_description='$item_description', item_cat='$item_category', item_qty='$item_quantity', item_cost='$item_cost', item_price='$item_price', item_discount='$item_discount', item_discount='$item_delivery' WHERE item_id='$item_id'";
    mysqli_query($conn, $item_up_sql);
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
              <li>
                <a href='#edit_modal' data-toggle='modal'>Edit</a>
              </li>";?>
              <li><a href="javascript:;" onclick="del_item(<?php echo $sel_rows['item_id']; ?>);">Delete</a></li>
              <?php  echo "
            </ul>
            <div class='modal fade' id='edit_modal'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' name='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Edit Item</h4>
                  </div>
                  <div class='modal-body'>
                    <div id=form1>
                      <div class='form-group'>
                        <label for=''>Item Name</label>
                        <input type='text' class='form-control' value='$sel_rows[item_title]' id='item_title' required>
                      </div>
                      <div class='form-group'>
                        <label for=''>Item Description</label>
                        <textarea rows='6' cols='80' class='form-control' id='item_description' value='$sel_rows[item_description]' required></textarea>
                      </div>
                      <div class='form-group'>
                        <label for=''>Item Catgory</label>
                        <select class='' id='item_category' class='form-control' required>
                          <option value=''>Select a Category</option>";
                            $cat_sql = 'SELECT * FROM item_cat';
                            $cat_run = mysqli_query($conn, $cat_sql);
                            while ($cat_rows = mysqli_fetch_assoc($cat_run)) {
                              $cat_name = ucwords($cat_rows['cat_name']);
                              if ($cat_rows['cat_slug'] == '') {
                                $cat_slug = $cat_rows['cat_name'];
                              } else {
                                $cat_slug = $cat_rows['cat_slug'];
                              }
                              if($cat_slug = $sel_rows['item_cat']) {
                                echo "
                                  <option selected value='$cat_slug'>$cat_name</option>
                                ";                                
                              } else {
                                echo "
                                  <option value='$cat_slug'>$cat_name</option>
                                ";
                              }
                            }
                          echo "
                        </select>
                      </div>
                      <div class='form-group'>
                        <label for=''>Item Quantity</label>
                        <input type='number' class='form-control' value='$sel_rows[item_qty]' min='1' id='item_quantity' required>
                      </div>
                      <div class='form-group'>
                        <label for=''>Item Cost</label>
                        <input type='number' class='form-control' value='$sel_rows[item_cost]' min='1' id='item_cost' required>
                      </div>
                      <div class='form-group'>
                        <label for=''>Item Price</label>
                        <input type='number' class='form-control' value='$sel_rows[item_price]' min='1' id='item_price' required>
                      </div>
                      <div class='form-group'>
                        <label for=''>Item Discount</label>
                        <input type='text' class='form-control' value='$sel_rows[item_discount]' id='item_discount' required>
                      </div>
                      <div class='form-group'>
                        <label for=''>Item Delivery</label>
                        <input type='text' class='form-control' value='$sel_rows[item_delivery]' min='1' id='item_delivery'>
                      </div>
                      <div class='form-group'>
                        <input type='hidden' id='up_item_id' value='$sel_rows[item_id]'/>";?>
                        <button class='btn btn-primary btn-block' onclick="edit_item();">Submit</button>                     
                      </div>
                    </div>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' name='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                  </div>
                </div>
            </div>
          </div>
          </td>
        </tr>           
        <?php       
        $c++;
      }
    ?>
  </tbody>
</table>
