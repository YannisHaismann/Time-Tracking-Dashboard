<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927113547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE time_spent_activity');
        $this->addSql('DROP TABLE time_spent_user');
        $this->addSql('ALTER TABLE activity ADD time_spents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A16A929C1 FOREIGN KEY (time_spents_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_AC74095A16A929C1 ON activity (time_spents_id)');
        $this->addSql('ALTER TABLE user ADD time_spents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64916A929C1 FOREIGN KEY (time_spents_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64916A929C1 ON user (time_spents_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE time_spent_activity (time_spent_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_A982076E81C06096 (activity_id), INDEX IDX_A982076EC76A6D1 (time_spent_id), PRIMARY KEY(time_spent_id, activity_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE time_spent_user (time_spent_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_43683E2AA76ED395 (user_id), INDEX IDX_43683E2AC76A6D1 (time_spent_id), PRIMARY KEY(time_spent_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE time_spent_activity ADD CONSTRAINT FK_A982076E81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE time_spent_activity ADD CONSTRAINT FK_A982076EC76A6D1 FOREIGN KEY (time_spent_id) REFERENCES time_spent (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE time_spent_user ADD CONSTRAINT FK_43683E2AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE time_spent_user ADD CONSTRAINT FK_43683E2AC76A6D1 FOREIGN KEY (time_spent_id) REFERENCES time_spent (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A16A929C1');
        $this->addSql('DROP INDEX IDX_AC74095A16A929C1 ON activity');
        $this->addSql('ALTER TABLE activity DROP time_spents_id');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64916A929C1');
        $this->addSql('DROP INDEX IDX_8D93D64916A929C1 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP time_spents_id');
    }
}
