<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>invoices</h1>

  <?php if (!empty($invoice)) : ?>
    Invoice ID: <?= htmlspecialchars($invoice['id'], ENT_QUOTES) ?> <br />
    Invoice Amount: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES) ?> <br />
    User: <?= htmlspecialchars($invoice['full_name'], ENT_QUOTES) ?> <br />
  <?php endif ?>
</body>

</html>