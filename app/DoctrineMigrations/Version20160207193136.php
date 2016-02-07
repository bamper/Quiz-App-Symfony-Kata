<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160207193136 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_feature (product_id INT NOT NULL, feature_id INT NOT NULL, INDEX IDX_CE0E6ED64584665A (product_id), INDEX IDX_CE0E6ED660E4B879 (feature_id), PRIMARY KEY(product_id, feature_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_feature ADD CONSTRAINT FK_CE0E6ED64584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_feature ADD CONSTRAINT FK_CE0E6ED660E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id)');
        $this->addSql('ALTER TABLE feature DROP FOREIGN KEY FK_1FD775664584665A');
        $this->addSql('DROP INDEX IDX_1FD775664584665A ON feature');
        $this->addSql('ALTER TABLE feature DROP product_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE product_feature');
        $this->addSql('ALTER TABLE feature ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE feature ADD CONSTRAINT FK_1FD775664584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_1FD775664584665A ON feature (product_id)');
    }
}
