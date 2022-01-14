<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220114142930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE area ADD age2 VARCHAR(255) NOT NULL, ADD age3 VARCHAR(255) NOT NULL, ADD age4 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE proposal ADD age2 VARCHAR(255) NOT NULL, ADD age3 VARCHAR(255) NOT NULL, ADD age4 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE area DROP age2, DROP age3, DROP age4');
        $this->addSql('ALTER TABLE proposal DROP age2, DROP age3, DROP age4');
    }
}
