<?php require_once APP_ROOT . '/views/inc/header.php';?>

<?php require_once APP_ROOT . '/views/inc/components/topnavbar.php';?>

<h1>Post Create</h1>

<div class="post-container">
    <center><h2>Create a post</h2></center>
    <form action="<?php echo URL_ROOT;?>/Posts/create" method="post">
        <input type="text" name="title" id="title" placeholder="Post Title" value="<?php echo $data['title']; ?>" >
        <span class="form-invalid"><?php echo $data['title_err'];?></span>
        <br>
        <textarea name="body" id="body" placeholder="Content" rows="10" cols="70" ><?php echo $data['body']; ?></textarea>
        <span class="form-invalid"><?php echo $data['body_err'];?></span>
        <br>
        <input type="submit" value="Create Post" class="post-btn">
    </form>
</div>

<?php require_once APP_ROOT . '/views/inc/footer.php';?>
