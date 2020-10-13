<?php
    $link=mysqli_connect('localhost','admin','admin','employees');

    //예외처리
    if(mysqli_connect_error()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $hire_year=mysqli_real_escape_string($link,$_GET['hire_years']);
    // echo $hire_year;

    // $dept_name=mysqli_real_escape_string($link,$_GET['dept_names']);


    $query ="
    SELECT d.dept_no AS DEPT_NO, d.dept_name AS DEPT_NAME, year(from_date) AS YEAR, count(*) AS COUNT
    FROM dept_emp de
    INNER JOIN departments d ON d.dept_no=de.dept_no
    WHERE de.to_date='9999-01-01' and year(from_date)= ".$hire_year."
    GROUP BY dept_name
    ORDER BY dept_no
    ";
    
    $result = mysqli_query($link,$query);

    $article = '';

    while($row=mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .=$row['DEPT_NO'];
        $article .= '</td><td>';

        $article .=$row['DEPT_NAME'];
        $article .= '</td><td>';

        $article .=$row['YEAR'];
        $article .= '</td><td>';

        $article .=$row['COUNT'];
        $article .= '</td><td>';

        $article .= '</td></tr>'; 
    }

    mysqli_free_result($result);
    mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>입사년도에 따른 부서별 직원 수 조회</title>
    <style>
        body{
            font-family : Consolas,monospace;
            font-family : 12px;
        }
        table{
            width : 100%;
        }
        th,td{
            padding : 10px;
            border-bottom : 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php">직원 관리 시스템</a> | 연봉 정보</h2>
        <table>
            <tr>
                <th>Department_no</th>
                <th>Department_name</th>
                <th>YEAR</th>
                <th>COUNT</th>
            </tr>
            <?=$article?>
        </table>
</body>
</html>