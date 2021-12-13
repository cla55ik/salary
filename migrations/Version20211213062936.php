<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213062936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE employees_post_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE employees_post (id INT NOT NULL, post VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE employees ADD employee_post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300CBC55523 FOREIGN KEY (employee_post_id) REFERENCES employees_post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_BA82C300CBC55523 ON employees (employee_post_id)');
        $this->addSql('ALTER TABLE money_move ADD money_move_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE money_move ADD CONSTRAINT FK_B2947F88F10E83 FOREIGN KEY (money_move_type_id) REFERENCES money_move_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B2947F88F10E83 ON money_move (money_move_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE employees DROP CONSTRAINT FK_BA82C300CBC55523');
        $this->addSql('DROP SEQUENCE employees_post_id_seq CASCADE');
        $this->addSql('DROP TABLE employees_post');
        $this->addSql('DROP INDEX IDX_BA82C300CBC55523');
        $this->addSql('ALTER TABLE employees DROP employee_post_id');
        $this->addSql('ALTER TABLE money_move DROP CONSTRAINT FK_B2947F88F10E83');
        $this->addSql('DROP INDEX IDX_B2947F88F10E83');
        $this->addSql('ALTER TABLE money_move DROP money_move_type_id');
    }
}
