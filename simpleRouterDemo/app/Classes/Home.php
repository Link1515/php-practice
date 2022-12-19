<?php

declare(strict_types=1);

namespace App\Classes;

class Home {
  public function index(): string {
    return <<<FORM
      <form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="receipt">
        <input type="file" name="photo">
        <button type="submit">upload</button>
      </form>
    FORM;
  }

  public function upload() {
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';

    foreach ($_FILES as $file) {
      $filePath = STORAGE_PATH . '/' . $file['name'];

      move_uploaded_file($file['tmp_name'], $filePath);
    }
  }
}
