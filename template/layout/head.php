<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- title -->
<title><?= !empty($title) ? $title : 'Web sửa xe' ?></title>
<?php $favicon = $db->oneRaw("SELECT * FROM images WHERE type = 'favicon'")['image'] ?>
<link rel="icon" href="assets/images/favicon/<?= $favicon ?>" type="image/x-icon" />