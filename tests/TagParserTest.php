<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserTest extends TestCase{

    /**
     * @dataProvider tagsProvider
     */
    public function test_it_can_parse($input, $expected)
    {
        $result = TagParser::parse($input);
        $this->assertSame($expected, $result);
    }

    public function tagsProvider()
    {
        return [
            ['PHP,C#,R,Python', ['PHP', 'C#', 'R', 'Python']],
            ['PHP, C#, R, Python', ['PHP', 'C#', 'R', 'Python']],
            ['PHP|C#|R|Python', ['PHP', 'C#', 'R', 'Python']],
            ['PHP | C# | R | Python', ['PHP', 'C#', 'R', 'Python']],
            ['PHP ! C# ! R ! Python', ['PHP', 'C#', 'R', 'Python']],

        ];
    }
}