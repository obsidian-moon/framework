<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Obsidian Moon Framework</title>
  <meta name="description" content="An Open Source, Lightweight and 100% Modular Framework in PHP">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="Elemental Rage Online: Wrath of the Gods">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" href="/icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="icon.png">

  <link rel="stylesheet" href="<?= \mix('/css/app.css') ?>">

  <link rel="manifest" href="site.webmanifest">
  <meta name="theme-color" content="#fafafa">
</head>

<body>

<?= $content ?: '' ?>

<script src="<?= \mix('/js/app.js') ?>"></script>

</body>

</html>
