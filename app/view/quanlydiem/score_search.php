<html>

<head>
    <title>Tìm kiếm điểm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="./web/css/quanlydiem/SearchScores.css" rel="stylesheet">
    <script src="web/js/score_search_scripts.js"></script>

</head>
<?php

session_start();
unset($_SESSION['student']);
unset($_SESSION['subject']);
unset($_SESSION['teacher']);
unset($_SESSION['score']);
unset($_SESSION['comment']);
?>
<fieldset>
    <form method="GET" name="scoresearch">
        <table class="box_search">
            <tr>
                <td class='lable-search'>Sinh viên</td>
                <td><?php echo "<input class='input-search' type='text' name='student' value='$student'>" ?></td>
            </tr>
            <tr>
                <td class='lable-search'>Môn học</td>
                <td><?php echo "<input class='input-search' type='text' name='subject' value='$subject'>" ?></td>
            </tr>
            <tr>
                <td class='lable-search'>Giáo viên</td>
                <td> <?php echo "<input type='text' class='input-search' name='teacher' value='$teacher' >" ?></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left:100px ">
                    <button type="submit" class="submit-lable">Tìm Kiếm</button>
                </td>
            </tr>
        </table>
        <label>Số bản ghi tìm thấy: <?php if ($sql_scores != null) {
                                        echo $count = $sql_scores->rowCount();
                                    } else echo '0' ?></label>
    </form>
    <table class="table-search">
        <tr>
            <th style="width:70px">No</th>
            <th style="width:230px">Sinh viên</th>
            <th style="width:230px">Môn học</th>
            <th style="width:230px">Giáo viên</th>
            <th style="width:80px">Điểm</th>
            <th style="width:150px">Action</th>
        </tr>
        <?php
        foreach ($sql_scores as $row) {
        ?>
            <tr>
                <td><?php echo $_SESSION['ID_SCORE'] = $row[0] ?></td>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[2] ?></td>
                <td><?php echo $row[3] ?></td>
                <td><?php echo $row[4] ?></td>
                <td style="width:150px">
                    <button class='btn btn-delete' onclick="deleteScore('<?php echo $row[1] ?>', '<?php echo $row[0] ?>'); ">Xóa</button>
                    <button class="btn btn-edit" onclick="window.location = `search_score.php?action=edit_input&id=${<?php echo $row[0] ?>}`;">Sửa</button>
                </td>
            </tr>
        <?php } ?>
    </table>
</fieldset>
</body>


</html>