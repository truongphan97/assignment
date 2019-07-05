<?php
require_once('../model/database.php');
require_once('../model/user.php');
require_once('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'index';
    }
}
if($action == 'index')
{
    $users = UserDB::getUsers();
    include('../view/user_list.php');
}

else if ($action == 'edit')
{
    $email = $_POST['email1'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    UserDB::editUser($email,$firstName,$lastName);
    $users = UserDB::getUsers();
    include('../view/user_list.php');
}
else if ($action == 'delete')
{
    $email = filter_input(INPUT_POST, 'email');
    UserDB::deleteUser($email);
    header("Location: ?action  = index");
}
else if($action == 'add')
{
    $email = $_POST['email'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    if ($email == NULL || $email == FALSE ||
        $firstName == NULL || $firstName == FALSE || $lastName == FALSE || $lastName == NULL)
    {
        echo "Invalid product data. Check all fields and try again.";
        echo '<a href="../view/add.php">Quay lai</a>';

    } else{
        UserDB::addUser($email,$firstName,$lastName);
        $users = UserDB::getUsers();
        include('../view/user_list.php');
    }

}
else if($action == 'search')
{
    $firstName = $_GET['search'];
    $users = UserDB::searchUser($firstName);
    include('../view/user_list.php');
}
?>