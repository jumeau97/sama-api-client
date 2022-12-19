<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116165549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', matricule VARCHAR(255) NOT NULL, num_attestation VARCHAR(255) NOT NULL, lycee VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, date_naissance_cenou VARCHAR(255) NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, pays_naiss VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, nompere VARCHAR(255) NOT NULL, prenompere VARCHAR(255) NOT NULL, nommere VARCHAR(255) NOT NULL, prenommere VARCHAR(255) NOT NULL, matricule_def VARCHAR(255) NOT NULL, annee_bac VARCHAR(255) NOT NULL, serie VARCHAR(255) NOT NULL, num_place VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, centre_bac VARCHAR(255) NOT NULL, ae VARCHAR(255) NOT NULL, adresseparent VARCHAR(255) NOT NULL, phone1 VARCHAR(255) NOT NULL, etablissement VARCHAR(255) NOT NULL, id_banq VARCHAR(255) NOT NULL, scolarite VARCHAR(255) NOT NULL, bac_mention VARCHAR(255) NOT NULL, moyenne_ecrit VARCHAR(255) NOT NULL, moyenne_anuelle VARCHAR(255) NOT NULL, moyenne_admission VARCHAR(255) NOT NULL, annee_naissance VARCHAR(255) NOT NULL, annee_def VARCHAR(255) NOT NULL, scolarite_new VARCHAR(255) NOT NULL, scolarite_new2 VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, inscriptibilite_age VARCHAR(255) NOT NULL, inscriptibilite_nationale VARCHAR(255) NOT NULL, inscriptibilite_generale VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE student');
    }
}
