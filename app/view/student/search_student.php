<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tìm kiếm sinh viên</title>
    <meta charshet="utf-8" />
    <link rel="stylesheet" href="./web/css/student/search_student.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="content">
    <form action="" method="get">
        <div class="search">
            <label>Từ khóa</label>
            <input type="text" name="search" class="form-control">
        </div>
        <div class="btn-search">
            <button type="submit" id="search-button">Tìm kiếm</button>
        </div>
        <p class="count">Số sinh viên tìm thấy:
            <?php
                global $statement;
                echo isset($statement) ? count($statement) : 0;
            ?>
        </p>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tên sinh viên</th>
            <th>Mô tả chi tiết</th>
            <th>Action</th>
        </tr>
        <?php
        global $statement;
        $i = 0;
        foreach ($statement as $student){
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?> </td>
                <td><?php echo $student['name'] ?> </td>
                <td><?php echo $student['description'] ?> </td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary">Sửa</button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('<?php echo $student['id'] ?>', '<?php echo $student['name'] ?>')">Xóa</button>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<!-- Modal HTML -->
<div id="modalDelete" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title w-100">
                    <i class="far fa-times-circle" hidden></i>
                    Xác nhận
                </h3>
            </div>
            <div class="modal-body">
                <h4 class="modal-title w-100">Bạn có chắc chắn muốn xóa sinh viên <span id="tensinhvien"></span>?</h4>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                <a id="delete" class="btn btn-danger">Xóa</a>
            </div>
        </div>
    </div>
</div>
</body>
<script src="web/js/student.js"></script>
</html>

