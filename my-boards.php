<?php
include_once "config.php";
if (empty($_SESSION["global_id"])) {
    echo "<script>window.location.href='error.php?msg=Please Login &url=index'</script>";
}
$global_id=(int)$_SESSION["global_id"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php $pagename = "Boards";
    include_once "_styles.php" ?>
</head>

<body>
    <header class="header">
        <div>

            <a href="my-boards.php" class="logo">Team<span>X</span></a>
        </div>
        <div>
       
            <a href="my-boards.php" class="btn btn-theme rounded-pill" title="Your Boards"><i class="fas fa-clipboard"></i></a>
            <button class="btn btn-theme rounded-pill" title="Add Board" data-toggle="modal" data-target="#addBoard"><i class="fas fa-plus"></i></button>  
            <a href="functions.php?logout=1" class="btn btn-theme ml-3" title="Your Boards"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>

    <div class="content">
        <div class="container">

            <div class="col-12 mb-3">
                <h3>Your Boards.</h3>
            </div>

            <div class="row" id="my-board">
            
            </div>
        </div>
        <div class="container mt-4">

            <div class="col-12 mb-3">
                <h3>Guest Boards .</h3>
            </div>

            <div class="row" id="guest-board">
             
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="addBoard" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addBoardLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body">
                    <div class="login-form">
                        <div class="form-section">
                            <h4 class="">Add <span>Board</span></h4>
                            <hr>
                            <form class="mt-5" action="functions.php" method="POST">
                                <div class="icon-form">
                                    <input type="text" name="btitle" class="form-control" placeholder="Enter an Title ">
                                </div>
                                <div class="icon-form">
                                    <input type="text" name="bdesc" class="form-control" placeholder="Enter an Description">
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button class="btn btn-theme" type="submit" name="sbmt_ad_board">Add</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-theme-2" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include_once "_scripts.php" ?>

<script>
window.onload=()=>{
    get_myboards(<?=$global_id?>);
    get_guestboards(<?=$global_id?>);
}

</script>