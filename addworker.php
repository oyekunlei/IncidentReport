<?php 
require_once './includes/header.php';

if(!isset($_SESSION['admin']))
{
    header("Location: index.php");
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="new-form">
            <?php require_once './includes/alert.php'; ?>
            <form method="POST" action="src/addworker.php" enctype="multipart/form-data">
                <legend>Add Worker</legend>
                <input class="form-control" name="name" type="text" id="name" placeholder="Name"/>
                <span class="error" id="name_error">* Please enter a valid name</span>
                <input class="form-control" name="surname" type="text" id="surname" placeholder="Surname"/>
                <span class="error" id="surname_error">* Please enter a valid surname</span>
                <input class="form-control" name="location" type="text" id="location" placeholder="Work Location"/>
                <span class="error" id="location_error">* Please enter a valid location</span>
                <input name="image" type="file" id="image" />
                <span class="error" id="image_error">* Please upload an image of type png, jpg or jpeg</span>
                <button name="login" id="add-user-btn" class="btn btn-primary">Add Worker</button>
            </form>
        </div>
    </div>
</div>
<?php require_once './includes/footer.php'; ?>
