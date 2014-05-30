<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140530083150 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP INDEX professore_translation_idx ON professore_translations");
        $this->addSql("ALTER TABLE professore_translations ADD object_id INT DEFAULT NULL, DROP object_class, DROP foreign_key");
        $this->addSql("ALTER TABLE professore_translations ADD CONSTRAINT FK_F6C15A99232D562B FOREIGN KEY (object_id) REFERENCES Professore (id) ON DELETE CASCADE");
        $this->addSql("CREATE INDEX IDX_F6C15A99232D562B ON professore_translations (object_id)");
        $this->addSql("CREATE UNIQUE INDEX lookup_unique_idx ON professore_translations (locale, object_id, field)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE professore_translations DROP FOREIGN KEY FK_F6C15A99232D562B");
        $this->addSql("DROP INDEX IDX_F6C15A99232D562B ON professore_translations");
        $this->addSql("DROP INDEX lookup_unique_idx ON professore_translations");
        $this->addSql("ALTER TABLE professore_translations ADD object_class VARCHAR(255) NOT NULL, ADD foreign_key VARCHAR(64) NOT NULL, DROP object_id");
        $this->addSql("CREATE INDEX professore_translation_idx ON professore_translations (locale, object_class, field, foreign_key)");
    }
}
