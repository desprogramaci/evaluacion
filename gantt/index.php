<?php

require('lib/gantti.php'); 
//require('data.php'); 

date_default_timezone_set('UTC');
setlocale(LC_ALL, 'en_US');

$gantti = new Gantti($data, array(
  'title'      => 'Current Plan',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));

?>

  


<?php echo $gantti ?>


