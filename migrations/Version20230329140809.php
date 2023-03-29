<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329140809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compo_evenement (id INT AUTO_INCREMENT NOT NULL, composition_id INT NOT NULL, evenement_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_5550EFFD87A2E12 (composition_id), INDEX IDX_5550EFFDFD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composition (id INT AUTO_INCREMENT NOT NULL, type_compo_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_C7F43473CBA64FD (type_compo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conditionnement (id INT AUTO_INCREMENT NOT NULL, nombre SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur_fleur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, type_evenement_id INT NOT NULL, nom VARCHAR(255) NOT NULL, date_evenement DATE DEFAULT NULL, lieu VARCHAR(255) DEFAULT NULL, perso_contact VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, horaire VARCHAR(255) DEFAULT NULL, description VARCHAR(1000) DEFAULT NULL, INDEX IDX_B26681E88939516 (type_evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement_prestataire (evenement_id INT NOT NULL, prestataire_id INT NOT NULL, INDEX IDX_F13772ABFD02F13 (evenement_id), INDEX IDX_F13772ABBE3DB2B7 (prestataire_id), PRIMARY KEY(evenement_id, prestataire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement_moodboard (evenement_id INT NOT NULL, moodboard_id INT NOT NULL, INDEX IDX_9C5F6181FD02F13 (evenement_id), INDEX IDX_9C5F6181ADA9CECE (moodboard_id), PRIMARY KEY(evenement_id, moodboard_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fleur (id INT AUTO_INCREMENT NOT NULL, couleur_fleur_id INT NOT NULL, mode_vente_id INT NOT NULL, conditionnement_id INT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prix NUMERIC(8, 2) NOT NULL, image VARCHAR(255) DEFAULT NULL, remarques LONGTEXT DEFAULT NULL, INDEX IDX_3FFA9231B7D7EB6 (couleur_fleur_id), INDEX IDX_3FFA9237EA06391 (mode_vente_id), INDEX IDX_3FFA923A222637 (conditionnement_id), INDEX IDX_3FFA923A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fleur_saison (fleur_id INT NOT NULL, saison_id INT NOT NULL, INDEX IDX_21743940E8DD5A7 (fleur_id), INDEX IDX_21743940F965414C (saison_id), PRIMARY KEY(fleur_id, saison_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fleur_compo (id INT AUTO_INCREMENT NOT NULL, composition_id INT NOT NULL, fleur_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_63BC9ED287A2E12 (composition_id), INDEX IDX_63BC9ED2E8DD5A7 (fleur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_vente (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moodboard (id INT AUTO_INCREMENT NOT NULL, code_couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, nom_societe VARCHAR(255) DEFAULT NULL, nom_contact VARCHAR(255) DEFAULT NULL, tva VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, mois VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_compo (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_evenement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, telephone VARCHAR(13) NOT NULL, adresse VARCHAR(255) NOT NULL, tva VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, societe VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compo_evenement ADD CONSTRAINT FK_5550EFFD87A2E12 FOREIGN KEY (composition_id) REFERENCES composition (id)');
        $this->addSql('ALTER TABLE compo_evenement ADD CONSTRAINT FK_5550EFFDFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE composition ADD CONSTRAINT FK_C7F43473CBA64FD FOREIGN KEY (type_compo_id) REFERENCES type_compo (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E88939516 FOREIGN KEY (type_evenement_id) REFERENCES type_evenement (id)');
        $this->addSql('ALTER TABLE evenement_prestataire ADD CONSTRAINT FK_F13772ABFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_prestataire ADD CONSTRAINT FK_F13772ABBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_moodboard ADD CONSTRAINT FK_9C5F6181FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_moodboard ADD CONSTRAINT FK_9C5F6181ADA9CECE FOREIGN KEY (moodboard_id) REFERENCES moodboard (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fleur ADD CONSTRAINT FK_3FFA9231B7D7EB6 FOREIGN KEY (couleur_fleur_id) REFERENCES couleur_fleur (id)');
        $this->addSql('ALTER TABLE fleur ADD CONSTRAINT FK_3FFA9237EA06391 FOREIGN KEY (mode_vente_id) REFERENCES mode_vente (id)');
        $this->addSql('ALTER TABLE fleur ADD CONSTRAINT FK_3FFA923A222637 FOREIGN KEY (conditionnement_id) REFERENCES conditionnement (id)');
        $this->addSql('ALTER TABLE fleur ADD CONSTRAINT FK_3FFA923A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fleur_saison ADD CONSTRAINT FK_21743940E8DD5A7 FOREIGN KEY (fleur_id) REFERENCES fleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fleur_saison ADD CONSTRAINT FK_21743940F965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fleur_compo ADD CONSTRAINT FK_63BC9ED287A2E12 FOREIGN KEY (composition_id) REFERENCES composition (id)');
        $this->addSql('ALTER TABLE fleur_compo ADD CONSTRAINT FK_63BC9ED2E8DD5A7 FOREIGN KEY (fleur_id) REFERENCES fleur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compo_evenement DROP FOREIGN KEY FK_5550EFFD87A2E12');
        $this->addSql('ALTER TABLE compo_evenement DROP FOREIGN KEY FK_5550EFFDFD02F13');
        $this->addSql('ALTER TABLE composition DROP FOREIGN KEY FK_C7F43473CBA64FD');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E88939516');
        $this->addSql('ALTER TABLE evenement_prestataire DROP FOREIGN KEY FK_F13772ABFD02F13');
        $this->addSql('ALTER TABLE evenement_prestataire DROP FOREIGN KEY FK_F13772ABBE3DB2B7');
        $this->addSql('ALTER TABLE evenement_moodboard DROP FOREIGN KEY FK_9C5F6181FD02F13');
        $this->addSql('ALTER TABLE evenement_moodboard DROP FOREIGN KEY FK_9C5F6181ADA9CECE');
        $this->addSql('ALTER TABLE fleur DROP FOREIGN KEY FK_3FFA9231B7D7EB6');
        $this->addSql('ALTER TABLE fleur DROP FOREIGN KEY FK_3FFA9237EA06391');
        $this->addSql('ALTER TABLE fleur DROP FOREIGN KEY FK_3FFA923A222637');
        $this->addSql('ALTER TABLE fleur DROP FOREIGN KEY FK_3FFA923A76ED395');
        $this->addSql('ALTER TABLE fleur_saison DROP FOREIGN KEY FK_21743940E8DD5A7');
        $this->addSql('ALTER TABLE fleur_saison DROP FOREIGN KEY FK_21743940F965414C');
        $this->addSql('ALTER TABLE fleur_compo DROP FOREIGN KEY FK_63BC9ED287A2E12');
        $this->addSql('ALTER TABLE fleur_compo DROP FOREIGN KEY FK_63BC9ED2E8DD5A7');
        $this->addSql('DROP TABLE compo_evenement');
        $this->addSql('DROP TABLE composition');
        $this->addSql('DROP TABLE conditionnement');
        $this->addSql('DROP TABLE couleur_fleur');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE evenement_prestataire');
        $this->addSql('DROP TABLE evenement_moodboard');
        $this->addSql('DROP TABLE fleur');
        $this->addSql('DROP TABLE fleur_saison');
        $this->addSql('DROP TABLE fleur_compo');
        $this->addSql('DROP TABLE mode_vente');
        $this->addSql('DROP TABLE moodboard');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE type_compo');
        $this->addSql('DROP TABLE type_evenement');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
