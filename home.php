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
?>

<?php include("header.php"); ?>
	
	<section>
		<div class="container">
			<div class="row" style="margin-bottom: 10rem;">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h1 class="title text-center">تم التسجيل بنجاح.</h1>
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php include("footer.php"); ?>