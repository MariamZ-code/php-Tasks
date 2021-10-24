<?php
$title = "Check Code";
include_once "views/layouts/header.php";
include_once "app/request/checkCodeRequest.php";
include_once "app/database/models/User.php";



if (isset($_POST['check_code'])) {
    $errors = [];
    define('verified',1);
    
    $checkCode = new checkCodeRequest;
    $checkCode->setCode($_POST['code']);
    //Validate on Code --> required , numeric , digits:5
    $codeValidationResult = $checkCode->codeValidation();
    if (empty($codeValidationResult)) {
        // check if code correct in database
        $userData = new User;
        $userData->setCode($_POST['code']);
        $userData->setEmail($_SESSION['email']);
        $checkCodeResult = $userData->checkCode();
        if ($checkCodeResult) {
            // update status , change email verified_at
    
            $userData->setStatus("verified");
            $userData->setverified_at(date("Y-m-d H:i:s"));
            // verifyUser() --> Method to update status and verfied_at
            $verifyUserResult = $userData->verifyUser();
            if ($verifyUserResult) {
                $_SESSION["email"]=$_POST["email"];
                header('location:login.php');die;

            } else {
                $errors['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
            }
        } else {
            $errors['wrong'] = "<div class='alert alert-danger'> Code Is Not Correct </div>";
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
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="number" name="code" placeholder="Code">
                                        <?php
                                        if (!empty($codeValidationResult)) {
                                            foreach ($codeValidationResult as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        if (isset($errors['wrong'])) {
                                            echo $errors['wrong'];
                                        }
                                        if (isset($errors['something'])) {
                                            echo $errors['something'];
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="check_code"><span><?= $title ?></span></button>
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
