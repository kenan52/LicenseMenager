<?php

class Database extends Dbh{
    #Getting username with id
    protected function getUserById($uid){
        $sql = "SELECT username FROM user WHERE id = '$uid'";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    #Getting all license
    protected function getAllLicense($term){
        $sql = "SELECT license.id, license.name, license.type, user.username AS creator FROM license LEFT JOIN user ON license.creator = user.id WHERE name like '%$term%' || username like '%$term%' || type like '%$term%'";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    #Login
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
    #Delete License
    public function deleteLicense($license_id){
        $sql = "DELETE FROM license WHERE id = '$license_id'";
        $result = $this->connect()->query($sql);
        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    #Getting license info
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
    #Method for license editing
    public function editLicenseInfo($license_id, $name, $type, $period){
        $sql = "UPDATE license SET name = '$name', `type` = '$type', `period` = '$period' WHERE id = '$license_id'";
        $result = $this->connect()->query($sql);
        if ($result = true) {
            header("Location: ../index.php");
        }else {
            header("Location: ../index.php?error=true");
        }
    }
    #Method for inserting new license
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
