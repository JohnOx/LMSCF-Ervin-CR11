<?php
require_once "config/functions.php";
protect_admin();
// FILE FOR DB CONNECTION
require_once "config/db_connect.php";

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($pwd)) {
    $psw_hash = password_hash($pwd, PASSWORD_DEFAULT);
    $result = $conn->query("INSERT INTO `users`(`firstname`, `lastname`, `email`, `pwd`) VALUES ('$first_name','$last_name','$email','$psw_hash')");
    $first_name = "";
    $last_name = "";
    $email = "";
    $pwd = "";
}

$result = $conn->query("SELECT user_id, firstname, lastname, email, status FROM users");

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
        <form action="user.php" method="POST" id="users">
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
<?php }; ?>

