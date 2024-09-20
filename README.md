# Desafio Zend - To-do list + Autenticação + Calendário

## Descrição do Projeto

O objetivo deste desafio é construir uma aplicação web que permita gerenciar tarefas, com autenticação de usuários e integração com um calendário para a visualização e administração dessas tarefas. A aplicação deve oferecer as seguintes funcionalidades:

- Gerenciar dados da aplicação apenas com devida autenticação
- Visualizar dados das tarefas atraves de um calendário que irá mostrar os períodos das tarefas e permitirá criar tarefas novas ao selecionar um periodo no calendário
## Tecnologias Utilizadas

### Sem docker:
- **PHP ^5.6 || ^7.0**: Linguagem de programação utilizada para o desenvolvimento da aplicação.
- **MySQL 5.7**: Sistema de gerenciamento de banco de dados relacional utilizado para armazenar as informações da aplicação.
- **Composer 1.x**: Orquestrador de dependências.
### Com docker:
- **Docker**: Plataforma de contêineres que facilita a criação, distribuição e execução de aplicativos em contêineres.
- **Docker Compose**: Ferramenta que auxilia na orquestragem de multiplos containeres docker ao mesmo tempo.

## Como Executar o Projeto sem Docker

1. Clone este repositório em sua máquina local:

```
git clone https://github.com/mateusfln/RoutineManager.git
```

2. Navegue até o diretório do projeto:

```
cd RoutineManager
```

3. instale as dependencias do composer no projeto

```
composer update
```

4. Mude as variáveis de ambiente para as do seu ambiente:

```
//dentro do arquivo config/autoload/doctrine_orm.local.php

'params' => array(
                    'host'     => '>INSIRA AQUI O HOST DO SEU BANCO DE DADOS<',
                    'port'     => '>INSIRA AQUI A PORTA DO SEU BANCO DE DADOS<',
                    'user'     => '>INSIRA AQUI O USUARIO DO SEU BANCO DE DADOS<',
                    'password' => '>INSIRA AQUI A SENHA DO SEU BANCO DE DADOS<',
                    'dbname'   => 'RoutineManager',
                    'driverOptions' => array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
                    )
                )

```

5. rode as migrations

```
./vendor/bin/doctrine-module migrations:migrate
```

5.1 Caso occorra o erro

```
SQLSTATE[HY000] [1049] Unknown database 'RoutineManager'
```

5.2 crie o banco de dados manualmente

```
mysql -u root -p
```
```
create database RoutineManager;
exit;
```
5.3 rode as migrations como na etapa 5

6. Entre no diretório

```
cd public
```

7. rode o servidor embutido php

```
//escolha a porta de sua preferência
php -S 127.0.0.1:8000
```

8. Acesse o endereço:

```
http://127.0.0.1:8000
```

## Como Executar o Projeto com Docker

1. Certifique-se de ter o Docker instalado em sua máquina e também o Docker compose. Você pode baixar o Docker [aqui](https://www.docker.com/get-started) e o docker compose [aqui](https://docs.docker.com/compose/install/).

2. Clone este repositório em sua máquina local:

```
git clone https://github.com/mateusfln/RoutineManager.git
```

3. Navegue até o diretório do projeto:

```
cd RoutineManager
```

4. Inicie os contêineres Docker:

```
docker-compose up
```

4.1 Caso ocorra um erro de permissão de algum arquivo, execute o seguinte comando:

```
chmod -R 777 <nome do arquivo ou pasta>
```

5. entre no container do php, dentro da raiz:

```
docker exec -it php_5_6 /bin/bash
```

6. instale as dependencias do composer no projeto

```
composer install
```

7. rode as migrations:

```
./vendor/bin/doctrine-module migrations:migrate
```

8. Acesse o endereço:

```
http://localhost:84
```


## Login e senha:

- **Email**: email@teste
- **Senha**: teste


