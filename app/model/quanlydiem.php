<?php

$db = new Database();
$db->__construct();


function getAllScores()
{
    global $db;
    $sql = "select scores.id, students.name, subjects.name, teachers.name, scores.score, scores.student_id from scores 
        JOIN students on (scores.student_id = students.id)
        JOIN subjects on (scores.subject_id = subjects.id)
        JOIN teachers on (scores.teacher_id = teachers.id)";

    $Allscores = $db->conn->prepare($sql);
    $Allscores->execute();
    return $Allscores;
}

function getScores($student, $subject, $teacher)
{
    global $db;
    $sql = "SELECT scores.id, students.name, subjects.name, teachers.name, scores.score, scores.student_id FROM `scores`
            JOIN students ON (scores.student_id = students.id)
            JOIN subjects ON (scores.subject_id = subjects.id)
            JOIN teachers ON (scores.teacher_id = teachers.id)
            WHERE students.name LIKE N'%$student%' AND subjects.name LIKE N'%$subject%' AND teachers.name LIKE N'%$teacher%'";

    $scores = $db->conn->prepare($sql);
    $scores->execute();
    return $scores;
}

function getScoresID($id)
{
    global $db;
    $sql = "SELECT scores.id, scores.student_id, scores.teacher_id, scores.subject_id, scores.score, scores.description,students.name, subjects.name, teachers.name FROM `scores`
            JOIN students ON (scores.student_id = students.id)
            JOIN subjects ON (scores.subject_id = subjects.id)
            JOIN teachers ON (scores.teacher_id = teachers.id)
            WHERE scores.id='$id'";

    $scores = $db->conn->prepare($sql);
    $scores->execute();
    $scores2 = $scores->fetchAll();

    return $scores2;
}


function deleteScores($id)
{
    global $db;
    $sql = "DELETE FROM scores WHERE id=$id";
    $delete_score = $db->conn->prepare($sql);
    $delete_score->execute([$id]);
    $scores2 = $delete_score->fetchAll();

    return $scores2;
}

function updateScores($id, $student, $teacher, $subject, $score, $comment)
{
    global $db;
    $sql_update = "UPDATE scores SET student_id='$student', teacher_id='$teacher', subject_id='$subject', score='$score', description='$comment' WHERE id='$id'";
    $update_score = $db->conn->prepare($sql_update)->execute([$student, $teacher, $subject, $score, $comment, $id]);
    // $scores2 = $update_score->fetchAll();

    return $update_score;
}


function getAllstudents()
{
    global $db;
    $sql = "SELECT * FROM students";
    $allStudent = $db->conn->prepare($sql);
    $allStudent->execute();
    $students = $allStudent->fetchAll();
    return $students;
}

function getAllteachers()
{
    global $db;
    $sql = "SELECT * FROM teachers";
    $allTeachers = $db->conn->prepare($sql);
    $allTeachers->execute();
    $teachers = $allTeachers->fetchAll();
    return $teachers;
}

function getAllsubjects()
{
    global $db;
    $sql = "SELECT * FROM subjects";
    $allSubjects = $db->conn->prepare($sql);
    $allSubjects->execute();
    $subjects = $allSubjects->fetchAll();
    return $subjects;
}
