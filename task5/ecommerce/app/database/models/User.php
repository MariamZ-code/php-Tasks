
<?php
// TO do any process in Model ... 
// First step connect project with database ( CONNECTION )
// Second step Create class (NameOFModel) extend (Connection's Class) implements (..){}

# To convert From RelativePath To AbsoultePath => (__DIR__)
include_once __DIR__ . "\..\config\connection.php";
include_once __DIR__ . "\..\config\crud.php";

// User wanna run TWO methods (runDML(), runDQL()) => Inhert from class connection{} => extends connection
// User wanna implement CRUD => implements crud 
// Columns in Table users = Properties in class User
class User extends connection implements crud
{
    // private $property => to protect cuz $properties will store in DataBase
    private $id;
    private $first_name;
    private $last_name;
    private $phone;
    private $password;
    private $email;
    private $image;
    private $status;
    private $code;
    private $gender;
    private $verified_at;
    private $create_at;
    private $updated_at;

    // SETTER AND GETTER
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

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

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of create_at
     */
    public function getCreate_at()
    {
        return $this->create_at;
    }

    /**
     * Set the value of create_at
     *
     * @return  self
     */
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Get the value of verified_at
     */
    public function getverified_at()
    {
        return $this->verified_at;
    }

    /**
     * Set the value of verified_at
     *
     * @return  self
     */
    public function setverified_at($verified_at)
    {
        $this->verified_at = $verified_at;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

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
        $this->password = sha1($password);

        return $this;
    }


    // IMPLEMENT CRUD

    public function create()
    {
        $query = "INSERT INTO users (first_name,last_name,email,phone,gender,password,code) 
        VALUES ('$this->first_name','$this->last_name','$this->email','$this->phone','$this->gender',
        '$this->password',$this->code)";
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function read()
    {
        # code...
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }
    ////////////////////
    // valedations 
    // select email and phone to check if email and phone are unique or not 
    // ($this->email , $this->phone ) Dol email w phone bto3 l class User
    // ale homa (email w phone ) ale mwgoden as a parameter f setEmail($this->email) W setPhone($this->phone)
    // (registerRequest.php Line 152 ) check lw nset 

    //validate Email exists 
    public function checkIfEmailExists()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email'";
        return $this->runDQL($query);
    }
     //validate phone exists 
    public function checkIfPhoneExists()
    {
        $query = "SELECT * FROM users WHERE phone = '$this->phone'";
        return $this->runDQL($query);
    }
    
    // check if code for this email is corrected
    public function checkCode()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email' AND code = $this->code";
        return $this->runDQL($query);
    }

    // update Status and verified_at if code correct 
    public function verifyUser()
    {
        $query = " UPDATE users SET `status` = '$this->status', verified_at = '$this->verified_at' WHERE email = '$this->email' ";
        // echo $query;die;
        return $this->runDML($query);
    }

/////// Log In 
    public function login()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";
        return $this->runDQL($query);
    }
}

