Instalação de Dependências:
Abra o terminal na pasta do projeto.
Execute composer install para instalar as dependências do Laravel.

Configuração do Ambiente:
Faça uma cópia do arquivo .env.example e renomeie para .env.
Configure as variáveis de ambiente no arquivo .env, como o banco de dados.

Chave de Aplicação:
Execute php artisan key:generate para gerar a chave de aplicação.

Migrações do Banco de Dados:
Execute php artisan migrate para criar as tabelas do banco de dados.

Iniciar aplicação localmente:
Execute php artisan serve para iniciar o servidor embutido do Laravel.

Acesso à Aplicação:
Abra o navegador e acesse http://localhost:8000 (ou a porta indicada pelo comando php artisan serve).