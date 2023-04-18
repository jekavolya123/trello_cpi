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
    <title>Server say's No</title>
</head>

<body>
    <?php 
    if(isset($_GET["url"]) && isset($_GET["msg"])) { ?>
    <section class="login-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7 mx-auto login-form">
                    <div class="form-section">
                        <h4 class="text-center"><span>Oh no!</span></h4>
                        <div class="col-md-8 mx-auto my-4">
                            <img src="assets/img/not-found.PNG" class="w-100" alt="error">
                        </div>
                        <div class="col-md-9 mx-auto mb-4">
                            <p class="text-muted text-center"><?=$_GET["msg"]?></p>
                        </div>

                        <div class="text-center">
                            <a href="<?=$_GET["url"]?>" class="btn btn-theme btn-link">Try Again</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>