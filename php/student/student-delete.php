<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Nếu là delete thì thực hiện thao tác này
if (!empty($_POST['delete']))
{
    require ("/students.php");
    $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    deleteStudent($student_id);
}
 
// Cuối cùng là chuyển hướng về trang danh sách
header("Location:student-list.php");