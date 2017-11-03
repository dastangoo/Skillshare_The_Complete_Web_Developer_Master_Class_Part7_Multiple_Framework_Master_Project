<?php include '../includes/db.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Items List | Admin Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin-style.css">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <style media="screen">
    </style>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>    
    <script>
      function get_item_list_data() {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('get_item_list_data').innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open('GET', 'item_list_process.php', true);
        xmlhttp.send();
      }
    </script>
  </head>
  <body onload="get_item_list_data();">
    <?php include "includes/header.php"; ?>
    <div class="container">
      <button class="btn btn-red btn-danger" data-toggle="modal" data-target="#add_new_item" data-backdrop="static" data-keyboard="false">Add New Item</button>
      
      <div id="add_new_item" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" name="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New Item</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="">Item Image</label>
                  <input type="file" name="" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Item Name</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Item Description</label>
                  <textarea name="name" rows="6" cols="80" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Item Catgory</label>
                  <select class="" name="" class="form-control">
                    <option value="">Select a Category</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Item Quantity</label>
                  <input type="number" class="form-control" id="" placeholder="" min="1">
                </div>
                <div class="form-group">
                  <label for="">Item Cost</label>
                  <input type="number" class="form-control" id="" placeholder="" min="1">
                </div>
                <div class="form-group">
                  <label for="">Item Price</label>
                  <input type="number" class="form-control" id="" placeholder="" min="1">
                </div>
                <div class="form-group">
                  <label for="">Item Delivery</label>
                  <input type="number" class="form-control" id="" placeholder="" min="1">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" id="" placeholder="">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" name="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div id="get_item_list_data">
        
        <!-- Area to get processed item list data -->
        
      </div>
    </div>
    <?php include "includes/footer.php"; ?>
  </body>
</html>