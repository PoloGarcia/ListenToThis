<?php 


function connect(){
    $mysql = mysqli_connect("siqueiros.qro.itesm.mx","alequipo01","iqefyvow", "alequipo01");
    return $mysql;
}

function close($mysql){
    mysqli_close($mysql);
}

function showquery($query){
    $mysql = connect();
    $results = $mysql->query($query);
    $fields = mysqli_num_fields($results);
    $rowcount=mysqli_num_rows($results);
    if($results){
    if ($rowcount>=1) {
        echo "<table>";
        for ($it=0; $it < $fields ; $it++) { 
            $name = mysqli_fetch_field_direct($results,$it);
            echo "<th>" . $name->name . "</th>";
        }
        for ($i=0; $i < $rowcount ; $i++) { 
            $row = mysqli_fetch_array($results);
            echo "<tr>";
            for ($j=0; $j < $fields ; $j++) { 
                echo "<td>" .  $row[$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p> No results matching </p>";
    }
    } else {
        echo "<p> No results matching </p>";
    }
    close($mysql);
}

function showdonation($query){
    $mysql = connect();
    $results = $mysql->query($query);
    $fields = mysqli_num_fields($results);
    $rowcount=mysqli_num_rows($results);
    echo "<br><br>";
    if($results){
    if ($rowcount>=1) {
        echo "<table class=\"donaciones\">";
        for ($it=0; $it < $fields ; $it++) { 
            $name = mysqli_fetch_field_direct($results,$it);
            echo "<th>" . $name->name . "</th>";
        }
        for ($i=0; $i < $rowcount ; $i++) { 
            $row = mysqli_fetch_array($results);
            echo "<tr>";
            for ($j=0; $j < $fields ; $j++) { 
                echo "<td>" .  $row[$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class=\"donaciones\"> No results matching </p>";
    }
    } else {
        echo "<p class=\"donaciones\"> No results matching </p>";
    }
    close($mysql);
}

function dropdown($name,$query, $id){
    $mysql = connect();
    $results = $mysql->query($query);
    echo "<div class=\"form-group\"> <div class=\"col-xs-12\">";
    echo "<select class=\"form-control input-lg\" required name=$name id=$id>";
    while($row = mysqli_fetch_array($results, MYSQLI_BOTH)){
        echo "<option value=$row[0]>" . $row[1] . "</option>";
    }
    echo "</select> </div> </div>";
    close($mysql);
}

function runquery($myquery){
    $mysql = connect();
    if (!$mysql->query($myquery)) {
        printf("Error: %s\n", $mysql->error);
    }
    close($mysql);
}

function inserting_producto($barcode,$description,$brand){
    $mysql = connect();
            // insert command specification 
    $query='INSERT INTO `alequipo01`.`proyecto_producto`(`barcode` ,`description` ,`brand`)VALUES (?,?,?)';
    // Preparing the statement 
    if (!($statement = $mysql->prepare($query))) {
        die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
    }
    // Binding statement params     
    if (!$statement->bind_param("sss", $barcode, $description,$brand)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
    }
     // Executing the statement
    if (!$statement->execute()) {
        die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    } else {
        return true;
    }
    close($mysql);
}

function inserting_centro($id,$name,$address,$active){
    $mysql = connect();
            // insert command specification
    $query='INSERT INTO  `alequipo01`.`proyecto_centro` (`id` ,`name` ,`address` ,`active`)VALUES (?,?,?,?)';
    // Preparing the statement 
    if (!($statement = $mysql->prepare($query))) {
        die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
    }
    // Binding statement params     
    if (!$statement->bind_param("ssss", $id, $name,$address,$active)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
    }
     // Executing the statement
    if (!$statement->execute()) {
        die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    } else {
        return true;
    }
    close($mysql);
}

function inserting_donacion($idAcopio,$idProducto,$cantidad){
    $mysql = connect();
            // insert command specification
    $query='INSERT INTO `alequipo01`.`proyecto_donacion` (`idAcopio`,`idProducto`,`cantidad`) VALUES (?,?,?)';
    // Preparing the statement 
    if (!($statement = $mysql->prepare($query))) {
        die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
    }
    // Binding statement params     
    if (!$statement->bind_param("sss", $idAcopio,$idProducto,$cantidad)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
    }
     // Executing the statement
    if (!$statement->execute()) {
        die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    } else {
        return true;
    }
    close($mysql);
}

function authenticate($usr,$pwd) {
    $mysql = connect();
    $query = "SELECT * FROM users WHERE usr='$usr' AND pwd='$pwd'";
    $res = mysqli_query($mysql, $query);
    if(mysqli_fetch_array($res)) {
        
        return 1;
    }

    return 0;

}




?>