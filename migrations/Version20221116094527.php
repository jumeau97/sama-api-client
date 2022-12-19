<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116094527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE subscribe_option (id INT AUTO_INCREMENT NOT NULL, subscribe_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_45743697C72A4771 (subscribe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subscribe_option ADD CONSTRAINT FK_45743697C72A4771 FOREIGN KEY (subscribe_id) REFERENCES subscribe (id)');
        $this->addSql('ALTER TABLE subscribe_options DROP FOREIGN KEY FK_7520BDDAC72A4771');
        $this->addSql('DROP TABLE subscribe_options');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE subscribe_options (id INT AUTO_INCREMENT NOT NULL, subscribe_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_7520BDDAC72A4771 (subscribe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE subscribe_options ADD CONSTRAINT FK_7520BDDAC72A4771 FOREIGN KEY (subscribe_id) REFERENCES subscribe (id)');
        $this->addSql('ALTER TABLE subscribe_option DROP FOREIGN KEY FK_45743697C72A4771');
        $this->addSql('DROP TABLE subscribe_option');
    }
}
