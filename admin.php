<?php
require_once "config/functions.php";
protect_admin();
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
<div class="container">
    <div class="accordion mt-5 mb-5" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h2>ADD NEW ANIMAL HERE</h2>
                </button>
            </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <!-- ADDING NEW ANIMALS  -->
                <form id = "main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                    <div class = "form_fields">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">Name:</label><br>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-6">
                                <label for="age">Age:</label><br>
                                <input type="number" class="form-control" name="age">
                            </div>
                        </div>
                        <div class="row">
                            <!-- <label class="col-3" for="type">Choose a type:</label> -->
                            <select class="col-6 p-3 m-1" name="type" id="type">
                                <option value="">Choose a type:</option>
                                <option value="1">Small Animal</option>
                                <option value="2">Large Animal</option>
                                <option value="3">Exotic Animal</option>
                            </select>

                            <!-- <label class="col-3" for="type">Choose a Location:</label> -->
                            <select class="col-6 p-3 m-1" name="location" id="type">
                                <option value="">Choose a Location:</option>
                                <option value="1">Herz für Tiere</option>
                                <option value="2">Tier Hof Berlin</option>
                                <option value="3">Tiroler Tierheim</option>
                                <!-- <option value="2">Large Animal</option>
                                <option value="3">Exotic Animal</option> -->
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="description">Description:</label><br>
                                <textarea name="description" id="description" rows="5" style="width:100%"></textarea>
                            </div>
                        </div>
                        <div class="row">                         
                            <div class="col-6">
                                <label for="image">Image URL:</label><br>
                                <sup>*Please insert only image link</sup>
                                <input type="text" class="form-control" name="image">
                            </div>
                        </div>
            
                        <button class="btn btn-primary mt-3 mb-5" type="button" id="add_animal" name="add" class="registerbtn" style="width:200px">Add</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Type</th>
      <th scope="col">Age</th>
      <th scope="col">Location</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="results_animal">

<?php

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
    <td><?php echo "<img src='$image' alt='' width='150px' height='150px'>"; ?> </td>
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

<?php } ?> <!-- LOOP END  -->

  </tbody>
</table><!-- TABLE END  -->

<?php
// FOOTER TEMPLATE 
require_once "temp/footer_temp.php";
