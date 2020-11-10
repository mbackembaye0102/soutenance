<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201107191317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours DROP question, DROP reponse1, DROP reponse2, DROP reponse3, DROP bonne_reponse');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours ADD question VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD reponse1 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD reponse2 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD reponse3 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD bonne_reponse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
