<?php require_once APP_ROOT . '/views/inc/header.php';?>

<?php require_once APP_ROOT . '/views/inc/components/topnavbar.php';?>



<div class="form-container">
    <h1>User sign up</h1>

    <p><b>Please fill in this form to create an account.</b></p>
    <!-- Form for user registration can be added here -->
    <form action="<?php echo URL_ROOT; ?>/users/register" method="post">

        <!--name input-->
        <div class="form-input-title">Name</div>
        <input type="text" id="name" name="name" required>
        <span class="form-invalid"></span>

        <!--email input-->
        <div class="form-input-title">Email</div>
        <input type="email" id="email" name="email" required>
        <span class="form-invalid"></span>

        <!--password input-->
        <div class="form-input-title">Password</div>
        <input type="password" id="password" name="password" required>
        <span class="form-invalid"></span>

        <!--confirm password input-->
        <div class="form-input-title">Confirm Password</div>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <span class="form-invalid"></span>  

        <br><br>

        <!--submit button-->
        <button type="submit" class="form-btn">Register</button>
    </form>
</div>

<?php require_once APP_ROOT . '/views/inc/footer.php';?>
