<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213112126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE noticia ADD tienda INT DEFAULT NULL');
        $this->addSql('ALTER TABLE noticia ADD CONSTRAINT FK_31205F96C0C6E53E FOREIGN KEY (tienda) REFERENCES tienda (tienda_cod)');
        $this->addSql('CREATE INDEX IDX_31205F96C0C6E53E ON noticia (tienda)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE noticia DROP FOREIGN KEY FK_31205F96C0C6E53E');
        $this->addSql('DROP INDEX IDX_31205F96C0C6E53E ON noticia');
        $this->addSql('ALTER TABLE noticia DROP tienda');
    }
}
