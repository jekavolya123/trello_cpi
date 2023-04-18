<?php
include_once "config.php";
if (!isset($_GET["bid"])) {
    echo "<script>window.location.href='error.php?msg=Can't Find Your Board (-_-)&url=my-boards'</script>";
}
if ($_SESSION["global_id"] == "") {
    echo "<script>window.location.href='error.php?msg=Oops Session Lost please login&url=.'</script>";
}
$user_id = (int)$_SESSION["global_id"];
$board_id = (int)$_GET["bid"];
$_SESSION["current_board"] = $board_id;
$hey="this line is being added from web vs code";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php $pagename = "Board TeamX";
    include_once "_styles.php"; ?>
</head>

<body>
    <header class="header">
        <div>
            <!-- <button class="btn btn-menu"><i class="fas fa-angle-right"></i></button> -->
            <a href="my-boards.php" class="logo">Team<span>X</span></a>
            <a href="sprint-meeting.php" class="btn btn-theme-2">Sprint Meeting</button>
        </div>
        <div>
            <a href="my-boards.php" class="btn btn-theme rounded-pill" title="Your Boards"><i class="fas fa-home"></i></a>
        </div>
    </header>
    <div class="">
        <div class="sticky-notes">
            <ul>
                <li>
                    <div class="heading">
                        <p>Todo</p>
                        <div class="option">
                            <input type="text" class="form-control" id="todo_search" onkeyup="search_card(this.value,'cont_todo',1)" placeholder="Search..">
                            <button class="btn btn-search" id="todo_search_btn" onclick="search_show('todo_search')"><i class="fas fa-search"></i></button>
                            <button class="btn btn-filter" onclick="filter_show('filter-todo')"><img src="assets/img/filter-icon.png" alt=""></button>
                        </div>
                    </div>
                    <div class="filter-option" id="filter-todo">
                    <div class="col-md-6 pr-1">
                            <select class="custom-select form-control" id="inputGroupSelect01" onchange="filter_user_card(this.value,'cont_todo',1)">
                                <option selected disabled>Members...</option>
                                <?php
                                                $query = "SELECT * from tbl_u,tbl_board where tbl_board.fk_tbl_u != tbl_u.uid and tbl_board.bid=".$board_id ;
                                                $res_ = mysqli_query($con, $query);
                                                while ($row_member = mysqli_fetch_assoc($res_)) {
                                                ?>
                                                    <option value="<?= $row_member["uid"] ?>"><?= $row_member["name"] ?></option>
                                                <?php  }
                                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 pl-1">
                            <select class="custom-select form-control" id="inputGroupSelect01" onchange="filter_label_card(this.value,'cont_todo',1)">
                                <option selected value="0">Label...</option>
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
                    <div class="todo_container container1" id="cont_todo">

                    </div>
                    <div class="container-footer">
                        <button href="#" class="btn btn-board rounded-pill" title="Add Card" title="Add Board" data-toggle="modal" data-target="#addCard"><i class="fas fa-plus"></i> Add Card</button>
                    </div>
                </li>
                <li>
                    <div class="heading">
                        <p>Progress</p>
                        <div class="option">
                            <input type="text" class="form-control" id="progress_search" onkeyup="search_card(this.value,'cont_prog',2)" placeholder="Search..">
                            <button class="btn btn-search" id="todo_search_btn" onclick="search_show('progress_search')"><i class="fas fa-search"></i></button>
                            <button class="btn btn-filter" onclick="filter_show('filter-progress')"><img src="assets/img/filter-icon.png" alt=""></button>
                        </div>
                    </div>
                    <div class="filter-option" id="filter-progress">
                    <div class="col-md-6 pr-1">
                            <select class="custom-select form-control" id="inputGroupSelect01"  onchange="filter_user_card(this.value,'cont_prog',2)">
                                <option selected disabled>Members...</option>
                                <?php
                                                $query = "SELECT * from tbl_u,tbl_board where tbl_board.fk_tbl_u != tbl_u.uid and tbl_board.bid=".$board_id ;
                                                $res_ = mysqli_query($con, $query);
                                                while ($row_member = mysqli_fetch_assoc($res_)) {
                                                ?>
                                                    <option value="<?= $row_member["uid"] ?>"><?= $row_member["name"] ?></option>
                                                <?php  }
                                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 pl-1">
                            <select class="custom-select form-control" id="inputGroupSelect01" onchange="filter_label_card(this.value,'cont_prog',2)">
                                <option selected value="0">Label...</option>
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
                    <div class="progress_container container1" id="cont_prog">
                    </div>

                    <div class="container-footer">
                        <button href="#" class="btn btn-board rounded-pill" title="Add Card" title="Add Board" data-toggle="modal" data-target="#addCard"><i class="fas fa-plus"></i> Add Card</button>
                    </div>
                </li>
                <li>
                    <div class="heading">
                        <p>Code Review</p>
                        <div class="option">
                            <input type="text" class="form-control" id="review_search" onkeyup="search_card(this.value,'cont_review',3)" placeholder="Search..">
                            <button class="btn btn-search" id="todo_search_btn" onclick="search_show('review_search')"><i class="fas fa-search"></i></button>
                            <button class="btn btn-filter" onclick="filter_show('filter-review')"><img src="assets/img/filter-icon.png" alt=""></button>
                        </div>
                    </div>
                    <div class="filter-option" id="filter-review">
                    <div class="col-md-6 pr-1">
                            <select class="custom-select form-control" id="inputGroupSelect01" onchange="filter_user_card(this.value,'cont_review',3)">
                                <option selected disabled>Members...</option>
                                <?php
                                                $query = "SELECT * from tbl_u,tbl_board where tbl_board.fk_tbl_u != tbl_u.uid and tbl_board.bid=".$board_id ;
                                                $res_ = mysqli_query($con, $query);
                                                while ($row_member = mysqli_fetch_assoc($res_)) {
                                                ?>
                                                    <option value="<?= $row_member["uid"] ?>"><?= $row_member["name"] ?></option>
                                                <?php  }
                                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 pl-1">
                            <select class="custom-select form-control" id="inputGroupSelect01" onchange="filter_label_card(this.value,'cont_review',3)">
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
                    <div class="review_container container1" id="cont_review">

                    </div>

                    <div class="container-footer">
                        <button href="index2.html" class="btn btn-board rounded-pill" title="Add Card" title="Add Board" data-toggle="modal" data-target="#addCard"><i class="fas fa-plus"></i> Add Card</button>
                    </div>
                </li>
                <li>
                    <div class="heading">
                        <p>Done</p>
                        <div class="option">
                            <input type="text" class="form-control" id="done_search" onkeyup="search_card(this.value,'cont_done',4)" placeholder="Search..">
                            <button class="btn btn-search" id="todo_search_btn" onclick="search_show('done_search')"><i class="fas fa-search"></i></button>
                            <button class="btn btn-filter" onclick="filter_show('filter-done')"><img src="assets/img/filter-icon.png" alt=""></button>
                        </div>
                    </div>
                    <div class="filter-option" id="filter-done">
                        <div class="col-md-6 pr-1">
                            <select class="custom-select form-control" id="inputGroupSelect01" onchange="filter_user_card(this.value,'cont_done',4)" >
                                <option selected disabled>Members...</option>
                                <?php
                                                $query = "SELECT * from tbl_u,tbl_board where tbl_board.fk_tbl_u != tbl_u.uid and tbl_board.bid=".$board_id ;
                                                $res_ = mysqli_query($con, $query);
                                                while ($row_member = mysqli_fetch_assoc($res_)) {
                                                ?>
                                                    <option value="<?= $row_member["uid"] ?>"><?= $row_member["name"] ?></option>
                                                <?php  }
                                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 pl-1">
                            <select class="custom-select form-control" id="inputGroupSelect01" onchange="filter_label_card(this.value,'cont_done',4)">
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
                    <div class="done_container container1" id="cont_done">
                        <a href="#" draggable="true" class="draggable">
                            <input type="number" hidden id="data" value="23">
                            <h2>Notes #4</h2>
                            <p>Text Content #4</p>
                            <div class="note-footer ">
                                <span class="small">12:34 22/03/22</span>
                                <button class="btn rounded-circle"><i class="fas fa-eye"></i></button>
                            </div>
                        </a>
                    </div>

                    <div class="container-footer">
                        <button href="index2.html" class="btn btn-board rounded-pill" title="Add Card" title="Add Board" data-toggle="modal" data-target="#addCard"><i class="fas fa-plus"></i> Add Card</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCard" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addCardLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body">
                    <div class="login-form">
                        <div class="form-section">
                            <form action="functions" method="POST">
                                <input type="number" name="fk_board" hidden value="<?= $board_id ?>">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <h4 class="">Add <span>Card</span></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-form m-0">
                                            <select class="custom-select" id="inputGroupSelect01" name="fk_cat">
                                                <option selected disabled>Cateorgy...</option>

                                                <?php
                                                $query = "SELECT * from tbl_card_cat";
                                                $res = mysqli_query($con, $query);
                                                while ($card_row = mysqli_fetch_assoc($res)) {
                                                ?>
                                                    <option value="<?= $card_row["ccid"] ?>"><?= $card_row["cat_name"] ?></option>
                                                <?php }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                <div class="icon-form">
                                    <input type="text" class="form-control" placeholder="Enter an Title " name="ctitle">
                                </div>
                                <div class="icon-form">
                                    <input type="text" class="form-control" placeholder="Enter an Description" name="cdesc">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="icon-form mt-0">
                                            <select class="custom-select form-control" id="inputGroupSelect01" name="fk_user">
                                                <option selected disabled>Members...</option>
                                                <?php
                                                $query = "SELECT * from tbl_u,tbl_board where tbl_board.fk_tbl_u != tbl_u.uid and tbl_board.bid=" . $_GET["bid"];
                                                $res_ = mysqli_query($con, $query);
                                                while ($row_member = mysqli_fetch_assoc($res_)) {
                                                ?>
                                                    <option value="<?= $row_member["uid"] ?>"><?= $row_member["name"] ?></option>
                                                <?php  }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-form mt-0">
                                            <select class="custom-select form-control" id="inputGroupSelect01" name="fk_label">
                                                <option selected disabled>Label...</option>

                                                <?php
                                                $query_label = "SELECT * FROM `tbl_card_label`";
                                                $res__ = mysqli_query($con, $query_label);
                                                while ($row_label = mysqli_fetch_assoc($res__)) {
                                                ?>
                                                    <option value="<?= $row_label["clid"] ?>"><?= $row_label["label_name"] ?></option>
                                                <?php  }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <button class="btn btn-theme" type="submit" name="sbmt_card">Add</button>
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
    function refreash() {
        get_card(<?= $_GET["bid"] ?>, 1, 'cont_todo');
        get_card(<?= $_GET["bid"] ?>, 2, 'cont_prog');
        get_card(<?= $_GET["bid"] ?>, 3, 'cont_review');
        get_card(<?= $_GET["bid"] ?>, 4, 'cont_done');
    };
    window.onload = () => {
        refreash();
    }

    function filter_show(id) {

        document.getElementById(id).classList.toggle("active");
    }
    function search_show(id) {
            document.getElementById(id).classList.toggle("active");
        }
    setTimeout(() => {
      
        const draggables = document.querySelectorAll('.draggable')
        const todo_container = document.querySelector('.todo_container')
        const progress_container = document.querySelector('.progress_container')
        const review_container = document.querySelector('.review_container')
        const done_container = document.querySelector('.done_container')

        draggables.forEach(draggable => {
            draggable.addEventListener('dragstart', () => {
                draggable.classList.add('dragging')
                localStorage.setItem("drag_id", JSON.stringify(document.querySelector('.dragging input').value));
            })
            draggable.addEventListener('dragend', () => {
                draggable.classList.remove('dragging')
            })
        })


        todo_container.addEventListener('dragover', e => {
            e.preventDefault();
            var devain_id = JSON.parse(localStorage.getItem("drag_id"));
            change_card(devain_id, 1);

            todo_container.appendChild(document.querySelector('.dragging'))
        })
        progress_container.addEventListener('dragover', e => {
            e.preventDefault();
            var devain_id = JSON.parse(localStorage.getItem("drag_id"));
            change_card(devain_id, 2);

            progress_container.appendChild(document.querySelector('.dragging'))
        })
        review_container.addEventListener('dragover', e => {
            e.preventDefault();
            var devain_id = JSON.parse(localStorage.getItem("drag_id"));
            change_card(devain_id, 3);

            review_container.appendChild(document.querySelector('.dragging'))
        })
        done_container.addEventListener('dragover', e => {
            e.preventDefault();
            var devain_id = JSON.parse(localStorage.getItem("drag_id"));
            change_card(devain_id, 4);

            done_container.appendChild(document.querySelector('.dragging'))
        })


    }, 300);

    function search_card(txt,cont_id,cat){
        var cards=[];
        if(txt!=""){
            if(cat==1){cards=JSON.parse(localStorage.getItem('todo'))}
            else if(cat==2){cards=JSON.parse(localStorage.getItem('progress'))}
            else if(cat==3){ cards=JSON.parse(localStorage.getItem('review'))}
            else{ cards=JSON.parse(localStorage.getItem('done'))}
        document.getElementById(cont_id).innerHTML='';
            for(obj of cards){
                if(obj.ctitle.search(txt)>0){
                    document.getElementById(cont_id).innerHTML+=`
                <a href="view.php?cid=${obj.cid}" draggable="true" class="draggable">
        
                <input type="number" hidden id="data" value="${obj.cid}">
                <h2>${obj.ctitle}</h2>
                <p>${obj.cdesc}</p>
                <div class="note-footer ">
                    <span class="small">${obj.craeted_at}</span>
                    <button class="btn rounded-circle"><i class="fas fa-eye"></i></button>
                </div>
            </a>
                `;
                }
           
            }
        }else{
            if(cat==1){cards=JSON.parse(localStorage.getItem('todo'))}
            else if(cat==2){cards=JSON.parse(localStorage.getItem('progress'))}
            else if(cat==3){ cards=JSON.parse(localStorage.getItem('review'))}
            else{ cards=JSON.parse(localStorage.getItem('done'))}
        document.getElementById(cont_id).innerHTML='';
            for(obj of cards){
            
                    document.getElementById(cont_id).innerHTML+=`
                <a href="view.php?cid=${obj.cid}" draggable="true" class="draggable">
        
                <input type="number" hidden id="data" value="${obj.cid}">
                <h2>${obj.ctitle}</h2>
                <p>${obj.cdesc}</p>
                <div class="note-footer ">
                    <span class="small">${obj.craeted_at}</span>
                    <button class="btn rounded-circle"><i class="fas fa-eye"></i></button>
                </div>
            </a>
                `;
                }
           
            
        }
       
    }
    function filter_label_card(txt,cont_id,cat){
        var cards=[];
        if(txt!=0){
            if(cat==1){cards=JSON.parse(localStorage.getItem('todo'))}
            else if(cat==2){cards=JSON.parse(localStorage.getItem('progress'))}
            else if(cat==3){ cards=JSON.parse(localStorage.getItem('review'))}
            else{ cards=JSON.parse(localStorage.getItem('done'))}
        document.getElementById(cont_id).innerHTML='';
            for(obj of cards){
                if(obj.fk_tbl_label==txt){
                    document.getElementById(cont_id).innerHTML+=`
                <a href="view.php?cid=${obj.cid}" draggable="true" class="draggable">
        
                <input type="number" hidden id="data" value="${obj.cid}">
                <h2>${obj.ctitle}</h2>
                <p>${obj.cdesc}</p>
                <div class="note-footer ">
                    <span class="small">${obj.craeted_at}</span>
                    <button class="btn rounded-circle"><i class="fas fa-eye"></i></button>
                </div>
            </a>
                `;
                }
           
            }
        }else{
            if(cat==1){cards=JSON.parse(localStorage.getItem('todo'))}
            else if(cat==2){cards=JSON.parse(localStorage.getItem('progress'))}
            else if(cat==3){ cards=JSON.parse(localStorage.getItem('review'))}
            else{ cards=JSON.parse(localStorage.getItem('done'))}
        document.getElementById(cont_id).innerHTML='';
            for(obj of cards){
            
                    document.getElementById(cont_id).innerHTML+=`
                <a href="view.php?cid=${obj.cid}" draggable="true" class="draggable">
        
                <input type="number" hidden id="data" value="${obj.cid}">
                <h2>${obj.ctitle}</h2>
                <p>${obj.cdesc}</p>
                <div class="note-footer ">
                    <span class="small">${obj.craeted_at}</span>
                    <button class="btn rounded-circle"><i class="fas fa-eye"></i></button>
                </div>
            </a>
                `;
                }
           
            
        }
       
    }

    function filter_user_card(txt,cont_id,cat){
        var cards=[];
        if(txt!=0){
            if(cat==1){cards=JSON.parse(localStorage.getItem('todo'))}
            else if(cat==2){cards=JSON.parse(localStorage.getItem('progress'))}
            else if(cat==3){ cards=JSON.parse(localStorage.getItem('review'))}
            else{ cards=JSON.parse(localStorage.getItem('done'))}
        document.getElementById(cont_id).innerHTML='';
            for(obj of cards){
                if(obj.fk_tbl_u!=txt){
                    document.getElementById(cont_id).innerHTML+=`
                <a href="view.php?cid=${obj.cid}" draggable="true" class="draggable">
        
                <input type="number" hidden id="data" value="${obj.cid}">
                <h2>${obj.ctitle}</h2>
                <p>${obj.cdesc}</p>
                <div class="note-footer ">
                    <span class="small">${obj.craeted_at}</span>
                    <button class="btn rounded-circle"><i class="fas fa-eye"></i></button>
                </div>
            </a>
                `;
                }
           
            }
        }else{
            if(cat==1){cards=JSON.parse(localStorage.getItem('todo'))}
            else if(cat==2){cards=JSON.parse(localStorage.getItem('progress'))}
            else if(cat==3){ cards=JSON.parse(localStorage.getItem('review'))}
            else{ cards=JSON.parse(localStorage.getItem('done'))}
        document.getElementById(cont_id).innerHTML='';
            for(obj of cards){
            
                    document.getElementById(cont_id).innerHTML+=`
                <a href="view.php?cid=${obj.cid}" draggable="true" class="draggable">
        
                <input type="number" hidden id="data" value="${obj.cid}">
                <h2>${obj.ctitle}</h2>
                <p>${obj.cdesc}</p>
                <div class="note-footer ">
                    <span class="small">${obj.craeted_at}</span>
                    <button class="btn rounded-circle"><i class="fas fa-eye"></i></button>
                </div>
            </a>
                `;
                }
           
            
        }
       
    }
</script>