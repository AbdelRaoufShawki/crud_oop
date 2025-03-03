<?php


class Database {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "crud_oop";
    private $con;

    public function __construct() {

        $this->con = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
        if(!$this->con) {

            return die("their is an error in connection of db ". mysqli_connect_error());

        }

    }



// function insert

    public function insert($sql) {

      if(mysqli_query($this->con,$sql)) {

        return "Added success";

      } else {

        die("Error". mysqli_error($this->con));

      }
    }



    public function enc_password($password) {

        return password_hash($password,PASSWORD_DEFAULT);
    }




    // function select or read


    // public function select($table) {

    //     $sql = "SELECT * FROM $table";
    //     $res = mysqli_query($this->con,$sql);

    //     if(mysqli_query($this->con,$sql)) {

    //         if(mysqli_num_rows($res) > 0) {
                
    //             $select=mysqli_fetch_all($res,MYSQLI_ASSOC);
                
                
    //              $array[]= $select;

    //              return $array;
    //         }
            
    //       else {
                
    //             die("error" . mysqli_error($this->con));
    //         }
    //     }
        
    // }

    public function select($table)
    {
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($this->con, $sql);
        $array = array();
        if (mysqli_query($this->con, $sql)) 
        {
            if (mysqli_num_rows($result) > 0) 
            {
                
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $array[] = $row;
                }
            } 
            return $array;
        }
        else 
        {
            return  die("Error : " . mysqli_error($this->con));
        }
    
    }



    public function find($table,$id) {

        $sql = "SELECT * FROM $table WHERE `id`= '$id'";
        $res = mysqli_query($this->con,$sql);

        if(mysqli_query($this->con,$sql)) {

            if(mysqli_num_rows($res)) {

                return mysqli_fetch_assoc($res);

            } else {

                return false;
            }
        }
            else {

                die("error". mysqli_error($this->error));

            }
    }









    public function update($sql) {

        if(mysqli_query($this->con,$sql)) {
  
          return "Update success";
  
        } else {
  
          die("Error". mysqli_error($this->con));
  
        }
      }



      public function delete($table,$id) {

        $sql = "DELETE FROM $table WHERE `id` = $id";
        if(mysqli_query($this->con,$sql)) {
  
            return "Delete success";
    
          } else {
    
            die("Error". mysqli_error($this->con));
    
          }
      }












}






