<!-- Connect PHP with DataBase  -->

<?php


class connection
{
    /* username => my username in phpMyadmin="root" ,
       Dont have password in phpMyadmin ,
       database => which database i want to connect */
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "e_commerce";

    private $connection;


    function __construct()
    {
        // mysqli=> built-in class to connect php with database 
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        # To test if i have any error during connection 

        //    if($connection->connect_error){
        //       echo die("Connection Error is: ". $connection->connect_error);
        //    }else{ echo "Connection Correct";}
    }


    // This Method to run DML (insert,update,delete) .... Return (TRUE || FALSE)
    // cuz i have alot of Quaries to (insert,update,delete),(select) Not just one Quary so i use Parametar($quary)
    public function runDML($quary)
    {
        // query() => Built-in Method in mysqli which quary i want ...Example: "select * from users where ..."
        // Result = Return (The Proccess is Correct ->TRUE ) || (The Proccess is InCorrect ->FALSE )

        $result = $this->connection->query($quary);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // This Method to run DQL (select) .... Return (Correct => Data || InCorrect => empty array [] )
    public function runDQL($quary)
    {
        // Result => Return (Data -> i have Rows "ROWS != ZERO" ) || ([] -> i NOT have Any Rows "ROWS = ZERO" )
        $result = $this->connection->query($quary);
        if ($result->num_rows > 0) {
            // Return Dataa  
            return $result;
        } else {
            return [];
        }
    }
}
