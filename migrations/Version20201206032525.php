<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201206032525 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE alllegumes_mois');
        $this->addSql('DROP TABLE mois_alllegumes');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alllegumes_mois (alllegumes_id INT NOT NULL, mois_id INT NOT NULL, INDEX IDX_C9C2C0DB17E4E1FD (alllegumes_id), INDEX IDX_C9C2C0DBFA0749B8 (mois_id), PRIMARY KEY(alllegumes_id, mois_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mois_alllegumes (mois_id INT NOT NULL, alllegumes_id INT NOT NULL, INDEX IDX_733DA911FA0749B8 (mois_id), INDEX IDX_733DA91117E4E1FD (alllegumes_id), PRIMARY KEY(mois_id, alllegumes_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE alllegumes_mois ADD CONSTRAINT FK_C9C2C0DB17E4E1FD FOREIGN KEY (alllegumes_id) REFERENCES alllegumes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE alllegumes_mois ADD CONSTRAINT FK_C9C2C0DBFA0749B8 FOREIGN KEY (mois_id) REFERENCES mois (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mois_alllegumes ADD CONSTRAINT FK_733DA91117E4E1FD FOREIGN KEY (alllegumes_id) REFERENCES alllegumes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mois_alllegumes ADD CONSTRAINT FK_733DA911FA0749B8 FOREIGN KEY (mois_id) REFERENCES mois (id) ON DELETE CASCADE');
    }
}
