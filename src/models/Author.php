<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property int $created
 * @property int $updated
 * @property Book[] $books
 */
class Author extends ActiveRecord
{
    public static function tableName()
    {
        return 'author';
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class, ['author_id' => 'id']);
    }
}
