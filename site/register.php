<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
		<title>BrickTracker - Welcome!</title>
		<meta name="description" content="Keep track of your collection online!">
  		<meta name="keywords" content="Bricks Lego collection track tracking ">
  		<meta name="author" content="Emil Bertholdsson, David Styrbjörn, Linus Karlsson, Max Benecke">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  		<link  href="../css/style.css" rel="stylesheet"/>
  		<script src=""></script>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php
        include "../php/script.php";
        ?>

    </head>
    
    <body>
    
        <nav>
            <div class="wrapper">
                <div class="nav-items">
                    <div class="nav-items-left">
                        <a class="nav-item logo" href="home.php">BRICK<span>TRACKER</span></a>
                        <a class="nav-item" href="">MY PAGE</a>
                        <a class="nav-item" href="">ADD</a>
                    </div>
                    <div class="nav-items-right">
                        <a class="nav-item nav-item-right" href="login.php">LOG IN</a>
                    </div>
                </div>
            </div>
        </nav>
        
            <div class="register-window">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div>
                <h2>Register</h2>
                <form action="../php/register_validate.php" method="post">
                  
                    
                    
                    
                    <p>Please fill in this form to create an account.</p>
                    
                    <?php

                    if(isset($_GET['authentication'])){
                        $auth = $_GET['authentication'];
                        $combo = 0;
                        if(!empty($auth)){
                            $error = "Your ";

                            if (strpos($auth, 'username') !== false) {
                                $error .= "username invalid, try another ";
                                $combo++;
                            }
                            if(strpos($auth, 'password') !== false){
                                if($combo>0){
                                    $error .= " and ";
                                }
                                $error .= "password was invalid";
                                $combo++;

                            }
                            if(strpos($auth, 'passr') !== false){
                                if($combo>0){
                                    $error .= " and ";
                                }
                                $error .= "passwords were not alike";
                                $combo++;
                            }
                            if(strpos($auth, 'exists') !== false){
                                if($combo>0){
                                    $error .= " and ";
                                }
                                $error .= "username or email is already in use";
                            }
                            echo '<p class="error-message">'.$error.'</p>';

                        } 
                    }
   
                    ?>
                            <div class="form-column">
                                <input type="text" placeholder="Username" name="username" required>

                                <input type="email" placeholder="Enter Email" name="email" required>
                                 </div>
                            <div class="form-column">
                                <input type="password" placeholder="Enter Password" name="password" required>

                                <input type="password" placeholder="Repeat Password" name="password-repeat" required>
                        </div>
                            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                        <button type="submit" class="submit-btn register-btn">Register</button>
                

                  <div class="container signin">
                    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
                  </div>
                </form>
                
            </div>
      </div>
        
        <!-- Echoes HTML code -->
        <?php
        displayFooter();
        ?>
        
        
        
    </body>
</html>