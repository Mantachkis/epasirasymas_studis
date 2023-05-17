<?php


namespace App\Http\Services;


class DataValidationService
{
    private $PASSPORT_NUMBER_LENGTH = 8;
    private $PERSON_CODE_LENGTH = 11;
    /**
     * Checks whether the name or surname may have been entered not fully uppercased
     * @param string $name
     * @return bool
     */
    public function checkIfNameOrSurnameNotFullyUpperFirst(string $name) : bool {
        $explodedName = explode(' ', $name);
        $validatedName = '';
        foreach($explodedName as $explName) {
            $validatedName .= $this->local_mb_ucfirst(mb_strtolower($explName, 'UTF-8')).' ';
        }
        return trim($name) === trim($validatedName);
    }

    /**
     * @param string $email
     * @return bool
     */
    public function isEmailFormatCorrect(?string $email) : bool {
        $validation = filter_var($email, FILTER_VALIDATE_EMAIL);
        return $email === $validation;
    }

    /**
     * @param string $passportNo
     * @return bool
     */
    public function isPassportNumberLengthCorrect(string $passportNo) : bool {
        return strlen($passportNo) == $this->PASSPORT_NUMBER_LENGTH;
    }

    /**
     * @param string $personCode
     * @return bool
     */
    public function isPersonCodeLengthCorrect(string $personCode) : bool {
        return strlen($personCode) == $this->PERSON_CODE_LENGTH;
    }

    /**
     * @param string $passportDate
     * @return bool
     */
    public function isPassportExpiryDateCorrect(string $passportDate) : bool {
        $explodedDate = explode('-', $passportDate); // expected format example 2020-02-20, so arr[0] should be year, then month, then day
        if(sizeof($explodedDate) < 2) return false; // incase the date is of bad format like year only or something like 202002
                return checkdate(trim($explodedDate[1]), trim($explodedDate[2]),trim($explodedDate[0]) );
        // return checkdate($explodedDate[1], $explodedDate[2], $explodedDate[0]);
    }

    /**
     * @param string $str
     * @return string
     */
    public function local_mb_ucfirst(string $str) : string {
        $replacedStr = mb_strtoupper($str, 'UTF-8');
        return mb_substr($replacedStr, 0, 1, 'UTF-8').mb_substr($str, 1, (strlen($str) - 1), 'UTF-8');
    }
}
