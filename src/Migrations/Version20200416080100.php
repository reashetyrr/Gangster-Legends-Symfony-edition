<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416080100 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gangs (id INT AUTO_INCREMENT NOT NULL, boss_id INT NOT NULL, underboss_id INT NOT NULL, name VARCHAR(120) NOT NULL, bank INT NOT NULL, info LONGTEXT NOT NULL, description LONGTEXT NOT NULL, location INT NOT NULL, level INT NOT NULL, UNIQUE INDEX UNIQ_CF53F7EA261FB672 (boss_id), UNIQUE INDEX UNIQ_CF53F7EA5E6012B5 (underboss_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gangs ADD CONSTRAINT FK_CF53F7EA261FB672 FOREIGN KEY (boss_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE gangs ADD CONSTRAINT FK_CF53F7EA5E6012B5 FOREIGN KEY (underboss_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE gangs');
        $this->addSql('DROP TABLE setting');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
