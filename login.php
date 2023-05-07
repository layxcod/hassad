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

 
// Include config file
require_once "config.php";

$l_u_name = $l_u_pass = "";
$l_u_name_err = $l_u_pass_err = "";
//$username_err = $password_err = "";
 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login_form"])) {

        // Check if password is empty
        if(empty(trim($_POST["login-email"]))){
            $l_u_name_err = "Please enter your user name.";
        } else {
            $l_u_name = trim($_POST["login-email"]);
        }

        if(empty(trim($_POST["login-password"]))){
            $l_u_pass_err = "Please enter your password.";
        } else {
            $l_u_pass = trim($_POST["login-password"]);
        }
        
        // Validate credentials
        if(empty($l_u_name_err) && empty($l_u_pass_err)){
            // Prepare a select statement
            $sql = "SELECT id, name, order_num, type FROM users WHERE email = '$l_u_name' AND pass = '$l_u_pass'";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["user_name"] = $row["name"];
                    $_SESSION["user_type"] = $row["type"];
                    $_SESSION["order_num"] = $row["order_num"];

                    $_SESSION['CREATED'] = time();

                    //echo "id: " . $row["id"] . " - Name: " . $row["user_name"] . "<br>";
                }

                $l_u_name = $l_u_pass = "";

                //echo "location: index.php";
                // Redirect user to welcome page
                header("location: index.php");

            } else {
                // Display an error message if password is not valid
                //$qtitle = $qaswer = "";
                $l_u_name = $l_u_pass = "";

                $msg_err = "خطأ في الايميل أو كلمة المرور.";
                header("Location: login.php?lerror=" . $msg_err);
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
				<div class="col-sm-6 col-sm-offset-1">
					<div class="login-form">
						<h2>التسجيل باستخدام حسابك</h2>

                        <span class="help-block" style="font-size: 1.5rem; font-weight: bold; color: #f10202;"><?php if (isset($_GET['lerror'])) echo $_GET['lerror']; ?></span>
						
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<input type="email" id="login-email" name="login-email" placeholder="عنوان البريد الإلكتروني الخاص بك" />
							<input type="password" id="login-password" name="login-password" placeholder="كلمة المرور" />
							<button type="submit" name="login_form" id="login_form" class="btn btn-default">تسجيل الدخول</button>
							<br>
							<h4><a href="register.php">أو التسجيل كمستخدم جديد</a></h4>
						</form>
					</div>
				</div>
				<!--/login form-->
				<!--
				<div class="col-sm-1">
					<h2 class="or">أو</h2>
				</div>
				-->
				<!--sign up form-->
				<!--
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>التسجيل كمستخدم جديد!</h2>
						<form action="#">
							<input type="text" placeholder="اسم المستخدم"/>
							<input type="email" placeholder="عنوان البريد الإلكتروني"/>
							<input type="password" placeholder="كلمة المرور"/>
							<button type="submit" class="btn btn-default">تسجيل</button>
						</form>
					</div>
				</div>
				-->
				<!--/sign up form-->
			</div>
		</div>
	</section><!--/form-->
	

<?php include("footer.php"); ?>