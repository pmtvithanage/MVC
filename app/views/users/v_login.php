<?php require_once APP_ROOT . '/views/inc/header.php';?>

<?php require_once APP_ROOT . '/views/inc/components/topnavbar.php';?>



<div class="form-container">
    <h1>User sign up</h1>

    <p><b>Please fill the correct credentials to login</b></p>
    <!-- Form for user registration can be added here -->
    <form action="<?php echo URL_ROOT; ?>/users/login" method="post">

        <!--email input-->
        <div class="form-input-title">Email</div>
        <input type="email" id="email" name="email" required>
        <span class="form-invalid"></span>

        <!--password input-->
        <div class="form-input-title">Password</div>
        <input type="password" id="password" name="password" required>
        <span class="form-invalid"></span>

        <br><br>

        <!--submit button-->
        <button type="submit" class="form-btn">login</button>
    </form>
</div>

<?php require_once APP_ROOT . '/views/inc/footer.php';?>
