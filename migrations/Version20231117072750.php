<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231117072750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE effectue (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT DEFAULT NULL, trajet_id INT DEFAULT NULL, INDEX IDX_8FCB9C164A4A3511 (vehicule_id), UNIQUE INDEX UNIQ_8FCB9C16D12A823 (trajet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messagerie (id INT AUTO_INCREMENT NOT NULL, sujet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, date_heure DATETIME NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, num_afpa VARCHAR(255) NOT NULL, tel INT NOT NULL, num_rue SMALLINT NOT NULL, rue VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, debut_formation DATE NOT NULL, fin_formation DATE NOT NULL, date_naissance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE possession (id INT AUTO_INCREMENT NOT NULL, personne_id INT DEFAULT NULL, vehicule_id INT DEFAULT NULL, INDEX IDX_F9EE3F42A21BD112 (personne_id), UNIQUE INDEX UNIQ_F9EE3F424A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, trajet_id INT DEFAULT NULL, personne_id INT DEFAULT NULL, lundi TINYINT(1) NOT NULL, mardi TINYINT(1) NOT NULL, mercredi TINYINT(1) NOT NULL, jeudi TINYINT(1) NOT NULL, vendredi TINYINT(1) NOT NULL, INDEX IDX_42C84955D12A823 (trajet_id), INDEX IDX_42C84955A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trajet (id INT AUTO_INCREMENT NOT NULL, vers_afpa TINYINT(1) NOT NULL, num_rue SMALLINT NOT NULL, rue VARCHAR(255) NOT NULL, code_postal SMALLINT NOT NULL, ville VARCHAR(255) NOT NULL, date_fin DATE NOT NULL, date_debut DATE NOT NULL, heure_aller TIME NOT NULL, heure_retour TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, nb_place SMALLINT NOT NULL, validite_assurance DATE NOT NULL, validite_controle_tech DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE effectue ADD CONSTRAINT FK_8FCB9C164A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE effectue ADD CONSTRAINT FK_8FCB9C16D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id)');
        $this->addSql('ALTER TABLE possession ADD CONSTRAINT FK_F9EE3F42A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE possession ADD CONSTRAINT FK_F9EE3F424A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE effectue DROP FOREIGN KEY FK_8FCB9C164A4A3511');
        $this->addSql('ALTER TABLE effectue DROP FOREIGN KEY FK_8FCB9C16D12A823');
        $this->addSql('ALTER TABLE possession DROP FOREIGN KEY FK_F9EE3F42A21BD112');
        $this->addSql('ALTER TABLE possession DROP FOREIGN KEY FK_F9EE3F424A4A3511');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D12A823');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A21BD112');
        $this->addSql('DROP TABLE effectue');
        $this->addSql('DROP TABLE messagerie');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE possession');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
