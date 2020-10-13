<?php
    $link = mysqli_connect("localhost","admin","admin","employees");
    $query ="
    SELECT *
    FROM dept_emp 
    ";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템</title>
</head>

<body>
    <h1>직원 관리 시스템</h1>
    <a href="emp_select.php">(1) 직원 정보 조회 </a><br>
    <p>
        <a href="emp_insert.php">(2) 신규 직원 등록 </a><br>
    <p>
    <form action="emp_update.php" method="POST">
        (3) 직원 정보 수정:
        <input type="text" name="emp_no" placeholder="사원번호를 입력하세요.">
        <input type="submit" value="Search">
    </form>
    <p>
    <form action="emp_delete.php" method="POST">
        (4) 직원 정보 삭제:
        <input type="text" name="emp_no" placeholder="사원번호를 입력하세요.">
        <input type="submit" value="Delete">
    </form>
    <p>
    <form action="salary_info.php" method="GET">
        (5) 연봉 정보:
        <input type="text" name="number" placeholder="크기를 입력하세요.">
        <input type="submit" value="Search">
    </form>
    <p>
    <form action="hire_year_info.php" method="GET">
        (6) 입사년도에 따른 부서별 직원 수 조회:
        <p>
            <label>입사년도: </label>
            <input type="text" name="hire_years" placeholder="입사년도를 입력하세요.">

            <input type="submit" value="Search">

    </form>
</body>

</html>