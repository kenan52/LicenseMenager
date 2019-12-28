<?php

class Database extends Dbh{

    protected function getAllUsers(){
        $sql = "SELECT * FROM user";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    } 
    protected function getAllLicense($term){
        $sql = "SELECT * FROM license WHERE name like '%$term%' || creator like '%$term%' || type like '%$term%'";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function loginUser($username, $password){
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        $row = $result->fetch_assoc();
        $passwordHash = sha1($password);
        if ($numRows > 0) {
            if ($passwordHash == $row['password']) {
                $_SESSION["uid"] = $row['id'];
                header("Location: index.php");
            }else {
                header("Location: login.php");
            }
        }
    } 
    public function deleteLicense($license_id){
        $sql = "DELETE FROM license WHERE id = '$license_id'";
        $result = $this->connect()->query($sql);
        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    protected function getLicenseInfo($license_id){
        $sql = "SELECT * FROM license WHERE id = '$license_id'";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        $row = $result->fetch_assoc();

        if ($numRows > 0) {
            return $row;
        }else {
            return false;
        }
    }
    public function editLicenseInfo($license_id, $name, $type, $period, $creator){
        $sql = "UPDATE license SET name = '$name', `type` = '$type', `period` = '$period', creator = '$creator' WHERE id = '$license_id'";
        $result = $this->connect()->query($sql);
        if ($result = true) {
            header("Location: ../index.php");
        }else {
            header("Location: ../index.php?error=true");
        }
    }
    public function insertLicense($name, $type, $period, $creator){
        $sql = "INSERT INTO license (`name`, `type`, `period`, `creator`) VALUES ('$name', '$type', '$period', '$creator')";
        $result = $this->connect()->query($sql);
        if ($result = true) {
            header("Location: ../index.php");
        }else {
            header("Location: ../index.php?error=true");
        }
    }
}

?>