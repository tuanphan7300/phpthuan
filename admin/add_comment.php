<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền');
}
// truy vấn danh mục comment
$sql = "SELECT * FROM comment ORDER BY comm_id DESC";
$query = mysqli_query($conn,$sql);
// làm việc với form
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_POST['sbm'])){
    $comm_name = $_POST['comm_name'];
    $comm_mail = $_POST['comm_mail'];
    $prd_id = $_POST['prd_id'];
   // select * from user where email = '$usermail';->query-> mysqli_num_rows()-> if  mysqli_num_rows() != -> email ton tai ->else thì tiếp tục làm
    $comm_date = date('Y-m-d H:i:s');
    $comm_details = $_POST['comm_details'];
    $sql = "INSERT INTO  comment(prd_id,comm_name,comm_mail,comm_date,comm_details)
            VALUES('$prd_id','$comm_name','$comm_mail','$comm_date','$comm_details')";
    $query = mysqli_query($conn,$sql);

    //chuyển hướng về comment
    header('location:index.php?page_layout=comment ');
}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý bình luận</a></li>
				<li class="active">Thêm bình luận</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm bình luận</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <!-- <div class="alert alert-danger">Email đã tồn tại !</div> -->
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="comm_name" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>ID sản phẩm</label>
                                    <input name="prd_id" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="comm_mail" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Bình luận</label>
                                    <input name="comm_details" required type="text"  class="form-control">
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
