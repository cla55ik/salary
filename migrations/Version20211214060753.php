<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214060753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract ADD payment_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859DC058279 FOREIGN KEY (payment_type_id) REFERENCES payment_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E98F2859DC058279 ON contract (payment_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contract DROP CONSTRAINT FK_E98F2859DC058279');
        $this->addSql('DROP INDEX IDX_E98F2859DC058279');
        $this->addSql('ALTER TABLE contract DROP payment_type_id');
    }
}
