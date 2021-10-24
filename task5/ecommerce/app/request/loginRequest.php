<?php 

class loginRequest {
    private $password;
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
    // validate on Password
    public function passwordValidationRequired()
    {
        
       
        $errors = [];
        // required 
        if(empty($this->password)){
            $errors['password-required'] = "<div class='alert alert-danger'> Password Is Required </div>";
        }

        return $errors;
    }
    public function passwordValidationRegex()
    {
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        $errors = [];
       //regex
       if(!preg_match($pattern,$this->password)){
        $errors['password-pattern'] = "<div class='alert alert-danger'> Failed Attempt </div>";}
      return $errors;
    }
}