<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20181202184348 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("
        INSERT INTO user(username, password, role) VALUES('user', '$2y$13\$g5LJT88mA/V4dO57BBldR.9f1.GG4YLpEbdUqWJW7kZRzrs7.6Z0C', 1),
                                                          ('manager', '$2y$13\$g5LJT88mA/V4dO57BBldR.9f1.GG4YLpEbdUqWJW7kZRzrs7.6Z0C', 2),
                                                          ('provider', '$2y$13\$g5LJT88mA/V4dO57BBldR.9f1.GG4YLpEbdUqWJW7kZRzrs7.6Z0C', 3),
                                                          ('director', '$2y$13\$g5LJT88mA/V4dO57BBldR.9f1.GG4YLpEbdUqWJW7kZRzrs7.6Z0C', 4);


        INSERT INTO user_types (type) VALUES('ROLE_ADMIN'), ('ROLE_MANAGER'), ('ROLE_PROVIDER'), ('ROLE_DIRECTOR');
       
    ");


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("
            DELETE FROM user WHERE username = 'user';
            DELETE FROM user WHERE username = 'manager';
            DELETE FROM user WHERE username = 'provider';
            DELETE FROM user WHERE username = 'director';
            DELETE FROM user_types WHERE type = 'ROLE_ADMIN';
            DELETE FROM user_types WHERE type = 'ROLE_MANAGER';
            DELETE FROM user_types WHERE type = 'ROLE_PROVIDER';
            DELETE FROM user_types WHERE type = 'ROLE_DIRECTOR';
        ");

    }
}
