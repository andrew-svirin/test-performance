<?php

namespace Helper;

use Codeception\Scenario;

class YiiHelper extends \Codeception\Module
{
    public function runYiiCommand(string $cmd, Scenario $scenario = null)
    {
        $cli = $this->getModule('Cli');

        if (null === $scenario) {
            $yiiCmd = 'tests/bin/yii';
        } else {
            $env = $scenario->current('env');
            if ('env_21' === $env) {
                $yiiCmd = 'tests/bin/yii';
            } elseif ('env_22' === $env) {
                $yiiCmd = 'tests/bin/yii_clone_1';
            } elseif ('env_31' === $env) {
                $yiiCmd = 'tests/bin/yii';
            } elseif ('env_32' === $env) {
                $yiiCmd = 'tests/bin/yii_clone_2';
            } elseif ('env_virtual' === $env) {
                list($route, $params) = explode(' ', $cmd, 2);

                $result = \Yii::$app->runAction($route, !empty($params) ? explode(' ', $params) : []);
                $this->assertEquals(0, $result);
                return;
            } else {
                $yiiCmd = 'tests/bin/yii';
            }
        }

        $cli->runShellCommand(sprintf('php %s %s', $yiiCmd, $cmd));
    }
}
