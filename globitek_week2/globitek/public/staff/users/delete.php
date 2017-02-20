<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$users_result = find_user_by_id($_GET['id']);
// No loop, only one result
$user = db_fetch_assoc($users_result);

if(is_post_request()) {
  delete_user($user);
  redirect_to('index.php');
}
?>
<?php $page_title = 'Staff: Delete User ' . h($user['first_name']) . " " . h($user['last_name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to Users List</a><br />

  <h1>Are you sure you want to permanently delete the user: <?php echo h($user['first_name']) . " " . h($user['last_name']); ?></h1>

  <form action="delete.php?id=<?php echo h($user['id']); ?>" method="post">
    <input type="submit" name="submit" value="Yes"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
