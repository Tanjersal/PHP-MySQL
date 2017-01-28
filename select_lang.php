<?php

//dynamic language selection

session_start();

include 'lang_definition.php';

include 'lang_string_definition.php';

diff_Strings();

?>

<!DOCTYPE html>

<html lang="<?php echo LANGCODE; ?>">

<title><?php echo TXT; ?></title>

<meta charset="<?php echo CHARSET; ?>" />

<body>

   <h1><?php echo TXT; ?></h1>

   <h2><?php echo LANG_CHOICE; ?></h2>

   <ul>

      <li><a href="<?php echo $_SERVER['PHP_SELF']."?lang=en"; ?>">en</a></li>

      <li><a href="<?php echo $_SERVER['PHP_SELF']."?lang=fr"; ?>">fr</a></li>

   </ul>

</body>

</html>