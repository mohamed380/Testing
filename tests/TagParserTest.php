<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserTest extends TestCase{

    private $expected = ['PHP', 'C#', 'R', 'Python'];

    public function test_it_parse_comma_separeted_string()
    {
        $string = 'PHP,C#,R,Python';
        $result = TagParser::parse($string);

        $this->assertSame($this->expected, $result);
    }

    public function test_it_parse_space_comma_with_space_separeted_string()
    {
        $string = 'PHP, C#, R, Python';
        $result = TagParser::parse($string);

        $this->assertSame($this->expected, $result);
    }

    public function test_it_parse_pipe_seperated_string()
    {
        $string = 'PHP|C#|R|Python';
        $result = TagParser::parse($string);

        $this->assertSame($this->expected, $result);
    }

    public function test_it_parse_pipe_with_space_seperated_string()
    {
        $string = 'PHP | C# | R | Python';
        $result = TagParser::parse($string);

        $this->assertSame($this->expected, $result);
    }
}