<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230320115023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE saison_fleur (saison_id INT NOT NULL, fleur_id INT NOT NULL, INDEX IDX_B7C06D8AF965414C (saison_id), INDEX IDX_B7C06D8AE8DD5A7 (fleur_id), PRIMARY KEY(saison_id, fleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE saison_fleur ADD CONSTRAINT FK_B7C06D8AF965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saison_fleur ADD CONSTRAINT FK_B7C06D8AE8DD5A7 FOREIGN KEY (fleur_id) REFERENCES fleur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE saison_fleur DROP FOREIGN KEY FK_B7C06D8AF965414C');
        $this->addSql('ALTER TABLE saison_fleur DROP FOREIGN KEY FK_B7C06D8AE8DD5A7');
        $this->addSql('DROP TABLE saison_fleur');
    }
}
