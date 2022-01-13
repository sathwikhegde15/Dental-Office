<?php 

    class user{
        // private database object\
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        public function insertUser($Email,$Password, $Role_Id){
            try {
                $result = $this->getUserbyEmail($Email);
                if($result['num'] > 0){
                    return false;
                } else{
                    // define sql statement to be executed
                    $sql = "INSERT INTO user (Email,Password, Role_Id) VALUES (:Email,:Password,:Role_Id)";
                    //prepare the sql statement for execution
                    $stmt = $this->db->prepare($sql);
                    // bind all placeholders to the actual values
                    $stmt->bindparam(':Email',$Email);
                    $stmt->bindparam(':Password',$Password);
                    $stmt->bindparam(':Role_Id',$Role_Id);
                    
                    // execute statement
                    $stmt->execute();
                    $User_Id = $this->db->lastInsertId();
                    return $User_Id;
                }
                
        
            } catch (PDOException $e) {
                $e->getMessage();
                return false;
            }
        }

        public function getUser($Email,$Password){
            try{
                $sql = "select * from user where Email = :Email AND Password = :Password ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':Email', $Email);
                $stmt->bindparam(':Password', $Password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserbyEmail($Email){
            try{
                $sql = "select count(*) as num from user where Email = :Email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':Email',$Email);
                
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }

        public function getUsers(){
            try{
                $sql = "SELECT * FROM user";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>