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

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	
	// Define variables and initialize with empty values
	$p_id = $u_id = "";
	$p_id_err = $u_id_err = "";
	$insert_success = $msg_err = "";

	
	// Processing form data when form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		if(isset($_POST["add_item_to_cart"])) {

			// Check if title is empty
			if(empty(trim($_POST["p_id"]))) {
				$p_id_err = "الرجاء اختيار منتج لاضافته لعربة التسوق.";
			} else {
				$p_id = trim($_POST["p_id"]);
			}

			if(empty(trim($_POST["u_id"]))){
				$u_id_err = "الرجاء التسجيل بشكل صحيح.";
			} else {
				$u_id = trim($_POST["u_id"]);
			}

			
			// Validate credentials
			if (empty($p_id_err) && empty($u_id_err)) {


				$user_order_num;
				$product_price;

				$sql = "SELECT order_num FROM users WHERE id = $u_id";
            
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						// Store data in variables
						$user_order_num = $row["order_num"];
					}
				}

				$sql_2 = "SELECT price, discount_status, price_after_discount FROM products WHERE id = $p_id";
            
				$result_2 = $conn->query($sql_2);

				if ($result_2->num_rows > 0) {

					while($row = $result_2->fetch_assoc()) {
						// Store data in variables

						if ($row["discount_status"] == 0) {
							$product_price = $row["price"];
						} else {
							$product_price = $row["price_after_discount"];
						}
					}
				}


				$sql_3 = "SELECT product_quantity FROM user_cart WHERE user_id = $u_id AND product_id = $p_id AND order_status = 1";
            
				$result_3 = $conn->query($sql_3);

				if ($result_3->num_rows > 0) {

					while($row = $result_3->fetch_assoc()) {
						// Store data in variables

						$new_product_quantity = $row["product_quantity"] + 1;

						$sql_4 = "UPDATE user_cart SET product_quantity = $new_product_quantity WHERE user_id = $u_id AND product_id = $p_id";

						if ($conn->query($sql_4) === TRUE) {
							$insert_success = "تم اضافة منتج آخر للسلة بنجاح.";
							$p_id = $u_id = "";
							$_POST = array();
							
							header("Location: cart.php?success=" . $insert_success);

						} else {
							$msg_err = "Error: " . $conn->error;
							$p_id = $u_id = "";
							$_POST = array();
							header("Location: cart.php?error=" . $msg_err);
						}

					}
				
				} else {

					$sql = "INSERT INTO user_cart (user_id, product_id, user_order_num, order_status, product_quantity, product_price) VALUES ($u_id, $p_id, $user_order_num, 1, 1, $product_price)";

					if ($conn->query($sql) === TRUE) {

						$insert_success = "تم اضافة منتج جديد للسلة بنجاح.";

						$p_id = $u_id = "";
						$_POST = array();
						
						header("Location: cart.php?success=" . $insert_success);

					} else {
						$msg_err = "Error: " . $conn->error;
						$p_id = $u_id = "";
						$_POST = array();
						header("Location: cart.php?error=" . $msg_err);
					}

				}
			

			
			}

		} else if (isset($_POST["add_item_to_cart_from_details"])) {

			$p_id = trim($_POST["p_id"]);
			$u_id = trim($_POST["u_id"]);
			$p_quantity = 1;
			$avilable_check = 0;

			$sql_check_1 = "SELECT id, available_quantity FROM products WHERE id = $p_id";
			$result_check_1 = $conn->query($sql_check_1);
			if ($result_check_1->num_rows > 0) {
				while($row_check_1 = $result_check_1->fetch_assoc()) {
					$p_check_quantity = $row_check_1['available_quantity'];
					if ($p_check_quantity < $p_quantity) {
						$avilable_check = $row_check_1['id'];
					}
				}
			}

			if ($avilable_check == 0) {
				$user_order_num;
				$product_price;
	
				$sql = "SELECT order_num FROM users WHERE id = $u_id";
			
				$result = $conn->query($sql);
	
				if ($result->num_rows > 0) {
	
					while($row = $result->fetch_assoc()) {
						// Store data in variables
						$user_order_num = $row["order_num"];
					}
				}
	
				$sql_2 = "SELECT price, discount_status, price_after_discount FROM products WHERE id = $p_id";
			
				$result_2 = $conn->query($sql_2);
	
				if ($result_2->num_rows > 0) {
	
					while($row = $result_2->fetch_assoc()) {
						// Store data in variables
	
						if ($row["discount_status"] == 0) {
							$product_price = $row["price"];
						} else {
							$product_price = $row["price_after_discount"];
						}
					}
				}
	
	
				$sql_3 = "SELECT product_quantity FROM user_cart WHERE user_id = $u_id AND product_id = $p_id AND order_status = 1";
			
				$result_3 = $conn->query($sql_3);
	
				if ($result_3->num_rows > 0) {
	
					while($row = $result_3->fetch_assoc()) {
						// Store data in variables
	
						$new_product_quantity = $row["product_quantity"] + $p_quantity;
	
						$sql_4 = "UPDATE user_cart SET product_quantity = $new_product_quantity WHERE user_id = $u_id AND product_id = $p_id AND order_status = 1";
	
						if ($conn->query($sql_4) === TRUE) {
							$insert_success = "تم اضافة منتج آخر للسلة بنجاح.";
							$p_id = $u_id = "";
							$_POST = array();
							
							header("Location: cart.php?success=" . $insert_success);
	
						} else {
							$msg_err = "Error: " . $conn->error;
							$p_id = $u_id = "";
							$_POST = array();
							header("Location: cart.php?error=" . $msg_err);
						}
	
					}
				
				} else {
	
					$sql = "INSERT INTO user_cart (user_id, product_id, user_order_num, order_status, product_quantity, product_price) VALUES ($u_id, $p_id, $user_order_num, 1, $p_quantity, $product_price)";
	
					if ($conn->query($sql) === TRUE) {
	
						$insert_success = "تم اضافة منتج جديد للسلة بنجاح.";
	
						$p_id = $u_id = "";
						$_POST = array();
						
						header("Location: cart.php?success=" . $insert_success);
	
					} else {
						$msg_err = "Error: " . $conn->error;
						$p_id = $u_id = "";
						$_POST = array();
						header("Location: cart.php?error=" . $msg_err);
					}
	
				}
	
			} else {
				$msg_err = "عذرا .. المنتج غير متاح.";
				$p_id = $u_id = "";
				$_POST = array();
				header("Location: cart.php?error=" . $msg_err);
			}

		}


		if(isset($_POST["finish_shoping_form"])) {

			if (trim($_POST["p_total"]) != 0 || trim($_POST["p_total"]) != 0.0) {


				$sql_check_1 = "SELECT id, product_id, product_quantity FROM user_cart WHERE user_id = " . $_SESSION['id'] . " AND order_status = 1";
				$result_check_1 = $conn->query($sql_check_1);
				if ($result_check_1->num_rows > 0) {
					while($row_check_1 = $result_check_1->fetch_assoc()) {
						$p_check_quantity = $row_check_1['product_quantity'];
						$p_check_id = $row_check_1['product_id'];
						
						$sql_4 = "UPDATE products SET available_quantity = available_quantity - $p_check_quantity WHERE id = $p_check_id";
						$conn->query($sql_4);

					}
				}

				$sql_4 = "UPDATE user_cart SET order_status = 2 WHERE user_id = " . $_SESSION['id'] . " AND order_status = 1";

				if ($conn->query($sql_4) === TRUE) {

					$old_order_num = $_SESSION["order_num"];
					$new_order_num = $_SESSION["order_num"] + 1;
					
					$sql_5 = "UPDATE users SET order_num = " . $new_order_num . " WHERE id = " . $_SESSION['id'] . "";

					if ($conn->query($sql_5) === TRUE) {

						$_SESSION["order_num"] = $_SESSION["order_num"] + 1;

						$sql = "INSERT INTO orders (user_id, order_num, total_price) VALUES (" . $_SESSION["id"] . ", " . $old_order_num . ", '" . trim($_POST["p_total"]) . "')";
            
            			if ($conn->query($sql) === TRUE) {
							
							$insert_success = "تم تنفيذ أمر الشراء بنجاح.";
							$_POST = array();
							
							header("Location: cart.php?success=" . $insert_success);
						} else {
							$msg_err = "Error: " . $conn->error;
							$_POST = array();
							header("Location: cart.php?error=" . $msg_err);
						}
		
					} else {
						$msg_err = "Error: " . $conn->error;
						$_POST = array();
						header("Location: cart.php?error=" . $msg_err);
					}
	
				} else {
					$msg_err = "Error: " . $conn->error;
					$_POST = array();
					header("Location: cart.php?error=" . $msg_err);
				}

			} else {
				$msg_err = "يجب اختيار منتجات لاتمام عملية الشراء.";
				$_POST = array();
				header("Location: cart.php?error=" . $msg_err);
			}

		}



		if(isset($_POST["save_shoping_form"])) {

			$cart_ids = $_POST['cart_id'];
			$quantitis = $_POST['quantity'];
			$products_ids = $_POST['products_ids'];
			
			$check_success = 1;
			$insert_success = "";
			$msg_err = "";
			$avilable_check = 0;
			
			foreach( $cart_ids as $key => $n ) {

				$cart_id = $n;
				$product_id = $products_ids[$key];
				$quantity = $quantitis[$key];

				$sql_check_1 = "SELECT id, available_quantity FROM products WHERE id = $product_id";
				$result_check_1 = $conn->query($sql_check_1);
				if ($result_check_1->num_rows > 0) {
					while($row_check_1 = $result_check_1->fetch_assoc()) {
						$p_check_quantity = $row_check_1['available_quantity'];
						if ($p_check_quantity < $quantity) {
							$avilable_check = $row_check_1['id'];
						}
					}
				}

				if ($avilable_check == 0) {
					$sql_5 = "UPDATE user_cart SET product_quantity = $quantity WHERE id = $cart_id";

					if ($conn->query($sql_5) === TRUE) {
						
						$insert_success = "تم تعديل الكميات بنجاح.";
							
					} else {
	
						$msg_err = "Error: " . $conn->error;
						$check_success = 0;
						
					}
				} else {
					$_POST = array();
					$p_check_name = "";

					$sql_check_2 = "SELECT name FROM products WHERE id = $avilable_check";
					$result_check_2 = $conn->query($sql_check_2);
					if ($result_check_2->num_rows > 0) {
						while($row_check_2 = $result_check_2->fetch_assoc()) {
							$p_check_name = $row_check_2['name'];
						}
					}
					$check_success = 0;
					$msg_err = "عذرا الكمية المطلوبة غير متوفرة لهذا المنتج " . "( " . $p_check_name . " )";
					header("Location: cart.php?error=" . $msg_err);
				}

				
			}

			if ($check_success) {
				$_POST = array();
				header("Location: cart.php?success=" . $insert_success);
			} else {
				
				$_POST = array();
				header("Location: cart.php?error=" . $msg_err);
			}

		}

		

	}

}



