<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210163118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract DROP CONSTRAINT fk_e98f2859458bed9b');
        $this->addSql('DROP INDEX uniq_e98f28593c6cfb71');
        $this->addSql('DROP INDEX idx_e98f2859458bed9b');
        $this->addSql('ALTER TABLE contract ADD sum_slope_work DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE contract ALTER contract_num DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER customer DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER address DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER created_at DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER deadline_at DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER period DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER product_sum DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER additional_sum DROP NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER sum DROP NOT NULL');
        $this->addSql('ALTER TABLE contract RENAME COLUMN worker_employee_id TO employee_worker_id');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28596EB0D274 FOREIGN KEY (employee_worker_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E98F28596EB0D274 ON contract (employee_worker_id)');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT fk_b2947f726c9006');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT fk_b2947f30218111');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT fk_b2947fb0fdf16e');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT fk_b2947f7fc21131');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT fk_b2947f88f10e83');
        $this->addSql('DROP INDEX idx_b2947f88f10e83');
        $this->addSql('DROP INDEX idx_b2947fb0fdf16e');
        $this->addSql('DROP INDEX idx_b2947f7fc21131');
        $this->addSql('DROP INDEX idx_b2947f30218111');
        $this->addSql('DROP INDEX idx_b2947f726c9006');
        $this->addSql('ALTER TABLE money_move DROP pay_owner_id');
        $this->addSql('ALTER TABLE money_move DROP pay_recipient_id');
        $this->addSql('ALTER TABLE money_move DROP salary_id');
        $this->addSql('ALTER TABLE money_move DROP purpose_id');
        $this->addSql('ALTER TABLE money_move DROP money_move_type_id');
        $this->addSql('ALTER TABLE salary ADD sum DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contract DROP CONSTRAINT FK_E98F28596EB0D274');
        $this->addSql('DROP INDEX IDX_E98F28596EB0D274');
        $this->addSql('ALTER TABLE contract DROP sum_slope_work');
        $this->addSql('ALTER TABLE contract ALTER contract_num SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER customer SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER address SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER created_at SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER deadline_at SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER period SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER product_sum SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER additional_sum SET NOT NULL');
        $this->addSql('ALTER TABLE contract ALTER sum SET NOT NULL');
        $this->addSql('ALTER TABLE contract RENAME COLUMN employee_worker_id TO worker_employee_id');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT fk_e98f2859458bed9b FOREIGN KEY (worker_employee_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_e98f28593c6cfb71 ON contract (product_num)');
        $this->addSql('CREATE INDEX idx_e98f2859458bed9b ON contract (worker_employee_id)');
        $this->addSql('ALTER TABLE money_move ADD pay_owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE money_move ADD pay_recipient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE money_move ADD salary_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE money_move ADD purpose_id INT NOT NULL');
        $this->addSql('ALTER TABLE money_move ADD money_move_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT fk_b2947f726c9006 FOREIGN KEY (pay_owner_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT fk_b2947f30218111 FOREIGN KEY (pay_recipient_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT fk_b2947fb0fdf16e FOREIGN KEY (salary_id) REFERENCES salary (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT fk_b2947f7fc21131 FOREIGN KEY (purpose_id) REFERENCES purpose (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT fk_b2947f88f10e83 FOREIGN KEY (money_move_type_id) REFERENCES money_move_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_b2947f88f10e83 ON money_move (money_move_type_id)');
        $this->addSql('CREATE INDEX idx_b2947fb0fdf16e ON money_move (salary_id)');
        $this->addSql('CREATE INDEX idx_b2947f7fc21131 ON money_move (purpose_id)');
        $this->addSql('CREATE INDEX idx_b2947f30218111 ON money_move (pay_recipient_id)');
        $this->addSql('CREATE INDEX idx_b2947f726c9006 ON money_move (pay_owner_id)');
        $this->addSql('ALTER TABLE salary DROP sum');
    }
}
