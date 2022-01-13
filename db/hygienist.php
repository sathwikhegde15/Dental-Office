<?php 
    class hygienist{
        // private database object\
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        
        // function to insert a new record into the attendee database
        public function insertHygienist($User_Id, $Fname, $Lname, $Dateofbirth, $AddressLine_1, $AddressLine_2, $Mobileno, $Emailid,$City,$State,$Country,$ZipCode,$Certificateno,$Specialization,$ImagePath){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO hygienist (User_Id,Fname,Lname,Dateofbirth,AddressLine_1,AddressLine_2,Mobileno,Emailid,City,State,Country,ZipCode,Certificateno,Specialization,ImagePath) VALUES (:User_Id,:Fname,:Lname,:Dateofbirth,:AddressLine_1,:AddressLine_2,:Mobileno,:Emailid,:City,:State,:Country,:ZipCode,:Certificateno,:Specialization,:ImagePath)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':User_Id',$User_Id);
                $stmt->bindparam(':Fname',$Fname);
                $stmt->bindparam(':Lname',$Lname);
                $stmt->bindparam(':Dateofbirth',$Dateofbirth);
                $stmt->bindparam(':AddressLine_1',$AddressLine_1);
                $stmt->bindparam(':AddressLine_2',$AddressLine_2);
                $stmt->bindparam(':Mobileno',$Mobileno);
                $stmt->bindparam(':Emailid',$Emailid);
                $stmt->bindparam(':City',$City);
                $stmt->bindparam(':State',$State);
                $stmt->bindparam(':Country',$Country);
                $stmt->bindparam(':ZipCode',$ZipCode);
                $stmt->bindparam(':Certificateno',$Certificateno);
                $stmt->bindparam(':Specialization',$Specialization);
                $stmt->bindparam(':ImagePath',$ImagePath);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editHygienist($Hygienist_Id , $Fname, $Lname, $Dateofbirth, $AddressLine_1, $AddressLine_2, $Mobileno, $Emailid,$City,$State,$Country,$ZipCode,$Certificateno,$Specialization){
           try{ 
                $sql = "UPDATE `hygienist` SET `Fname`=:Fname,`Lname`=:Lname,`Dateofbirth`=:Dateofbirth,`AddressLine_1`=:AddressLine_1, `AddressLine_2`=:AddressLine_2, `Mobileno`=:Mobileno, `Emailid`=:Emailid, `City`=:City, `State`=:State, `ZipCode`=:ZipCode, `Country`=:Country, `Certificateno`=:Certificateno, `Specialization`=:Specialization WHERE Hygienist_Id = :Hygienist_Id";

                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':Hygienist_Id',$Hygienist_Id);
                $stmt->bindparam(':Fname',$Fname);
                $stmt->bindparam(':Lname',$Lname);
                $stmt->bindparam(':Dateofbirth',$Dateofbirth);
                $stmt->bindparam(':AddressLine_1',$AddressLine_1);
                $stmt->bindparam(':AddressLine_2',$AddressLine_2);
                $stmt->bindparam(':Mobileno',$Mobileno);
                $stmt->bindparam(':Emailid',$Emailid);
                $stmt->bindparam(':City',$City);
                $stmt->bindparam(':State',$State);
                $stmt->bindparam(':Country',$Country);
                $stmt->bindparam(':ZipCode',$ZipCode);
                $stmt->bindparam(':Certificateno',$Certificateno);
                $stmt->bindparam(':Specialization',$Specialization);
              
                // execute statement
                $stmt->execute();
                return true;
           }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
           }
            
        }

        public function getHygienist(){
        //     try{
        //         $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
        //         $result = $this->db->query($sql);
        //         return $result;
        //     }catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //    }
           
        }

        public function getAttendeeDetails($id){
        //    try{
        //         $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id 
        //         where attendee_id = :id";
        //         $stmt = $this->db->prepare($sql);
        //         $stmt->bindparam(':id', $id);
        //         $stmt->execute();
        //         $result = $stmt->fetch();
        //         return $result;
        //    }catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //     }
        }

        public function deleteAttendee($id){
        //    try{
        //         $sql = "delete from attendee where attendee_id = :id";
        //         $stmt = $this->db->prepare($sql);
        //         $stmt->bindparam(':id', $id);
        //         $stmt->execute();
        //         return true;
        //     }catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //     }
        }

        // public function getSpecialties(){
        //     try{
        //         $sql = "SELECT * FROM `specialties`";
        //         $result = $this->db->query($sql);
        //         return $result;
        //     }catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //     }
            
        // }

        // public function getSpecialtyById($id){
        //     try{
        //         $sql = "SELECT * FROM `specialties` where specialty_id = :id";
        //         $stmt = $this->db->prepare($sql);
        //         $stmt->bindparam(':id', $id);
        //         $stmt->execute();
        //         $result = $stmt->fetch();
        //         return $result;
        //     }catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //     }
            
        // }


        

    }
?>