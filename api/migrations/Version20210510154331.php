<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510154331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modulo CHANGE horas horas VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE profesor ADD modulo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profesor ADD CONSTRAINT FK_5B7406D9C07F55F5 FOREIGN KEY (modulo_id) REFERENCES modulo (id)');
        $this->addSql('CREATE INDEX IDX_5B7406D9C07F55F5 ON profesor (modulo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modulo CHANGE horas horas INT NOT NULL');
        $this->addSql('ALTER TABLE profesor DROP FOREIGN KEY FK_5B7406D9C07F55F5');
        $this->addSql('DROP INDEX IDX_5B7406D9C07F55F5 ON profesor');
        $this->addSql('ALTER TABLE profesor DROP modulo_id');
    }
}
