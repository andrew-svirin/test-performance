<?php

namespace tests\fixtures;

use yii\test\ActiveFixture;

class BookFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Book';
    public $depends = [
        'tests\fixtures\AuthorFixture',
    ];
}
