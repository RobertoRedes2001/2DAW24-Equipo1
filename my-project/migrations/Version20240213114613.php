<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213114613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE edicion ADD tienda INT DEFAULT NULL');
        $this->addSql('ALTER TABLE edicion ADD CONSTRAINT FK_655F7739C0C6E53E FOREIGN KEY (tienda) REFERENCES tienda (tienda_cod)');
        $this->addSql('CREATE INDEX IDX_655F7739C0C6E53E ON edicion (tienda)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE edicion DROP FOREIGN KEY FK_655F7739C0C6E53E');
        $this->addSql('DROP INDEX IDX_655F7739C0C6E53E ON edicion');
        $this->addSql('ALTER TABLE edicion CHANGE tienda tienda_id INT DEFAULT NULL');
    }
}
