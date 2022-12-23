<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController {
  public function index(): View {
    $storageFiles = is_dir(STORAGE_PATH) ? array_slice(scandir(STORAGE_PATH), 2) : [];

    return View::make('index', ['title' => 'this is home page', 'storageFiles' => $storageFiles]);
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

    header('Location: /');
  }

  public function download() {
    $filename = $_GET['filename'];
    $mineType = mime_content_type($filename);

    header("Content-Type: {$mineType}");
    header("Content-Disposition: attachment;filename=\"{$filename}\"");

    readfile(STORAGE_PATH . '/' . $filename);
  }
}
