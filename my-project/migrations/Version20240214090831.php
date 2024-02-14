<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214090831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carta_edicion (id INT AUTO_INCREMENT NOT NULL, carta_id INT DEFAULT NULL, edicion_id INT DEFAULT NULL, INDEX IDX_697BC26F46A559E1 (carta_id), INDEX IDX_697BC26FD651B81E (edicion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carta_edicion ADD CONSTRAINT FK_697BC26F46A559E1 FOREIGN KEY (carta_id) REFERENCES carta (carta_cod)');
        $this->addSql('ALTER TABLE carta_edicion ADD CONSTRAINT FK_697BC26FD651B81E FOREIGN KEY (edicion_id) REFERENCES edicion (edicion_cod)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carta_edicion DROP FOREIGN KEY FK_697BC26F46A559E1');
        $this->addSql('ALTER TABLE carta_edicion DROP FOREIGN KEY FK_697BC26FD651B81E');
        $this->addSql('DROP TABLE carta_edicion');
    }
}
