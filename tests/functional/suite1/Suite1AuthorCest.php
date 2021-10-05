<?php

use Codeception\Example;

/**
 * @covers \app\commands\AuthorController
 */
class Suite1AuthorCest
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
    public function testView(FunctionalTester $I, Example $example)
    {
        $I->runShellCommand(sprintf('php tests/bin/yii author/view %d', $example['id']));
    }

    /**
     * @return array
     */
    protected function authorProvider()
    {
        $result = [];
        for ($i = 1; $i <= 30; $i++) {
            $result[] = ['id' => $i];
        }

        return $result;
    }
}
