<?php
include_once 'Builder.php';

$libs = Builder::reqursiveBuild('Libs');
$models = Builder::build('Models');

foreach($libs as $lib)
  include_once($lib);

foreach($models as $model)
  include_once($model);
?>
