<?php
   /* $sql= "SELECT p.* , s.* FROM parent p,student s WHERE p.parentId=s.Parent_parentId";

    $sql = "SELECT p.*, s.*, a.*
    FROM ((parent p
    INNER JOIN student s ON p.parentId = s.Parent_parentId)
    INNER JOIN attendance a ON s.studentId = a.Student_studentId);"

    $sql= "SELECT s.*, p.*, a.*
    FROM ((student s INNER JOIN parent p ON s.Parent_parentId = p.parentId)
    INNER JOIN attendance a ON s.studentId = a.Student_studentId);"
*/
    $sql = "SELECT p.*, s.*, a.*, l.*
    FROM parent p
    INNER JOIN student s ON p.parentId = s.Parent_parentId
    INNER JOIN attendance a ON s.studentId = a.Student_studentId
    INNER JOIN lesson l ON a.Lesson_lessonId = l.lessonId;"

    //$sql = "SELECT a.*, l.* FROM attendance a, lesson l WHERE a.Lesson_lessonId=l.lessonId AND date={$id}";
?>