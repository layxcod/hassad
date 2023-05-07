<?php
// Initialize the session
session_start();

if (isset($_SESSION['CREATED'])) {
    if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        //header("location: profile.php");
    } else {
        header("location: index.php");
        exit;
    }
}

/*if (isset($_SESSION['CREATED'])) {
  if (time() - $_SESSION['CREATED'] > 1800) {
    // session started more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
  }
}

// Check if the user is already logged in, if yes then redirect him to welcome page
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    //echo $_SESSION["loggedin"];
    exit;
}*/

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $u_name = $u_email = $u_pass = $u_rpass = $u_phone = "";
$name_err = $u_name_err = $u_email_err = $u_pass_err = $u_rpass_err = $u_phone_err = "";

 
// Processing form data when form is submitted name u_name email phone password repeat-password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if(isset($_POST["register_form"])) {

        // Check if title is empty
        if(empty(trim($_POST["name"]))) {
            $name_err = "الرجاء ادخال اسم المستخدم.";
        } else {
            $name = trim($_POST["name"]);
        }

        if(empty(trim($_POST["u_name"]))) {
            $u_name_err = "الرجاء ادخال اسم المستخدم.";
        } else {
            $u_name = trim($_POST["u_name"]);
        }

        if(empty(trim($_POST["email"]))){
            $u_email_err = "الرجاء ادخال الايميل";
        } else {
            $u_email = trim($_POST["email"]);
        }

        if(empty(trim($_POST["phone"]))){
            $u_phone_err = "الرجاء ادخال رقم الهاتف";
        } else {
            $u_phone = trim($_POST["phone"]);
        }

        if(empty(trim($_POST["password"]))){
            $u_pass_err = "الرجاء ادخال كلمة المرور";
        } else {
            $u_pass = trim($_POST["password"]);
        }

        if(empty(trim($_POST["repeat-password"]))) {
            $u_rpass_err = "الرجاء ادخال تأكيد كلمة المرور.";
        } else {
            $u_rpass = trim($_POST["repeat-password"]);
            if($u_pass != $u_rpass) {
                $u_rpass_err = "كلمات المرور غير متطابقة";
            }
        }

        
        
        // Validate credentials
        if (empty($u_name_err) && empty($u_email_err) && empty($u_pass_err) && empty($u_rpass_err)) {
            // Prepare a select statement
            $sql = "INSERT INTO users (name, user_name, email, phone, pass) VALUES ('$name', '$u_name', '$u_email', '$u_phone', '$u_pass')";
            
            if ($conn->query($sql) === TRUE) {

                $last_id = $conn->insert_id;
                //$qtitle = $qaswer = "";
                //header("Location: c_questions.php?success=" . $insert_success);
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $last_id;
                $_SESSION["user_name"] = $u_name;
                $_SESSION["user_type"] = 1;
                $_SESSION["order_num"] = 1;
                $_SESSION['CREATED'] = time();

                $name = $u_name = $u_email = $u_pass = $u_rpass = $u_phone = "";

                header("Location: home.php");

            } else {
                $msg_err = "Error: " . $conn->error;
                //$qtitle = $qaswer = "";
                $name = $u_name = $u_email = $u_pass = $u_rpass = $u_phone = "";

                header("Location: register.php?error=" . $msg_err);
            }
        }

    } 

    // Close connection
    $conn->close();
    
}
?>

<?php include("header.php"); ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
                <!--login form-->
                <!--
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>التسجيل باستخدام حسابك</h2>
						<form action="#">
							<input type="email" placeholder="عنوان البريد الإلكتروني الخاص بك" />
							<input type="password" placeholder="كلمة المرور" />
							<button type="submit" class="btn btn-default">تسجيل الدخول</button>
						</form>
					</div>
                </div>
                -->
                <!--/login form-->
                <!--
				<div class="col-sm-1">
					<h2 class="or">أو</h2>
                </div>
                -->
                <!--sign up form-->
				<div class="col-sm-6">
					<div class="signup-form">
						<h2>التسجيل كمستخدم جديد!</h2>

                        <span class="help-block" style="font-size: 0.8rem; font-weight: bold; color: #f10202;"><?php if (isset($_GET['error'])) echo $_GET['error']; ?></span>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<input type="text" id="name" name="name" placeholder="الاسم كامل"/>
							<input type="text" id="u_name" name="u_name" placeholder="اسم المستخدم"/>
							<input type="email" id="email" name="email" placeholder="عنوان البريد الإلكتروني"/>
							<input type="text" id="phone" name="phone" placeholder="رقم الجوال"/>
							<input type="password" id="password" name="password" placeholder="كلمة المرور"/>
							<input type="password" id="repeat-password" name="repeat-password" placeholder="تأكيد كلمة المرور"/>
							<button type="submit" name="register_form" id="register_form" class="btn btn-default">تسجيل</button>
						</form>
					</div>
                </div>
                <!--/sign up form-->
			</div>
		</div>
	</section><!--/form-->
	
<?php include("footer.php"); ?>