<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209120636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract ALTER contract_num DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER customer DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER address DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER created_at DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER deadline_at DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER period DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER product_sum DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER additional_sum DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER sum DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contract ALTER contract_num SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER customer SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER address SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER created_at SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER deadline_at SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER period SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER product_sum SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER additional_sum SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER sum SET NOT NULL');
    }
}
