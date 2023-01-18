<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230118121822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demands (id INT AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, type VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, about VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, status VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX emp_no (emp_no), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE departments (dept_no CHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dept_name VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, roi_url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX dept_name (dept_name), PRIMARY KEY(dept_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dept_emp (emp_no INT NOT NULL, dept_no CHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, from_date DATE NOT NULL, to_date DATE NOT NULL, INDEX dept_no (dept_no), INDEX emp_no (emp_no), PRIMARY KEY(emp_no, dept_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dept_manager (emp_no INT NOT NULL, dept_no CHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, from_date DATE NOT NULL, to_date DATE NOT NULL, INDEX dept_no (dept_no), INDEX IDX_C14AA78EA2F57F47 (emp_no), PRIMARY KEY(emp_no, dept_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dept_title (dept_no CHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, title_no INT NOT NULL, INDEX dept_no (dept_no), INDEX title_no (title_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE employees (emp_no INT AUTO_INCREMENT NOT NULL, birth_date DATE NOT NULL, first_name VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, last_name VARCHAR(16) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, gender VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, hire_date DATE NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, roles LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'["ROLE_USER"]\' NOT NULL COLLATE `utf8mb4_bin`, is_verified TINYINT(1) DEFAULT 0 NOT NULL, PRIMARY KEY(emp_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE emp_title (emp_no INT NOT NULL, title_no INT NOT NULL, from_date DATE NOT NULL, to_date DATE DEFAULT NULL, INDEX title_no (title_no), INDEX IDX_47B78050A2F57F47 (emp_no), PRIMARY KEY(emp_no, title_no, from_date)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE links (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE partners (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, logo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE salaries (id INT AUTO_INCREMENT NOT NULL, emp_no INT NOT NULL, salary INT NOT NULL, from_date DATE NOT NULL, to_date DATE NOT NULL, UNIQUE INDEX emp_no (emp_no, from_date), INDEX IDX_E6EEB84BA2F57F47 (emp_no), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE titles (title_no INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(title_no)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE demands ADD CONSTRAINT demands_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT dept_emp_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_emp ADD CONSTRAINT dept_emp_ibfk_2 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT dept_manager_ibfk_2 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_manager ADD CONSTRAINT dept_manager_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_title ADD CONSTRAINT dept_title_ibfk_3 FOREIGN KEY (title_no) REFERENCES titles (title_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_title ADD CONSTRAINT dept_title_ibfk_1 FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE dept_title ADD CONSTRAINT dept_title_ibfk_2 FOREIGN KEY (title_no) REFERENCES titles (title_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE emp_title ADD CONSTRAINT emp_title_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE emp_title ADD CONSTRAINT emp_title_ibfk_2 FOREIGN KEY (title_no) REFERENCES titles (title_no) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT salaries_ibfk_1 FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON UPDATE CASCADE');

        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demands DROP FOREIGN KEY demands_ibfk_1');
        $this->addSql('ALTER TABLE dept_emp DROP FOREIGN KEY dept_emp_ibfk_1');
        $this->addSql('ALTER TABLE dept_emp DROP FOREIGN KEY dept_emp_ibfk_2');
        $this->addSql('ALTER TABLE dept_manager DROP FOREIGN KEY dept_manager_ibfk_2');
        $this->addSql('ALTER TABLE dept_manager DROP FOREIGN KEY dept_manager_ibfk_1');
        $this->addSql('ALTER TABLE dept_title DROP FOREIGN KEY dept_title_ibfk_3');
        $this->addSql('ALTER TABLE dept_title DROP FOREIGN KEY dept_title_ibfk_1');
        $this->addSql('ALTER TABLE dept_title DROP FOREIGN KEY dept_title_ibfk_2');
        $this->addSql('ALTER TABLE emp_title DROP FOREIGN KEY emp_title_ibfk_1');
        $this->addSql('ALTER TABLE emp_title DROP FOREIGN KEY emp_title_ibfk_2');
        $this->addSql('ALTER TABLE salaries DROP FOREIGN KEY salaries_ibfk_1');
        $this->addSql('DROP TABLE demands');
        $this->addSql('DROP TABLE departments');
        $this->addSql('DROP TABLE dept_emp');
        $this->addSql('DROP TABLE dept_manager');
        $this->addSql('DROP TABLE dept_title');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP TABLE emp_title');
        $this->addSql('DROP TABLE links');
        $this->addSql('DROP TABLE partners');
        $this->addSql('DROP TABLE salaries');
        $this->addSql('DROP TABLE titles');

        $this->addSql('DROP TABLE messenger_messages');
    }
}
