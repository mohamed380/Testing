<?php
namespace App;

class Question{   

    protected $userAnswer;

    function __construct(protected string $question, protected string|int $answer)
    {
    }
    
    public function answer(string|int $answer)
    {
        $this->userAnswer = $answer;    
    }

    public function getUserAnswer() : string|int
    {
        return $this->userAnswer;
    }

    public function solved() : bool
    {
        return $this->answer == $this->userAnswer;
    }
    
}