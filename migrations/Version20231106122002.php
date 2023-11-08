<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106122002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule ADD modele VARCHAR(255) NOT NULL, CHANGE modele_voiture marque VARCHAR(255) NOT NULL, CHANGE validite_contrle_tech validite_controle_tech DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule ADD modele_voiture VARCHAR(255) NOT NULL, DROP marque, DROP modele, CHANGE validite_controle_tech validite_contrle_tech DATE NOT NULL');
    }
}
