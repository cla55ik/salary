<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213081600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE money_move ADD salary_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947FB0FDF16E FOREIGN KEY (salary_id) REFERENCES salary (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B2947FB0FDF16E ON money_move (salary_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947FB0FDF16E');
        $this->addSql('DROP INDEX IDX_B2947FB0FDF16E');
        $this->addSql('ALTER TABLE money_move DROP salary_id');
    }
}
