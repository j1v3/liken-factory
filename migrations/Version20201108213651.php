<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201108213651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, sub_menu_id INT DEFAULT NULL, sub_sub_menu_id INT DEFAULT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, sub_title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, page LONGBLOB DEFAULT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_FEC530A9CCD7E912 (menu_id), INDEX IDX_FEC530A9B30FB5E6 (sub_menu_id), INDEX IDX_FEC530A956F6C078 (sub_sub_menu_id), INDEX IDX_FEC530A97E3C61F9 (owner_id), INDEX IDX_FEC530A9D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_type (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_41BCBAEC7E3C61F9 (owner_id), INDEX IDX_41BCBAECD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estimate (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_D2EA460719EB6921 (client_id), INDEX IDX_D2EA46077E3C61F9 (owner_id), INDEX IDX_D2EA4607D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, url VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_C53D045F7E3C61F9 (owner_id), INDEX IDX_C53D045FD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_content (image_id INT NOT NULL, content_id INT NOT NULL, INDEX IDX_6BD567753DA5256D (image_id), INDEX IDX_6BD5677584A0A3ED (content_id), PRIMARY KEY(image_id, content_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rank INT NOT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_7D053A937E3C61F9 (owner_id), INDEX IDX_7D053A93D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, receipter_id INT NOT NULL, transmitter_id INT NOT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_B6BD307F4983082 (receipter_id), INDEX IDX_B6BD307FB703C510 (transmitter_id), INDEX IDX_B6BD307F7E3C61F9 (owner_id), INDEX IDX_B6BD307FD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_57698A6A7E3C61F9 (owner_id), INDEX IDX_57698A6AD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_menu (id INT AUTO_INCREMENT NOT NULL, menu_id INT NOT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rank INT NOT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_5A93A552CCD7E912 (menu_id), INDEX IDX_5A93A5527E3C61F9 (owner_id), INDEX IDX_5A93A552D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_sub_menu (id INT AUTO_INCREMENT NOT NULL, sub_menu_id INT DEFAULT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rank INT NOT NULL, created_at DATETIME NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', INDEX IDX_E03C4B0BB30FB5E6 (sub_menu_id), INDEX IDX_E03C4B0B7E3C61F9 (owner_id), INDEX IDX_E03C4B0BD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, role_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, uptaded_at DATETIME DEFAULT NULL, validated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT \'0\', created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6497E3C61F9 (owner_id), INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9B30FB5E6 FOREIGN KEY (sub_menu_id) REFERENCES sub_menu (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A956F6C078 FOREIGN KEY (sub_sub_menu_id) REFERENCES sub_sub_menu (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A97E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE content_type ADD CONSTRAINT FK_41BCBAEC7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE content_type ADD CONSTRAINT FK_41BCBAECD60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE estimate ADD CONSTRAINT FK_D2EA460719EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE estimate ADD CONSTRAINT FK_D2EA46077E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE estimate ADD CONSTRAINT FK_D2EA4607D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FD60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE image_content ADD CONSTRAINT FK_6BD567753DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_content ADD CONSTRAINT FK_6BD5677584A0A3ED FOREIGN KEY (content_id) REFERENCES content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A937E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F4983082 FOREIGN KEY (receipter_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FB703C510 FOREIGN KEY (transmitter_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FD60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AD60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE sub_menu ADD CONSTRAINT FK_5A93A552CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE sub_menu ADD CONSTRAINT FK_5A93A5527E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sub_menu ADD CONSTRAINT FK_5A93A552D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE sub_sub_menu ADD CONSTRAINT FK_E03C4B0BB30FB5E6 FOREIGN KEY (sub_menu_id) REFERENCES sub_menu (id)');
        $this->addSql('ALTER TABLE sub_sub_menu ADD CONSTRAINT FK_E03C4B0B7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sub_sub_menu ADD CONSTRAINT FK_E03C4B0BD60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_content DROP FOREIGN KEY FK_6BD5677584A0A3ED');
        $this->addSql('ALTER TABLE image_content DROP FOREIGN KEY FK_6BD567753DA5256D');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9CCD7E912');
        $this->addSql('ALTER TABLE sub_menu DROP FOREIGN KEY FK_5A93A552CCD7E912');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9D60322AC');
        $this->addSql('ALTER TABLE content_type DROP FOREIGN KEY FK_41BCBAECD60322AC');
        $this->addSql('ALTER TABLE estimate DROP FOREIGN KEY FK_D2EA4607D60322AC');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FD60322AC');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93D60322AC');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FD60322AC');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AD60322AC');
        $this->addSql('ALTER TABLE sub_menu DROP FOREIGN KEY FK_5A93A552D60322AC');
        $this->addSql('ALTER TABLE sub_sub_menu DROP FOREIGN KEY FK_E03C4B0BD60322AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9B30FB5E6');
        $this->addSql('ALTER TABLE sub_sub_menu DROP FOREIGN KEY FK_E03C4B0BB30FB5E6');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A956F6C078');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A97E3C61F9');
        $this->addSql('ALTER TABLE content_type DROP FOREIGN KEY FK_41BCBAEC7E3C61F9');
        $this->addSql('ALTER TABLE estimate DROP FOREIGN KEY FK_D2EA460719EB6921');
        $this->addSql('ALTER TABLE estimate DROP FOREIGN KEY FK_D2EA46077E3C61F9');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F7E3C61F9');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A937E3C61F9');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F4983082');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FB703C510');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F7E3C61F9');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A7E3C61F9');
        $this->addSql('ALTER TABLE sub_menu DROP FOREIGN KEY FK_5A93A5527E3C61F9');
        $this->addSql('ALTER TABLE sub_sub_menu DROP FOREIGN KEY FK_E03C4B0B7E3C61F9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497E3C61F9');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE content_type');
        $this->addSql('DROP TABLE estimate');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_content');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE sub_menu');
        $this->addSql('DROP TABLE sub_sub_menu');
        $this->addSql('DROP TABLE user');
    }
}
