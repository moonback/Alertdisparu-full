<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Alertdisparu</title>
    <?php include 'navbar.php'; ?>
    <style>

.login-page, .register-page {
    
  background-image: url('/images/slider.jpg'); /* Chemin vers votre image de fond */
  background-size: cover; /* Ajuster la taille de l'image pour couvrir toute la section */
  background-position: center center; /* Position de l'image de fond */
  background-repeat: no-repeat; /* Empêcher la répétition de l'image */
    
}

        @media only screen and (max-width: 995px) {
            #delete {
                margin-top: 100px;
            }
        }
        @media only screen and (max-width: 767px) {
            #delete {
                margin-top: 200px;
            }
        }
        @media only screen and (max-width: 316px) {
            #delete {
                margin-top: 250px;
            }
        }
        label:not(.form-check-label):not(.custom-file-label) {
    FONT-WEIGHT: 500;
}
    </style>
</head>

<body class="hold-transition login-page" id="delete">

<main id="main">

  <style>
    .card img:hover {
      opacity: .9;
    }

    .card a {
      padding: 5px;
      border-radius: 5px;
    }

    .card a:hover {
      opacity: .5;
    }

    body {
      background-color: #254458;

    }

    .section-bg {
      background-color: #254458;
    }
    .three-posts, .search {
    padding-top: 7px;
    padding-bottom: 6px;
}
.center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* 100% de la hauteur de la fenêtre de visualisation */
}

.login-form {
    text-align: center;
    /* Ajoutez d'autres styles ici si nécessaire */
}

  </style>

<section class="bg-blueDark">
<div class="container-fluid">
        <div>
            <h2 class="white text-center">
                Connécter vous à<span class="orange-white-rect"><span class=" blink"><span>
                Alertdisparues ?
</span></span></span>
            </h2>
        </div> 
    </div>
    <div class="login-box">
        <div class="card card-outline card-primary center-dialog">
            
            <div class="card-body">
                <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>
                <?php 
                if(isset($_POST['changepassword'])) {
                    $user_Id = $_POST['user_Id'];
                    $cpassword = md5($_POST['cpassword']);
                    $update = mysqli_query($conn, "UPDATE users SET password='$cpassword' WHERE user_Id='$user_Id'");
                    if($update) {
                        $_SESSION['message'] = "Le mot de passe a été modifié. Veuillez vous connecter à votre compte.";
                        $_SESSION['text'] = "Changement réussi";
                        $_SESSION['status'] = "success";
                        include 'sweetalert_messages.php';
                        echo '<script>window.history.go(+1); </script>';
                    }
                    ?>
                    <form action="login_code.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email" onkeydown="validation()" onkeyup="validation()" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <!-- POUR EMAIL INVALIDE -->
                        <div class="input-group mt-1 mb-2">
                            <small id="text" style="font-style: italic;"></small>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" minlength="8" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" onclick="myFunction()">
                                    <label for="remember">
                                        Afficher le mot de passe
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="social-auth-links text-center mt-4">
                            <button class="btn btn-block btn-primary" type="submit" name="login" id="login">Connexion</button>
                            <p class="mt-1"><a href="forgotpassword.php" class="text-center">Mot de passe oublié ?</a></p>  
                            <hr>
                        </div>
                    </form>
                    <?php
                } elseif(isset($_POST['admin_changepassword'])) {
                    $admin_Id = $_POST['admin_Id'];
                    $cpassword = md5($_POST['cpassword']);
                    $update = mysqli_query($conn, "UPDATE admin SET password='$cpassword' WHERE admin_Id='$admin_Id'");
                    if($update) {
                        $_SESSION['message'] = "Le mot de passe a été modifié. Veuillez vous connecter à votre compte.";
                        $_SESSION['text'] = "Changement réussi";
                        $_SESSION['status'] = "success";
                        include 'sweetalert_messages.php';
                        echo '<script>window.history.go(+1); </script>';
                    }
                    ?>
                    <form action="login_code.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email" onkeydown="validation()" onkeyup="validation()" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <!-- POUR EMAIL INVALIDE -->
                        <div class="input-group mt-1 mb-2">
                            <small id="text" style="font-style: italic;"></small>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" minlength="8" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" onclick="myFunction()">
                                    <label for="remember">
                                        Afficher le mot de passe
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="social-auth-links text-center mt-4">
                            <button class="btn btn-block btn-primary" type="submit" name="login" id="login">Connexion</button>
                            <p class="mt-1"><a href="forgotpassword.php" class="text-center">Mot de passe oublié ?</a></p>  
                            <hr>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="login_code.php" method="POST">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <!-- POUR EMAIL INVALIDE -->
                        <div class="input-group mt-1 mb-2">
                            <small id="text" style="font-style: italic;"></small>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" minlength="8">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" onclick="myFunction()">
                                    <label for="remember">
                                        Afficher le mot de passe
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="social-auth-links text-center mt-4">
                            <button class="btn btn-block btn-primary" type="submit" name="login" id="login">Connexion</button>
                            <p class="mt-1"><a href="forgotpassword.php" class="text-center">Mot de passe oublié ?</a></p>  
                            <hr>
                        </div>
                    </form>
                    <?php
                }
                ?>
                <p class="mt-3"><a href="register.php?#register" class="text-center">Créer un nouveau compte</a></p>
            </div>
        </div>
    </div>

    <?php 
    include 'sweetalert_messages.php';
    
    ?>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function validation() {
            var email = document.getElementById("email").value;
            var pattern = /.+@(gmail)\.com$/;
            var form = document.getElementById("form");

            if(email.match(pattern)) {
                document.getElementById('text').style.color = 'green';
                document.getElementById('text').innerHTML = 'Email valide';
                document.getElementById('login').disabled = false;
                document.getElementById('login').style.opacity = (1);
            } 
            else {
                document.getElementById('text').style.color = 'red';
                document.getElementById('text').innerHTML = 'Email invalide';
                document.getElementById('login').disabled = true;
                document.getElementById('login').style.opacity = (0.4);
            }
        }
    </script>
</body>
</html>
