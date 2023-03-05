<?php 
    function e_optionUsers(){
        $query = "SELECT DISTINCT c.CompanieID, c.Name, r.Name as Rol
        FROM systrelations AS sys, roles AS r, companies AS c
        WHERE sys.RolID = r.RolID
        AND sys.CompanieID = c.CompanieID
        AND r.RolID = 3 ORDER BY c.Name ASC;";
        $result = connectDB()->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $db_id = $row["CompanieID"];
                $db_name = $row["Name"];
                echo '<option value="'.$db_id .'">'.$db_name .'</option>';
            } 
        }
    }
?>