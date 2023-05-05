<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505091527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, id_hotel_id INT DEFAULT NULL, id_room_id INT DEFAULT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_14B784186298578D (id_hotel_id), INDEX IDX_14B784188A8AD9E3 (id_room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784186298578D FOREIGN KEY (id_hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784188A8AD9E3 FOREIGN KEY (id_room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE room ADD hotel VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784186298578D');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784188A8AD9E3');
        $this->addSql('DROP TABLE photo');
        $this->addSql('ALTER TABLE room DROP hotel');
    }
}
