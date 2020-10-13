<?php
    $link= mysqli_connect("localhost","admin","admin","employees");

    if(isset($_GET['emp_no'])){
        $filtered_id = mysqli_real_escape_string($link,$_GET['emp_no']);
    }else{
        $filtered_id = mysqli_real_escape_string($link,$_POST['emp_no']);
    }


    $filtered = array(
        'emp_no' => mysqli_real_escape_string($link,$_POST['emp_no']),
        'birth_date' => mysqli_real_escape_string($link,$_POST['birth_date']),
        'first_name' => mysqli_real_escape_string($link,$_POST['first_name']),
        'last_name' => mysqli_real_escape_string($link,$_POST['last_name']),
        'gender' => mysqli_real_escape_string($link,$_POST['genders']),
        'hire_date' => mysqli_real_escape_string($link,$_POST['hire_date'])
    );

    $query = "
        INSERT INTO employees (
            emp_no,
            birth_date,
            first_name,
            last_name,
            gender,
            hire_date
            )values(
                '{$filtered['emp_no']}',
                '{$filtered['birth_date']}',
                '{$filtered['first_name']}',
                '{$filtered['last_name']}',
                '{$filtered['gender']}',
                '{$filtered['hire_date']}'
        )
    ";

    
    $check_no = "{$filtered['emp_no']}";
    // print_r($check_no);
    
    $chk_query = "
        SELECT * 
        FROM employees
        WHERE emp_no='{$filtered_id}'
    ";

    $chk_result = mysqli_query($link,$chk_query);
    $chk_row = mysqli_fetch_array($chk_result);

    if(in_array($check_no,$chk_row)) echo '중복된 사원번호입니다. <p>
    <a href="emp_insert.php">돌아가기</a>';

    else{
    $result = mysqli_query($link,$query);

    if($result==false){
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($link));
    }else{
        // echo '성공하였습니다. <a href="emp_insert.php">돌아가기</a>';
        header('Location: index.php');
    }
}
?>