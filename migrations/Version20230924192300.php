<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230924192300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'product';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD description VARCHAR(255) NOT NULL, ADD discount_percentage INT NOT NULL, ADD rating INT NOT NULL, ADD stock INT NOT NULL, ADD brand VARCHAR(255) NOT NULL, ADD category VARCHAR(255) NOT NULL, CHANGE name title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD name VARCHAR(255) NOT NULL, DROP title, DROP description, DROP discount_percentage, DROP rating, DROP stock, DROP brand, DROP category');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
