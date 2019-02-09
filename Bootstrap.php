<?php
include_once 'Builder.php';

$files = Builder::reqursiveBuild(Libs);

foreach($files as $file)
  include_once($file);
?>
