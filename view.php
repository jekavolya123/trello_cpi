<?php
include_once "config.php";
if (!isset($_GET["cid"])) {
    echo "<script>window.location.href='error?msg=Can't Find Your Board (-_-)&url=my-boards'</script>";
}

if ($_SESSION["global_id"] == "") {
    echo "<script>window.location.href='error?msg=Oops Session Lost please login&url=.'</script>";
}
$user_id=(int)$_SESSION["global_id"];
$card_id=(int)$_GET["cid"];
$board_id=$_SESSION["current_board"];
$query="SELECT * from tbl_card,tbl_u where cid=".$card_id." and tbl_u.uid=tbl_card.fk_tbl_u";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
$category="";
if($row["fk_tbl_cat"]==1){$category="Todo";}
else if($row["fk_tbl_cat"]==2){$category="Progress";}
else if($row["fk_tbl_cat"]==3){$category="Code Review";}
else{$category="Done";}
$label="";
if($row["fk_tbl_label"]==1){$label="Low";}
else if($row["fk_tbl_label"]==2){$label="Medium";}
else{
    $label="High";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php $pagename="Card Detals | TeamX"; include_once "_styles.php"?>
</head>

<body>
    <header class="header">
        <div>
            <a href="my-boards.php" class="logo">Team<span>X</span></a>
           
        </div>
        <div>
            <a href="my-boards.php" class="btn btn-theme rounded-pill" title="Your Boards"><i class="fas fa-clipboard"></i></a>
            <a href="functions.php?logout=1" class="btn btn-theme ml-3" title="Your Boards"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>
    <div class="">
        <section class="login-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 mx-auto login-form">
                        <div class="form-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="h6">List - <a href="board.php?bid=<?=$board_id?>">
                                        
                                    <span><?=$category?></span>
                                    </a></h4>
                                </div>
                                <div class="col-md-3 pr-md-1 mb-md-0 mb-3">
                                    <small><b>Assigned to : </b> <?=$row["name"]?> </small>
                                    <select class="custom-select form-control" id="inputGroupSelect01" onchange="update_member(<?=$card_id?>,this.value)">
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
                                <div class="col-md-3 pl-md-1  mb-md-0 mb-3">
                                <small><b>Label</b> <?=$label?> </small>
                                    <select class="custom-select form-control" id="inputGroupSelect01" onchange="update_label(<?=$card_id?>,this.value)">
                                        <option selected disabled>Label...</option>
                                          
                                        <?php 
                                               $query_label="SELECT * FROM `tbl_card_label`";
                                               $res__=mysqli_query($con,$query_label);
                                               while($row_label=mysqli_fetch_assoc($res__)){
                                                   ?>
                                                   <option value="<?=$row_label["clid"]?>"><?=$row_label["label_name"]?></option>
                                              <?php  }
                                               ?>
                                      </select>
                                </div>
                            </div>
                            <h2 class="h3"><?=$row["ctitle"]?></h2>
                            <form>
                                <div class="icon-form">
                                    <input type="text" readonly value="<?=$row["cdesc"]?>" class="form-control" placeholder="Enter an description ">
                                    <i class="fas fa-align-right"></i>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input border-0" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><i class="fas fa-paperclip mr-3"></i> Choose file</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-5 col-8">
                                        <button class="btn btn-info" type="button">Attachment</button>
                                    </div>


                                </div>
                                <div class="col-lg-2 col-md-3 col-4 ml-auto text-right">
                                    <a href="board.php?bid=<?=$board_id?>" class="btn d-block btn-theme-2 text-danger px-2">Back</a>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

   

</body>

</html>



<?php include_once "_scripts.php"?>
<script>

function update_member(cid,uid){
    $.ajax({
        url:'api/update-member?cid='+cid+"&uid="+uid,
        type:"GET",
        success:function (res){
           window.location.href="board.php?bid=<?=$board_id?>";
        }
    });
}
function update_label(cid,lid){

    $.ajax({
        url:'api/update-label?cid='+cid+"&lid="+lid,
        type:"GET",
        success:function (res){
            window.location.href="board.php?bid=<?=$board_id?>";
        }
    });
}

</script>