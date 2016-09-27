<?php
require_once './includes/header.php';
require_once './includes/issue.php';
require_once './includes/user.php';

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $idao = new Issue();
    $udao = new User();
    $issues = $idao->getIssuesByStatus($status);
}
?>
<div class="container-fluid">
    <center><div class="row">
        <?php require_once './includes/alert.php'; ?>
        <a href="reports.php?status=In Progress" class="btn btn-primary">Issues In Progress</a>
        <a href="reports.php?status=In Review" class="btn btn-primary">Issues In Review</a>
        <a href="reports.php?status=Pending" class="btn btn-primary">Issues Pending</a>
        <a href="reports.php?status=Closed" class="btn btn-primary">Issues Closed</a>
    </div></center>
    <div class="row issues">
        <?php
        if (isset($_GET['status']) && $issues != null) {
            foreach ($issues as $issue) {
                $user = $udao->getUser($issue->reporterID);
                ?>
                <div class="row issue">
                    <a href="issue.php?id=<?php echo $issue->id; ?>"><div class="">
                            <h3><?php echo $issue->title; ?></h3>
                            <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user->name . " " . $user->surname ?></p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $issue->createdat; ?></p>
                            <p><i class="fa fa-spinner" aria-hidden="true"></i> Status: <?php echo $issue->status; ?> </p>
                        </div></a>
                </div>
            <?php }
        } ?>
    </div>
</div>
<?php require_once './includes/footer.php'; ?>
