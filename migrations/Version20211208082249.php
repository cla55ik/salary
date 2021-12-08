<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208082249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contract_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contract (id INT NOT NULL, worker_employee_id INT DEFAULT NULL, is_done BOOLEAN NOT NULL, contract_num VARCHAR(255) NOT NULL, customer VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, deadline_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, period INT NOT NULL, pruduct_sum DOUBLE PRECISION NOT NULL, additional_sum DOUBLE PRECISION NOT NULL, product_work_sum DOUBLE PRECISION DEFAULT NULL, additional_work_sum DOUBLE PRECISION DEFAULT NULL, product_area DOUBLE PRECISION DEFAULT NULL, product_num INT DEFAULT NULL, slopes_length DOUBLE PRECISION DEFAULT NULL, slopes_width DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E98F2859458BED9B ON contract (worker_employee_id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859458BED9B FOREIGN KEY (worker_employee_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE contract_id_seq CASCADE');
        $this->addSql('DROP TABLE contract');
    }
}
