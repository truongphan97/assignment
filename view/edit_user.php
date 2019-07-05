<?php include 'header.php'; ?>
<form action="../controller/user_controller.php" method="post">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name = "email1" value ="<?php echo filter_input(INPUT_POST,'email');?>">
    Email:<input type="text" name ="email" value="<?php echo filter_input(INPUT_POST,'email');?>"><br>
    FirstName:<input type="text" name ="firstName" value="<?php echo filter_input(INPUT_POST,'firstName'); ?>"><br>
    LastName:<input type="text" name ="lastName" value="<?php echo filter_input(INPUT_POST,'lastName'); ?>"><br>
    <button type="">Save</button>
    <input type="submit" name="clear" value="Cancel ">
</form>
<?php include ('footer.php');?>