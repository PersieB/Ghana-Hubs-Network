<?php  
    /* Program performs backend validation of Hub and Event data */
    class HubEventMeet { 
            
        function __construct() {  

               
        }  
        // destructor  
        function __destruct() {  
              
        }  

        /* Hub or Event name validation */
        public function validateName($name){
            if(preg_match("/^[.@&]?[a-zA-Z0-9 ]+[ !.@&()]?[ a-zA-Z0-9!()]+/",$name)){
                return true;
            }else{
                return false;
            }
        }

        /* Gmail validation */
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

        /* Website validation */
        public function validateUrl($link){
            if(preg_match("/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\\=]*)/",$link)){
                return true;
            }else{
                return false;
            }
        }

        /* Time validation */
        public function validateTime($time){
            if(preg_match("/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/",$time)){
                return true;
            }else{
                return false;
            }
        }

        /* Date validation */
        public function validateDate($date){
            if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)){
                return true;
            }else{
                return false;
            }
        }


        


    }
    

?>  