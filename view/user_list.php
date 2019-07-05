<?php include 'header.php'; ?>
    <br>
<?php include('search.php'); ?>
    <h1>LIST OF USERS</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Email</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Action</th>
        </tr>
        </thead>
        <div>
        <?php foreach ($users as $key ) { ?>
            <tr>
                <td><?php echo $key->getEmail(); ?></td>
                <td><?php echo $key->getFirstName(); ?></td>
                <td><?php echo $key->getLastName(); ?></td>
                <td>
                    <form action="../controller/user_controller.php" method="post" id="delete_users_form">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="email" value = "<?php echo $key->getEmail(); ?>">
                        <input type="submit" value="Delete">
                    </form>
                    <form action="../view/edit_user.php" method="post" id="edit_user_form">
                        <input type="hidden" name="email" value ="<?php echo $key->getEmail();?>">
                        <input type="hidden" name="firstName" value ="<?php echo $key->getFirstName(); ?>">
                        <input type="hidden" name="lastName" value ="<?php echo $key->getLastName(); ?>">
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
        <?php  } ?>


        </div>
    </table>
        <a href="../view/add.php">Add Email </a><br><br>

<?php include ('footer.php');?>