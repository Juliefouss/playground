<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221150557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proposal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, name_area VARCHAR(255) NOT NULL, adress_area VARCHAR(255) NOT NULL, postal_area INT NOT NULL, description VARCHAR(255) NOT NULL, pmr VARCHAR(255) DEFAULT NULL, parking VARCHAR(255) DEFAULT NULL, restaurant VARCHAR(255) DEFAULT NULL, picnic VARCHAR(255) DEFAULT NULL, other_activites VARCHAR(255) DEFAULT NULL, access VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE proposal');
    }
}
