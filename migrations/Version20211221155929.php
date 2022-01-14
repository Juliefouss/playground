<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221155929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposal ADD gallery_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE594724E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BFE594724E7AF8F ON proposal (gallery_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE594724E7AF8F');
        $this->addSql('DROP INDEX UNIQ_BFE594724E7AF8F ON proposal');
        $this->addSql('ALTER TABLE proposal DROP gallery_id');
    }
}
