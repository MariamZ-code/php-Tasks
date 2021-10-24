<!-- Vaidation Logic For Register -->
<?php 

//To check Email and phone are Unique or not ---> Must include Model User to check in Database 

include_once __DIR__. "\..\database\models\User.php";



class registerRequest
{
  private $email;
  private $password;
  private $confirmPassword;
  private $phone;

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }
  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */ 
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }
  /**
   * Get the value of confirmPassword
   */ 
  public function getConfirmPassword()
  {
    return $this->confirmPassword;
  }

  /**
   * Set the value of confirmPassword
   *
   * @return  self
   */ 
  public function setConfirmPassword($confirmPassword)
  {
    $this->confirmPassword = $confirmPassword;

    return $this;
  }

  /**
   * Get the value of phone
   */ 
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set the value of phone
   *
   * @return  self
   */ 
  public function setPhone($phone)
  {
    $this->phone = $phone;

    return $this;
  }
  ////////////

  //Validate on Email ---> Required , RegEx
  public function emailValidation()
  {
    $pattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
    $errors = [];
    // Required 
    if (empty($this->email)) {
        $errors['email-required'] = "<div class='alert alert-danger'> Email Is Required </div>";
    }
    
    // Regular expression => (regEX -> the way to write email)
    //preg_match() ==>return TRUE|FALSE
    else{
        if (!preg_match($pattern,$this->email)) {
            $errors['email-pattern'] = "<div class='alert alert-danger'> Email Is Invalid </div>";
        }
    }
    return $errors; 
  }

  // Validate on Password and ConfirmPassword ---> Required , RegEx , Confirmed
  public function passwordValidation()
  {
    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    $errors = [];
    // Required Password 
    if (empty($this->password)) {
        $errors['password-required'] = "<div class='alert alert-danger'> Password Is Required </div>";
    }

    // Required ConfirmPassword
    if (empty($this->confirmPassword)) {
        $errors['confirmPassword-required'] = "<div class='alert alert-danger'> ConfirmPassword Is Required </div>";
    }

    if (empty($errors)) {

        // confirm if Password = ConfirmPassword 
        if ($this->password !== $this->confirmPassword) {
            $errors['password-confirm'] = "<div class='alert alert-danger'> Password Dosen't Match </div>";  
        }
 
        // Regular expression => (regEX -> the way to write password)
        if (!preg_match($pattern,$this->password)) {
            $errors['password-pattern'] = "<div class='alert alert-danger'>Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character.</div>";
        }
    }
    return $errors;
  }

  public function emailExits()
  {
    $errors=[];
   
    $userObject= new User;

    // ($userObject->email ) --> Wrong Cuz email private 
    //setEmail($this->email) $this --> Object class registerRequest
    $userObject->setEmail($this->email);
    $result = $userObject->checkIfEmailExists();
    if ($result) {
        // $result = data ---> Email is Not Unique 
        $errors['email-unique'] = "<div class='alert alert-danger'> Email Already Exists </div>";
    }
    return $errors;
  }

  public function phoneExits()
  {
    $errors=[];
   
    $userObject= new User;
    $userObject->setPhone($this->phone);
    $result = $userObject->checkIfPhoneExists();
    if ($result) {
        // $result = data ---> phone is Not Unique 
        $errors['phone-unique'] = "<div class='alert alert-danger'> Phone Already Exists </div>";
    }
    return $errors;
  }
  
}
