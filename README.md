# Table Fantasy
### Configuração de ambiênte local.

## Instalação de Dependências


1. Clone o repositório:
   ```
    git clone https://github.com/nathanrsnt/table-fantasy.git
    ```
2. Abra o terminal na pasta do projeto.
   
3. Execute o comando para instalar as dependências do Laravel:
   ```
   composer install
   ``` 

## Configuração do Ambiente

1. Faça uma cópia do arquivo ```.env.example``` e renomeie para ```.env```.

2. Configure as variáveis de ambiente no arquivo ```.env```, como o banco de dados.

## Chave de Aplicação

Execute o comando para gerar a chave de aplicação:
    ```
    php artisan key:generate
    ```

## Migrações do Banco de Dados

Execute o comando para criar as tabelas do banco de dados:
    ```
    php artisan migrate
    ```

## Iniciar Aplicação Localmente

Execute o comando para iniciar o servidor embutido do Laravel:
    ```
    php artisan serve
    ```

## Acesso à Aplicação

Abra o navegador e acesse [http://localhost:8000](http://localhost:8000) (ou a porta indicada pelo comando ```php artisan serve```).
