<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "tuser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// 检查连接是否成功
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// 查询数据
$sql = "SELECT * FROM table_17";
$result = mysqli_query($conn, $sql);

// 检查查询是否成功
if (!$result) {
    die("Query failed: ". mysqli_error($conn));
}

// 关闭数据库连接
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>沈阳租房信息如下</title>
</head>
<body>
    <h2>沈阳租房信息如下</h2>
    <table border="1">
        <tr>
            <th>房屋名称</th>
            <th>租赁方式</th>
            <th>地铁</th>
            <th>图片1网址</th>
            <th>图片2网址</th>
            <th>经纪人</th>
            <th>租费和租费方式</th>
            <th>户型</th>
            <th>楼层</th>
            <th>小区</th>
            <th>面积</th>
            <th>装修方式</th>
            <th>朝向</th>
            <th>类型</th>
            <th>出租要求</th>
        </tr>
        <?php
        // 遍历结果集并显示数据
        //<img src="tulip.jpg" alt="上海鲜花港 - 郁金香" />
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['COL 1']."</td>";
            echo "<td>".$row['COL 2']."</td>";
            echo "<td>".$row['COL 3']."</td>";
            echo "<td><img src='".$row['COL 4']."' alt='Image'></td>";
            echo "<td><img src='".$row['COL 5']."' alt='Image'></td>";
            echo "<td>".$row['COL 6']."</td>";
            echo "<td>".$row['COL 7']."</td>";
            echo "<td>".$row['COL 8']."</td>";
            echo "<td>".$row['COL 9']."</td>";
            echo "<td>".$row['COL 10']."</td>";
            echo "<td>".$row['COL 11']."</td>";
            echo "<td>".$row['COL 12']."</td>";
            echo "<td>".$row['COL 13']."</td>";
            echo "<td>".$row['COL 14']."</td>";
            echo "<td>".$row['COL 15']."</td>";
            echo "</tr>";
        }
      ?>
    </table>
</body>
</html>