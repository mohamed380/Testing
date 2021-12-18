<?php

namespace Tests;

use App\{Quiz, Question};
use PHPUnit\Framework\TestCase;
use App\Exceptions\CannotCalcGradeException;

class QuizTest extends TestCase{

    /** @test */
    public function can_build_quiz()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question(" 2 + 2  =", 4));

        $this->assertCount(1, $quiz->questions());
    }

    /** @test */
    public function can_answer_question()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question(" 2 + 2  =", 4));

        $question = $quiz->nextQuestion();
        $question->answer(4);

        $this->assertEquals(4, $question->getUserAnswer());
    }
    
    /** @test*/ 
    public function can_calculate_grad(){
        $quiz = new Quiz();

        $quiz->addQuestion(new Question(" 2 + 2  =", 4));
        $quiz->addQuestion(new Question(" 2 + 2  =", 5));
        $quiz->addQuestion(new Question(" 2 + 2  =", 5));
        $question = $quiz->nextQuestion();
        $question->answer(4);
        $question = $quiz->nextQuestion();
        $question->answer(4);
        $question = $quiz->nextQuestion();
        $question->answer(4);
        $this->assertEquals(33, $quiz->grade());
    }

    /** @test*/ 
    public function cannot_graded_until_all_questions_have_been_answered(){
        $quiz = new Quiz();

        $quiz->addQuestion(new Question(" 2 + 2  =", 4));
        $quiz->addQuestion(new Question(" 2 + 2  =", 5));
        $quiz->addQuestion(new Question(" 2 + 2  =", 5));
        $question = $quiz->nextQuestion();
        $question->answer(4);
        $this->expectException(CannotCalcGradeException::class);
        $quiz->grade();
    }

}