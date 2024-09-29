<?php
function processSortableQuiz($conn)
{
    $cssCode = '
    .result-container {
        position: fixed;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 300px;
    }
    .result-container1 {
        position: fixed;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 300px;
    }
    .result-message {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: red ;
    }
    .result-message1 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: blue ;
    }
    ';

    echo '<style>' . $cssCode . '</style>';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["xacnhan"])) {
        $originalOrder = [];
        $correctOrder = [];
        $sortedOrder = [];

        $sql = "SELECT ma_cau_hoi, ma_da, thu_tu_dap_an_dung FROM dap_an_sap_xep";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $originalOrder[$row['ma_cau_hoi']][] = $row['thu_tu_dap_an_dung'];
            $correctOrder[$row['ma_cau_hoi']][] = $row['thu_tu_dap_an_dung'];
        }


        foreach ($_POST as $key => $value) {
            if (strpos($key, 'sortable-list-') === 0) {
                $questionId = str_replace('sortable-list-', '', $key);


                $questionTypeSql = "SELECT loai_cau_hoi FROM cau_hoi WHERE ma_cau_hoi = $questionId";
                $questionTypeResult = mysqli_query($conn, $questionTypeSql);

                if ($questionTypeResult && $question = mysqli_fetch_assoc($questionTypeResult)) {
                    if ($question['loai_cau_hoi'] == 3) {
                        $sortedOrder[$questionId] = explode(',', $value);


                        // insertUserAnswer($conn, $questionId, $sortedOrder[$questionId]);
                    }
                }
            }
        }


        $isSortedCorrectly = true;

        foreach ($originalOrder as $questionId => $originalPositions) {
            $sorted = array_values($sortedOrder[$questionId]);
            $correct = array_values($correctOrder[$questionId]);

            if ($sorted !== $correct) {
                $isSortedCorrectly = false;
                break;
            }
        }

        $formSubmitted = true;

        echo '<div id="result-container" class="result-container">';
        if ($formSubmitted) {
            $totalQuestions = count($originalOrder);
            $userScore = 0;

            foreach ($originalOrder as $questionId => $originalPositions) {
                echo "<div class='result-message'>";
                echo "Câu $questionId: ";
                $sorted = array_values($sortedOrder[$questionId]);
                $correct = array_values($correctOrder[$questionId]);

                if ($sorted === $correct) {
                    echo "Đúng!";
                    $userScore += 100 / $totalQuestions; // Increment user's score
                } else {
                    echo "Sai!";
                    insertUserAnswer($conn, $questionId, $sortedOrder[$questionId]);

                }

                echo "</div>";
            }

            echo "</div>";
            echo '<div id="result-container1" class="result-container1">';
            echo "<div class='result-message1'>";
            echo "Tổng điểm: " . round($userScore, 2) . " điểm";
            echo "</div>";

            $userId = 1; // Fetch or get the user's ID
            saveScoreToDatabase($conn, round($userScore, 2), $userId);
            saveUserAnswersToDatabase($conn, $sortedOrder, $userId);
            insertCorrectAnswers($conn, $sortedOrder, $userId);
        } else {
            echo "<div class='result-message'>Không có dữ liệu</div>";
        }
        echo "</div>";
    } else {
        $formSubmitted = false;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Câu Hỏi sắp xếp </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
                margin-bottom: 10px;
            }

            .sortable-list {
                list-style-type: none;
                padding: 20px;
                margin: 0 auto;
                background-color: #fff;
            }

            .sortable-item {
                background-color: #3498db;
                color: #fff;
                padding: 20px;
                margin: 10px;
                cursor: grab;
                border-radius: 5px;
                user-select: none;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                font-size: 20px;
            }

            .question-container {
                margin-bottom: 20px;
                padding: 15px;
                background-color: #ecf0f1;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

            }

            .question-title {
                background-color: #2ecc71;
                color: #fff;
                padding: 20px;
                margin: 20px 0;
                border-radius: 5px;
                text-align: center;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                font-size: 20px;

            }

            .btn-primary {
                margin-bottom: 10px;
                background-color: #4caf50;
                border: none;
                padding: 15px 30px;
                color: #fff;
                font-size: 18px;
                cursor: pointer;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .btn-primary:hover {
                background-color: #45a049;
            }

            .submit-container {
                margin-bottom: 10px;
            }

            .first-question {
                text-align: center;
                width: 130vh;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div>
            <?php
            function displaySortableQuestions($conn)
            {
                $sql = "SELECT cau_hoi.ma_cau_hoi, cau_hoi.ten_cau_hoi, cau_hoi.hinh_anh, dap_an_sap_xep.ma_da, dap_an_sap_xep.cac_dap_an, dap_an_sap_xep.thu_tu_dap_an_dung
                    FROM cau_hoi 
                    LEFT JOIN dap_an_sap_xep ON cau_hoi.ma_cau_hoi = dap_an_sap_xep.ma_cau_hoi
                    WHERE cau_hoi.loai_cau_hoi = 3
                    ORDER BY cau_hoi.ma_cau_hoi, dap_an_sap_xep.ma_da";

                $result = mysqli_query($conn, $sql);

                $tenCauHoi = "";
                $thuTu = 0;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($tenCauHoi != $row['ten_cau_hoi']) {
                            echo '<div class="question-container';
                            if ($row['ma_cau_hoi'] == 1) {
                                echo ' first-question';
                            }
                            echo '">';
                            echo '<div class="question-title">';
                            echo 'Câu hỏi ' . $row['ma_cau_hoi'] . ': ' . $row['ten_cau_hoi'];
                            echo '</div>';

                            if (!empty($row['hinh_anh'])) {
                                echo '<img src="uploadfile/' . $row['hinh_anh'] . '" alt="Hình ảnh câu hỏi">';
                                echo '<br>';
                                echo '<br>';
                            }

                            echo '<ul id="sortable-list-' . $row['ma_cau_hoi'] . '" class="sortable-list">';
                            $tenCauHoi = $row['ten_cau_hoi'];
                            $thuTu = 0;
                        }

                        // Tăng giá trị thứ tự và gán cho ma_da
                        $thuTu++;
                        echo '<li class="sortable-item" data-question-id="' . $thuTu . '">' . $row['cac_dap_an'] . '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo "Không có câu hỏi nào ";
                }
            }

    displaySortableQuestions($conn);




    ?>
        </div>

        <form method="post" action="">
            <?php
       function generateSortableLists($conn)
       {
           $result = mysqli_query($conn, "SELECT ma_cau_hoi FROM cau_hoi");

           while ($row = mysqli_fetch_assoc($result)) {
               $orderMapping = [];
               $randomOrder = [];
               $sqlOriginal = "SELECT ma_da FROM dap_an_sap_xep WHERE ma_cau_hoi = " . $row['ma_cau_hoi'] . " ORDER BY RAND()";
               $resultOriginal = mysqli_query($conn, $sqlOriginal);

               $thuTu = 0;

               while ($rowOriginal = mysqli_fetch_assoc($resultOriginal)) {
                   // Tăng giá trị thứ tự
                   $thuTu++;

                   // Lưu giữ giá trị thứ tự tăng dần
                   $orderMapping[$rowOriginal['ma_da']] = $thuTu;

                   // Lưu giữ giá trị thứ tự ngẫu nhiên
                   $randomOrder[] = $thuTu;
               }

               // Sắp xếp mảng giá trị thứ tự ngẫu nhiên
               //    shuffle($randomOrder);

               echo '<ul id="sortable-list-' . $row['ma_cau_hoi'] . '" class="sortable-list" style="display: none;" >';
               echo '<input type="hidden" name="sortable-list-' . $row['ma_cau_hoi'] . '" value="' . implode(',', $randomOrder) . '" />';
               echo '</ul>';
           }
       }


    generateSortableLists($conn);

    ?>

            <?php
    function generateSubmitButton($formSubmitted)
    {
        echo '<div class="submit-container">';

        if (!$formSubmitted) {
            echo '<input type="submit" value="Xác nhận" name="xacnhan" class="btn btn-primary">';
        } else {
            echo '<input type="submit" value="Làm Lại" name="lamlai" class="btn btn-primary" onclick="reloadPage();">';
        }

        echo '</div>';
    }

    generateSubmitButton($formSubmitted);
    ?>

        </form>

        <script>
            <?php
    $result = mysqli_query($conn, "SELECT ma_cau_hoi FROM cau_hoi");
    while ($row = mysqli_fetch_assoc($result)) {
        echo 'new Sortable(document.getElementById("sortable-list-' . $row['ma_cau_hoi'] . '"), {
                animation: 150,
                ghostClass: "sortable-ghost",
                chosenClass: "sortable-chosen",
                dragClass: "sortable-drag",
                handle: ".sortable-item",
                onEnd: function (evt) {
                    updateSortableListOrder("sortable-list-' . $row['ma_cau_hoi'] . '");
                },
            });';
    }
    ?>

            function updateSortableListOrder(listId) {
                var sortedItems = [];
                var list = document.getElementById(listId);

                for (var i = 0; i < list.children.length; i++) {
                    var item = list.children[i];
                    if (item.nodeType === 1 && item.getAttribute('data-question-id') !== null) {
                        sortedItems.push(item.getAttribute('data-question-id'));
                    }
                }

                document.querySelector('input[name="' + listId + '"]').value = sortedItems.join(',');
            }

            function reloadPage() {
                location.reload(true);
            }
        </script>

    </body>

    </html>
