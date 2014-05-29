<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140529102205 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("
            CREATE TABLE Amministratore
            (id INT AUTO_INCREMENT NOT NULL,
            nome VARCHAR(128) NOT NULL,
            cognome VARCHAR(128) NOT NULL,
            email VARCHAR(128) NOT NULL,
            PRIMARY KEY(id)) DEFAULT
            CHARACTER SET utf8
            COLLATE utf8_unicode_ci ENGINE = InnoDB
            ");
        $this->addSql("
        CREATE TABLE Professore
        (id INT AUTO_INCREMENT NOT NULL,
        nome VARCHAR(255) NOT NULL,
        cognome VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        immagine VARCHAR(255) DEFAULT NULL,
        biografia LONGTEXT DEFAULT NULL,
        PRIMARY KEY(id)) DEFAULT
        CHARACTER SET utf8
        COLLATE utf8_unicode_ci ENGINE = InnoDB");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE Amministratore");
        $this->addSql("DROP TABLE Professore");
    }
}
