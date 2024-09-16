<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20240916193142 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            salt VARCHAR(255) NOT NULL);
            
            CREATE TABLE tarefas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario_id INT NOT NULL,
            titulo VARCHAR(255) NOT NULL,
            descricao TEXT,
            dataHoraInicio DATE NOT NULL,
            dataHoraFim DATE NOT NULL,
            status BOOLEAN,
            FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE);
            
            INSERT INTO usuarios 
            (nome, email, password, salt) 
            VALUES 
            ("emailTeste", "email@teste", "94cdb684213d6f8ad28379cd16f43424061fb1a7e5a0b43b47b0f4d37433fc8ada1f371f1f1eb9004b117331e5828373b7d9b9728b46b9b815ac4cfd45d729fb", "ojyqybpgjn4s084kko4k08g88kcc844");'
            );

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'DROP TABLE tarefas;
             DROP TABLE usuarios;'
            );

    }
}
