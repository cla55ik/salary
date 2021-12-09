<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209113005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contract_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE money_move_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE purpose_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE salary_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contract (id INT NOT NULL, worker_employee_id INT DEFAULT NULL, is_done BOOLEAN NOT NULL, contract_num VARCHAR(255) NOT NULL, customer VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, deadline_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, period INT NOT NULL, product_sum DOUBLE PRECISION NOT NULL, additional_sum DOUBLE PRECISION NOT NULL, product_work_sum DOUBLE PRECISION DEFAULT NULL, additional_work_sum DOUBLE PRECISION DEFAULT NULL, product_area DOUBLE PRECISION DEFAULT NULL, product_num INT DEFAULT NULL, slopes_length DOUBLE PRECISION DEFAULT NULL, slopes_width DOUBLE PRECISION DEFAULT NULL, sum DOUBLE PRECISION NOT NULL, cost_product DOUBLE PRECISION DEFAULT NULL, cost_additional DOUBLE PRECISION DEFAULT NULL, cost_another DOUBLE PRECISION DEFAULT NULL, cost_all DOUBLE PRECISION DEFAULT NULL, earning DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E98F28593C6CFB71 ON contract (product_num)');
        $this->addSql('CREATE INDEX IDX_E98F2859458BED9B ON contract (worker_employee_id)');
        $this->addSql('CREATE TABLE money_move_type (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE purpose (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE salary_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F2859458BED9B FOREIGN KEY (worker_employee_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD purpose_id INT NOT NULL');
        $this->addSql('ALTER TABLE money_move ADD money_move_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947F7FC21131 FOREIGN KEY (purpose_id) REFERENCES purpose (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947F88F10E83 FOREIGN KEY (money_move_type_id) REFERENCES money_move_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B2947F7FC21131 ON money_move (purpose_id)');
        $this->addSql('CREATE INDEX IDX_B2947F88F10E83 ON money_move (money_move_type_id)');
        $this->addSql('ALTER TABLE salary ADD employee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salary ADD salary_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salary ADD CONSTRAINT FK_9413BB718C03F15C FOREIGN KEY (employee_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE salary ADD CONSTRAINT FK_9413BB715248165F FOREIGN KEY (salary_type_id) REFERENCES salary_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9413BB718C03F15C ON salary (employee_id)');
        $this->addSql('CREATE INDEX IDX_9413BB715248165F ON salary (salary_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947F88F10E83');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947F7FC21131');
        $this->addSql('ALTER TABLE salary DROP CONSTRAINT FK_9413BB715248165F');
        $this->addSql('DROP SEQUENCE contract_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE money_move_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE purpose_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE salary_type_id_seq CASCADE');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP TABLE money_move_type');
        $this->addSql('DROP TABLE purpose');
        $this->addSql('DROP TABLE salary_type');
        $this->addSql('DROP INDEX IDX_B2947F7FC21131');
        $this->addSql('DROP INDEX IDX_B2947F88F10E83');
        $this->addSql('ALTER TABLE money_move DROP purpose_id');
        $this->addSql('ALTER TABLE money_move DROP money_move_type_id');
        $this->addSql('ALTER TABLE salary DROP CONSTRAINT FK_9413BB718C03F15C');
        $this->addSql('DROP INDEX IDX_9413BB718C03F15C');
        $this->addSql('DROP INDEX IDX_9413BB715248165F');
        $this->addSql('ALTER TABLE salary DROP employee_id');
        $this->addSql('ALTER TABLE salary DROP salary_type_id');
    }
}
