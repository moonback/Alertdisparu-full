<?php 
    include 'navbar.php'; 
    // include 'login.php';
?>

<!-- ======= GIVE BACKGROUND COLOR FOR NAVBAR: GI CUSTOMIZED NAKO NI ======= -->
  <div id="hero" style="height: 40px;"></div>
<!-- ======= GIVE BACKGROUND COLOR FOR NAVBAR: GI CUSTOMIZED NAKO NI ======= -->



<!-- ======= Contact Section ======= -->
    <section id="register" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>S'inscrire</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->


          <?php if(isset($_SESSION['success'])) { ?> 
              <h5 class="alert text-success" role="alert"><b><?php echo $_SESSION['success']; ?></b></h5> 
          <?php unset($_SESSION['success']); } ?>


          <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
              <h5 class="alert text-danger" role="alert"><b><?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></b></h5>
          <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


          <?php  if(isset($_SESSION['exists'])) { ?>
              <h5 class="alert text-danger" role="alert"><b><?php echo $_SESSION['exists']; ?></b></h5>
          <?php unset($_SESSION['exists']); } ?>

        </div>


        <div class="row">
          <!-- LOAD IMAGE PREVIEW -->
          
          <div class="col-lg-12">
    <form action="register_code.php" method="post" enctype="multipart/form-data" class="bg-body p-5 rounded" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;" id="form">
        <div class="row">
            <div class="form-group col-md-4 mb-3">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom (Obligatoire)" required>
            </div>
            <div class="form-group col-md-3 mb-3">
                <label for="middlename">Deuxième prénom</label>
                <input type="text" class="form-control" id="middlename" placeholder="Deuxième Prénom" name="middlename">
            </div>
            <div class="form-group col-md-3 mb-3">
                <label for="lastname">Nom de famille</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom de Famille (Obligatoire)" required>
            </div>
            <div class="form-group col-md-2 mb-3">
                <label for="suffix">Suffixe</label>
                <input type="text" class="form-control" id="suffix" placeholder="Suffixe (Facultatif)" name="suffix">
            </div>
            <div class="form-group col-md-3 mb-3">
                <label for="gender">Sexe</label>
                <select class="form-control form-select" id="gender" name="gender" required>
                    <option value="" selected disabled>Sélectionnez votre sexe</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>
            <div class="form-group col-md-3 mb-3">
                <label for="dob">Date de Naissance</label>
                <input type="date" class="form-control" name="dob" placeholder="Date de naissance" required id="updatetxtbirthdate" onkeyup="update_getAgeVal(0)" onblur="update_getAgeVal(0);" onchange="update_getAgeVal(0);">
            </div>
            <div class="form-group col-md-2 mb-3">
                <label for="age">Âge</label>
                <input type="text" class="form-control" placeholder="Âge" readonly id="updatetxtage">
                <input type="hidden" class="form-control" name="age" placeholder="Âge" required id="updateagestatus">
                <span id="age_text"></span>
            </div>
            <div class="col-auto form-group col-md-4 mb-3">
                <label for="contact">Numéro de contact</label>
                <div class="input-group">
                    <div class="input-group-text">+63</div>
                    <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder="Numéro de contact (Obligatoire)" required maxlength="10">
                </div>
            </div>
            <div class="form-group col-md-4 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email (Obligatoire)" required onkeydown="validation()" onkeyup="validation()">
                <span id="text"></span>
            </div>
            <div class="form-group col-md-4 mb-3">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control form-control" name="password" placeholder="Le mot de passe doit contenir au moins 8 caractères" required id="newpassword" minlength="8">
            </div>
            <div class="form-group col-md-4 mb-3">
                <label for="cpassword">Confirmez le mot de passe</label>
                <input type="password" class="form-control form-control" placeholder="Confirmez le mot de passe" name="cpassword" required id="confirmpassword" onkeyup="validate_password()" minlength="8">
                <small id="wrong_pass_alert"></small>
            </div>
            <div class="form-group col-md-12 mb-3">
                <label for="address">Adresse</label>
                <textarea class="form-control" cols="30" rows="2" id="address" name="address" placeholder="Adresse Actuelle (Obligatoire)" required></textarea>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="fileToUpload">Téléchargez Votre Photo de Profil</label>
                <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required onchange="getImagePreview(event)">
            </div>
            <div class="form-group col-lg-6 mb-4">
                <div class="form-group" id="preview">
                </div>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="fileToUpload">Téléchargez Votre Pièce d'Identité</label>
                <input type="file" class="form-control" id="fileToUpload" name="IdfileToUpload" required onchange="getID(event)">
            </div>
            <div class="form-group col-lg-6 mb-4">
                <div class="form-group" id="IDpreview">
                </div>
            </div>
        </div>
