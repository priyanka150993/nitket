<?php

    $conn = new mysqli('localhost','m150034ca','m150034ca','db_m150034ca');
    if(isset($_POST['login']))
    {

        echo 'Working ';
        $mail = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "SELECT `email` FROM `employee` WHERE `email`='$mail' AND `pass`='$pass'";

        $result = $conn->query($sql);

        if($result->num_rows>0)
        {

            session_start();
            $_SESSION['userMail'] = $mail;
            $_SESSION['userPass'] = $pass;
            header('location:index.php?loginDone');

        }else{

            echo 'No result Found ...';        
        }
    }
?>
<html>
<head>
<title>Login Here</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="style.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet">
<style type="text/css">

</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-5 col-md-offset-4">
            <h1 class="text-center login-title">Please Login Here ..</h1>
            <div class="account-wall animated shake">

                <img class="profile-img " src="assets/img/find_user.png" alt="">
                
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                    
                
                <div class="col col-sm-12">
                    <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
                </div>


                <div class="col col-sm-12">
                <br/>
                
                    <input type="password" name="pass" class="form-control" placeholder="Password" required>
                
                </div>   

                <div class="col col-sm-12">
                <br/>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
                    Sign in</button>
                </div>    

                        <a href="#" class="text-center need-help">Need help? </a>
                 
                </form>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>

</body>
</html>