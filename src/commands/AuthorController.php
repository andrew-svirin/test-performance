<?php

namespace app\commands;

use app\models\Author;
use yii\console\Controller;
use yii\console\ExitCode;

class AuthorController extends Controller
{
    /**
     * The command "yii author/view id"
     * @return int Exit code
     */
    public function actionView(int $id)
    {
        $author = Author::findOne($id);
        if (null == $author) {
            $this->stdout(sprintf('No Author %s', $id) . PHP_EOL);
            return ExitCode::OK;
        }
        $this->stdout('-------------Author------------' . PHP_EOL);
        $this->stdout(sprintf('Author Name: %s', $author->name) . PHP_EOL);
        $this->stdout('-------------------------------' . PHP_EOL);

        $books = $author->books;

        if (null == $books) {
            $this->stdout('------------No Books------------' . PHP_EOL);
        } else {
            $this->stdout('-------------Books-------------' . PHP_EOL);
            foreach ($books as $book) {
                $this->stdout(sprintf('Book Title: %s', $book->title) . PHP_EOL);
            }
            $this->stdout('-------------------------------' . PHP_EOL);
        }

        return ExitCode::OK;
    }
}
