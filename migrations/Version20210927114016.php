<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927114016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A16A929C1');
        $this->addSql('DROP INDEX IDX_AC74095A16A929C1 ON activity');
        $this->addSql('ALTER TABLE activity DROP time_spents_id');
        $this->addSql('ALTER TABLE time_spent ADD user_id INT DEFAULT NULL, ADD activity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE time_spent ADD CONSTRAINT FK_B417D625A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE time_spent ADD CONSTRAINT FK_B417D62581C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_B417D625A76ED395 ON time_spent (user_id)');
        $this->addSql('CREATE INDEX IDX_B417D62581C06096 ON time_spent (activity_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64916A929C1');
        $this->addSql('DROP INDEX IDX_8D93D64916A929C1 ON user');
        $this->addSql('ALTER TABLE user DROP time_spents_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity ADD time_spents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A16A929C1 FOREIGN KEY (time_spents_id) REFERENCES activity (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_AC74095A16A929C1 ON activity (time_spents_id)');
        $this->addSql('ALTER TABLE time_spent DROP FOREIGN KEY FK_B417D625A76ED395');
        $this->addSql('ALTER TABLE time_spent DROP FOREIGN KEY FK_B417D62581C06096');
        $this->addSql('DROP INDEX IDX_B417D625A76ED395 ON time_spent');
        $this->addSql('DROP INDEX IDX_B417D62581C06096 ON time_spent');
        $this->addSql('ALTER TABLE time_spent DROP user_id, DROP activity_id');
        $this->addSql('ALTER TABLE `user` ADD time_spents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64916A929C1 FOREIGN KEY (time_spents_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D64916A929C1 ON `user` (time_spents_id)');
    }
}