<?php
    mysqli_close($conn);
}
function saveScoreToDatabase($conn, $userScore, $userId)
{
    $userScore = mysqli_real_escape_string($conn, $userScore);
    $userId = mysqli_real_escape_string($conn, $userId);

    $insertQuery = "INSERT INTO lich_su (diem_so, id_user) VALUES ('$userScore', '$userId')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Điểm lưu thành công.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
function insertUserAnswer($conn, $questionId, $sortedOrder)
{
    $userId = 1;
    $incorrectAnswerCount = count(array_diff($sortedOrder, range(1, count($sortedOrder))));


    $checkSql = "SELECT id_user_answer FROM user_answers WHERE ma_cau_hoi = $questionId AND id_user = $userId";
    $checkResult = mysqli_query($conn, $checkSql);

    if ($checkResult) {
        if (mysqli_num_rows($checkResult) > 0) {

            $updateSql = "UPDATE user_answers SET so_lan_tra_loi_sai = so_lan_tra_loi_sai + 1 WHERE ma_cau_hoi = $questionId AND id_user = $userId";
            $updateResult = mysqli_query($conn, $updateSql);

            // if (!$updateResult) {
            //     echo "Error updating record: " . mysqli_error($conn);
            // } else {
            //     echo "Record updated successfully!";
            // }
        } else {

            $insertSql = "INSERT INTO user_answers (ma_cau_hoi, id_user, so_lan_tra_loi_sai) VALUES ($questionId, $userId, 1)";
            $insertResult = mysqli_query($conn, $insertSql);

            // if (!$insertResult) {
            //     echo "Error inserting record: " . mysqli_error($conn);
            // } else {
            //     echo "Record inserted successfully!";
            // }
        }
    } else {
        echo "Error checking for existing record: " . mysqli_error($conn);
    }
}


function saveUserAnswersToDatabase($conn, $sortedOrder, $userId)
{

    foreach ($sortedOrder as $questionId => $answerOrder) {
        $incorrectAnswerCount = count(array_diff($answerOrder, range(1, count($answerOrder))));


        $checkSql = "SELECT id_user_answer, so_lan_tra_loi_sai FROM user_answers WHERE ma_cau_hoi = $questionId AND id_user = $userId";
        $checkResult = mysqli_query($conn, $checkSql);

        if ($checkResult) {
            if (mysqli_num_rows($checkResult) > 0) {

                $existingRecord = mysqli_fetch_assoc($checkResult);
                $currentIncorrectCount = $existingRecord['so_lan_tra_loi_sai'];
                $newIncorrectCount = $currentIncorrectCount + $incorrectAnswerCount;

                $updateSql = "UPDATE user_answers SET so_lan_tra_loi_sai = $newIncorrectCount WHERE ma_cau_hoi = $questionId AND id_user = $userId";
                $updateResult = mysqli_query($conn, $updateSql);

                // if (!$updateResult) {
                //     echo "Error updating record: " . mysqli_error($conn);
                // } else {
                //     echo "Record updated successfully!";
                // }
            } else {
                // Insert new record
                $insertSql = "INSERT INTO user_answers (ma_cau_hoi, id_user, so_lan_tra_loi_sai) VALUES ($questionId, $userId, $incorrectAnswerCount)";
                $insertResult = mysqli_query($conn, $insertSql);

                // if (!$insertResult) {
                //     echo "Error inserting record: " . mysqli_error($conn);
                // } else {
                //     echo "Record inserted successfully!";
                // }
            }
        } else {
            // echo "Error checking for existing record: " . mysqli_error($conn);
        }
    }
}
// function insertCorrectAnswers($conn, $correctOrder, $userId)
// {
//     foreach ($correctOrder as $questionId => $correctPositions) {
//         $insertSql = "INSERT INTO user_answers_correct (ma_cau_hoi, id_user, ma_da, thu_tu_tra_loi) VALUES ";
//         $values = [];

//         // Retrieve ma_da values from dap_an_sap_xep
//         $maDaSql = "SELECT ma_da FROM dap_an_sap_xep WHERE ma_cau_hoi = $questionId ORDER BY thu_tu_dap_an_dung";
//         $maDaResult = mysqli_query($conn, $maDaSql);
//         $maDaArray = [];

//         while ($maDaRow = mysqli_fetch_assoc($maDaResult)) {
//             $maDaArray[] = $maDaRow['ma_da'];
//         }

//         // Iterate through all ma_da values and insert them into user_answers_correct
//         foreach ($maDaArray as $position => $maDa) {
//             $values[] = "($questionId, $userId, '$maDa', " . ($position + 1) . ")";
//         }

//         if (!empty($values)) {
//             $insertSql .= implode(", ", $values);
//             mysqli_query($conn, $insertSql);
//         }
//     }
// }

function insertCorrectAnswers($conn, $sortedOrder, $userId)
{
    foreach ($sortedOrder as $questionId => $userAnswerPositions) {
        $insertSql = "INSERT INTO user_answers_correct (ma_cau_hoi, id_user, ma_da, thu_tu_tra_loi) VALUES ";
        $values = [];

        // Retrieve ma_da values from dap_an_sap_xep
        $maDaSql = "SELECT ma_da FROM dap_an_sap_xep WHERE ma_cau_hoi = $questionId ";
        $maDaResult = mysqli_query($conn, $maDaSql);
        $maDaArray = [];

        while ($maDaRow = mysqli_fetch_assoc($maDaResult)) {
            $maDaArray[] = $maDaRow['ma_da'];
        }

        // Iterate through all ma_da values and insert them into user_answers_correct
        foreach ($maDaArray as $position => $maDa) {
            // Use the user's selected positions starting from 1
            $userAnswerPosition = $userAnswerPositions[$position] ?? null;

            // Check if the user provided a position for the current answer
            if ($userAnswerPosition !== null) {
                $values[] = "($questionId, $userId, '$maDa', $userAnswerPosition)";
            }
        }

        if (!empty($values)) {
            $insertSql .= implode(", ", $values);
            mysqli_query($conn, $insertSql);
        }
    }
}






include './connectdb.php';
processSortableQuiz($conn);
?>