<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109014912 extends AbstractMigration {
  public function getDescription(): string {
    return '';
  }

  public function up(Schema $schema): void {
    $usersMigration = $schema->createTable('users_migration');

    $usersMigration->addColumn('id', Types::INTEGER)->setAutoincrement(true);
    $usersMigration->addColumn('user_name', Types::STRING);
    $usersMigration->addColumn('created_at', Types::DATE_MUTABLE);

    $usersMigration->setPrimaryKey(['id']);
  }

  public function down(Schema $schema): void {
    $schema->dropTable('users_migration');
  }
}
