<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ . '/vendor/codeception/codeception/autoload.php';
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 * @see https://codeception.com/docs/12-ParallelExecution
 */
class RoboFile extends \Robo\Tasks
{
    use Codeception\Task\Merger\ReportMerger;
    use Codeception\Task\Splitter\TestsSplitterTrait;

    public function parallelSplitTests()
    {
        $this->taskSplitTestFilesByGroups(2)
            ->projectRoot('.')
            ->testsFrom('tests/functional/suite2')
            ->groupsTo('tests/_data/paracept_')
            ->run();
    }

    public function parallelRun()
    {
        $parallel = $this->taskParallelExec();
        for ($i = 1; $i <= 2; $i++) {
            $parallel->process(
                $this->taskCodecept('./vendor/bin/codecept')
                    ->option('env', "env_$i") // run with env env_*
                    ->option('group', "paracept_$i") // run for groups paracept_*
                    ->option('xml', "tests/_log/result_$i.xml") // provide xml report
            );
        }
        return $parallel->run();
    }

    public function parallelMergeResults(): void
    {
        $merge = $this->taskMergeXmlReports();
        for ($i = 1; $i <= 2; $i++) {
            $merge->from(__DIR__ . "/tests/_output/tests/_log/result_$i.xml");
        }
        $merge->into(__DIR__ . '/tests/_output/tests/result_paracept.xml')->run();
    }
}
