<?php

namespace app\components\php_mysql_engine;

class FakePDO extends \Vimeo\MysqlEngine\Php7\FakePdo
{
    /**
     * @param string[]|null $options
     */
    public function __construct(string $dsn, string $username = '', string $passwd = '', array $options = null)
    {
        parent::__construct($dsn, $username, $passwd, $options ?? []);

        $dbPath = \Yii::getAlias('@app/migrations/faked_db/db.sql');
        $this->prepare(file_get_contents($dbPath))->execute();
    }
}
