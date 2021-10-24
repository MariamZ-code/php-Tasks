<?php
$title = "Login";
include_once "views/layouts/header.php";
include_once "views/layouts/navbar.php";
include_once "views/layouts/breadcrumb.php";
include_once "app/middleware/guest.php";
include_once "app/request/loginRequest.php";
include_once "app/request/registerRequest.php";
include_once  "app/database/models/User.php";
include_once "app/mail/mail.php";

if (isset($_POST['log-in'])) {

    $emailValidation = new registerRequest;
    $emailValidation->setEmail($_POST['email']);
    $emailValidationResult = $emailValidation->emailValidation();


    $passwordValidation = new loginRequest;
    $passwordValidation->setPassword($_POST['password']);
    $passwordValidationRequierd = $passwordValidation->passwordValidationRequired();
    $passwordValidationReqex = $passwordValidation->passwordValidationRegex();

    define('avilable', 1);
    //validate on passwoord and email --> requiered and reqex 
    if (empty($emailValidationResult) and empty($passwordValidationRequierd) and empty($passwordValidationReqex)) {


        // validate on password and email == password and email on db 
        $userDB = new User;
        $userDB->setEmail($_POST['email']);
        $userDB->setPassword($_POST['password']);
        $loginResult = $userDB->login();
        if ($loginResult) {
            // convert from Query to Object 
            $userObject = $loginResult->fetch_object();

            // if user not verified ... status = 0
            if ($userObject->status != avilable) {

                // send mail
                $subject = "Ecommerce-Verification-Code";
                $body = "<p>Hello {$userObject->first_name}</p><p> Your Verification Code is:<b>$userObject->code</b></p><p>Thank You.</p>";
                $newMail = new mail;
                $mailResult = $newMail->sendMail($_POST['email'], $subject, $body);

                if ($mailResult) {


                    $_SESSION['email'] = $_POST['email'];
                    header('location:check-code.php?');
                    die;
                } else {
                    $errors['failEmail']  = "<div class='alert alert-danger'>Something wrong !! Try To Verify Your Account Later </div>";
                }
            } else {
                $errors['wrong'] = "<div class='alert alert-danger'> Failed Attempt </div>";
            }
        }
    }
}
?>

<!-- Breadcrumb Area End -->
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="email" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) {
                                                                                                        echo $_POST['email'];
                                                                                                    } ?>">
                                        <?php
                                        if (!empty($emailValidationResult)) {
                                            foreach ($emailValidationResult as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?php

                                        if (isset($passwordValidationRequierd)) {
                                            echo $passwordValidationRequierd;
                                        }
                                        if (isset($passwordValidationReqex)) {
                                            echo $passwordValidationReqex;
                                        }
                                        if (isset($errors)) {
                                            foreach ($errors as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        ?>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="verify-email.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit" name="log-in"><span>Login</span></button>
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





<?php include_once "views/layouts/footer.php"; ?>