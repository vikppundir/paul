<? $business =  new business() ?>
<?php  $var = json_decode($business->businessById(20))->data[0]->Businesshours ?>
<? print_r( before(json_decode($var)->sunday,'-')) ?>


