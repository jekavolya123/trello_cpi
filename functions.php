<?php
include_once "config.php";

//signup
if (isset($_POST["sbmt_sign_up"])) {
    extract($_POST);
    $query = "INSERT INTO `tbl_u` SET `name`='" . $fname . " " . $lname . "',`email`='$email',`pwd`='" . md5($pwd) . "',`fk_role`=2";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo "<script>window.location.href='signup.php?msg=1'</script>";
    } else {
        echo "<script>window.location.href='error.php?msg=Email already registered&url=signup'</script>";
    }
}

//login
if (isset($_POST["sbmt_login"])) {
    extract($_POST);
    $query = "SELECT * from tbl_u where email='$email' and pwd='" . md5($pwd) . "'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION["global_id"] = $row["uid"];
        $_SESSION["role"] = "User";
        echo "<script>window.location.href='my-boards.php'</script>";
    } else {
        echo "<script>window.location.href='error.php?msg=Can't find Your Account&url=index'</script>";
    }
}

//logout
function logout()
{
    session_abort();
    session_reset();
    session_destroy();

}

//add board
if (isset($_POST["sbmt_ad_board"])) {
    extract($_POST);
    $uid = (int)$_SESSION["global_id"];
    if ($uid != null) {
        $desc = mysqli_real_escape_string($con, $bdesc);
        $query = "INSERT INTO `tbl_board` SET `fk_tbl_u`=$uid, `board_title`='$btitle', `board_desc`='$desc'";
        $res = mysqli_query($con, $query);
        if ($res) {
            echo "<script>window.location.href='my-boards.php'</script>";
        } else {
            echo "<script>window.location.href='error.php?msg=Can't Create Board Right now (-_-)&url=my-boards.php'</script>";
        }
    } else {
        echo "<script>window.location.href='error.php?msg=Session lost please login again&url=index.php'</script>";
    }
}

if (isset($_POST["sbmt_card"])) {
    extract($_POST);
    $query = "INSERT INTO `tbl_card` SET `fk_tbl_board`=$fk_board,`fk_tbl_u`=$fk_user,`fk_tbl_label`=$fk_label,`fk_tbl_cat`=$fk_cat,`ctitle`='$ctitle',`cdesc`='$cdesc'";
    $res_ = mysqli_query($con, $query);
    if ($res_) {
        echo "<script>window.location.href='board.php?bid=$fk_board'</script>";
    } else {
        echo "<script>window.location.href='error.php?msg=Opps Session lost &url=my-boards.php'</script>";
    }

}


if (isset($_GET["logout"])) {
    logout();
    echo "<script>window.location.href='.'</script>";
}


if (isset($_POST["smbt_member"])) {
    extract($_POST);
    $check = "SELECT * from `tbl_board_user` where `fk_tbl_board`=$fk_board and `tbl_u`=$fk_tbl_u";
    $res_c = mysqli_query($con, $check);
    if (mysqli_num_rows($res_c) > 0) {
        echo "<script>window.location.href='error.php?msg=User already in this board&url=my-boards'</script>";
    } else {
        $query = "INSERT INTO `tbl_board_user` SET `fk_tbl_board`=$fk_board,`tbl_u`=$fk_tbl_u";
        $res___ = mysqli_query($con, $query);
        if ($res___) {
            echo "<script>window.location.href='board.php?bid=$fk_board'</script>";
        } else {
            echo "<script>window.location.href='error.php?msg=Opps Session lost &url=my-boards'</script>";
        }
    }


}

if (isset($_POST["smbt_meeting"])) {
    extract($_POST);
    $query = "INSERT INTO `tbl_sprint_meeting` SET `fk_tbl_board`=$fk_board,`smtitle`='$smtitle',`smdesc`='$smdesc',`smduedate`='$smdue'";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo "<script>window.location.href='board.php?bid=$fk_board'</script>";
    } else {
        echo "<script>window.location.href='error.php?msg=Opps Session lost &url=my-boards'</script>";
    }
}

?>
