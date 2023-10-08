<title>AlertDisparu | Testimony</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Testimony</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Testimony</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Testimony</h3>
              </div>
                <?php if(isset($_SESSION['success'])) { ?> 
                    <p class="alert alert-success position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['success']; ?></p> 
                <?php unset($_SESSION['success']); } ?>

                <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                    <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                <?php  if(isset($_SESSION['exists'])) { ?>
                    <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['exists']; ?></p>
                <?php unset($_SESSION['exists']); } ?>
              
              <form action="process_save.php" method="POST" enctype="multipart/form-data">
                     <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                     <div class="card-body">
                        <div class="row">
                            <!-- LOAD IMAGE PREVIEW -->
                            <div class="col-lg-12 mb-2">
                                <div class="form-group" id="user_preview">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <br>
                                    <label style = "color:red">Please Take Note: </label>
                                    <label>Your message will be visible to other people who visits AlertDisparu</label>
                                    <textarea class="form-control" name="testimony" id="" cols="30" rows="5" placeholder="Enter your message here..."></textarea>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                  <label>Image (Optional)</label>
                                  <input type="file" class="form-control-file form-control-sm" name="fileToUpload" onchange="newgetImagePreview(event)">
                                </div>
                            </div>
                        </div>
                   </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="add_testimony"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                </div>
              </form>
            </div>
         </div>
          
        </div>
      </div>
    </section>
    
  </div>

<script>


   function newgetImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('user_preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }

</script>

  <?php include 'footer.php'; ?>
 
</body>
</html>
