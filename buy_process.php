<?php 
  session_start();
  include 'includes/db.php';
  if (isset($_REQUEST['chk_del_id'])) {
    $chk_del_sql = "DELETE FROM checkout WHERE chk_id = '$_REQUEST[chk_del_id]'";
    $chk_del_run = mysqli_query($conn, $chk_del_sql);
  }
  if (isset($_REQUEST['up_chk_qty'])) {
    $up_chk_qty_sql = "UPDATE checkout SET chk_qty = '$_REQUEST[up_chk_qty]' WHERE chk_id = '$_REQUEST[up_chk_id]'";
    $up_chk_qty_run = mysqli_query($conn, $up_chk_qty_sql);
  }
  // $chk_sel_sql = "SELECT * FROM checkout WHERE chk_ref = '$_SESSION[ref]'";
  $chk_sel_sql = "SELECT * FROM checkout c JOIN items i ON c.chk_item = i.item_id WHERE c.chk_ref = '$_SESSION[ref]'";
  $chk_sel_run = mysqli_query($conn, $chk_sel_sql);
  $c = 1;
  while ($chk_sel_rows = mysqli_fetch_assoc($chk_sel_run)) {
    $discounted_price = $chk_sel_rows['item_price'] - $chk_sel_rows['item_discount'];
    $total_price = $discounted_price * $chk_sel_rows['chk_qty'];
    echo "
      <tr>
        <td>$c</td>
        <td>$chk_sel_rows[item_title]</td>"
        ?>
        <td>
          <input type='number' style='width: 45px;' onblur="up_chk_qty(this.value, '<?php echo $chk_sel_rows['chk_id']; ?>');" value='<?php echo $chk_sel_rows['chk_qty']; ?>'/>
        </td>
        <td><button class='btn btn-danger btn-sm' onclick="del_func(<?php echo $chk_sel_rows['chk_id'];?>);">Delete</button></td>
        <?php
        echo "
        <td class='text-right'><b>$discounted_price/=</b></td>
        <td class='text-right'><b>$total_price/=</b></td>
      </tr>
    ";
    $c++;
  }
?>
