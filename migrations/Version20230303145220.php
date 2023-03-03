<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303145220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE semester DROP FOREIGN KEY FK_F7388EED2470623E');
        $this->addSql('DROP INDEX IDX_F7388EED2470623E ON semester');
        $this->addSql('ALTER TABLE semester CHANGE ekurie_id_id ekurie_id INT NOT NULL');
        $this->addSql('ALTER TABLE semester ADD CONSTRAINT FK_F7388EED841C31C1 FOREIGN KEY (ekurie_id) REFERENCES ekurie (id)');
        $this->addSql('CREATE INDEX IDX_F7388EED841C31C1 ON semester (ekurie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE semester DROP FOREIGN KEY FK_F7388EED841C31C1');
        $this->addSql('DROP INDEX IDX_F7388EED841C31C1 ON semester');
        $this->addSql('ALTER TABLE semester CHANGE ekurie_id ekurie_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE semester ADD CONSTRAINT FK_F7388EED2470623E FOREIGN KEY (ekurie_id_id) REFERENCES ekurie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F7388EED2470623E ON semester (ekurie_id_id)');
    }
}
