<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" type="text/css" href="prime_factorization.css">
    <title>Prime factorization</title>
</head>
<body>
<div id="container">
<h1>Prime Factorization</h1>
<form action="index.php" method="post" accept-charset="UTF-8">
<input type="number" name="given-number" placeholder="Give an integer" required autofocus/>
<input type="submit" />
</form><br />
<hr />
<?php
require_once 'prime_factorization.php';

define('ENCODING', 'UTF-8', true);

$givenNumber = $_POST['given-number'];

if (isset($givenNumber) ) {
    if (!mb_check_encoding($givenNumber, constant('ENCODING'))) {
        echo '<p class="error_msg">Invalid character encoding given.</p>';
    } elseif (empty($givenNumber)) {
        echo '<p class="error_msg">No number given.</p>';
    } elseif (!is_numeric($givenNumber)) {
        echo '<p class="error_msg">Set the numeric number.</p>';
    } elseif (PHP_INT_MAX < $givenNumber) {
        echo '<p class="error_msg">Oh, cannot handle such a huge number accurately...</p>';
    } else {
        set_time_limit(200);
        $time_start = microtime(true);

        $pf = new PrimeFactorization();
        $resultList = $pf->getResultList( (int) $givenNumber);
        $viewList   = $pf->getFormattedList($resultList);

        echo '<p>' . escape($givenNumber) . ' = ' . escape(implode(' * ', $viewList)) . '</p>';

        $time_end = microtime(true);
        $time = $time_end - $time_start;

        echo "Did nothing in $time seconds\n";
    }
}

function escape($str) {
    return htmlspecialchars($str, ENT_QUOTES, constant('ENCODING'));
}
?>
</div>
</body>
</html>
