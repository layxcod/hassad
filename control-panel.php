<?php
// Initialize the session
session_start();
// Include config file
require_once "config.php";
?>

<?php include("header.php"); ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">الرئيسية</a></li>
				  <li class="active">لوحة التحكم</li>
				</ol>
            </div>

            <h4 style="margin-bottom: 3rem;"><a href="add-new-product.php">اضافة منتج جديد</a></h4>

            <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #f10202;"><?php if (isset($_GET['error'])) echo $_GET['error']; ?><br></span>
            <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #00c306;"><?php if (isset($_GET['success'])) echo $_GET['success']; ?><br></span>
			
            <div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">المنتج</td>
							<td class="description"></td>
							<td class="price">الكمية المتوفرة</td>
							<td class="price">السعر</td>
							<td class="total">العمليات</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

                        <?php
                        $sql = "SELECT * FROM products ORDER BY id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $count = 0;
                            while($row = $result->fetch_assoc()) {
                                $count++;
                                ?>

                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img src="<?php echo $row['image']; ?>" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="#"><?php echo $row['name']; ?></a></h4>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo $row['available_quantity']; ?></p>
                                    </td>
									<td class="cart_price">
                                        <p>ريال<?php echo $row['price']; ?></p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="product-delete.php?pid=<?php echo $row['id']; ?>"><i class="fa fa-times"></i></a>
                                        <!--<a class="cart_quantity_delete" href=""><i class="fa fa-pencil-square-o"></i></a>-->
                                    </td>
                                </tr>

                    <?php
                            }
                        }

                    ?>

                        <!--
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/products/p13.jpg" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">منتج 2</a></h4>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
								<a class="cart_quantity_delete" href=""><i class="fa fa-pencil-square-o"></i></a>
							</td>
						</tr>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/products/p5.jpg" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">منتج 3</a></h4>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
								<a class="cart_quantity_delete" href=""><i class="fa fa-pencil-square-o"></i></a>
							</td>
						</tr>
                    -->
					</tbody>
				</table>
			</div>
		</div>
    </section> <!--/#cart_items-->



	<section id="cart_items">
		<div class="container">
            
            <h4 style="margin-bottom: 3rem;">الطلبات الواردة</h4>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">#</td>
							<td class="description"></td>
							<td class="description">اسم صاحب الطلبية</td>
							<!--<td class="description">الايميل</td>-->
							<td class="description">تاريخ الطلبية</td>
                            <td class="description">المبلغ الاجمالي للطلبية</td>
                            <td class="description">حالة الطلبية</td>
						</tr>
					</thead>
					<tbody>

                        <?php
                        $sql = "SELECT orders.id, orders.user_id, orders.order_num, orders.total_price, orders.order_status, orders.order_date, users.name, users.email FROM orders LEFT JOIN users ON orders.user_id = users.id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $count = 0;
                            $all_orders_total = 0.0;
                            while($row = $result->fetch_assoc()) {
                                $count++;
                                $all_orders_total = $all_orders_total + $row['total_price'];
                                ?>

                                <tr>
                                    <td class="cart_product"><?php echo $count; ?></td>
                                    <td class="cart_description">
                                        <p><?php echo "طلبية " . $row['order_num']; ?></p>
                                    </td>
									<td class="cart_price">
                                        <p><?php echo $row['name']; ?></p>
                                    </td>
									<!--<td class="cart_price">
                                        <p><?php echo $row['email']; ?></p>
                                    </td>-->
                                    <td class="cart_price">
                                        <p><?php echo $row['order_date']; ?></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p>ريال<?php echo $row['total_price']; ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <?php
                                            if ($row['order_status'] == 0) {
                                        ?>
                                                <p class="cart_total_price" style="font-size: 18px;">يتم تجهيز الطلب <a href="admin_approve_order.php?id=<?php echo $row['id']; ?>" class="btn btn-default">اضغط هنا اذا تم التسليم</a></p>
                                        <?php                                                
                                            } else {
                                        ?>
                                                <p class="cart_total_price" style="font-size: 18px;">تم التسليم</p>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>

                            <?php
                            }
                        }
                            ?>
                        
					</tbody>
				</table>
			</div>
		</div>
    </section>
    

    <section id="cart_items">
		<div class="container">

            <h4 style="margin-bottom: 3rem;">المحادثات مع العملاء</h4>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">اسم العميل</td>
							<td class="description">الايميل</td>
							<td class="description">تاريخ الارسال</td>
							<td class="price">عنوان الرسالة</td>
							<td class="total">نص الرسالة</td>
						</tr>
					</thead>
					<tbody>

                        <?php
                        $sql = "SELECT * FROM messages ORDER BY id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $count = 0;
                            while($row = $result->fetch_assoc()) {
                                $count++;
                                ?>

                                <tr>
                                    <td class="cart_price">
                                        <h4><?php echo $row['from_name']; ?></h4>
                                    </td>
                                    <td class="cart_price">
                                        <h4><?php echo $row['from_email']; ?></h4>
                                    </td>
                                    <td class="cart_price">
                                        <h4><?php echo $row['send_date']; ?></h4>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo $row['msg_title']; ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo $row['msg']; ?></p>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        // Close connection
                        $conn->close();

                        ?>

                        <!--
						<tr>
							<td class="cart_price">
                                <h4>ناصر ناصر</h4>
                            </td>
							<td class="cart_price">
								<h4>email@email.com</h4>
							</td>
							<td class="cart_price">
								<p>عنوان الرسالة</p>
							</td>
							<td class="cart_price">
								<p>نص الرسالة نص الرسالة  نص الرسالة نص الرسالة نص الرسالة </p>
							</td>
                        </tr>

                        <tr>
							<td class="cart_price">
                                <h4>ناصر ناصر</h4>
                            </td>
							<td class="cart_price">
								<h4>email@email.com</h4>
							</td>
							<td class="cart_price">
								<p>عنوان الرسالة</p>
							</td>
							<td class="cart_price">
								<p>نص الرسالة نص الرسالة  نص الرسالة نص الرسالة نص الرسالة </p>
							</td>
                        </tr>

                        -->
                        
					</tbody>
				</table>
			</div>
		</div>
	</section>


<?php include("footer.php"); ?>
