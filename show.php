<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Bài sắp xếp dãy số</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/3da1a747b2.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <h1 id='deBai' align='center'></h1>
        <h3></h3>
        <p>Kéo thả đối tượng vào vị trí</p>
        <div style="display: flex; max-width: 100%; position: relative;">
            <div id='muiTenHienThi'>
                <div>Hướng sắp xếp</div>
                <img src="muiten.png" alt="">
            </div>
            <ul class="draggable-list" id="draggable-list"></ul>
        </div>
        <div style="display: flex;">
            <button class="check-btn" id="check">
                Kiểm tra
                <i class="fas fa-paper-plane"></i>
            </button>
            <button class="check-btn" id="help">
                Trợ giúp
            </button>
        </div>
    </main>

    <div style="padding: 10px;">
        <div class="container1">
            <div>
                <span>Điểm:&ensp;</span><br><span id="point">0</span>
                <p></p>
            </div>
            <div>
                <input type="checkbox" name="goiY" id="goiY1" value="goiY1" onchange="showWhenChange1()">
                <label for="goiY1">Không hiên vị trí đúng sai</label> <br>
                <input type="checkbox" name="goiY" id="huonghienthi" value="huonghienthi" onchange="showWhenChange2()">
                <label for="huonghienthi">Hiển thị theo hướng dọc</label> <br>
            </div>
        </div>
        <div id="showhelp">

        </div>
    </div>
    <script src="function.js"></script>
    <script src="script.js"></script>
</body>

</html>