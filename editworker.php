<?php
require_once './includes/header.php';
require_once './includes/Worker.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="new-form">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $wdao = new Worker();
                $worker = $wdao->getWorker($id);

                if ($worker != false) {
                    ?>
                    <?php require_once './includes/alert.php'; ?>
                    <form method="POST" action="src/editImage.php" enctype="multipart/form-data">
                        <legend>Edit Worker</legend>
                        <input type="hidden" name="id" value="<?php echo $worker->id; ?>">
                        <center><img class="img-circle img-responsive" src="<?php echo $worker->image; ?>"/></center>
                        <label class="col-md-12">Image: <input name="image" type="file" id="image" /></label>
                        <span class="error" id="image_error">* Please upload an image of type png, jpg or jpeg</span>
                        <button name="login" id="edit-user-image" class="btn btn-primary">Change Image</button>
                    </form>
                    <form method="POST" action="src/editWorker.php">
                        <input type="hidden" name="id" value="<?php echo $worker->id; ?>">
                        <label class="col-md-12">Employee Number: <input class="form-control" name="name" type="text" id="employee_num" disabled="disabled" value="<?php echo $worker->employee_num ?>" placeholder="Employee Number"/></label>
                        <label class="col-md-12">Name: <input class="form-control" name="name" type="text" id="name" value="<?php echo $worker->name ?>" placeholder="Name"/></label>
                        <span class="error" id="name_error">* Please enter a valid name</span>
                        <label class="col-md-12">Surname: <input class="form-control" name="surname" type="text" value="<?php echo $worker->surname ?>" id="surname" placeholder="Surname"/></label>
                        <span class="error" id="surname_error">* Please enter a valid surname</span>
                        <label class="col-md-12">Location: <input class="form-control" name="location" type="text" value="<?php echo $worker->location ?>" id="location" placeholder="Work Location"/></label>
                        <span class="error" id="location_error">* Please enter a valid location</span>
                        <button name="login" id="edit-user-btn" class="btn btn-primary">Edit Worker</button>
                    </form>
                    <?php
                } else {
                    ?>
                    <h1>Worker does not exist!</h1>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php require_once './includes/footer.php'; ?>
