<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템</title>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 직원 사번 찾기</h2>
    <form action="emp_search_process.php" method="POST">
        <label>birth_date: </label>
        <input type="date" name="birth_date" placeholder="birth_date"><br><br>

        <label>first_name: </label>
        <input type="text" name="first_name" placeholder="first_name"><br><br>

        <label>last_name: </label>
        <input type="text" name="last_name" placeholder="last_name"><br><br>

        <label>sex: </label>
        <select name="genders" >
            <option value="F">F</option>
            <option value="M">M</option>
        </select><br><br>

        <label>hire_date: </label>
        <input type="date" name="hire_date" placeholder="hire_date"><br><br>
    
        <input type="submit" value="Search">
    </form>
</body>

</html>