<?php
    $link= mysqli_connect("localhost","admin","admin","employees");

    if(isset($_GET['birth_date'])){
        $filtered_bd = mysqli_real_escape_string($link,$_GET['birth_date']);
    }else{
        $filtered_bd = mysqli_real_escape_string($link,$_POST['birth_date']);
    }
    if(isset($_GET['first_name'])){
        $filtered_fn = mysqli_real_escape_string($link,$_GET['first_name']);
    }else{
        $filtered_fn = mysqli_real_escape_string($link,$_POST['first_name']);
    }
    if(isset($_GET['last_name'])){
        $filtered_ln = mysqli_real_escape_string($link,$_GET['last_name']);
    }else{
        $filtered_ln = mysqli_real_escape_string($link,$_POST['last_name']);
    }
    if(isset($_GET['gender'])){
        $filtered_g = mysqli_real_escape_string($link,$_GET['genders']);
    }else{
        $filtered_g = mysqli_real_escape_string($link,$_POST['genders']);
    }
    if(isset($_GET['hire_date'])){
        $filtered_hd = mysqli_real_escape_string($link,$_GET['hire_date']);
    }else{
        $filtered_hd = mysqli_real_escape_string($link,$_POST['hire_date']);
    }

    $filtered = array(
        'birth_date' => mysqli_real_escape_string($link,$_POST['birth_date']),
        'first_name' => mysqli_real_escape_string($link,$_POST['first_name']),
        'last_name' => mysqli_real_escape_string($link,$_POST['last_name']),
        'gender' => mysqli_real_escape_string($link,$_POST['genders']),
        'hire_date' => mysqli_real_escape_string($link,$_POST['hire_date'])
    );

    $chk_query = "
        SELECT * 
        FROM employees
        WHERE birth_date='{$filtered_bd}',first_name='$filtered_fn',last_name='$filtered_ln',
        gender='$filtered_g',hire_date='$filtered_hd'
    ";
    // print_r($chk_query);

    $queryt = "
        SELECT *
        FROM employees
    ";

    $result = mysqli_query($link,$queryt);

    while($row=mysqli_fetch_array($result)){
        $emp_info=$row['emp_no'];
    }

    // print_r($emp_info);

    if($result==false){
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($link));
    }else{
        // echo '성공하였습니다. <a href="emp_insert.php">돌아가기</a>';
        echo '직원 사번조회 결과 : ['.$emp_info.']<p>
        <a href="index.php">첫 화면으로 돌아가기</a>';
    }

?>