<?php 
    // Header component for the MVC application
    require_once APP_ROOT . '/views/inc/components/header.php';
?>
<h1>Users</h1>
<?php foreach($data['users'] as $user): ?>
    <p><?php echo $user->name; ?> - <?php echo $user->age; ?></p>
<?php endforeach; ?>
<?php
    // Footer component for the MVC application
    require_once APP_ROOT . '/views/inc/components/footer.php';
?>
