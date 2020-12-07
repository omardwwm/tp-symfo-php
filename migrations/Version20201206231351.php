<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201206231351 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mois ADD season_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mois ADD CONSTRAINT FK_D6B08CB74EC001D1 FOREIGN KEY (season_id) REFERENCES saisons (id)');
        $this->addSql('CREATE INDEX IDX_D6B08CB74EC001D1 ON mois (season_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mois DROP FOREIGN KEY FK_D6B08CB74EC001D1');
        $this->addSql('DROP INDEX IDX_D6B08CB74EC001D1 ON mois');
        $this->addSql('ALTER TABLE mois DROP season_id');
    }
}
