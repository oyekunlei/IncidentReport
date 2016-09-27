<?php
require_once './includes/header.php';
require_once './includes/issue.php';
require_once './includes/user.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}
$idao = new Issue();
$udao = new User();
$issues = $idao->getIssues();
?>
<div class="container-fluid">
    <div class="row">
        <div class="issues">
            <?php require_once './includes/alert.php'; ?>
            <h1 class="text-center">Reported Issues</h1>
            <?php
            if ($issues > 0) {
               
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
        <?php }} ?>
                </div>
            </div>
        </div>
        <?php require_once './includes/footer.php'; ?>
