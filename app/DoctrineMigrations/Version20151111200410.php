<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151111200410 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE FormProd ADD CONSTRAINT FK_E4A4568CDD7ADDD FOREIGN KEY (id_product) REFERENCES TestProduct (id)');
        $this->addSql('CREATE INDEX IDX_E4A4568CDD7ADDD ON FormProd (id_product)');
        $this->addSql('ALTER TABLE UserProd ADD CONSTRAINT FK_4A8DA48EDD7ADDD FOREIGN KEY (id_product) REFERENCES TestProduct (id)');
        $this->addSql('ALTER TABLE UserProd ADD CONSTRAINT FK_4A8DA48EA42E69AB FOREIGN KEY (id_userform) REFERENCES UserForm (id)');
        $this->addSql('CREATE INDEX IDX_4A8DA48EDD7ADDD ON UserProd (id_product)');
        $this->addSql('CREATE INDEX IDX_4A8DA48EA42E69AB ON UserProd (id_userform)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE FormProd DROP FOREIGN KEY FK_E4A4568CDD7ADDD');
        $this->addSql('DROP INDEX IDX_E4A4568CDD7ADDD ON FormProd');
        $this->addSql('ALTER TABLE UserProd DROP FOREIGN KEY FK_4A8DA48EDD7ADDD');
        $this->addSql('ALTER TABLE UserProd DROP FOREIGN KEY FK_4A8DA48EA42E69AB');
        $this->addSql('DROP INDEX IDX_4A8DA48EDD7ADDD ON UserProd');
        $this->addSql('DROP INDEX IDX_4A8DA48EA42E69AB ON UserProd');
    }
}
