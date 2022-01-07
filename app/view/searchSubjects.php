<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm/Xóa</title>
    <link rel="stylesheet" href="web/css/subject.css">
    <script src="web/js/subject.js"></script>

</head>

<body>

    <div class="container">
        <form action="" method="GET" id="form-search">
            <div class="wrap-item">
                <label for="">Khóa học</label>
                <select name="school_year" id="select-box">
                    <option value="">Tất cả</option>
                    <option value="Năm 1" <?php if ($schoolYear == 'Năm 1') {
                                                echo 'selected';
                                            } ?>>Năm 1</option>
                    <option value="Năm 2" <?php if ($schoolYear == 'Năm 2') {
                                                echo 'selected';
                                            } ?>>Năm 2</option>
                    <option value="Năm 3" <?php if ($schoolYear == 'Năm 3') {
                                                echo 'selected';
                                            } ?>>Năm 3</option>
                    <option value="Năm 4" <?php if ($schoolYear == 'Năm 4') {
                                                echo 'selected';
                                            } ?>>Năm 4</option>
                </select>
            </div>
            <div class="wrap-item">
                <label for="">Từ khóa</label>
                <input type="text" class="input-search" name="search" value="">
            </div>
            <input type="submit" class="btn-submit" value="Tìm kiếm">
        </form>
        <p>Số môn học tìm thấy: <label></label></p>
        <table>
            <colgroup>
                <col width="5%">
                <col width="30%">
                <col width="15%">
                <col width="35%">
                <col width="15%">
            </colgroup>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tên môn học</th>
                    <th>Khóa học</th>
                    <th>Mô tả chi tiết</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($_GET['search'])) {

                    global $subjects;
                    foreach ($subjects as $row) { ?>
                        <tr>
                            <td class="counterCell"></td>
                            <td> <label><?php echo $row['name'] ?></label> </td>
                            <td> <label><?php echo $row['school_year'] ?></label> </td>
                            <td class="description"> <label><?php echo $row['description'] ?></label> </td>
                            <td>
                                <button class="btn btn-delete" onclick="deleteSubject('<?php echo $row['name'] ?>', '<?php echo $row['id'] ?>')">Xóa</button>
                                <button class="btn btn-edit">Sửa</button>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>

    </div>
</body>

</html>