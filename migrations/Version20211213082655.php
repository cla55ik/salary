<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213082655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE money_move ADD money_owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE money_move ADD money_payer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947F9F5692D7 FOREIGN KEY (money_owner_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947F20102A87 FOREIGN KEY (money_payer_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B2947F9F5692D7 ON money_move (money_owner_id)');
        $this->addSql('CREATE INDEX IDX_B2947F20102A87 ON money_move (money_payer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947F9F5692D7');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947F20102A87');
        $this->addSql('DROP INDEX IDX_B2947F9F5692D7');
        $this->addSql('DROP INDEX IDX_B2947F20102A87');
        $this->addSql('ALTER TABLE money_move DROP money_owner_id');
        $this->addSql('ALTER TABLE money_move DROP money_payer_id');
    }
}
