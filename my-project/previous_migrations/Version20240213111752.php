<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213111752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usuario ADD tienda INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05DC0C6E53E FOREIGN KEY (tienda) REFERENCES tienda (tienda_cod)');
        $this->addSql('CREATE INDEX IDX_2265B05DC0C6E53E ON usuario (tienda)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05DC0C6E53E');
        $this->addSql('DROP INDEX IDX_2265B05DC0C6E53E ON usuario');
        $this->addSql('ALTER TABLE usuario DROP tienda');
    }
}
