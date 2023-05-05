<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505091925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_room_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, checkin DATE NOT NULL, checkout DATE NOT NULL, INDEX IDX_42C849558A8AD9E3 (id_room_id), INDEX IDX_42C8495579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849558A8AD9E3 FOREIGN KEY (id_room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849558A8AD9E3');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495579F37AE5');
        $this->addSql('DROP TABLE reservation');
    }
}
