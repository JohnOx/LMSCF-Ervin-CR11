<?php
// FILE FOR DB CONNECTION
require_once "config/db_connect.php";

$search = $_POST["search"];

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
                        INNER JOIN location ON animals.fk_location_id = location.location_id
                        WHERE animals.name LIKE '%$search%'");

while ($row = $result->fetch_assoc()) {
    $name = $row["name"];
    $age = $row["age"];
    $image = $row["image"];
    $desc = $row["description"];
    $type = $row["type"];
    $location = $row["loc_name"];


?>
    <div class="card_box card col-sm-6 col-md-4 col-lg-3 p-3">
        <img src="img/<?= $image ?>" class="card-img-top" alt="..." height="400px">
        <div class="card-body">
            <h5 class="card-title"><?= $name ?></h5>
            <p style="font-size:0.8em"><b><?= $type ?></b></p>
            <p style="font-size:0.8em"><b><?= $age ?></b></p>
            <p class="card-text"><?= "<b>Description:</b> " . $desc ?></p><hr>
            <p class="card-text"><?= "<b>Location:</b> " . $location ?></p><hr>
            <!-- <a href='info.php?id=<?= $id ?>' class="btn btn-primary text-white">View More Info</a> -->
            <!-- <a href='sort.php?publisher_id=<?= $publisher_id ?>' class="btn btn-info text-white">Sort by Publisher</a> -->
        </div>
    </div>
<?php } ?> <!-- SCHLEIFEN ENDE  -->