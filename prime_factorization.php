<?php
/*
 *
 *
 */
// 9223372036854775807
class PrimeFactorization {

    public function getResultList($givenNumber) {
        $i = 2;

        do {
            $remainder = $givenNumber % $i;

            if ($remainder === 0) {
                ++$answer[$i];
                $givenNumber /= $i;
            } elseif ($i % 2 === 0) {
                ++$i;
            } else {
                $i += 2;
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
