<?php

use yii\db\Migration;

class m170211_112423_week extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%week}}', [
            'id'               => $this->primaryKey()->notNull(),
            'date'             => $this->string()->notNull()->unique(),
            'tempMin'          => $this->string(3)->notNull(),
            'tempMax'          => $this->string(3)->notNull(),
            'simbForec'        => $this->string(5)->notNull(),
            'rainfall'         => $this->float(6)->notNull(),
            'windSpeedMax'     => $this->float(4)->notNull(),
            'windDirectionMax' => $this->string(2)->notNull(),
            'precipChance'     => $this->integer(3)->notNull(),
            'rainChance'       => $this->integer(3)->notNull(),
            'sunRise'          => $this->string(5)->notNull(),
            'sunSet'           => $this->string(5)->notNull(),
            'dayLength'        => $this->integer(4)->notNull(),
            'uvIndexMax'       => $this->string(2)->Null(),
            'averageCloud'     => $this->integer(3)->notNull(),
            'phaseMoon'        => $this->integer(3)->notNull(),
            'moonRise'         => $this->string(5)->notNull(),
            'moonSet'          => $this->string(5)->notNull()
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%week}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
