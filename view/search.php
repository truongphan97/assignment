
<form action="../controller/user_controller.php" id="form_search">

    <label for="search">
    </label><input type="text" name="search" id="search" value="<?php echo htmlentities(filter_input(INPUT_GET, 'search')); ?>" placeholder="Enter your email, first name or last name">
    <button>Search</button>
</form>