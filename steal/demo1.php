<html>
<head>
  <charset="utf-8">
  <script src="jquery.js"></script>
  <script src="ck.js"></script>
</head>
<body>
<?php
include_once 'conn.php';
 $results=$mysqli->query("select * from msg_list");
 $total_page= mysqli_num_rows($results);
 $page_size=5;
 if($_GET['page']){
 $page = intval($_GET['page']);
 }
 else{
 $page=1;
 }
 $page_start = ($page-1) * $page_size;
 $count=ceil($total_page/$page_size);
 $result=$mysqli->query("select * from msg_list limit $page_start,$page_size");
 
 ?>
 <table width="600" border="1" cellspacing="0" cellpadding="0"> 
 <tr>
   <td>id</td>
   <td>标题</td>
   <td>类型</td>
 </tr>
<?php
 while($row = $result->fetch_assoc()){
// var_dump($row);
 //echo $row['id'];
 echo "<tr>
		<td>$row[id]</td>
		<td>$row[username]</td>
		<td>$row[content]</td>
		</tr>";
 }
 
 if ($page >$count)
 	$page = $count;//当前页大于最大页数
 	if ($page< 1)
 		$page = 1;//当前页小于1
 		$page_str = "<span>共".$total_page."条记录</span><span>" . $page . '/' . $count . "</span>";
 		if ($page == 1) {
 			$page_str .= "<span>首页</span><span>上一页</span>";
 		} else {
 			$page_str .= '<span><a href="./demo1.php?page=1">首页</a></span><span><a href="demo1.php?page='.($page-1).'">上一页</a></span>';
 		}
 		if ($page >= $count) {
 			$page_str .= "<span>下一页</span><span>尾页</span>";
 		} else {
 			$page_str .= '<span><a href="demo1.php?page='.($page+1).'"'.'>下一页</a></span><span><a href="demo1.php?page='.$count.'">尾页</a></span>';
 		}
 		echo $page_str;
 
 ?>
 </table>
 </form>
 </body>
 </html>