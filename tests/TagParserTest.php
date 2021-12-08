<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserTest extends TestCase{

    protected $expected = ['PHP', 'C#', 'R', 'Python'];

    /**
     * @dataProvider tagsProvider
     */
    public function test_it_can_parse($input)
    {
        $result = TagParser::parse($input);
        $this->assertSame($this->expected, $result);
    }

    public function tagsProvider()
    {
        return [
            ['PHP,C#,R,Python'],
            ['PHP, C#, R, Python'],
            ['PHP|C#|R|Python'],
            ['PHP | C# | R | Python'],
            ['PHP ! C# ! R ! Python'],
        ];
    }
}