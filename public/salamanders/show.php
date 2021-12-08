<?php 
require_once('../../private/initialize.php');

// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$salamander = find_salamander_by_id($id);

$page_title = 'View Salamander';
include(SHARED_PATH . '/salamanderHeader.php'); 
?>

<a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="slamander show">

    <h1>Salamander: <?= h($salamander)['name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Name</dt>
        <dd><?= h($salamander['name']); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?= h($salamander['habitat']); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?= h($salamander['description']); ?></dd>
      </dl>
    </div>

  </div>

<?php include(SHARED_PATH . '/salamanderFooter.php'); ?>
