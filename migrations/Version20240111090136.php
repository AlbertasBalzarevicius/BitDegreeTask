<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240111090136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cryptocurrency (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, symbol VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, cmc_rank INT NOT NULL, num_market_pairs INT NOT NULL, circulating_supply INT NOT NULL, total_supply INT NOT NULL, max_supply INT NOT NULL, infinite_supply VARCHAR(255) NOT NULL, last_update DATETIME NOT NULL, date_added DATETIME NOT NULL, platform VARCHAR(255) DEFAULT NULL, self_reported_circulating_supply INT DEFAULT NULL, self_reported_market_cap INT DEFAULT NULL, external_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quote (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', cryptocurrency_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', symbol VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, volume24h INT NOT NULL, market_cap DOUBLE PRECISION NOT NULL, market_cap_dominance INT NOT NULL, fully_diluted_market_cap DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_6B71CBF4583FC03A (cryptocurrency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', cryptocurrency_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', value VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_389B783583FC03A (cryptocurrency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4583FC03A FOREIGN KEY (cryptocurrency_id) REFERENCES cryptocurrency (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783583FC03A FOREIGN KEY (cryptocurrency_id) REFERENCES cryptocurrency (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4583FC03A');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B783583FC03A');
        $this->addSql('DROP TABLE cryptocurrency');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE tag');
    }
}
