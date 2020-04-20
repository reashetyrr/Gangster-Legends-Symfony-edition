<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200417121454 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628D06D9650');
        $this->addSql('DROP INDEX IDX_C242628D06D9650 ON module');
        $this->addSql('ALTER TABLE module ADD extends VARCHAR(255) DEFAULT NULL, DROP extends_id');
        $this->addSql('ALTER TABLE theme CHANGE assets assets LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\'');
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE module ADD extends_id INT DEFAULT NULL, DROP extends');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628D06D9650 FOREIGN KEY (extends_id) REFERENCES module (id)');
        $this->addSql('CREATE INDEX IDX_C242628D06D9650 ON module (extends_id)');
        $this->addSql('ALTER TABLE theme CHANGE assets assets LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:object)\'');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
