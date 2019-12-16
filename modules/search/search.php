<?php
if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}
else{
    $keyword = '';
}
//bóc tách keyword: nokia red
//explode('nokia','red');
//implode('%');
$arr_keyword = explode(" ",$keyword);
$key_end = '%'.implode("%",$arr_keyword).'%';

//phân trang
    // dùng GET để hứng tham số
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
    $page = 1;
    }
    //gán số sản phẩm cần hiển thị trên 1 trang
    $rows_per_page = 3;// muốn hiện thị 5 sản phẩm trên 1 trang
    // công thức
    $per_row = $page*$rows_per_page - $rows_per_page;
    //truy vấn(tính toán số bản ghi)
    $total_rows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product WHERE prd_name LIKE('$key_end')"));
    $total_pages = ceil($total_rows/$rows_per_page); //ceil hàm làm tròn số
    // làm nút preview
    $list_page = '';
    $page_prev = $page-1;
    if($page_prev <= 0){
    $page_prev =1;
    }
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword='.$keyword.'&page='.$page_prev.'">&laquo;</a></li>';
// tính toán số trang
    for($i=1;$i<=$total_pages;$i++){
        if($i==$page){
            $active = 'active';
        }
        else{
        $active = '';
        }
        $list_page.='<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=search&keyword='.$keyword.'&page='.$i.'">'.$i.'</a></li>';
        }
    //nút next
    $page_next = $page +1;
    if($page_next >= $total_pages){
        $page_next = $total_pages;
        }
    $list_page.='<li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword='.$keyword.'&page='.$page_next.'">&raquo;</a></li>';
    
    $sql = "SELECT * FROM product WHERE prd_name LIKE('$key_end') LIMIT $per_row, $rows_per_page";
    $query = mysqli_query($conn,$sql);
?>
                
                <!--	List Product	-->
                <div class="products">
                    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $keyword; ?></span></div>
                        <div class="product-list row">
                            <?php while($row = mysqli_fetch_assoc($query)){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/img/products/<?php echo $row['prd_image']; ?>"></a>
                                <h4><a href="#"><?php echo $row['prd_name'] ?></a></h4>
                                <p>Giá Bán: <span><?php echo $row['prd_price'] ?></span></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!--	End List Product	-->
                
                <div id="pagination">
                    <ul class="pagination">
                    <?php echo $list_page; ?>
                    </ul> 
                </div>
            
           