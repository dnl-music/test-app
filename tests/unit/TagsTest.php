<?php

namespace test\unit;

use Codeception\Test\Unit;
use services\TagsService;

class TagsTest extends Unit
{

    public $tester;

    public function testTagsArray()
    {
        $tags = (new TagsService())->getArticles(4);

        self::assertIsArray($tags, 'Test is array');
        self::assertEquals(6, count($tags), 'Count tags elements');
    }

}