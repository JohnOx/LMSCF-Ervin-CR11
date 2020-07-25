<?php
require_once "config/functions.php";
protect_admin();
// FILE FOR DB CONNECTION
require_once "config/db_connect.php";

$name = $_POST["name"];
$age = $_POST["age"];
$type = $_POST["type"];
$location = $_POST["location"];
$description = $_POST["description"];
$image = $_POST["image"];

if (!empty($name) && !empty($age) && !empty($type) && !empty($location) && !empty($description) && !empty($image)) {
    $result = $conn->query("INSERT INTO `animals`
                                        (`name`, 
                                         `age`, 
                                         `image`, 
                                         `description`, 
                                         `fk_type_id`, 
                                         `fk_location_id`) 
                            VALUES ('$name', $age , '$image', '$description', $type, $location)");
    $name = "";
    $age = "";
    $image = "";
    $description = "";
    $type = "";
    $location = "";
    
}


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

while ($row = $result->fetch_assoc()) {
    $id = $row["animal_id"];
    $name = $row["name"];
    $image = $row["image"];
    $age = $row["age"];
    $desc = $row["description"];
    $type = $row["type"];
    $location = $row["loc_name"];
 
?>
<tr>
    <td><?= $id ?></td>
    <td><?= $name ?></td>
    <td><?php echo "<img src='img/$image' alt='' width='100px' height='150px' id='img'>>"; ?> </td>
    <td><?= $type ?></td>
    <td><?= $age ?></td>
    <td><?= $location ?></td>
    <td><?= $desc ?></td>
    <td>
      <!-- <a href='info.php?id=<?= $id ?>'class="btn btn-primary text-white" style="width:200px">View More</a> -->
      <a href='edit_animal.php?id=<?= $id ?>'class="btn btn-primary text-white" style="width:100px">Edit</a>
    </td>
    <td> 
      <a href='del.php?anim_id=<?= $id ?>'class="btn text-white" style="width:100px; background-color:darkred">Delete</a> 
    </td>   
</tr>
<?php } 

?> <!-- LOOP END  -->

