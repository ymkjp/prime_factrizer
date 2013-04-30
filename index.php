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
<input type="number" name="given-number" placeholder="Give an natural number" required autofocus/>
<input type="submit" />
</form><br />
<hr />
<?php
require_once 'prime_factorization.php';
require_once 'error_handler.php';

define('ENCODING', 'UTF-8', true);

$givenNumber = $_POST['given-number'];

if (isset($givenNumber) ) {
    if (hasNoError($givenNumber)) {
        set_time_limit(200);
        $time_start = microtime(true);

        $pf = new PrimeFactorization();
        $resultList = $pf->getResultList( (int) $givenNumber);
        $viewList   = $pf->getFormattedList($resultList);

        echo '<p class="result">' . escape($givenNumber) . ' = ' . escape(implode(' * ', $viewList)) . '</p>';

        $time_end = microtime(true);
        $time = $time_end - $time_start;

        echo "<p>It took $time seconds</p>";
    }
}

function escape($str) {
    return htmlspecialchars($str, ENT_QUOTES, constant('ENCODING'));
}
?>
</div>
</body>
</html>
