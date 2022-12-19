<h1><?= $title ?></h1>

<form action="/upload" method="post" enctype="multipart/form-data">
  <input type="file" name="receipt">
  <input type="file" name="photo">
  <button type="submit">upload</button>
</form>