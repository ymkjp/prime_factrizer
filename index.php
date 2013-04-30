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

$givenNumber = $_POST['given-number'];

if (isset($givenNumber) && $givenNumber) {
    if (!is_numeric($givenNumber)) {
        echo '<p class="error_msg">Set the numeric number.</p>';
    } elseif (is_infinite($givenNumber)) {
        echo '<p class="error_msg">Oh, PHP cannot handle such a huge number...</p>';
    } else {
        $pf = new PrimeFactorization($givenNumber);
        $resultList = $pf->getResultList();
        $viewList   = $pf->getFormattedList($resultList);

        echo '<p>' . $givenNumber . ' = ' . implode(' * ', $viewList) . '</p>';
    }
}
?>
</div>
</body>
</html>
