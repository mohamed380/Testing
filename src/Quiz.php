<?php
namespace App;

use App\Exceptions\CannotCalcGradeException;

class Quiz{

    public array $questions;
    protected int $nextQuestionPointer = -1;

    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;   
        $this->nextQuestionPointer++; 
    }

    public function questions() : array
    {
        return $this->questions;
    }

    public function nextQuestion() : Question
    {
       return $this->questions[$this->nextQuestionPointer--];
    }

    public function grade() : int | CannotCalcGradeException
    {
        if($this->nextQuestionPointer != -1){
            throw new CannotCalcGradeException();
        }

        $rightQuestions = array_filter($this->questions,function($question){
            return $question->solved();
        });

        return ( count($rightQuestions) / count($this->questions) ) * 100;
    }
}