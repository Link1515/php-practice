<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController {
  public function index(): View {
    return View::make('index', ['title' => 'this is home page']);
  }

  public function upload() {
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';

    if (!is_dir(STORAGE_PATH)) {
      mkdir(STORAGE_PATH);
    }

    foreach ($_FILES as $file) {
      $filePath = STORAGE_PATH . '/' . $file['name'];

      move_uploaded_file($file['tmp_name'], $filePath);
    }
  }
}
