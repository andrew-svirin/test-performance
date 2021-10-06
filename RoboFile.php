<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/codeception/codeception/autoload.php';

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

    public function parallelSplitSuite2()
    {
        $this->taskSplitTestFilesByGroups(2)
            ->projectRoot('.')
            ->testsFrom('tests/functional/suite2')
            ->groupsTo('tests/_data/paracept_2')
            ->run();
    }

    public function parallelSplitSuite3()
    {
        $this->taskSplitTestFilesByGroups(2)
            ->projectRoot('.')
            ->testsFrom('tests/functional/suite3')
            ->groupsTo('tests/_data/paracept_3')
            ->run();
    }

    public function parallelSplitSuite5()
    {
        $this->taskSplitTestFilesByGroups(4)
            ->projectRoot('.')
            ->testsFrom('tests/functional/suite5')
            ->groupsTo('tests/_data/paracept_5')
            ->run();
    }

    public function parallelRunSuite2()
    {
        $parallel = $this->taskParallelExec();
        for ($i = 1; $i <= 2; $i++) {
            $parallel->process(
                $this->taskCodecept('./vendor/bin/codecept')
                    ->option('env', "env_2$i") // run with env env_*
                    ->option('group', "paracept_2$i") // run for groups paracept_*
                    ->option('xml', "tests/_log/result_2$i.xml") // provide xml report
            );
        }
        return $parallel->run();
    }

    public function parallelRunSuite3()
    {
        $parallel = $this->taskParallelExec();
        for ($i = 1; $i <= 2; $i++) {
            $parallel->process(
                $this->taskCodecept('./vendor/bin/codecept')
                    ->option('env', "env_3$i") // run with env env_*
                    ->option('group', "paracept_3$i") // run for groups paracept_*
                    ->option('xml', "tests/_log/result_3$i.xml") // provide xml report
            );
        }
        return $parallel->run();
    }

    public function parallelRunSuite5()
    {
        $parallel = $this->taskParallelExec();
        for ($i = 1; $i <= 4; $i++) {
            $parallel->process(
                $this->taskCodecept('./vendor/bin/codecept')
                    ->option('env', "env_virtual") // run with env env_virtual
                    ->option('group', "paracept_5$i") // run for groups paracept_*
                    ->option('xml', "tests/_log/result_5$i.xml") // provide xml report
            );
        }
        return $parallel->run();
    }

    public function parallelMergeResultsSuite2(): void
    {
        $merge = $this->taskMergeXmlReports();
        for ($i = 1; $i <= 2; $i++) {
            $merge->from(__DIR__ . "/tests/_output/tests/_log/result_2$i.xml");
        }
        $merge->into(__DIR__ . '/tests/_output/tests/result_paracept.xml')->run();
    }

    public function parallelMergeResultsSuite3(): void
    {
        $merge = $this->taskMergeXmlReports();
        for ($i = 1; $i <= 2; $i++) {
            $merge->from(__DIR__ . "/tests/_output/tests/_log/result_3$i.xml");
        }
        $merge->into(__DIR__ . '/tests/_output/tests/result_paracept.xml')->run();
    }

    public function parallelMergeResultsSuite5(): void
    {
        $merge = $this->taskMergeXmlReports();
        for ($i = 1; $i <= 4; $i++) {
            $merge->from(__DIR__ . "/tests/_output/tests/_log/result_5$i.xml");
        }
        $merge->into(__DIR__ . '/tests/_output/tests/result_paracept.xml')->run();
    }
}
