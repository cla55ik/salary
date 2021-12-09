<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209141816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salary ADD salary_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salary ADD employee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salary ADD CONSTRAINT FK_9413BB715248165F FOREIGN KEY (salary_type_id) REFERENCES salary_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE salary ADD CONSTRAINT FK_9413BB718C03F15C FOREIGN KEY (employee_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9413BB715248165F ON salary (salary_type_id)');
        $this->addSql('CREATE INDEX IDX_9413BB718C03F15C ON salary (employee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE salary DROP CONSTRAINT FK_9413BB715248165F');
        $this->addSql('ALTER TABLE salary DROP CONSTRAINT FK_9413BB718C03F15C');
        $this->addSql('DROP INDEX IDX_9413BB715248165F');
        $this->addSql('DROP INDEX IDX_9413BB718C03F15C');
        $this->addSql('ALTER TABLE salary DROP salary_type_id');
        $this->addSql('ALTER TABLE salary DROP employee_id');
    }
}
