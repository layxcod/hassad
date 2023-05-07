<?php
// Initialize the session
session_start();

if (isset($_SESSION['CREATED'])) {
    if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        //header("location: profile.php");
    } 
}


if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: login.php");
    //echo $_SESSION["loggedin"];
    exit;
}

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$p_name = $p_price = $p_type = $p_avilabel = $p_price_dis_status = $p_price_percent = $p_price_after_dis = $p_image = $p_about = "";
$p_name_err = $p_price_err = $p_type_err = $p_avilabel_err = $p_price_dis_status_err = $p_price_percent_err = $p_price_after_dis_err = $p_image_err = $p_about_err = "";

 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if(isset($_POST["add_product_form"])) {

        $target_dir = "image/";
        if ($_FILES["p_image"]["name"] == "") {
            $target_file = "image/";
        } else {
            $target_file = $target_dir . time() . "_" . basename($_FILES["p_image"]["name"]);
        }
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if title is empty
        if(empty(trim($_POST["p_name"]))) {
            $p_name_err = "الرجاء ادخال اسم المنتج";
        } else {
            $p_name = trim($_POST["p_name"]);
        }

        if(empty(trim($_POST["p_price"]))){
            $p_price_err = "الرجاء ادخال سعر المنتج";
        } else {
            $p_price = trim($_POST["p_price"]);
        }

        if(empty(trim($_FILES["p_image"]["name"]))){
            $p_image_err = "الرجاء اختيار صورة للمنتج";
        } else {
            $p_image = trim($_FILES["p_image"]["name"]);
        }

        if(empty(trim($_POST["p_about"]))){
            $p_about_err = "الرجاء ادخال نبذة عن المنتج";
        } else {
            $p_about = trim($_POST["p_about"]);
        }

        $p_type = trim($_POST["p_type"]);
        $p_quantity = trim($_POST["p_quantity"]);

        /*
        $p_avilabel = trim($_POST["p_avilabel"]);
        $p_price_dis_status = trim($_POST["p_price_dis_status"]);
        
        if(empty(trim($_POST["p_price_percent"]))){
            $p_price_percent = 0;
        } else {
            $p_price_percent = trim($_POST["p_price_percent"]);
        }

        //$p_price_percent = trim($_POST["p_price_percent"]);

        if(empty(trim($_POST["p_price_after_dis"]))){
            $p_price_after_dis = 0;
        } else {
            $p_price_after_dis = trim($_POST["p_price_after_dis"]);
        }
        //$p_price_after_dis = trim($_POST["p_price_after_dis"]);
        */
        
        // Validate credentials
        if (empty($p_name_err) && empty($p_price_err) && empty($p_avilabel_err) && empty($p_price_dis_status_err) && empty($p_price_percent_err) && empty($p_price_after_dis_err) && empty($p_image_err) && empty($p_about_err)) {
            
            // Prepare a select statement

            $p_price = floatval(str_replace(',', '.', $p_price));
            //$p_price_after_dis = floatval(str_replace(',', '.', $p_price_after_dis));
            //$p_price_percent = intval($p_price_percent);
            
            /*echo ($p_name);
            echo ("<br>");
            echo ($p_price);
            echo ("<br>");
            echo ($p_avilabel );
            echo ("<br>");
            echo ($p_price_dis_status);
            echo ("<br>");
            echo ($p_price_percent );
            echo ("<br>");
            echo ($p_price_after_dis );
            echo ("<br>");
            echo ($p_image );
            echo ("<br>");
            echo ($p_about);*/

            

            $sql = "INSERT INTO products (name, price, type, about, available_quantity, image) VALUES ('$p_name', '$p_price', '$p_type', '$p_about', '$p_quantity', '$target_file')";

            if ($conn->query($sql) === TRUE) {

                $insert_success = "تم اضافة منتج جديد بنجاح.";

                $p_name = $p_price = $p_type = $p_avilabel = $p_price_dis_status = $p_price_percent = $p_price_after_dis = $p_image = $p_about = "";

                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["p_image"]["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["p_image"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                header("Location: add-new-product.php?success=" . $insert_success);

            } else {
                $msg_err = "Error: " . $conn->error;
                //$qtitle = $qaswer = "";
                $p_name = $p_price = $p_type = $p_avilabel = $p_price_dis_status = $p_price_percent = $p_price_after_dis = $p_image = $p_about = "";
                //echo "<br>";
                //exit($msg_err);  
                //exit('variables are not equal');  
                header("Location: add-new-product.php?error=" . $msg_err);
            }
        }

    } 

    // Close connection
    $conn->close();
}
?>

<?php include("header.php"); ?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row" style="margin-bottom: 50px;">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">إضافة منتج جديد</h2>    			    				    				
					<!--<div id="gmap" class="contact-map">
					</div>-->
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<div class="status alert alert-success" style="display: none"></div>

                        <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #f10202;"><?php if (isset($_GET['error'])) echo $_GET['error']; ?><br></span>
                        <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #00c306;"><?php if (isset($_GET['success'])) echo $_GET['success']; ?><br></span>

				    	<form id="main-contact-form" class="contact-form row" name="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
				            <div class="form-group col-md-6">
				                <input type="text" id="p_name" name="p_name" class="form-control" required="required" placeholder="اسم المنتج">
				            </div>
				            <div class="form-group col-md-3">
				                <input type="text" id="p_price" name="p_price" class="form-control" required="required" placeholder="السعر">
				            </div>
                            <div class="form-group col-md-3">
				                <input type="text" id="p_quantity" name="p_quantity" class="form-control" required="required" placeholder="الكمية المتاحة">
				            </div>
				            <div class="form-group col-md-6">
                                <select id="p_type" name="p_type" class="form-control">
                                    <option value="1">خضار</option>
                                    <option value="2">فواكة</option>
									<option value="3">ألبان</option>
                                    <option value="4">لحوم</option>
                                    <option value="5">دواجن</option>
                                    <option value="6">عسل</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
				                <input type="file" id="p_image" name="p_image" class="form-control" required="required" placeholder="اختر صورة المنتج">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea id="p_about" name="p_about" required="required" class="form-control" rows="8" placeholder="وصف المنتج أو نبذة عنه" style="height: auto;"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="add_product_form" id="add_product_form" class="btn btn-primary pull-right" value="اضافة">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
<?php include("footer.php"); ?>
