
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Signup | Teamx</title>
</head>

<body>

    <section class="login-section">
 
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7 mx-auto login-form">
                    <div class="form-section">
                        <h4 class="">Team<span>X</span></h4>
                        <h3 class="h3">Signup</h3>
                        <form action="functions.php" method="POST">
                            <div class="icon-form">
                                <input name="fname" type="text" title="Only Alphabets are allowed" pattern="[a-zA-Z]{3,15}" class="form-control" placeholder="Enter an First Name " required>
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="icon-form">
                                <input name="lname" type="text" title="Only Alphabets are allowed" pattern="[a-zA-Z]{3,15}" class="form-control" placeholder="Enter an Last Name " required>
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="icon-form">
                                <input name="email" type="email" class="form-control" placeholder="Enter an email " required>
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="icon-form">
                                <input name="pwd" type="password" title="Must be atleast 5 character long" pattern="{5,15}" class="form-control" placeholder="Enter an password" required>
                                <i class="fas fa-key"></i>
                            </div>
                            <?php if(isset($_GET["msg"])){ ?>
                            <center><small class="text-center text-success">Account Created</small></center>
                            <?php }?>
                            <button name="sbmt_sign_up" class="btn btn-theme" type="submit"  >Sign up</button>
                        </form>
                        <p class="mt-4">Already have an account ? <a href="." class="signup-link">Log In <span>👋</span>  </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
