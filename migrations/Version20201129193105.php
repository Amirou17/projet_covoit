<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201129193105 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Trip (id INT AUTO_INCREMENT NOT NULL, user_trip_id INT NOT NULL, name_trip VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, date_departure DATETIME NOT NULL, city_departure VARCHAR(255) NOT NULL, date_arrival DATETIME NOT NULL, city_destination VARCHAR(255) NOT NULL, number_places INT NOT NULL, place_available INT NOT NULL, price DOUBLE PRECISION NOT NULL, distance INT DEFAULT NULL, departure_time TIME NOT NULL, time_arrival TIME NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D6645A05989D9B62 (slug), INDEX IDX_D6645A05FDB13004 (user_trip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, trip_id INT NOT NULL, comment LONGTEXT DEFAULT NULL, date_added DATETIME NOT NULL, INDEX IDX_5F9E962AA5BC2E0E (trip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_reservation_id INT NOT NULL, trip_id INT NOT NULL, reservation_date DATETIME NOT NULL, number_remaining_places INT NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_42C84955D3B748BE (user_reservation_id), INDEX IDX_42C84955A5BC2E0E (trip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE search_trip (id INT AUTO_INCREMENT NOT NULL, city_departure VARCHAR(255) NOT NULL, city_destination VARCHAR(255) NOT NULL, date_departure DATETIME NOT NULL, number_places INT NOT NULL, departure_time TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, town VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, post_code VARCHAR(255) NOT NULL, registration_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Trip ADD CONSTRAINT FK_D6645A05FDB13004 FOREIGN KEY (user_trip_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA5BC2E0E FOREIGN KEY (trip_id) REFERENCES Trip (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D3B748BE FOREIGN KEY (user_reservation_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A5BC2E0E FOREIGN KEY (trip_id) REFERENCES Trip (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA5BC2E0E');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A5BC2E0E');
        $this->addSql('ALTER TABLE Trip DROP FOREIGN KEY FK_D6645A05FDB13004');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D3B748BE');
        $this->addSql('DROP TABLE Trip');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE search_trip');
        $this->addSql('DROP TABLE `user`');
    }
}