?>

<?php 

include("header.php"); 
$total = 0.0;

?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">الرئيسية</a></li>
				  <li class="active">عربة التسوق</li>
				</ol>
			</div>

            <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #f10202;"><?php if (isset($_GET['error'])) echo $_GET['error']; ?><br></span>
            <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #00c306;"><?php if (isset($_GET['success'])) echo $_GET['success']; ?><br></span>

			<div class="table-responsive cart_info">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">المنتج</td>
								<td class="description"></td>
								<td class="price">السعر</td>
								<td class="quantity">الكمية</td>
								<td class="total">المجموع</td>
								<td></td>
							</tr>
						</thead>
						<tbody>

							<?php
							$sql = "SELECT user_cart.id, user_cart.product_id, user_cart.product_quantity, user_cart.product_price, products.name, products.image FROM user_cart LEFT JOIN products ON user_cart.product_id = products.id WHERE user_cart.user_id = ". $_SESSION["id"] ." AND order_status = 1";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$count = 0;
								while($row = $result->fetch_assoc()) {
									$count++;
									$sub_total = $row['product_quantity'] * $row['product_price'];
									$total = $total + $sub_total;
									?>

									<tr>
										<td class="cart_product">
											<a href="#"><img src="<?php echo $row['image']; ?>" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><a href="#"><?php echo $row['name']; ?></a></h4>
										</td>
										<td class="cart_price">
											<p>ريال <?php echo $row['product_price']; ?></p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<!--<a class="cart_quantity_up" href=""> + </a>-->
												<input class="cart_quantity_input" type="text" min="1" name="quantity[]" value="<?php echo $row['product_quantity']; ?>" autocomplete="off" size="2">
												<input class="cart_quantity_input" type="hidden" name="cart_id[]" value="<?php echo $row['id']; ?>">
												<input class="cart_quantity_input" type="hidden" name="products_ids[]" value="<?php echo $row['product_id']; ?>">
												<!--<a class="cart_quantity_down" href=""> - </a>-->
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">ريال <?php echo $sub_total; ?></p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="delete_product_from_cart.php?d_id=<?php echo $row['id']; ?>"><i class="fa fa-times"></i></a>
										</td>
									</tr>

									<?php
								}
							}

							// Close connection
							$conn->close();
						?>

						</tbody>
					</table>

					<button type="submit" name="save_shoping_form" id="save_shoping_form" class="btn btn-default update" style="margin-bottom: 40px; margin-left: unset; float: left;">حفظ التعديلات</button>
				
				</form>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<!--<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>-->
			<div class="row">
				<!--<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>-->
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>إجمالي عربة التسوق <span>ريال <?php echo $total; ?></span></li>
							<li>الضريبة <span>ريال 0</span></li>
							<li>تكلفة الشحن <span>Free</span></li>
							<li>المجموع <span>ريال <?php echo $total; ?></span></li>
						</ul>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<!--<a href="checkout.php" class="checkout-btn c-btn btn--primary">دفع</a>-->
							<input class="mb-0 form-control" type="hidden" id="p_total" name="p_total" value="<?php echo $total; ?>">
							<!--<a class="btn btn-default update" href="">حفظ التعديلات</a>
							<a class="btn btn-default check_out" href="">اتمام عملية الشراء</a>-->
                            <button type="submit" name="finish_shoping_form" id="finish_shoping_form" class="btn btn-default update">اتمام عملية الشراء</button>
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php include("footer.php"); ?>
