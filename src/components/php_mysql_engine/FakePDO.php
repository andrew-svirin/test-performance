<?php

namespace app\components\php_mysql_engine;

use Yii;

class FakePDO extends \Vimeo\MysqlEngine\Php7\FakePdo
{
    /**
     * @param string[]|null $options
     */
    public function __construct(string $dsn, string $username = '', string $passwd = '', array $options = null)
    {
        parent::__construct($dsn, $username, $passwd, $options ?? []);

        $this->prepare(file_get_contents(Yii::getAlias('@app/migrations/faked_db/db.sql')))->execute();
        $this->prepare(file_get_contents(Yii::getAlias('@app/migrations/faked_db/insert.sql')))->execute();
    }
}
