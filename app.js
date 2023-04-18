function get_myboards(uid) {
    $.ajax({
        url: 'api/get-user-board.php',
        type: "POST",
        data: {'uid': uid, 'getuserboard': 'yes'},
        success: function (res) {
            var data = JSON.parse(res);
            document.getElementById("my-board").innerHTML = "";
            for (obj of data) {
                document.getElementById("my-board").innerHTML += `
                <div class="col-md-4">
                <div class="login-form">
                    <div class="form-section board-card">
                        <h4> <a href="board?bid=${obj.bid}"> ${obj.board_title}</a></h4>
                        <p class="small">${obj.board_desc}</p>
                        <div class="c-footer"><span>${obj.created_at}</span> <a href="add-to-board?bid=${obj.bid}" class="signup-link">Add Participant</a>
                        </div>
                    </div>
                </div>
            </div>
                `;
            }
        }
    });
}

function get_guestboards(uid) {
    $.ajax({
        url: 'api/get-guest-board.php',
        type: "POST",
        data: {'uid': uid, 'getuserboard': 'yes'},
        success: function (res) {
            var data = JSON.parse(res);
            document.getElementById("guest-board").innerHTML = "";
            for (obj of data) {
                document.getElementById("guest-board").innerHTML += `
                <div class="col-md-4">
                <div class="login-form">
                    <div class="form-section board-card">
                        <h4> <a href="board?bid=${obj.bid}"> ${obj.board_title}</a></h4>
                        <p class="small">${obj.board_desc}</p>
                        <div class="c-footer"><span>${obj.created_at}</span> <a href="add-to-board?bid=${obj.bid}" class="signup-link">Add Participant</a>
                        </div>
                    </div>
                </div>
            </div>
                `;
            }
        }
    });
}

function get_card(bid, cat, cont_id) {

    $.ajax({
        url: 'api/get-card.php/?bid=' + bid + '&cat=' + cat,
        type: "GET",
        success: function (res) {

            var cards = JSON.parse(res);
            if (cat == 1) {
                localStorage.setItem("todo", JSON.stringify(cards))
            } else if (cat == 2) {
                localStorage.setItem("progress", JSON.stringify(cards))
            } else if (cat == 3) {
                localStorage.setItem("review", JSON.stringify(cards))
            } else {
                localStorage.setItem("done", JSON.stringify(cards))
            }
            document.getElementById(cont_id).innerHTML = '';
            for (obj of cards) {
                document.getElementById(cont_id).innerHTML += `
                <a href="view?cid=${obj.cid}" draggable="true" class="draggable">
        
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

    });

}


function change_card(cid, status) {
    $.ajax({
        url: 'api/update-card.php/?cid=' + cid + "&status=" + status,
        type: "GET",
        success: function (res) {
            console.log(res);
        }
    });
}


