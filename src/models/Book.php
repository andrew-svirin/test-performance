<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property int $created
 * @property int $updated
 */
class Book extends ActiveRecord
{
    public static function tableName()
    {
        return 'book';
    }
}
