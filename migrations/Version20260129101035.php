<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260129101035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carburant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, marque_id INT NOT NULL, children_id INT DEFAULT NULL, INDEX IDX_497DD6344827B9B2 (marque_id), INDEX IDX_497DD6343D3D2749 (children_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, prix INT NOT NULL, weight VARCHAR(255) NOT NULL, categorie_id INT NOT NULL, carburant_id INT NOT NULL, INDEX IDX_D79572D9BCF5E72D (categorie_id), UNIQUE INDEX UNIQ_D79572D932DAAD24 (carburant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6344827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6343D3D2749 FOREIGN KEY (children_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D932DAAD24 FOREIGN KEY (carburant_id) REFERENCES carburant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6344827B9B2');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6343D3D2749');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9BCF5E72D');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D932DAAD24');
        $this->addSql('DROP TABLE carburant');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
