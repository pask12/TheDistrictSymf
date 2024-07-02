<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240701121056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD is_verified TINYINT(1) NOT NULL, DROP nom, DROP prenom, DROP telephone, DROP adresse, DROP cp, DROP ville, CHANGE email email VARCHAR(180) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON utilisateur (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD telephone VARCHAR(20) NOT NULL, ADD adresse VARCHAR(50) NOT NULL, ADD cp VARCHAR(20) NOT NULL, ADD ville VARCHAR(50) NOT NULL, DROP is_verified, CHANGE email email VARCHAR(50) NOT NULL, CHANGE roles roles VARCHAR(50) NOT NULL');
    }
}
