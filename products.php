<?php
// Initialize the session
session_start();
// Include config file
require_once "config.php";

$type = 0;

if (isset($_GET["type"])) {
    $type = $_GET["type"];
}

?>

<?php include("header.php"); ?>
	
	
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>الأقسام</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->

<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="products.php?type=1">المنتجات</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="farms.php?type=1"> المزارع</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="farms.php?type=2">جدولة المشتريات</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="farms.php?type=5">تجربة المزارع</a></h4>
        </div>
    </div>
							
						</div><!--/category-products-->
					
						<!--brands_products-->
						<!--<div class="brands_products">
							
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div>-->
						<!--/brands_products-->
						
						<!--price-range-->
						<!--<div class="price-range">
							<h2>نطاق السعر</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 600</b> <b class="pull-right">$ 0</b>
							</div>
						</div>-->
						
						<!--/price-range-->
						
						<!--shipping-->
						<!--<div class="shipping text-center">
							<img src="images/home/shipping.jpg" alt="" />
						</div>-->
						<!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">عرض المنتجات</h2>

						<?php
                            $sql = "SELECT * FROM products WHERE type = $type ORDER BY id DESC";
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
                                                    <h2>$<?php echo $row['price']; ?></h2>
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
                                                        <h2>7 ريال</h2>
                                                        <p>برتقال</p>
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
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
<?php include("footer.php"); ?>
