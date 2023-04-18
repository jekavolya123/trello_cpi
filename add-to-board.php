<?php
include_once "config.php";
if (!isset($_GET["bid"])) {
    echo "<script>window.location.href='error.php?msg=Can't Find Your Board (-_-)&url=my-boards'</script>";
}
if ($_SESSION["global_id"] == "") {
    echo "<script>window.location.href='error.php?msg=Oops Session Lost please login&url=.'</script>";
}
$user_id=(int)$_SESSION["global_id"];
$board_id=(int)$_GET["bid"];
$_SESSION["current_board"]=$board_id;
?>

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
    <title>Title</title>
</head>

<body>
    <header class="header">
        <div>
            <a href="my-boards.php" class="logo">Team<span>X</span></a>
            <button class="btn btn-theme-2">Sprint Meeting</button>
        </div>
        <div>
            <a href="functions.php?logout=1" class="btn btn-theme ml-3" title="Your Boards"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 mx-auto login-form">
                    <div class="form-section">
                        <h4 class="">Add <span>Participant</span></h4>
                        <form action="functions.php" method="POST">
                            <div class="row no-gutters">
                                <div class="col-md-8 mt-3 mb-5">
                                    <input type="numebr" hidden value="<?=$board_id?>" name="fk_board">
                                    <select class="custom-select form-control" id="inputGroupSelect01" name="fk_tbl_u">
                                        <option selected disabled>Members...</option>
                                        <?php
                                                $query = "SELECT * from tbl_u,tbl_board where tbl_board.fk_tbl_u != tbl_u.uid and tbl_board.bid=" .$board_id;
                                                $res_ = mysqli_query($con, $query);
                                                while ($row_member = mysqli_fetch_assoc($res_)) {
                                                ?>
                                                    <option value="<?= $row_member["uid"] ?>"><?= $row_member["name"] ?></option>
                                                <?php  }
                                                ?>
                                      </select>
                                </div>
                                <div class="col-md-4 pl-md-2  mt-3">
                                    <button class="btn btn-theme px-1" type="submit" name="smbt_member">Add Member</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="30px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            $query="SELECT * from tbl_u, tbl_board_user where tbl_u.uid=tbl_board_user.tbl_u and tbl_board_user.fk_tbl_board=".$board_id;
                            $res_users=mysqli_query($con,$query);
                            $count=1;
                            while($row_users=mysqli_fetch_assoc($res_users)){
                                ?>
  <tr>
                                    <td><?=$count?></td>
                                    <td><?=$row_users["name"]?></td>
                                    <td><?=$row_users["email"]?></td>
                                </tr>
                           <?php  }
                            ?>
                              
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js "></script>