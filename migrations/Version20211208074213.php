<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208074213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT fk_b2947f37814ac4');
        $this->addSql('DROP INDEX idx_b2947f37814ac4');
        $this->addSql('ALTER TABLE money_move DROP move_type_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE money_move ADD move_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT fk_b2947f37814ac4 FOREIGN KEY (move_type_id) REFERENCES money_move_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_b2947f37814ac4 ON money_move (move_type_id)');
    }
}
