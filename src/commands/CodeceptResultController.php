<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

class CodeceptResultController extends Controller
{
    /**
     * The command "yii codecept-result/output"
     * @return int Exit code
     */
    public function actionOutput()
    {
        $path = '/var/www/test-performance/tests/_output/tests/result_paracept.xml';
        $xml = simplexml_load_file($path);

        $totalTime = 0;
        $tests = 0;
        $assertions = 0;
        $failures = 0;
        $errors = 0;
        foreach ($xml->testsuite as $testsuite) {
            $totalTime = $totalTime < $testsuite['time'] ? $testsuite['time'] : $totalTime;
            $tests += $testsuite['tests'];
            $assertions += $testsuite['assertions'];
            $failures += $testsuite['failures'];
            $errors += $testsuite['errors'];
            $this->stdout(sprintf(
                    "  suite:  %s sec : %s",
                    $testsuite['time'],
                    $testsuite['name']
                ) . PHP_EOL
            );

            foreach ($testsuite->testcase as $testcase) {
                $this->stdout(sprintf(
                        "    case %s : assertions %d : time %s sec :   %s",
                        $testcase['feature'],
                        $testcase['assertions'],
                        $testcase['time'],
                        $testcase['name']
                    ) . PHP_EOL
                );

                if (!empty($testcase->failure)) {
                    $this->stdout(sprintf(
                            "Failure: %s",
                            $testcase->failure
                        ) . PHP_EOL
                    );
                }
            }
        }
        $this->stdout("Total:" . PHP_EOL);
        $this->stdout(sprintf(
                "Time %s sec : Tests %d : Assertions %d : Failures %d : Errors %d",
                $totalTime,
                $tests,
                $assertions,
                $failures,
                $errors
            ) . PHP_EOL
        );

        return ExitCode::OK;
    }
}
