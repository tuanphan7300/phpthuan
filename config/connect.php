<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền');
}
 $conn = mysqli_connect('localhost','root','','phpk177');
 if($conn){
     mysqli_query($conn,"SET NAMES 'utf8'");// giá trị kết nối
 }else{
     die('kết nối thất bại');
 }