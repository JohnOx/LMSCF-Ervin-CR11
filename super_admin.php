<?php
require_once "config/functions.php";
protect_super_admin();
// FILE FOR DB CONNECTION
require_once "config/db_connect.php";
// HEADER TEMPLATE 
require_once "temp/header_temp.php";


$result = $conn->query("SELECT user_id, firstname, lastname, email, status FROM users");

if (count($_POST) > 0) {
    $status = $_POST["user_status"]; 
    $id = $_POST["user_id"];

    $update = $conn->query("UPDATE `users` SET `status`= '$status' WHERE user_id = $id");
    header("Location: super_admin.php");
    exit;

}
?>
<div class="container">
<h4>Adding new User</h4>
<sup>*no validation only password hash</sup>
<form class="row" id="foo">
    <input class="form-control col-2" type="text" name="first_name" id="first_name" placeholder="First Name">
    <input class="form-control col-2" type="text" name="last_name" id="last_name" placeholder="Last Name">
    <input class="form-control col-3" type="email" name="email" id="email" placeholder="Email">
    <input class="form-control col-3" type="password" name="pwd" id="pwd" placeholder="Password">

    <input class="btn btn-primary col-2" type="button" value="Send" id="btn"/>
</form>
<!-- <p id = "results_user"></p> -->
<h4 class="mt-5">Edit status of user</h4>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id = "results_user">

<?php
foreach ($result as $row) {
    $user_id = $row["user_id"];
    $first_name = $row["firstname"];
    $last_name = $row["lastname"];
    $email = $row["email"];
    $status = $row["status"];

?>
    
    <tr>
        <td><?= $user_id ?></td>
        <td><?= $first_name ?></td>
        <td><?= $last_name ?></td>
        <td><?= $email ?></td>
        <td><?= $status ?></td>
        <td>
        <form action="super_admin.php" method="POST" id="users">
            <input type="hidden" id="user_id" name="user_id" value="<?= $user_id ?>">
            <select name="user_status" id="user_status">
                <option value="user">user</option>
                <option value="admin">admin</option>
                <option value="superadmin">superadmin</option>
            </select>
            <button class="btn btn-primary ml-5" id="btn" type="submit" class="registerbtn" style="width:100px">Edit</button>
            <a href="del.php?del_user=<?= $user_id ?>" class="btn btn-danger" name="delete">Delete</a>

        </form>
        </td>
    </tr>
<?php } ?>

    </tbody>
</table>
</div>

<?php
// FOOTER TEMPLATE
require_once "temp/footer_temp.php";
?>