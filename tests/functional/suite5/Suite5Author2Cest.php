<?php

use Codeception\Example;

/**
 * @covers \app\commands\AuthorController
 */
class Suite5Author2Cest
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
        $I->runShellCommand(sprintf('php tests/bin/yii_virtual author/view %d', $example['id']));
    }

    /**
     * @return array
     */
    protected function authorProvider()
    {
        $result = [];
        for ($i = 9; $i <= 16; $i++) {
            $result[] = ['id' => $i];
        }

        return $result;
    }
}
