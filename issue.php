<?php
require_once './includes/header.php';
require_once './includes/issue.php';
require_once './includes/user.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $idao = new Issue();
    $udao = new User();
    $issue = $idao->getIssue($id);
    $user = $udao->getUser($issue->reporterID);
}
?>
<div class="container">
    <div class="row">
        <div class="issue-detail text-center">
            <?php require_once './includes/alert.php'; ?>
            <h1 class="text-center"> <?php echo $issue->title; ?></h1>
            <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user->name; ?></p>
            <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $issue->createdat; ?></p>
            <p><i class="fa fa-spinner" aria-hidden="true"></i> Status: <?php echo $issue->status; ?></p>
            <form class="">
                <input type="hidden" name="issue_id" id="issue_id" value="<?php echo $issue->id; ?>"/>
                <label>Change Status </label>
                <select id="changeStatus" name="status">
                    <option value="Pending">Pending</option>
                    <option value="In Review">In Review</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Closed">Closed</option>
                </select>
            </form>
            <p>
                <?php echo $issue->description; ?>
            </p>
        </div>
    </div>
</div>
<?php require_once './includes/footer.php'; ?>