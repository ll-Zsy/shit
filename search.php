<!DOCTYPE html>
<html>
<head>
    <title>沈阳租房信息搜索</title>
</head>
<body>
    <h2>沈阳租房信息搜索</h2>
    
    <form action="search.php" method="post">
        <input type="text" name="search_value">
        <input type="submit" value="提交">
    </form>

    <?php
    // 连接数据库
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "tuser";
    $search = "张思雨好菜";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // 检查连接是否成功
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    // 查询数据
    // SELECT * from table where username like '%陈哈哈%'

    // $search = "输入要搜索的内容" 
    // $sql = "SELECT `COL 1` FROM table_17 WHERE `COL 1` LIKE '%$search%'";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $search = $_POST['search_value'];
        // 在这里进行后续处理
    }
    $sql = "SELECT `COL 1` FROM table_17 WHERE `COL 1` LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);

    // 检查查询是否成功
    if (!$result) {
        die("Query failed: ". mysqli_error($conn));
    }

    // 处理查询结果
    echo mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while ($row = mysqli_fetch_assoc($result)) {
            echo "房屋名称:".$row['COL 1']. "<br>";
        }
    } else {
        echo "没有找到匹配的数据";
    }

    // 关闭数据库连接
    mysqli_close($conn);
    ?>
</body>
</html>