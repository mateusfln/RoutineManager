# Desafio Zend - To-do list + Autenticação + Calendário

## Descrição do Projeto

O objetivo deste desafio é construir uma aplicação web que permita gerenciar tarefas, com autenticação de usuários e integração com um calendário para a visualização e administração dessas tarefas. A aplicação deve oferecer as seguintes funcionalidades:

- Gerenciar dados da aplicação apenas com devida autenticação
- Visualizar dados das tarefas atraves de um calendário que irá mostrar os períodos das tarefas e permitirá criar tarefas novas ao selecionar um periodo no calendário
## Tecnologias Utilizadas

- **PHP >=5.6**: Linguagem de programação utilizada para o desenvolvimento da aplicação.
- **MySQL 5.7**: Sistema de gerenciamento de banco de dados relacional utilizado para armazenar as informações da aplicação.

## Como Executar o Projeto

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

4. rode as migrations

```
./vendor/bin/doctrine-module migrations:migrate

```

5. Navegue até a pasta public:

```
cd public/
```

6. Gere um servidor embutido do php:

```
//escolha a porta de sua preferencia
php -S 127.0.0.1:8080
```

7. Acesse o endereço:

```
http://127.0.0.1:8080

```

## Login e senha:

- **Email**: email@teste
- **Senha**: teste


