<?php  
/* Program performs Login and Signup, and backend validation for user signup data */
require 'databaseConfig.php';   //database configuration
session_start();  
    class userVerification { 
        private $database;  //database
            
        function __construct() {  
              
            // connecting to database 
            
            $this->database = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error($this->database));
               
        }  
        // destructor  
        function __destruct() {  
              
        }  
        /* Check if username exists */
        public function isUsernameExist($username){  
            $query = mysqli_query($this->database, "SELECT * FROM users WHERE Username = '$username'");  
            $row = mysqli_num_rows($query);  
            if($row > 0){  
                return true;  
            } else {  
                return false;  
            }  
        } 
        
        /* Check if email exists */
        public function isEmailExist($email){  
            $query = mysqli_query($this->database, "SELECT * FROM users WHERE Gmail = '$email'");  
            $row = mysqli_num_rows($query);  
            if($row > 0){  
                return true;  
            } else {  
                return false;  
            }  
        }

        /* First name validation */
        public function validateFirstname($firstname){
            if(preg_match("/^([a-zA-Z' ]+)$/",$firstname)){
                return true;
            }else{
                return false;
            }
        }

        /* Last name validation */
        public function validateLastname($lastname){
            if(preg_match("/^([a-zA-Z' ]+)$/",$lastname)){
                return true;
            }else{
                return false;
            }
        }

        /* Username validation */
        public function validateUsername($username){
            if(preg_match("/^[A-Za-z0-9_]+$/",$username)){
                return true;
            }else{
                return false;
            }
        }

        /* GMAIL validation */
        public function validateEmail($email){
            if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@gmail.com/",$email)){
                return true;
            }else{
                return false;
            }
        }

        /* Contact validation */
        public function validatePhone($phone){
            if(preg_match("/^\+?([0-9]{1,3})\)?([\d ]{9,15})$/",$phone)){
                return true;
            }else{
                return false;
            }
        }

        /* Password match validation */
        public function validatePassword($password, $confirm_password){
            if($password == $confirm_password){
                return true;
            }else{
                return false;
            }
        }

        /* reset Password for chairperson (admin) */
        public function resetPassword($username, $oldPassword, $newPassword){
            $oldPassword = md5($oldPassword);
            $newPassword = md5($newPassword);
            $query1 = "SELECT * from chairperson where Username = '$username' and Password = '$oldPassword'";
            $select = mysqli_query($this->database, $query1);
            if($select){
                $query = "UPDATE chairperson set Password = '$newPassword' where Username = '$username'";
                $update = mysqli_query($this->database, $query);
                return $update;
            }
            
        }

        /* User registration - signup */
        public function UserRegister($firstname, $lastname, $username, $email, $phone, $location, $password){  
                $password = md5($password);  
                $query = "INSERT INTO users(Firstname, Lastname, Username, Gmail, Phone_number, Location, Password)
                 values('$firstname', '$lastname', '$username', '$email', '$phone', '$location', '$password')";
                $insert = mysqli_query($this->database, $query);
                return $insert;  
               
        }
        
        /* Login takes username and password as parameters */
        public function Login($username, $password){  
            $password = md5($password);  //hash password
            
            $usersDatabase = "SELECT * FROM USERS WHERE Username ='$username' AND Password = '$password'";  //query users table
            $chairDatabase = "SELECT * FROM CHAIRPERSON WHERE Username ='$username' AND Password = '$password'";  //query chairpersons table

            $user = mysqli_query($this->database, $usersDatabase);   //execute user query
            $chairperson = mysqli_query($this->database, $chairDatabase); //execute chair query

            $user_data = mysqli_fetch_array($user);   //get user data
            $chair_data = mysqli_fetch_array($chairperson);  //get chair data

            if(is_array($user_data)){    //if user
                $_SESSION['UserID'] = $user_data['UserID'];  
                $_SESSION['Username'] = $user_data['Username'];  
                $_SESSION['email'] = $user_data['Gmail'];  
                $_SESSION['firstname'] = $user_data['Firstname'];  
                $_SESSION['lastname'] = $user_data['Lastname'];  
                return TRUE;  
            }
            else if(is_array($chair_data)){    //if chairperson
                $_SESSION['ChairID'] = $chair_data['ChairpersonID'];  
                $_SESSION['Username'] = $chair_data['Username'];  
                return TRUE; 
            }
               
            else  
            {  
                return FALSE;  
            }  
        }  
        


    }
    

?>  