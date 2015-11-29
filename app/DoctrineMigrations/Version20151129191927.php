<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151129191927 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE FormProd DROP FOREIGN KEY FK_E4A4568CDD7ADDD');
        $this->addSql('ALTER TABLE UserProd DROP FOREIGN KEY FK_4A8DA48EDD7ADDD');
        $this->addSql('ALTER TABLE UserProd DROP FOREIGN KEY FK_4A8DA48EA42E69AB');
        $this->addSql('DROP TABLE FormProd');
        $this->addSql('DROP TABLE TestProduct');
        $this->addSql('DROP TABLE UserForm');
        $this->addSql('DROP TABLE UserProd');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE FormProd (id INT AUTO_INCREMENT NOT NULL, id_product INT NOT NULL, formVersion VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_E4A4568CDD7ADDD (id_product), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE TestProduct (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE UserForm (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE UserProd (id INT AUTO_INCREMENT NOT NULL, id_userform INT NOT NULL, id_product INT NOT NULL, INDEX IDX_4A8DA48EDD7ADDD (id_product), INDEX IDX_4A8DA48EA42E69AB (id_userform), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE FormProd ADD CONSTRAINT FK_E4A4568CDD7ADDD FOREIGN KEY (id_product) REFERENCES TestProduct (id)');
        $this->addSql('ALTER TABLE UserProd ADD CONSTRAINT FK_4A8DA48EA42E69AB FOREIGN KEY (id_userform) REFERENCES UserForm (id)');
        $this->addSql('ALTER TABLE UserProd ADD CONSTRAINT FK_4A8DA48EDD7ADDD FOREIGN KEY (id_product) REFERENCES TestProduct (id)');
    }
}
