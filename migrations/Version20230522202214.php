<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522202214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE verification ADD folder_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE verification ADD CONSTRAINT FK_5AF1C50B162CB942 FOREIGN KEY (folder_id) REFERENCES folder (id)');
        $this->addSql('CREATE INDEX IDX_5AF1C50B162CB942 ON verification (folder_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE verification DROP FOREIGN KEY FK_5AF1C50B162CB942');
        $this->addSql('DROP INDEX IDX_5AF1C50B162CB942 ON verification');
        $this->addSql('ALTER TABLE verification DROP folder_id');
    }
}
