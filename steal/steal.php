<?php
  $url="http://tq121.weather.com.cn/icbc/detail1.php?city=%C9%CF%BA%A3";
  $fp=@fopen($url,"r") or die ("超时");
  $content=file_get_contents($url);
  //echo $content;显示该url的网址
  eregi("<td width=\"71\" align=\"right\"><img src=\"images/sun.gif\" width=\"64\" height=\"64\"></td>(.*)</table></td>",$content,$array);
  $array[1]=str_replace("src=\"../images/","src=\"http://tq121.weather.com.cn/images/",$array[1]);
  echo $array[1];
?>