<?php
require_once "config/functions.php";
protect_admin();
// FILE FOR DB CONNECTION
require_once "config/db_connect.php";
// HEADER TEMPLATE 
require_once "temp/header_temp.php";

if (count($_POST) > 0) {
    $animal_id = $_POST["animal_id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $type = $_POST["type"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $image = $_POST["image"];

    $update = $conn->query("UPDATE `animals` 
                            SET 
                            `name`= '$name',
                            `age`= $age,
                            `image`= '$image',
                            `description`= '$description',
                            `fk_type_id` = $type,
                            `fk_location_id` = $location 
                            WHERE animal_id = $animal_id");

echo "  <div class='container'>
            <div class='alert alert-success' role='alert'>
                <h4 class='alert-heading'>You have successfully updated the entry</h4>
                <hr>
                <a class='btn btn-primary' href='index.php'>Back to Homepage</a>
            </div>
        </div>";
        // header("Location: 2; url=admin.php");
} else {
    $id = $_GET["id"];
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
                        WHERE animal_id = $id");

    $row = $result->fetch_assoc();
    $animal_id = $row["animal_id"];
    $name = $row["name"];
    $age = $row["age"];
    $type = $row["type"];
    $location = $row["loc_name"];
    $description = $row["description"];
    $image = $row["image"];
}

?>
<div class="container p-5">
<h1>EDIT ANIMAL:</h1>
<form id = "main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
    <div class = "form_fields">
        <div class="row">
        <input type="hidden" name="animal_id" value="<?= $animal_id ?>">
            <div class="col-6">
                <label for="name">Name:</label><br>
                <input type="text" class="form-control" name="name" value="<?= $name ?>">
            </div>
            <div class="col-6">
                <label for="age">Age:</label><br>
                <input type="number" class="form-control" name="age" value="<?= $age ?>">
            </div>
        </div>
        <div class="row">
            <select class="col-6 p-3 m-1" name="type" id="type">
                <option value="">Choose a type:</option>
                <option value="1">Small Animal</option>
                <option value="2">Large Animal</option>
                <option value="3">Exotic Animal</option>
            </select>

            <select class="col-6 p-3 m-1" name="location" id="type">
                <option value="">Choose a Location:</option>
                <option value="1">Herz für Tiere</option>
                <option value="2">Tier Hof Berlin</option>
                <option value="3">Tiroler Tierheim</option>
            </select>
        </div>
        <div class="row">
            <div class="col">
                <label for="description">Description:</label><br>
                <textarea name="description" id="description" rows="10" style="width:100%"><?= $description ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="image">Image:</label><br>
                <input type="text" class="form-control" name="image" value="<?= $image ?>">
            </div>
        </div>
        <button class="btn btn-primary mt-3 mb-5" type="submit" name="add" class="registerbtn" style="width:200px">Edit</button>
    </div>
</form>
</div>


