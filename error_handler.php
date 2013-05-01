<?php
define('ERR_ENCODING',  '<p class="error_msg">Invalid character encoding given.</p>', true);
define('ERR_TOO_BIG',   '<p class="error_msg">Oh, cannot handle such a huge number accurately...<br /></p><p>Try <a href="http://www.numberempire.com/numberfactorizer.php">Online Factoring - Number Factorizer</a>', true);
define('ERR_ENCODING',  '<p class="error_msg">Invalid character encoding given.</p>', true);
define('ERR_ABOUT_0',   '<p class="error_msg">By definition, We cannot factorize 0 into prime factors.</p>', true);
define('ERR_ABOUT_1',   '<p class="error_msg">By definition, We cannot factorize 1 into prime factors.</p>', true);
define('ERR_EMPTY',     '<p class="error_msg">No number given.</p>', true);
define('ERR_NOT_NUM',   '<p class="error_msg">Set the numeric number.</p>', true);
define('ERR_MINUS',     '<p class="error_msg">Given expression is not an natural number.</p>', true);

function hasNoError($givenNumber) {
    if (!mb_check_encoding($givenNumber, constant('ENCODING'))) {
        echo ERR_ENCODING;
    } elseif (0 === (int) $givenNumber) {
        echo ERR_ABOUT_0;
    } elseif (1 === (int) $givenNumber) {
        echo ERR_ABOUT_1;
    } elseif (empty($givenNumber)) {
        echo ERR_EMPTY;
    } elseif (!is_numeric($givenNumber)) {
        echo ERR_NOT_NUM;
    } elseif (0 > (int) $givenNumber) {
        echo escape($givenNumber) . ERR_MINUS;
    } elseif (is_float($givenNumber + 0)) {
        echo ERR_TOO_BIG;
    } else {
        return true;
    }
}
