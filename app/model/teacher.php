<?php
require_once __DIR__ . '/../common/connectionPDO.php';
$db = new Database();
$db->__construct();

function getTeacherById($id)
{
	global $db;
	$sql = "SELECT *
            FROM teachers
            WHERE id = '$id' ";
	$teacher = $db->conn->prepare($sql);
	$teacher->execute();
	return $teacher->fetch();
}

function updateTeacherById($id, $name, $avatar, $description, $specialized, $degree)
{
	global $db;
	$sql = "UPDATE teachers SET 
            name = '$name',
            avatar = '$avatar',
            description = '$description',
            specialized = '$specialized',
            degree = '$degree'
            WHERE id = '$id' ";
	$teacher = $db->conn->prepare($sql);
	return $teacher->execute();
}

$specialized = ['001' => "Khoa học máy tính", '002' => "Khoa học dữ liệu", '003' => "Hải dương học"];
$degree = ['001' => "Cử nhân", '002' => "Thạc sỹ", '003' => "Tiến sỹ", '004' => "Phó giáo sư", '005' => "Giáo sư"];


function getTeacher($str, $spec)
{
	if ($str == '' && $spec == '') {
		$query = "SELECT * FROM `teachers` ORDER BY id DESC;";
	} else {
		$query = "SELECT * FROM `teachers` WHERE (teachers.name LIKE '%" . $str . "%' OR teachers.description LIKE '%" . $str . "%' OR teachers.degree LIKE '%" . $str . "%') AND teachers.specialized ='" . $spec . "'";
	}
	global $db;
	$statement = $db->conn->prepare($query);
	$statement->execute();
	$search_teacher = [];
	foreach ($statement as $row) {
		$id = $row['id'];
		$name = $row['name'];
		$des = $row['description'];
		$spec = $row['specialized'];
		$search_teacher[] = array($id, $name, $des, $spec);
	}

	return $search_teacher;
}

function deleteTeacher($id, $str, $spec)
{
	$i = (string) $id;
	$query = "DELETE FROM `teachers` WHERE teachers.id = " . $i;
	global $db;
	$db->conn->exec($query);
	header("Location: ../view/search_teacher.php?spec=" . $spec . "&str=" . $str);
}
