<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201107190910 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, question VARCHAR(255) NOT NULL, reponse1 VARCHAR(255) NOT NULL, reponse2 VARCHAR(255) NOT NULL, reponse3 VARCHAR(255) NOT NULL, bonne_reponse VARCHAR(255) NOT NULL, INDEX IDX_7C77973D7ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, eleve_id INT DEFAULT NULL, note INT NOT NULL, INDEX IDX_32993751A6CC7B2 (eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quizz ADD CONSTRAINT FK_7C77973D7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cours DROP note');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE quizz');
        $this->addSql('DROP TABLE score');
        $this->addSql('ALTER TABLE cours ADD note INT DEFAULT NULL');
    }
}
