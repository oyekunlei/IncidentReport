<?php
require_once './includes/header.php';
require_once './includes/Worker.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

$wdao = new Worker();
?>
<div class="container-fluid">
    <div class="row workers">
        <?php require_once './includes/alert.php'; ?>
        <?php
        $workers = $wdao->getWorkers();
        if ($workers != NULL) {
            foreach($workers as $worker) {
                ?>
                <div class="worker">
                    <div class="user-img col-md-2">
                        <img class="img-responsive img-circle" src="<?php echo $worker->image;?>" />
                    </div>
                    <div class="user-details col-md-7">
                        <h3>Name: <?php echo $worker->name . " " . $worker->surname; ?></h3>
                        <p>Employee Number: <?php echo $worker->employee_num; ?></p>
                        <p>Work Location: <?php echo $worker->location ; ?></p>
                    </div>
                    <div class="user-actions col-md-3">
                        <a href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a href="editworker.php?id=<?php echo $worker->id; ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
        <?php require_once './includes/footer.php'; ?>