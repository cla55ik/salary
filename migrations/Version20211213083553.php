<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213083553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salary ADD contract_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salary ADD CONSTRAINT FK_9413BB712576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9413BB712576E0FD ON salary (contract_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE salary DROP CONSTRAINT FK_9413BB712576E0FD');
        $this->addSql('DROP INDEX IDX_9413BB712576E0FD');
        $this->addSql('ALTER TABLE salary DROP contract_id');
    }
}
