<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208123111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract ADD cost_product DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE contract ADD cost_additional DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE contract ADD cost_another DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE contract ADD cost_all DOUBLE PRECISION DEFAULT NULL');
//        $this->addSql('ALTER TABLE contract ALTER sum SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contract DROP cost_product');
        $this->addSql('ALTER TABLE contract DROP cost_additional');
        $this->addSql('ALTER TABLE contract DROP cost_another');
        $this->addSql('ALTER TABLE contract DROP cost_all');
        $this->addSql('ALTER TABLE contract ALTER sum DROP NOT NULL');
    }
}
