<!DOCTYPE html> 
<html lang="ko"> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <title>sample page</title> 
</head> 
<body> 
    
    <td>답변 내용: </td>
    <td><textarea id='number' name=admin-content cols=10 rows=1></textarea></td>
    <td><textarea id='answer' name=admin-content cols=30 rows=4></textarea></td>
    <td><button name=12 onclick='update()'>답변</button></td>
    </tr>";
    <script>
            function update() {
                var query = "UPDATE qna SET answer = " + "'"+document.getElementById("answer").value +"' " + " WHERE num = " + document.getElementById("number").value;
                location.href="upload.php?q= "+query;                
            }
    </script>

<?php include('db_conn.php');

    $sql = "SELECT title, categorie, content, date, num FROM qna WHERE answer is null and num = num";
    // "UPDATE qna SET answer = * WHERE num = *"
    $result = mysqli_query($conn, $sql);
    

    echo "<style>
    table{
        border-collapse: separate;
        border-spacing: 1px;
        text-align: left;
        line-height: 1.5;
        border-top: 1px solid #ccc;
        margin : 20px 10px;
    }
    tr{
        width: 100px;
        padding: 10px;
        font-weight: bold;
        vertical-align: top;
        border-bottom: 1px solid #ccc;
    }
    td{
        width: 100px;
        padding: 10px;
        vertical-align: top;
        border-bottom: 1px solid #ccc;
    }
    </style>";
    

    echo "<table><tbody>";

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            echo"<tr>";
            echo"<th>번호 : </th><td>".$row["num"]."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>제목 : </th><td>".$row["title"]."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>카테고리 : </th><td>".$row["categorie"]."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>내용 : </th><td>".$row["content"]."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<th>날짜 : </th><td>".$row["date"]."</td>";
            echo"</tr>";
            echo"<tr><th><td>\n\n</td></th></tr>";
        }
    }else{
        echo "질문이 없습니다.";
    }
    mysqli_close($conn);
    echo "</table></tbody>";
?>
</body> 
</html>

