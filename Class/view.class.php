<?php

class View extends Database{
    #Method show all licenses
    public function showAllLicense($term){
        $datas = $this->getAllLicense($term);
        foreach ($datas as $data) {
            echo '<tr>
                <td>'.$data["name"].'</td>
                <td>'.$data['creator'].'</td>
                <td>    
                <a href="editLicense.php?id='.$data["id"].'" class="text-muted">
                <i class="fa fa-edit"></i>
                </a>
                &nbsp;&nbsp;
                <a href="#" onclick="deletePost('.$data["id"].')">
                    <i class="fa fa-eraser"></i>
                    </a>  
                </td>
            </tr>';
        }
    }
    #Method for license editing.
    public function showLicenseEdit($license_id){
        $datas = $this->getLicenseInfo($license_id);
        echo '<form method="post" action="CRUD/crud.php?edit&id='.$datas['id'].'">
        <table class="tableInsert">
            <tr>
                <th colspan="2" >Update license</th>  
            </tr>
            <tr id="idlicense">
            <td><input type="hidden" name="id" value=""></td>
            </tr>
            <tr>
            <td>Name</td>
            <td><input type="text" class="form-control" name="name" value="'.$datas['name'].'" placeholder="Enter name"></td>
            </tr>
            <tr>
            <td>Type</td>
            <td>
                <select class="inputSelect" name="type" value="">
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                </select>
            </td>
            </tr>
            <tr>
                <td>Period</td>
                <td><input type="text" class="form-control" name="period" value="'.$datas['period'].'" placeholder="Enter Period"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" class="primary-btn" name="edit" value="Update"></td>
            </tr>
        </table>
        </form>';
    }
}

?>
