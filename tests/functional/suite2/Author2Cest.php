<?php

use Codeception\Example;
use Codeception\Scenario;

/**
 * @covers \app\commands\AuthorController
 */
class Author2Cest
{
    public function _fixtures()
    {
        return [
            'author' => [
                'class' => tests\fixtures\AuthorFixture::class,
            ],
            'book' => [
                'class' => tests\fixtures\BookFixture::class,
            ],
        ];
    }

    /**
     * @dataProvider authorProvider
     */
    public function testView(FunctionalTester $I, Scenario $scenario, Example $example)
    {
        $I->runYiiCommand(sprintf('author/view %d', $example['id']), $scenario);
    }

    /**
     * @return array
     */
    protected function authorProvider()
    {
        $result = [];
        for ($i = 16; $i <= 30; $i++) {
            $result[] = ['id' => $i];
        }

        return $result;
    }
}
