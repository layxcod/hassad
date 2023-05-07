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

// Include config file
require_once "config.php";

$type = 0;

if (isset($_GET["type"])) {
    $type = $_GET["type"];
}

?>

<?php include("header.php"); ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">الرئيسية</a></li>
				  <li class="active">الملف الشخصي</li>
				</ol>
            </div>
            
            <h4 style="margin-bottom: 3rem;">طلبياتي</h4>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">#</td>
							<td class="description"></td>
							<td class="description">تاريخ الطلبية</td>
                            <td class="description">المبلغ الاجمالي للطلبية</td>
                            <td class="description">حالة الطلبية</td>
						</tr>
					</thead>
					<tbody>

                        <?php
                        $sql = "SELECT * FROM orders WHERE user_id = " . $_SESSION["id"] . "";
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
                                        <p><?php echo $row['order_date']; ?></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p>ريال<?php echo $row['total_price']; ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <?php
                                            if ($row['order_status'] == 0) {
                                        ?>
                                                <p class="cart_total_price" style="font-size: 18px;">يتم تجهيز الطلب</p>
                                        <?php                                                
                                            } elseif($row['order_status'] == 1) {
                                        ?>
                                                <p class="cart_total_price" style="font-size: 18px;">جاهز للتسليم <a href="approve_order.php?id=<?php echo $row['id']; ?>" class="btn btn-default">اضغط هنا اذا تم التسليم</a></p>
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
    </section> <!--/#cart_items-->
    

    <section id="cart_items">
		<div class="container">

            <div class="row">

                <div class="col-md-9">

                    <h4 style="margin-bottom: 3rem;">المحادثات مع المتجر</h4>

                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">#</td>
                                    <td class="price">عنوان الرسالة</td>
                                    <td class="total">نص الرسالة</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM messages WHERE user_id = " . $_SESSION["id"] . " ORDER BY id DESC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $count = 0;
                                    while($row = $result->fetch_assoc()) {
                                        $count++;
                                        ?>

                                        <tr>
                                            <td class="cart_price">
                                                <h4><?php echo $count; ?></h4>
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
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

		</div>
	</section>


<?php include("footer.php"); ?>
