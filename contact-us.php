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

$con_name = $con_email = $con_phone = $con_subject = $con_message = "";
$con_name_err = $con_email_err = $con_phone_err = $con_subject_err = $con_message_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if(isset($_POST["add_contact_msg"])) {

        // Check if title is empty
        if(empty(trim($_POST["con_name"]))) {
            $con_name_err = "الرجاء ادخال اسم المرسل.";
        } else {
            $con_name = trim($_POST["con_name"]);
        }

        if(empty(trim($_POST["con_email"]))){
            $con_email_err = "الرجاء ادخال الايميل.";
        } else {
            $con_email = trim($_POST["con_email"]);
        }

        if(empty(trim($_POST["con_subject"]))){
            $con_subject_err = "الرجاء ادخال عنوان الرسالة.";
        } else {
            $con_subject = trim($_POST["con_subject"]);
        }

        if(empty(trim($_POST["con_message"]))){
            $con_message_err = "الرجاء ادخال نص الرسالة.";
        } else {
            $con_message = trim($_POST["con_message"]);
        }

        if (empty($con_name_err) && empty($con_email_err) && empty($con_phone_err) && empty($con_message_err)) {

            $sql = "INSERT INTO messages (from_name, from_email, msg_title, msg, user_id) VALUES ('$con_name', '$con_email', '$con_subject', '$con_message', " . $_SESSION['id'] . ")";

            if ($conn->query($sql) === TRUE) {

                $insert_success = "تم استلام الرسالة وسيتم التواصل عبر البريد الالكتروني.";
                $con_name = $con_email = $con_phone = $con_message = "";
                header("Location: contact-us.php?success=" . $insert_success);

            } else {

                $msg_err = "Error: " . $conn->error;
                $con_name = $con_email = $con_phone = $con_message = "";
                header("Location: contact-us.php?error=" . $msg_err);
            }

        }

    }

}

?>


<?php include("header.php"); ?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row" style="margin-bottom: 50px;">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">تواصل معنا</h2>    			    				    				
					<!--<div id="gmap" class="contact-map">
					</div>-->
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">أرسل رسالة</h2>
	    				<div class="status alert alert-success" style="display: none"></div>

                        <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #f10202;"><?php if (isset($_GET['error'])) echo $_GET['error']; ?><br></span>
                        <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #00c306;"><?php if (isset($_GET['success'])) echo $_GET['success']; ?><br></span>

				    	<form id="main-contact-form" class="contact-form row" name="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" id="con_name" name="con_name" class="form-control" required="required" placeholder="الاسم">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" id="con_email" name="con_email" class="form-control" required="required" placeholder="الايميل">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" id="con_subject" name="con_subject" class="form-control" required="required" placeholder="عنوان الرسالة">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea id="con_message" name="con_message" required="required" class="form-control" rows="8" placeholder="أكتب رسالتك هنا" style="height: auto;"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="add_contact_msg" id="add_contact_msg" class="btn btn-primary pull-right" value="ارسال">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">معلومات الاتصال</h2>
<address>
    <p>حصاد</p>
    <p>شارع 20، محافظة الزلفي</p>
    <p>المملكة العربية السعودية</p>
    <p>هاتف +966543886101 </p>
    <p>فاكس: 1-714-252-0026</p>
    <p>بريد الكتروني: info@e-shopper.com</p>
</address>
	    				<!--<div class="social-networks">
	    					<h2 class="title text-center">الشبكات الإجتماعية</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>--->
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
<?php include("footer.php"); ?>
