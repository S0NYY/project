<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>გვერდის სახელი</title>
</head>
<body>
<?php

  require_once('view/view_repository.php');

  $active_lang_id = isset($_GET['lang']) ? $_GET['lang'] : null;

  $view_repository = new ViewGenerator($active_lang_id);

  $active_lang_id = $view_repository->getActiveLaguageId();
  $active_lang_name = $view_repository->getActiveLaguageName();


?>
<header>
  <nav>
    <ul>
      <li>სათაო</li>
      <li>ჩვენ შესახებ</li>
      <li>პორტფოლიო</li>
      <li>კონტაქტი</li>
    </ul>
  </nav>
  <p class="lang"><?php echo 'ენა: ' .  $active_lang_name; ?></p>
</header>
<main>
  <article>
    <header>
      <?php echo $view_repository->getArticleTitle($hEl = 'h1'); ?>
    </header>
    <div class="content">
      <?php echo '<p>public: ' . $view_repository->zogadi . '</p>'; ?>
      <?php echo '<p>protected: ' . $view_repository->cxrilis_saxeli . '</p>'; ?>
      <?php echo '<p>private: ' . $view_repository->enis_id . '</p>'; ?>
  </article>
</main>
</body>
</html>