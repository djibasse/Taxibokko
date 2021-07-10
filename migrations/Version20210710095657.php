<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210710095657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chauffeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, telephone INT NOT NULL, adresse VARCHAR(255) NOT NULL, identifiant VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, permis_de_conduire VARCHAR(255) NOT NULL, cin INT NOT NULL, note_totale INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, assurance VARCHAR(255) NOT NULL, visite_technique VARCHAR(255) NOT NULL, carte_grise VARCHAR(255) NOT NULL, pneu_de_secour VARCHAR(255) NOT NULL, materiel_de_secours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE chauffeur');
        $this->addSql('DROP TABLE voiture');
    }
}
