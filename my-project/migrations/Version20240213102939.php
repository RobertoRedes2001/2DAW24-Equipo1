<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213102939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carta (carta_cod INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, habilidad_recurso VARCHAR(255) DEFAULT NULL, habilidad_batalla VARCHAR(255) DEFAULT NULL, coste VARCHAR(255) DEFAULT NULL, estado_carta VARCHAR(255) DEFAULT NULL, vida INT DEFAULT NULL, rareza VARCHAR(255) DEFAULT NULL, observaciones VARCHAR(255) DEFAULT NULL, foto VARCHAR(255) DEFAULT NULL, defensa INT DEFAULT NULL, ataque INT DEFAULT NULL, tipo_carta VARCHAR(255) DEFAULT NULL, texto VARCHAR(255) DEFAULT NULL, puntos_victoria INT DEFAULT NULL, PRIMARY KEY(carta_cod)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edicion (edicion_cod INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, fecha_salida DATE DEFAULT NULL, cantidad INT DEFAULT NULL, PRIMARY KEY(edicion_cod)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noticia (noticia_cod INT AUTO_INCREMENT NOT NULL, fecha_publicacion DATE DEFAULT NULL, titulo VARCHAR(255) DEFAULT NULL, texto VARCHAR(255) DEFAULT NULL, foto VARCHAR(255) DEFAULT NULL, PRIMARY KEY(noticia_cod)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tienda (tienda_cod INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, PRIMARY KEY(tienda_cod)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (usuario_cod INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(usuario_cod)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE carta');
        $this->addSql('DROP TABLE edicion');
        $this->addSql('DROP TABLE noticia');
        $this->addSql('DROP TABLE tienda');
        $this->addSql('DROP TABLE usuario');
    }
}
