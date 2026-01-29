<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260129105612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6343D3D2749 FOREIGN KEY (children_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE model CHANGE weight weight INT NOT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D932DAAD24 FOREIGN KEY (carburant_id) REFERENCES carburant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6343D3D2749');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9BCF5E72D');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D932DAAD24');
        $this->addSql('ALTER TABLE model CHANGE weight weight VARCHAR(255) NOT NULL');
    }
}
