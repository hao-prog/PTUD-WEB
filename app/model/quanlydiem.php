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

function deleteScores($id)
{
    global $db;
    $sql = "DELETE FROM scores WHERE id=$id";
    $delete_score = $db->conn->prepare($sql);
    $delete_score->execute([$id]);
    return $delete_score;
}


