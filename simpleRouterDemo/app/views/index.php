<h1><?= $title ?></h1>

<form action="/upload" method="post" enctype="multipart/form-data">
  <input type="file" name="receipt">
  <input type="file" name="photo">
  <button type="submit">upload</button>
</form>

<?php if (isset($storageFiles)) : ?>
  <h2>download file</h2>
  <?php foreach ($storageFiles as $storageFile) : ?>
    <div><a href="/download?filename=<?= $storageFile ?>"><?= $storageFile ?></a></div>
  <?php endforeach ?>
<?php endif ?>