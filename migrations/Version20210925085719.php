<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210925085719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE time_spent (id INT AUTO_INCREMENT NOT NULL, hour INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_spent_activity (time_spent_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_A982076EC76A6D1 (time_spent_id), INDEX IDX_A982076E81C06096 (activity_id), PRIMARY KEY(time_spent_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_spent_user (time_spent_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_43683E2AC76A6D1 (time_spent_id), INDEX IDX_43683E2AA76ED395 (user_id), PRIMARY KEY(time_spent_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE time_spent_activity ADD CONSTRAINT FK_A982076EC76A6D1 FOREIGN KEY (time_spent_id) REFERENCES time_spent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE time_spent_activity ADD CONSTRAINT FK_A982076E81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE time_spent_user ADD CONSTRAINT FK_43683E2AC76A6D1 FOREIGN KEY (time_spent_id) REFERENCES time_spent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE time_spent_user ADD CONSTRAINT FK_43683E2AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_spent_activity DROP FOREIGN KEY FK_A982076EC76A6D1');
        $this->addSql('ALTER TABLE time_spent_user DROP FOREIGN KEY FK_43683E2AC76A6D1');
        $this->addSql('DROP TABLE time_spent');
        $this->addSql('DROP TABLE time_spent_activity');
        $this->addSql('DROP TABLE time_spent_user');
    }
}
