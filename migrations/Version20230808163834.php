<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230808163834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE todo ADD fk_status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE todo ADD CONSTRAINT FK_5A0EB6A0AAED72D FOREIGN KEY (fk_status_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_5A0EB6A0AAED72D ON todo (fk_status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE todo DROP FOREIGN KEY FK_5A0EB6A0AAED72D');
        $this->addSql('DROP INDEX IDX_5A0EB6A0AAED72D ON todo');
        $this->addSql('ALTER TABLE todo DROP fk_status_id');
    }
}
