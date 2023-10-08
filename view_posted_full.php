<?php 
    include 'config.php';
    include 'navbar.php'; 
    // include 'login.php';

    if(isset($_GET['posted_Id'])) {
      $missing_Id = $_GET['posted_Id'];
      $info = mysqli_query($conn, "SELECT * FROM posted WHERE post_Id='$missing_Id'");
      $row  = mysqli_fetch_array($info);
      $a    = $row['teeth'];
      $b    = explode(",", $a);
      $c    = $row['gadgets'];
      $d    = explode(",", $c);

       $i = "";
       $res=$row['posted_image'];
       $res=explode(",",$res);
       $count=count($res);
    }
?>

<!-- ======= GIVE BACKGROUND COLOR FOR NAVBAR: GI CUSTOMIZED NAKO NI ======= -->
  <div id="hero" style="height: 40px;"></div>
<!-- ======= GIVE BACKGROUND COLOR FOR NAVBAR: GI CUSTOMIZED NAKO NI ======= -->

<style>
  label {
    font-weight: bold;
  }
  input {
    background-color: white;
  }
</style> 

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo $row['name']; ?>'s images</h2>
       

        </div>
       

        <div class="row">
          <!-- LOAD IMAGE PREVIEW -->
          
          <div class="col-lg-12">
            <form action="register_code.php" method="post" enctype="multipart/form-data" class="bg-body p-5 rounded" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;">
              <div class="row">

                    <div class="col-lg-12 d-flex justify-content-center mb-5">
                       <div class="form-group">
                          <?php for($i=0;$i<$count;$i++) { ?>
                            <img src="images-missing/<?= $res[$i]?>" alt="" width="100%" style="margin: 10px;">
                          <?php } ?>0
                       </div>
                    </div>

                   
                </div>
              </div>
                
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->





    <?php include 'footer.php'; ?>



 
<script>
   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    var text=document.createElement('p');
    text.innerHTML='Image preview';
    text.style['position']="relative";
    text.style['margin-left']="192px";
    text.style['margin-top']="10px";
    text.style['font-weight']="bold";
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
    imagediv.appendChild(text);
  }

</script>

<script>
    function validate_password() {

      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('create').disabled = false;
        document.getElementById('create').style.opacity = (1);
      }
    }

</script>