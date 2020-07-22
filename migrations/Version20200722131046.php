<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722131046 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3CC873C2A');
        $this->addSql('DROP INDEX IDX_97A0ADA3CC873C2A ON ticket');
        $this->addSql('ALTER TABLE ticket CHANGE order_ticket_id ticket_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3700047D2 FOREIGN KEY (ticket_id) REFERENCES order_ticket (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3700047D2 ON ticket (ticket_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3700047D2');
        $this->addSql('DROP INDEX IDX_97A0ADA3700047D2 ON ticket');
        $this->addSql('ALTER TABLE ticket CHANGE ticket_id order_ticket_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3CC873C2A FOREIGN KEY (order_ticket_id) REFERENCES order_ticket (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3CC873C2A ON ticket (order_ticket_id)');
    }
}
