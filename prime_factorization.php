<?php
/*
 *
 *
 */
//9223372036854775807
class PrimeFactorization {

    private $_number;

    public function __construct($givenNumber) {
        $this->_number = $givenNumber;
    }

    public function getResultList() {
        $givenNumber = $this->_number;
        $i = 2;

        do {
            $remainder = $givenNumber % $i;

            if ($remainder === 0) {
                ++$answer[$i];
                $givenNumber /= $i;
            } else {
                ++$i;
            }

        } while ($givenNumber !== 1);

        return $answer;
    }

    public function getFormattedList($resultList) {
        foreach ($resultList as $base => $exponent) {
            $viewList[] = sprintf('%d^%d', $base, $exponent);
        }

        return $viewList;
    }
}
