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
                <input type="text" class="input-search" name="search" value="<?php echo $keyword ?>">
            </div>
            <input type="submit" class="btn-submit" value="Tìm kiếm">
        </form>

        <label>Số môn học tìm thấy: <?php echo isset($_GET['search']) ? count($subjects) : 0; ?></label>

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
                require_once __DIR__ . '/../model/subjects.php';
                if (isset($_GET['search'])) {
                    foreach ($subjects as $subject) { ?>
                        <tr>
                            <td class="counterCell"></td>
                            <td> <label><?php echo $subject['name'] ?></label> </td>
                            <td> <label><?php echo $subject['school_year'] ?></label> </td>
                            <td class="description"> <label><?php echo $subject['description'] ?></label> </td>
                            <td>
                                <button class="btn btn-delete" onclick="deleteSubject('<?php echo $subject['name'] ?>', '<?php echo $subject['id'] ?>')">Xóa</button>
                                <button class="btn btn-edit">Sửa</button>
                            </td>
                        </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>