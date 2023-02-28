<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228180058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE semester (id INT AUTO_INCREMENT NOT NULL, ekurie_id_id INT NOT NULL, enumerate VARCHAR(255) NOT NULL, starting_date DATE DEFAULT NULL, ending_date DATE DEFAULT NULL, INDEX IDX_F7388EED2470623E (ekurie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE semester ADD CONSTRAINT FK_F7388EED2470623E FOREIGN KEY (ekurie_id_id) REFERENCES ekurie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE semester DROP FOREIGN KEY FK_F7388EED2470623E');
        $this->addSql('DROP TABLE semester');
    }
}
