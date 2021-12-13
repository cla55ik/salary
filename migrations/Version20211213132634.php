<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213132634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract ADD manager_id INT NOT NULL');
        $this->addSql('ALTER TABLE contract ADD measuring_id INT NOT NULL');
        $this->addSql('ALTER TABLE contract ADD base_sum DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE contract ADD prepayment DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859783E3463 FOREIGN KEY (manager_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859B2EF1B7D FOREIGN KEY (measuring_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E98F2859783E3463 ON contract (manager_id)');
        $this->addSql('CREATE INDEX IDX_E98F2859B2EF1B7D ON contract (measuring_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contract DROP CONSTRAINT FK_E98F2859783E3463');
        $this->addSql('ALTER TABLE contract DROP CONSTRAINT FK_E98F2859B2EF1B7D');
        $this->addSql('DROP INDEX IDX_E98F2859783E3463');
        $this->addSql('DROP INDEX IDX_E98F2859B2EF1B7D');
        $this->addSql('ALTER TABLE contract DROP manager_id');
        $this->addSql('ALTER TABLE contract DROP measuring_id');
        $this->addSql('ALTER TABLE contract DROP base_sum');
        $this->addSql('ALTER TABLE contract DROP prepayment');
    }
}
