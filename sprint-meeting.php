
<?php
include_once "config.php";

if ($_SESSION["global_id"] == "") {
    echo "<script>window.location.href='error.php?msg=Oops Session Lost please login&url=.'</script>";
}
$user_id = (int)$_SESSION["global_id"];
$board_id=(int)$_SESSION["current_board"] ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php 
   $pagename="Sprint Meeting";
   include_once "_styles.php";
   ?>
</head>

<body>
    <header class="header">
        <div>
            <a href="#" class="logo">Team<span>X</span></a>
            <button class="btn btn-theme-2">Sprint Meeting</button>
        </div>
        <div>
            <a href="index2.html" class="btn btn-theme ml-3" title="Your Boards"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 mx-auto login-form">
                    <div class="form-section">
                        <h4 class="mb-5">Add <span>Sprint Meeting</span></h4>
                        <form action="functions" method="POST">
                            <input type="number" name="fk_board" value="<?=$board_id?>" hidden>
                            <div class="icon-form">
                                <input type="text" class="form-control" name="smtitle" placeholder="Enter a Title">
                                <i class="fas fa-pen"></i>
                            </div>
                            <div class="icon-form">
                                <input type="text" class="form-control" name="smdesc" placeholder="Enter a Description">
                                <i class="fas fa-align-right"></i>
                            </div>
                            <div class="icon-form">
                                <input type="date" name="smdue" class="form-control pr-2">
                            </div>
                            <div class="col-lg-3 p-0">
                                <button class="btn btn-theme" type="submit" name="smbt_meeting">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php include_once "_scripts.php";?>