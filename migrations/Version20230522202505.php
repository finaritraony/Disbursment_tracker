<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522202505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file ADD folder_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610162CB942 FOREIGN KEY (folder_id) REFERENCES folder (id)');
        $this->addSql('CREATE INDEX IDX_8C9F3610162CB942 ON file (folder_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610162CB942');
        $this->addSql('DROP INDEX IDX_8C9F3610162CB942 ON file');
        $this->addSql('ALTER TABLE file DROP folder_id');
    }
}
