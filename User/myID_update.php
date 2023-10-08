<!-- UPDATE ID -->
<div class="modal fade" id="updateID<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Update User ID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
              <div class="form-group">
                <label>Upload User ID</label>
                <input type="file" class="form-control-file" name="fileToUpload" onchange="newgetImagePreview(event)" required>
              </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="submit" name="updateID" class="btn btn-success"><i class="fa-solid fa-circle-check"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>