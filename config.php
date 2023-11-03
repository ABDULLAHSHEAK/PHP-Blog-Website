<?php
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'my_blog');

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
if(!$con){
  echo "not connected" . mysqli_connect_error();
}