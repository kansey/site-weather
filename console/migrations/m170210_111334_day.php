<?php

use yii\db\Migration;

class m170210_111334_day extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%day}}', [
            'id'                 => $this->primaryKey()->notNull(),
            'date'               => $this->string()->notNull()->unique(),
            'tempAir'            => $this->string(3)->notNull(),
            'simbForec'          => $this->string(5)->notNull(),
            'tempFeel'           => $this->string(3)->notNull(),
            'rainfall'           => $this->float(6)->notNull(),
            'windSpeed'          => $this->float(4)->notNull(),
            'windDirection'      => $this->string(2)->notNull(),
            'relativeHumidity'   => $this->integer(3)->notNull(),
            'atmospherePressure' => $this->integer(4)->notNull(),
            'precipChance'       => $this->integer(3)->notNull(),
            'rainChance'         => $this->integer(3)->notNull(),
            'cloudiness'         => $this->integer(3)->notNull()
        ], $tableOptions);
    }

    public function down()
    {
            $this->dropTable('{{%day}}');
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