</div>

                <div class="col-md-12">
                  <hr>
                  <input type="checkbox" required> Accepter les <a type="button" href="" data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration: none;">Termes et confidentialité</a>
                </div>  
                <p class="mt-3">Vous avez déjà un compte? <a href="login.php" >Cliquez ici!</a></p>
                

                

              <div class="text-center mt-3"><button type="submit" class="btn btn-primary" name="create_user" id="registerbutton">Inscription</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->






    <!-- Modal for TERMS AND AGREEMENT -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Conditions et Accord</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <p style="text-align: justify;">AlertDisparu respecte la vie privée de ses utilisateurs. Cette Politique de confidentialité explique comment nous collectons, utilisons, divulguons et protégeons vos informations lorsque vous visitez notre site Web AlertDisparu. Veuillez lire attentivement cette politique de confidentialité. Si vous n'êtes pas d'accord avec les termes de cette politique de confidentialité, veuillez ne pas accéder au site.</p>
                <p style="text-align: justify;">Nous nous réservons le droit de apporter des modifications à cette Politique de confidentialité à tout moment et pour quelque raison que ce soit. Nous vous informerons de toute modification en mettant à jour la date de "Dernière mise à jour" de cette Politique de confidentialité sur le site. et vous renoncez au droit de recevoir un avis spécifique de chaque changement ou modification.</p>
                <p style="text-align: justify;">Nous vous encourageons à examiner périodiquement cette Politique de confidentialité pour rester informé des mises à jour. Vous serez réputé avoir été informé, être soumis à, et avoir accepté les modifications apportées à toute Politique de confidentialité révisée en continuant à utiliser le Site après la date de publication de cette Politique de confidentialité révisée.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>








<?php include 'footer.php'; ?>
 

<script>
  function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');

    }

    function getAge(dateString){
    var birthdate = new Date().getTime();
    if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
    // variable is undefined or null value
    birthdate = new Date().getTime();
    }
    birthdate = new Date(dateString).getTime();
    var now = new Date().getTime();
    // now find the difference between now and the birthdate
    var n = (now - birthdate)/1000;
    if (n < 604800){ // less than a week
    var day_n = Math.floor(n/86400);
    if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
    // variable is undefined or null
    return '';
    }else{
    return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
    }
    } else if (n < 2629743){ // less than a month
    var week_n = Math.floor(n/604800);
    if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
    return '';
    }else{
    return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
    }
    } else if (n < 31562417){ // less than 24 months
    var month_n = Math.floor(n/2629743);
    if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
    return '';
    }else{
    return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
    }
    }else{
    var year_n = Math.floor(n/31556926);
    if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
    return year_n = '';
    }else{
    return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
    }
    }
  }

function update_getAgeVal(pid){
var birthdate = formatDate(document.getElementById("updatetxtbirthdate").value);
var count = document.getElementById("updatetxtbirthdate").value.length;
if (count=='10'){
var age = getAge(birthdate);
var str = age;
var res = str.substring(0, 1);
if (res =='-' || res =='0'){
document.getElementById("updatetxtbirthdate").value = "";
document.getElementById("updatetxtage").value = "";
document.getElementById("updateagestatus").value = "";
$('#updatetxtbirthdate').focus();
return false;
}else{
document.getElementById("updatetxtage").value = age;
document.getElementById("updateagestatus").value = age;
}
}else{
document.getElementById("updatetxtage").value = "";
document.getElementById("updateagestatus").value = "";
return false;
}
}
</script>
<script>

  function agevalidation() {
    var age = document.getElementById("age").value;

    if(age < 12) {
        document.getElementById('age_text').style.color = 'red';
        document.getElementById('age_text').innerHTML = 'Must be 12yrs old and above.';
        document.getElementById('registerbutton').disabled = true;
        document.getElementById('registerbutton').style.opacity = (0.4);
    } else {

        document.getElementById('age_text').style.color = 'green';
        document.getElementById('age_text').innerHTML = '';
        document.getElementById('registerbutton').disabled = false;
        document.getElementById('registerbutton').style.opacity = (1);

    }
  }

  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = 'Valid email';
        document.getElementById('registerbutton').disabled = false;
        document.getElementById('registerbutton').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Invalid email';
        document.getElementById('registerbutton').disabled = true;
        document.getElementById('registerbutton').style.opacity = (0.4);
        
    }
  }



   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    var text=document.createElement('p');
    text.innerHTML='Profile Photo Preview';
    text.style['position']="relative";
    text.style['margin-left']="162px";
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

   function getID(event)
  {
    var idimage=URL.createObjectURL(event.target.files[0]);
    var idimagediv= document.getElementById('IDpreview');
    var idnewimg=document.createElement('img');
    var idtext=document.createElement('p');
    idtext.innerHTML='ID Preview';
    idtext.style['position']="relative";
    idtext.style['margin-left']="207px";
    idtext.style['margin-top']="10px";
    idtext.style['font-weight']="bold";
    idimagediv.innerHTML='';
    idnewimg.src=idimage;
    idnewimg.width="90";
    idnewimg.height="90";
    idnewimg.style['border-radius']="50%";
    idnewimg.style['display']="block";
    idnewimg.style['margin-left']="auto";
    idnewimg.style['margin-right']="auto";
    idnewimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    idimagediv.appendChild(idnewimg);
    idimagediv.appendChild(idtext);
  }

</script>

<script>
    function validate_password() {

      var pass = document.getElementById('newpassword').value;
      var confirm_pass = document.getElementById('confirmpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('registerbutton').disabled = true;
        document.getElementById('registerbutton').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('registerbutton').disabled = false;
        document.getElementById('registerbutton').style.opacity = (1);
      }
    }

</script>


