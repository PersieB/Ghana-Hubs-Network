<?php  
/* Program performs CRUD operations */
require 'databaseConfig.php';   //database configuration meal
    class CRUD { 
        private $database;  //database 
         
        // constructor
        function __construct() {  
              
            // connecting to database 
            
            $this->database = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error($this->database));
               
        }  
        // destructor  
        function __destruct() {  
              
        }  

        /* select 5 hubs per page */
        public function Hub_Limit($page1){
            $query = "SELECT * from hubs order by HubID DESC limit $page1,5";
            $result = mysqli_query($this->database, $query);
            return $result;
        }


        /* select 5 events per page */
        public function Event_Limit($page1){
            $query = "SELECT * from events order by EventID DESC limit $page1,5";
            $result = mysqli_query($this->database, $query);
            return $result;
        }

        /* select all hubs */
        public function allHubs(){
            $query = "SELECT * from hubs order by HubID DESC";
            $result = mysqli_query($this->database, $query);
            return $result;
        }

        /* select all events */
        public function allEvents(){
            $query = "SELECT * from events order by EventID DESC";
            $result = mysqli_query($this->database, $query);
            return $result;
        }

        /* add Hub */
        public function addHub($name, $address, $phone, $gmail, $website, $about,$logo){
            $target = "../hubLogos/".basename($logo);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $query = "INSERT INTO hubs(Company_name, Gmail, Telephone, Address, Website, Description, Logo_name)
                 values('$name', '$gmail', '$phone', '$address', '$website','$about', '$logo')";
                $insert = mysqli_query($this->database, $query);
                return $insert; 
        }

        /* add event */
        public function addEvent($title, $date, $start, $end, $venue, $about, $logo){
            $target = "../eventFlyers/".basename($logo);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $query = "INSERT INTO events(Title, Date, StartTime, EndTime, Venue, Description, Logo_name)
                 values('$title', '$date', '$start', '$end', '$venue', '$about', '$logo')";
                $insert = mysqli_query($this->database, $query);
                return $insert; 
        }

        /* select a hub based on id provided */
        public function selectParticularHub($hubid){
            $query = "SELECT * from hubs where HubID = '$hubid'";
            $select = mysqli_query($this->database, $query);
            return $select;
        }

        /* select an event based on id provided */
        public function selectParticularEvent($eventid){
            $query = "SELECT * from events where EventID = '$eventid'";
            $select = mysqli_query($this->database, $query);
            return $select;
        }

        /* update a hub */
        public function updateHub($hubid, $name, $address, $phone, $gmail, $website, $about, $logo){
            $target = "../hubLogos/".basename($logo);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $query = "UPDATE hubs SET Company_name = '$name', Gmail = '$gmail', Telephone = '$phone', Address = '$address',
            Website = '$website', Description = '$about', Logo_name = '$logo' where HubID = '$hubid'";
                $update = mysqli_query($this->database, $query);
                return $update; 
        }

        /* update an event */
        public function updateEvents($eventid,$title, $date, $start, $end, $venue, $about, $logo){
            $target = "../eventFlyers/".basename($logo);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $query = "UPDATE events SET Title = '$title', Date = '$date', StartTime = '$start', EndTime = '$end',
            Venue = '$venue', Description = '$about', Logo_name = '$logo' where EventID = '$eventid'";
                $update = mysqli_query($this->database, $query);
                return $update; 
        }

        /* remove a hub */
        public function deleteHub($hubid){
            $query = "DELETE from hubs where HubID = '$hubid'";
            $delete = mysqli_query($this->database, $query);
            return $delete;
        }

        /* remove or cancel an event */
        public function deleteEvent($eventid){
            $query = "DELETE from events where EventID = '$eventid'";
            $delete = mysqli_query($this->database, $query);
            return $delete;
        }

        /* add Partnership formed */
        public function addIndPartner($userid, $hubid){
            $query = "INSERT INTO individual_partnership(UserID, HubID) values('$userid', $hubid)";
                $insert = mysqli_query($this->database, $query);
                return $insert; 
        }

        /* delete Registered event  */
        public function deleteRegisteredEvent($eventid){
            $query = "DELETE from registered_events where EventID = '$eventid'";
            $delete = mysqli_query($this->database, $query);
            return $delete;
        }

        /* add Registered event  */
        public function addRegisteredEvent($userid, $eventid){
            $query = "INSERT INTO registered_events(UserID, EventID) values('$userid', '$eventid')";
                $insert = mysqli_query($this->database, $query);
                return $insert; 
        }

        /* current number of hubs */
        public function countHub(){
            $query = "SELECT * from hubs";
            $select = mysqli_query($this->database, $query);
            $count = mysqli_num_rows($select);
            return $count;
        }

        /* current number of events upcoming */
        public function countEvent(){
            $query = "SELECT * from events";
            $select = mysqli_query($this->database, $query);
            $count = mysqli_num_rows($select);
            return $count;
        }

        /* current number of Partnerships formed */
        public function countPartnership(){
            $query = "SELECT * from individual_partnership";
            $select = mysqli_query($this->database, $query);
            $count = mysqli_num_rows($select);
            return $count;
        }



    }
    

?>  