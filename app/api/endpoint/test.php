<?  ///print_r(sql("select id, JSON_VALUE(Services,'$.type_102') as ids from business_details ")) ?>


<?  
//print_r(sql("select id from business_details WHERE (',' + RTRIM(ServicesType) + ',') LIKE '%,' + 6 + ',%' "));
?>

<?  
//print_r(sql("select id from business_details WHERE FIND_IN_SET('102',ServicesType)"));
?>

<?  print_r(business::result([ 'limit' => 4, 'offset' => 0,'orderBy' => 'u.id'],'and')); ?>
