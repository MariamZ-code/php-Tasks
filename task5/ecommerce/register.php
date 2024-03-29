<?php
$title = "Register";
include_once "views/layouts/header.php";
include_once "views/layouts/navbar.php";
include_once "views/layouts/breadcrumb.php";
include_once "app/request/registerRequest.php";
include_once "app/middleware/guest.php";
include_once "app/database/models/User.php";
include_once "app/mail/mail.php";


// check if user (das) buttonRegister =>(TRUE -> Validation) (FALSE -> error Msg)
if (isset($_POST["register"])){
  // Validate on email and password , confirmpassword --> Required , regex , password =  confirmpassword
  $registerValidation = new registerRequest;
  $registerValidation->setEmail($_POST['email']);

  $emailValidationResult =$registerValidation->emailValidation();  // return $errors => [] , [errors]

  $registerValidation->setPassword($_POST['password']);
  $registerValidation->setConfirmPassword($_POST['confirm_password']); 

  $passwordValidationResult = $registerValidation->passwordValidation(); // return $errors => [] , [errors]


//   print_r($passwordValidationResult);die;
  if(empty($emailValidationResult) AND empty($passwordValidationResult)){

    // validate on email => unique
    $emailExistsResult = $registerValidation->emailExits(); // return $errors => [] , [errors]
    // validate on phone => unique
    $registerValidation->setPhone($_POST['phone']);
    $phoneExistsResult = $registerValidation->phoneExits(); // return $errors => [] , [errors]

    if(empty($emailExistsResult) AND empty($phoneExistsResult)){
        $code = rand(10000,99999);
        $userObject = new User;
        $userObject->setFirst_name($_POST['first_name']);
        $userObject->setLast_name($_POST['last_name']);
        $userObject->setEmail($_POST['email']);
        $userObject->setPassword($_POST['password']);
        $userObject->setPhone($_POST['phone']);
        $userObject->setGender($_POST['gender']);
        $userObject->setCode($code);
        $createResult = $userObject->create();

        if ($createResult) {
            // Send email With Code 
            $subject = "Ecommerce-Verification-Code";
            $body = "<p>Hello {$_POST['first_name']}</p><p> Your Verification Code is:<b>$code</b></p><p>Thank You.</p>";
            // 
            $newMail = new mail;
            $mailResult = $newMail->sendMail($_POST['email'], $subject, $body);
            if ($mailResult) {
                $_SESSION['email'] = $_POST['email'];
                header("location:check-code.php?page=register");die;
            } else {
                $mailError  = "<div class='alert alert-danger'> Try To Verify You Account Later </div>";
            }
            // header check code
        } else {
            $databaseError  = "<div class='alert alert-danger'> Something Went Wrong </div>";
        }
    }

    }


  }


?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                      
                    </div>
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="text" name="first_name" placeholder="First Name" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];} ?>">
                                        <input type="text" name="last_name" placeholder="Last Name" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];} ?>">
                                        <input type="email"name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                                        <?php
                                            if(!empty($emailValidationResult)){
                                                foreach ($emailValidationResult as $key => $value) {
                                                    echo $value;
                                                }
                                            }
                                            if(!empty($emailExistsResult)){
                                                foreach ($emailExistsResult as $key => $value) {
                                                    echo $value;
                                                }
                                            }
                                            
                                            ?>
                                        
                                      
                                        <input type="tel"name="phone" placeholder="Phone"  value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>" >
                                        <?php
                                        if(!empty($phoneExistsResult)){
                                            foreach ($phoneExistsResult as $key => $value) {
                                                echo $value;
                                            }
                                         }
                                        ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?php 
                                            if(isset($passwordValidationResult['password-required'])){
                                                echo $passwordValidationResult['password-required'];
                                            }
                                            if(isset($passwordValidationResult['password-pattern'])){
                                                echo $passwordValidationResult['password-pattern'];
                                            }
                                        ?>
                                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                                        <?php 
                                            if(isset($passwordValidationResult['confirmPassword-required'])){
                                                echo $passwordValidationResult['confirmPassword-required'];
                                            }
                                            if(isset($passwordValidationResult['password-confirm'])){
                                                echo $passwordValidationResult['password-confirm'];
                                            }
                                        ?>
                                        <select name="gender" class="form-control" id="">
                                            <option <?php if(isset($_POST['gender']) AND $_POST['gender'] == 'm'){echo "selected";} ?> value="m">Male</option>
                                            <option <?php if(isset($_POST['gender']) AND $_POST['gender'] == 'f'){echo "selected";} ?> value="f">Female</option>
                                        </select>
                                        <div class="button-box mt-5">
                                            <button name="register" type="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "views/layouts/footer.php" ?>
   
