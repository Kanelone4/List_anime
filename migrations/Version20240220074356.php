<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220074356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anime (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, genre VARCHAR(50) NOT NULL, description VARCHAR(100) NOT NULL, auteur VARCHAR(30) NOT NULL, date_sortie DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE list_anime (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE list_anime_anime (list_anime_id INT NOT NULL, anime_id INT NOT NULL, INDEX IDX_F0128AF67268DE9 (list_anime_id), INDEX IDX_F0128AF6794BBE89 (anime_id), PRIMARY KEY(list_anime_id, anime_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE list_anime_user (list_anime_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F84B70C17268DE9 (list_anime_id), INDEX IDX_F84B70C1A76ED395 (user_id), PRIMARY KEY(list_anime_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE list_anime_anime ADD CONSTRAINT FK_F0128AF67268DE9 FOREIGN KEY (list_anime_id) REFERENCES list_anime (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE list_anime_anime ADD CONSTRAINT FK_F0128AF6794BBE89 FOREIGN KEY (anime_id) REFERENCES anime (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE list_anime_user ADD CONSTRAINT FK_F84B70C17268DE9 FOREIGN KEY (list_anime_id) REFERENCES list_anime (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE list_anime_user ADD CONSTRAINT FK_F84B70C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_anime_anime DROP FOREIGN KEY FK_F0128AF67268DE9');
        $this->addSql('ALTER TABLE list_anime_anime DROP FOREIGN KEY FK_F0128AF6794BBE89');
        $this->addSql('ALTER TABLE list_anime_user DROP FOREIGN KEY FK_F84B70C17268DE9');
        $this->addSql('ALTER TABLE list_anime_user DROP FOREIGN KEY FK_F84B70C1A76ED395');
        $this->addSql('DROP TABLE anime');
        $this->addSql('DROP TABLE list_anime');
        $this->addSql('DROP TABLE list_anime_anime');
        $this->addSql('DROP TABLE list_anime_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
