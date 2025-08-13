<?php require_once APP_ROOT . '/views/inc/header.php';?>

<?php require_once APP_ROOT . '/views/inc/components/topnavbar.php';?>

<h1>Post Create</h1>

<div class="post-container">
    <center><h2>Create a post</h2></center>
    <form action="">
        <input type="text" name="title" id="title" placeholder="Post Title">
        <br>
        <textarea name="content" id="body" placeholder="Content" rows="10" cols="70"></textarea>
        <br>
        <input type="submit" value="Create Post" class="post-btn">
    </form>
    </form>
</div>

<?php require_once APP_ROOT . '/views/inc/footer.php';?>
