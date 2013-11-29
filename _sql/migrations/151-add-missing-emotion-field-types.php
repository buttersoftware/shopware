<?php
class Migrations_Migration151 Extends Shopware\Components\Migrations\AbstractMigration
{
    public function up()
    {
        $sql = <<<'EOD'
            UPDATE  `s_library_component` SET  `x_type` =  'emotion-components-html-element' WHERE  `s_library_component`.`name` = 'HTML-Element';
            UPDATE  `s_library_component` SET  `x_type` =  'emotion-components-youtube' WHERE  `s_library_component`.`name` = 'Youtube-Video';

EOD;
        $this->addSql($sql);
    }
}
