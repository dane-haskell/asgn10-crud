<?php require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/salamanders/index.php'));
}
$id = $_GET['id']; 

if(is_post_request()) {

  // Handle form values sent by new.php

  $salamander = [];
  $salamander['id'] = $id;
  $name = $_POST['salamanderName'] ?? '';
  $habitat = $_POST['habitat'] ?? '';
  $description = $_POST['description'] ?? '';

  $result = update_salamander($salamander);
  redirect_to(url_for('/salamanders/show.php?id=' . $id));

} else {

  $salamander = find_salamander_by_id($id);

}

?>

<?php $page_title = 'Edit Salamander'; ?>
<?php include(SHARED_PATH . '/salamanderHeader.php'); ?>

  <a class="back-link" href="<?= url_for('index.php'); ?>">&laquo; Home</a>

    <h1>Edit Salamander</h1>

    <form action="<?= url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="<?=h($salamander['name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><input type="textarea" name="habitat" rows="4" cols="75" value="<?=h($salamander['habitat']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><input type="textarea" name="description" rows="4" cols="75" value="<?=h($salamander['description']); ?>" /></dd>
      </dl>
      
        <input type="submit" value="Edit Salamander" />
    </form>

<?php include(SHARED_PATH . '/salamanderFooter.php'); ?>
