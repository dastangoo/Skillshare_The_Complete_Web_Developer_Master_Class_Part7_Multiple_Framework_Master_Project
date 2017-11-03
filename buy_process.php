<?php 
  session_start();
  include 'includes/db.php';
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

      include 
  'includes/db.php';$c++;
  }
?>
