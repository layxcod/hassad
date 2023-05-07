<?php
// Initialize the session
session_start();

if (isset($_SESSION['CREATED'])) {
    if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        header("location: login.php");
    }
} else {
    header("location: login.php");
}

require_once "config.php";
	
// Define variables and initialize with empty values
$p_id = $u_id = "";
$p_id_err = $u_id_err = "";
$insert_success = $msg_err = "";

	
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["add_item_to_favorite"])) {

        $p_id = trim($_POST["p_id"]);
        $u_id = trim($_POST["u_id"]);
        $p_quantity = 1;

        $user_order_num;
        $product_price;


        $sql_3 = "SELECT product_id FROM favorite WHERE user_id = $u_id AND product_id = $p_id";

        $result_3 = $conn->query($sql_3);

        if ($result_3->num_rows > 0) {

            $insert_success = "هذا المنتج موجود مسبقا في المفضلة";
            $p_id = $u_id = "";
            $_POST = array();
            
            header("Location: favorite.php?success=" . $insert_success);
        
        } else {

            $sql = "INSERT INTO favorite (user_id, product_id) VALUES ($u_id, $p_id)";

            if ($conn->query($sql) === TRUE) {

                $insert_success = "تم اضافة منتج جديد للمفضلة بنجاح.";

                $p_id = $u_id = "";
                $_POST = array();
                
                header("Location: favorite.php?success=" . $insert_success);

            } else {
                $msg_err = "Error: " . $conn->error;
                $p_id = $u_id = "";
                $_POST = array();
                header("Location: favorite.php?error=" . $msg_err);
            }

        }

    }

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
        <h4 class="panel-title"><a href="products.php">المنتجات</a></h4>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="farms.php">المزارع</a></h4>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="farms.php">جدولة المنتجات</a></h4>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="farmer life.php">تجربة المزارع</a></h4>
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
						<h2 class="title text-center">المنتجات المفضلة</h2>

                        <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #f10202;"><?php if (isset($_GET['error'])) echo $_GET['error']; ?><br></span>
                        <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #00c306;"><?php if (isset($_GET['success'])) echo $_GET['success']; ?><br></span>

                        <?php
                        $sql = "SELECT favorite.id, favorite.product_id, products.name, products.image, products.price FROM favorite LEFT JOIN products ON favorite.product_id = products.id WHERE favorite.user_id = ". $_SESSION["id"] . "";
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
                                                    <h2>ريال <?php echo $row['price']; ?></h2>
                                                    <p><?php echo $row['name']; ?></p>
													<p><?php echo $row['about']; ?></p>
                                                    <form action="cart.php" method="post">
                                                        <input type="hidden" name="p_id" value="<?php echo $row['product_id']; ?>">
                                                        <input type="hidden" name="u_id" value="<?php if(isset($_SESSION["id"])) { echo $_SESSION["id"]; } ?>">
                                                        <button type="submit" class="btn btn-default add-to-cart" name="add_item_to_cart_from_details" ><i class="fa fa-shopping-cart"></i>أضف إلى السلة</button>
                                                        <!--<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>-->
                                                    </form>
                                                    <!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>-->
                                                </div>
                                        </div>
                                        
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
