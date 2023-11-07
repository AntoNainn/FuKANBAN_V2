<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106134124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projets (id INT AUTO_INCREMENT NOT NULL, id_createur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, INDEX IDX_B454C1DB6BB0CC12 (id_createur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taches (id INT AUTO_INCREMENT NOT NULL, id_statut_id INT DEFAULT NULL, id_projet_id INT DEFAULT NULL, id_utilisateur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_echeance DATETIME NOT NULL, INDEX IDX_3BF2CD9876158423 (id_statut_id), INDEX IDX_3BF2CD9880F43E55 (id_projet_id), INDEX IDX_3BF2CD98C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_497B315EE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projets ADD CONSTRAINT FK_B454C1DB6BB0CC12 FOREIGN KEY (id_createur_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD9876158423 FOREIGN KEY (id_statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD9880F43E55 FOREIGN KEY (id_projet_id) REFERENCES projets (id)');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD98C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projets DROP FOREIGN KEY FK_B454C1DB6BB0CC12');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD9876158423');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD9880F43E55');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD98C6EE5C49');
        $this->addSql('DROP TABLE projets');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE taches');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
