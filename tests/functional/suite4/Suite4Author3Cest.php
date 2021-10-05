<?php

use Codeception\Example;
use Codeception\Scenario;

/**
 * @covers \app\commands\AuthorController
 */
class Suite4Author3Cest
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
        $I->runShellCommand(sprintf('php tests/bin/yii_virtual author/view %d', $example['id']));
    }

    /**
     * @return array
     */
    protected function authorProvider()
    {
        $result = [];
        for ($i = 17; $i <= 24; $i++) {
            $result[] = ['id' => $i];
        }

        return $result;
    }
}
