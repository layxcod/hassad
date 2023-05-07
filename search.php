<?php
// Initialize the session
session_start(); 
// Include config file
require_once "config.php";

$search_key = 0;

if (isset($_POST['search_key'])) {
    $search_key = $_POST['search_key'];
}

?>

<?php include("header.php"); ?>
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>الأقسام</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="products.php?type=4">المنتجات</a></h4>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="farms.php?type=1">المزارع</a></h4>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="farms.php?type=1">جدولة المنتجات</a></h4>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="farms.php?type=1">تجربة المزارع</a></h4>
    </div>
</div>

							
						</div><!--/category-products-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">نتائج البحث</h2>
						<?php
                            $sql = "SELECT * FROM products WHERE name LIKE '%$search_key%' ORDER BY id DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $count = 0;
                                while($row = $result->fetch_assoc()) {
                                    $count++;
                                    ?>
                                    <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo $row['image']; ?>" alt="" />
                                                    <h2>ريال<?php echo $row['price']; ?></h2>
                                                    <p><?php echo $row['name']; ?></p>
                                                    <p><?php echo $row['about']; ?></p>
                                                    <form action="cart.php" method="post">
                                                        <input type="hidden" name="p_id" value="<?php echo $row['id']; ?>">
                                                        <input type="hidden" name="u_id" value="<?php if(isset($_SESSION["id"])) { echo $_SESSION["id"]; } ?>">
                                                        <button type="submit" class="btn btn-default add-to-cart" name="add_item_to_cart_from_details" ><i class="fa fa-shopping-cart"></i>أضف إلى السلة</button>
                                                        <!--<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>-->
                                                    </form>
                                                </div>
                                                <!--<div class="product-overlay">
                                                    <div class="overlay-content">
                                                        <h2>$56</h2>
                                                        <p>اسم المنتج</p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                                    </div>
                                                </div>-->
                                        </div>
                                        <form action="favorite.php" method="post">
                                            <input type="hidden" name="p_id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="u_id" value="<?php if(isset($_SESSION["id"])) { echo $_SESSION["id"]; } ?>">
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified" style="text-align: center;">
                                                    <!--<li><button type="submit" name="add_item_to_favorite" id="add_item_to_favorite"><i class="fa fa-plus-square"></i>أضف إلى المفضلة</button></li>-->
                                                    <!--<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>-->
                                                    <button type="submit" class="btn btn-default add-to-cart" name="add_item_to_favorite" style="margin-top: 25px;"><i class="fa fa-plus-square"></i>أضف إلى المفضلة</button>

                                                    <!--<li><a href="#"><button type="submit" name="add_item_to_favorite" style="visibility: hidden; width: 100%;"></button><i class="fa fa-plus-square"></i>أضف إلى المفضلة</a></li>-->
                                                </ul>
                                            </div>
                                        </form>

                                        <!--<div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-plus-square"></i>أضف إلى المفضلة</a></li>
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                            </ul>
                                        </div>-->
                                    </div>
                                </div>

                                    <?php
                                }
                            }

                            // Close connection
                            $conn->close();
                        ?>
						
                        <!--
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
                        -->
                        
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
<?php include("footer.php"); ?>
