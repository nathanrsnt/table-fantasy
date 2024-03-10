# README

## Instalação de Dependências

1. Abra o terminal na pasta do projeto.
2. Execute o comando ```composer install``` para instalar as dependências do Laravel.

## Configuração do Ambiente

1. Faça uma cópia do arquivo ```.env.example``` e renomeie para ```.env```.
2. Configure as variáveis de ambiente no arquivo ```.env```, como o banco de dados.

## Chave de Aplicação

Execute o comando ```php artisan key:generate``` para gerar a chave de aplicação.

## Migrações do Banco de Dados

Execute o comando ```php artisan migrate``` para criar as tabelas do banco de dados.

## Iniciar Aplicação Localmente

Execute o comando ```php artisan serve``` para iniciar o servidor embutido do Laravel.

## Acesso à Aplicação

Abra o navegador e acesse [http://localhost:8000](http://localhost:8000) (ou a porta indicada pelo comando ```php artisan serve```).
