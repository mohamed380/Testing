<?php

namespace App\Exceptions;

class CannotCalcGradeException extends \Exception{

    protected $message = "You must answer all questions in order to calculate the quiz grad";

}