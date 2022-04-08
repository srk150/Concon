<?php 


//for stripe 
require('stripe-php-master/init.php');

$publishableKey="pk_test_51IQzTrJgcs1EIUin9zwxyfDiasN4NYUoRkrxxKmLGSVvSKrEceiFF3Wom0ZS7Wjr4sUpRu1RSit9RQQQq8JNtHHT00CMTlJ0tc";

$secretKey="sk_test_51IQzTrJgcs1EIUins51WogLvQs4MYsNL3eQcdJf5aZBrCEEVfhP3SxSf5mgroTkB83qaxaexTkXWq8iwcTTQD9Jr00sw5jIWVa";

Stripe\Stripe::setApiKey($secretKey);


//end


?>