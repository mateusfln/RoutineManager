# Desafio Zend - To-do list + Autenticação + Calendário

## Descrição do Projeto

O objetivo deste desafio é construir uma aplicação web que permita gerenciar tarefas, com autenticação de usuários e integração com um calendário para a visualização e administração dessas tarefas. A aplicação deve oferecer as seguintes funcionalidades:

- Gerenciar dados da aplicação apenas com devida autenticação
- Visualizar dados das tarefas atraves de um calendário que irá mostrar os períodos das tarefas e permitirá criar tarefas novas ao selecionar um periodo no calendário
## Tecnologias Utilizadas

- **PHP >=5.6**: Linguagem de programação utilizada para o desenvolvimento da aplicação.
- **MySQL 5.7**: Sistema de gerenciamento de banco de dados relacional utilizado para armazenar as informações da aplicação.
- **Docker**: Plataforma de contêineres que facilita a criação, distribuição e execução de aplicativos em contêineres.
- **Docker Compose**: Ferramenta que auxilia na orquestragem de multiplos containeres docker ao mesmo tempo.

## Como Executar o Projeto

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

4. instale as dependencias do composer no projeto

```
composer update

```

5. rode as migrations

```
./vendor/bin/doctrine-module migrations:migrate

```


8. Acesse o endereço:

```
http://RoutineManager.localhost:8080

```

## Login e senha:

- **Email**: email@teste
- **Senha**: teste


