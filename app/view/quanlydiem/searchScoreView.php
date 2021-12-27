<html>

<head>
    <title>Tìm kiếm điểm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="./web/css/SearchScores.css" rel="stylesheet">
</head>

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
        <label>Số bản ghi tìm thấy: <?php echo $count = $sql_scores->rowCount(); ?></label>
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
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[2] ?></td>
                <td><?php echo $row[3] ?></td>
                <td><?php echo $row[4] ?></td>
                <td style="width:150px">
                    <button class='btn btn-delete' onclick="deleteScore('<?php echo $row[1] ?>', '<?php echo $row[0] ?>'); ">Xóa</button>
                    <button class="btn btn-edit">Sửa</button>
                </td>
            </tr>
        <?php } ?>
    </table>
</fieldset>
</body>
<script>
    function deleteScore(student, id) {

        if (confirm(`Bạn chắc chắn muốn xóa điểm của sinh viên ${student}?`)) {
            window.location = `searchScore.php?action=delete&id=${id}`;
            return true;
        } else {
            return false;
        }
    }
</script>

</html>