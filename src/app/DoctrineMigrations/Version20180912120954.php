<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180912120954 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("
            DROP TABLE IF EXISTS e_order;
            CREATE TABLE e_order (
                id int(6) AUTO_INCREMENT PRIMARY KEY,
                id_user int(6) NOT NULL,
                status varchar(255) NOT NULL,
                time TIMESTAMP NOT NULL
            );
            
            DROP TABLE IF EXISTS user;
            CREATE TABLE user (
                id int(6) AUTO_INCREMENT PRIMARY KEY,
                username varchar(255) NOT NULL,
                password varchar(255) NOT NULL,
                role varchar(255) NOT NULL
            );
            
            DROP TABLE IF EXISTS user_types;
            CREATE TABLE user_types (
                id int(6) AUTO_INCREMENT PRIMARY KEY,
                type varchar(25) NOT NULL
            );
            
            DROP TABLE IF EXISTS good;
            CREATE TABLE good (
                id int(6) AUTO_INCREMENT PRIMARY KEY,
                name varchar(255) NOT NULL,
                price varchar(255) NOT NULL,
                amount int(6) NOT NULL
            );
            
            DROP TABLE IF EXISTS order_goods;
            CREATE TABLE order_goods (
                id int(6) AUTO_INCREMENT PRIMARY KEY,
                id_order int(6) NOT NULL,
                id_good int(6) NOT NULL
            );
            
            DROP TABLE IF EXISTS user_goods;
            CREATE TABLE user_goods (
                id int(6) AUTO_INCREMENT PRIMARY KEY,
                id_user int(6) NOT NULL,
                id_good int(6) NOT NULL
            );

            ALTER TABLE e_order ADD CONSTRAINT e_order_fk0 FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE;

            ALTER TABLE order_goods ADD CONSTRAINT order_goods_fk0 FOREIGN KEY (id_order) REFERENCES e_order(id) ON DELETE CASCADE;
            ALTER TABLE order_goods ADD CONSTRAINT order_goods_fk1 FOREIGN KEY (id_good) REFERENCES good(id);

            ALTER TABLE user_goods ADD CONSTRAINT user_goods_fk0 FOREIGN KEY (id_user) REFERENCES user(id);
            ALTER TABLE user_goods ADD CONSTRAINT user_goods_fk1 FOREIGN KEY (id_good) REFERENCES good(id);

            ALTER TABLE order_goods ADD CONSTRAINT uq_og UNIQUE(id_good, id_order);
            "
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("
        ALTER TABLE e_order DROP FOREIGN KEY e_order_fk0;
        ALTER TABLE order_goods DROP FOREIGN KEY order_goods_fk0;
        ALTER TABLE order_goods DROP FOREIGN KEY order_goods_fk1;
        ALTER TABLE user_goods DROP FOREIGN KEY user_goods_fk0;
        ALTER TABLE user_goods DROP FOREIGN KEY user_goods_fk1;

        DROP TABLE e_order;
        DROP TABLE user;
        DROP TABLE user_types;
        DROP TABLE good;
        DROP TABLE order_goods;
        DROP TABLE user_goods;
        ");
    }
}
