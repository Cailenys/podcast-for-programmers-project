<?php
  $technologies = array( 'HTML5', 'CSS3', 'Javascript', 'ES6', 'React', 'SQL', '.NET CORE (MVC)' );
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cPanel Website</title>

  <!-- Style(s) -->
  <link href="./css/main.css" type="text/stylesheet" rel="stylesheet">

  <!-- Script(s) -->
  <script type="text/javascript" src="./js/scripts.js" defer></script>
</head>
<body>
  <h1>cPanel Website</h1>
  <p>Hi I'm Cailenys! Here are technologies I know...</p>
  <?php if ( isset( $technologies ) && ( count( $technologies ) > 0 ) ) : ?>
    <ul>
      <?php foreach ( $technologies as $technology ) : ?>
        <li>
          <?php echo $technology; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>Sorry, no technologies.</p>
  <?php endif; ?>
</body>
</html>
