<?php

require_once "config/functions.php";
protect();
// FILE FOR DB CONNECTION
require_once "config/db_connect.php";
// HEADER TEMPLATE 
require_once "temp/header_temp.php";

$result = $conn->query("SELECT 
                        animals.animal_id, 
                        animals.name, 
                        animals.age, 
                        animals.image, 
                        animals.description,
                        type.type,
                        location.loc_name
                        FROM animals 
                        INNER JOIN type ON animals.fk_type_id = type.type_id
                        INNER JOIN location ON animals.fk_location_id = location.location_id");

?>
<h1 class="text-center">Animals:</h1>
<div class="container-fluid">
    <div class="row" id="results">
<?php

while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $age = $row["age"];
        $image = $row["image"];
        $desc = $row["description"];
        $type = $row["type"];
        $location = $row["loc_name"];



?>
        <div class="card_box card col-sm-6 col-md-4 col-lg-3 p-3">
            <img src="<?= $image ?>" class="card-img-top" alt="..." height="400px" id="img">
            <div class="card-body">
                <h5 class="card-title"><?= $name ?></h5>
                <p style="font-size:0.8em"><b><?= $type ?></b></p>
                <p style="font-size:0.8em"><b><?= "<b>Age:</b> " . $age ?></b></p>
                <p class="card-text"><?= "<b>Description:</b> " . $desc ?></p><hr>
                <p class="card-text"><?= "<b>Location:</b> " . $location ?></p><hr>
                <!-- <a href='info.php?id=<?= $id ?>' class="btn btn-primary text-white">View More Info</a> -->
                <!-- <a href='sort.php?publisher_id=<?= $publisher_id ?>' class="btn btn-info text-white">Sort by Publisher</a> -->
            </div>
        </div>
 <?php } ?> <!-- SCHLEIFEN ENDE  -->
    </div>
 </div>

<?php
// FOOTER TEMPLATE
require_once "temp/footer_temp.php";
?>
