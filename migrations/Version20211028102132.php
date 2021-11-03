<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211028102132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assistant (id INT AUTO_INCREMENT NOT NULL, depute_id INT NOT NULL, ass_nom VARCHAR(255) DEFAULT NULL, ass_prenom VARCHAR(255) DEFAULT NULL, date_nomination DATE NOT NULL, arrete_nomination VARCHAR(255) NOT NULL, date_abrogation DATE DEFAULT NULL, arrete_abrog VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) NOT NULL, observation LONGTEXT DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, INDEX IDX_C2997CD151A07B9C (depute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseiller (id INT AUTO_INCREMENT NOT NULL, deputes_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenoms VARCHAR(255) DEFAULT NULL, date_nomination DATE NOT NULL, arrete_nomin VARCHAR(255) NOT NULL, date_abrog DATE DEFAULT NULL, arrete_abrog VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, observation LONGTEXT DEFAULT NULL, INDEX IDX_18C69F971E99C231 (deputes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depute (id INT AUTO_INCREMENT NOT NULL, dep_nom VARCHAR(255) DEFAULT NULL, dep_prenom VARCHAR(255) DEFAULT NULL, dep_circo VARCHAR(255) NOT NULL, dep_decision VARCHAR(255) NOT NULL, dep_entite VARCHAR(255) NOT NULL, dep_num_arrete VARCHAR(255) NOT NULL, dep_photo VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, num VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3CFB37D0DC43AF6E (num), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dircab (id INT AUTO_INCREMENT NOT NULL, depute_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) DEFAULT NULL, date_nomin VARCHAR(255) NOT NULL, arrete_nomin VARCHAR(255) NOT NULL, date_abrog DATE DEFAULT NULL, arrete_abrog VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, observation LONGTEXT DEFAULT NULL, INDEX IDX_E278BE2F51A07B9C (depute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assistant ADD CONSTRAINT FK_C2997CD151A07B9C FOREIGN KEY (depute_id) REFERENCES depute (id)');
        $this->addSql('ALTER TABLE conseiller ADD CONSTRAINT FK_18C69F971E99C231 FOREIGN KEY (deputes_id) REFERENCES depute (id)');
        $this->addSql('ALTER TABLE dircab ADD CONSTRAINT FK_E278BE2F51A07B9C FOREIGN KEY (depute_id) REFERENCES depute (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assistant DROP FOREIGN KEY FK_C2997CD151A07B9C');
        $this->addSql('ALTER TABLE conseiller DROP FOREIGN KEY FK_18C69F971E99C231');
        $this->addSql('ALTER TABLE dircab DROP FOREIGN KEY FK_E278BE2F51A07B9C');
        $this->addSql('DROP TABLE assistant');
        $this->addSql('DROP TABLE conseiller');
        $this->addSql('DROP TABLE depute');
        $this->addSql('DROP TABLE dircab');
        $this->addSql('DROP TABLE user');
    }
}
