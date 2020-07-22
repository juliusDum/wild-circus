<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722130027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, circus_id INT NOT NULL, name VARCHAR(255) NOT NULL, disciplined VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, INDEX IDX_159968771F7E88B (event_id), INDEX IDX_1599687686CD246 (circus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE circus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, picture VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_ticket (id INT AUTO_INCREMENT NOT NULL, circus_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_542FBD76686CD246 (circus_id), INDEX IDX_542FBD76A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photogallery (id INT AUTO_INCREMENT NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, rang VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, category VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, quantity INT NOT NULL, INDEX IDX_97A0ADA371F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket_price (ticket_id INT NOT NULL, price_id INT NOT NULL, INDEX IDX_E2F84152700047D2 (ticket_id), INDEX IDX_E2F84152D614C7E7 (price_id), PRIMARY KEY(ticket_id, price_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, address VARCHAR(255) NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_159968771F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_1599687686CD246 FOREIGN KEY (circus_id) REFERENCES circus (id)');
        $this->addSql('ALTER TABLE order_ticket ADD CONSTRAINT FK_542FBD76686CD246 FOREIGN KEY (circus_id) REFERENCES circus (id)');
        $this->addSql('ALTER TABLE order_ticket ADD CONSTRAINT FK_542FBD76A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA371F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE ticket_price ADD CONSTRAINT FK_E2F84152700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket_price ADD CONSTRAINT FK_E2F84152D614C7E7 FOREIGN KEY (price_id) REFERENCES price (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_1599687686CD246');
        $this->addSql('ALTER TABLE order_ticket DROP FOREIGN KEY FK_542FBD76686CD246');
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_159968771F7E88B');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA371F7E88B');
        $this->addSql('ALTER TABLE ticket_price DROP FOREIGN KEY FK_E2F84152D614C7E7');
        $this->addSql('ALTER TABLE ticket_price DROP FOREIGN KEY FK_E2F84152700047D2');
        $this->addSql('ALTER TABLE order_ticket DROP FOREIGN KEY FK_542FBD76A76ED395');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE circus');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE order_ticket');
        $this->addSql('DROP TABLE photogallery');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE ticket_price');
        $this->addSql('DROP TABLE user');
    }
}
