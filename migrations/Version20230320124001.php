<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230320124001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fleur ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE fleur ADD CONSTRAINT FK_3FFA923A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3FFA923A76ED395 ON fleur (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fleur DROP FOREIGN KEY FK_3FFA923A76ED395');
        $this->addSql('DROP INDEX IDX_3FFA923A76ED395 ON fleur');
        $this->addSql('ALTER TABLE fleur DROP user_id');
    }
}
