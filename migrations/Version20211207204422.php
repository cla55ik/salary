<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207204422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE company_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE employees_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE money_move_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE salary_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE company (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE employees (id INT NOT NULL, name VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE money_move (id INT NOT NULL, pay_owner_id INT NOT NULL, pay_recipient_id INT DEFAULT NULL, salary_id INT DEFAULT NULL, sum DOUBLE PRECISION NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B2947F726C9006 ON money_move (pay_owner_id)');
        $this->addSql('CREATE INDEX IDX_B2947F30218111 ON money_move (pay_recipient_id)');
        $this->addSql('CREATE INDEX IDX_B2947FB0FDF16E ON money_move (salary_id)');
        $this->addSql('CREATE TABLE salary (id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947F726C9006 FOREIGN KEY (pay_owner_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947F30218111 FOREIGN KEY (pay_recipient_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947FB0FDF16E FOREIGN KEY (salary_id) REFERENCES salary (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947F726C9006');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947F30218111');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947FB0FDF16E');
        $this->addSql('DROP SEQUENCE company_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE employees_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE money_move_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE salary_id_seq CASCADE');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP TABLE money_move');
        $this->addSql('DROP TABLE salary');
    }
}
