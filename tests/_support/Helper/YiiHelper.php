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
            if ('env_1' === $scenario->current('env')) {
                $yiiCmd = 'tests/bin/yii';
            } elseif ('env_2' === $scenario->current('env')) {
                $yiiCmd = 'tests/bin/yii_clone_1';
            } else {
                $yiiCmd = 'tests/bin/yii';
            }
        }

        $cli->runShellCommand(sprintf('php %s %s', $yiiCmd, $cmd));
    }
}
