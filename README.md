# backEndEOU

Teste desenvolvido com PHP 7.0.10 e Lumen 5.5 

Banco de dados:

Na pasta 'backEndEOU\scripts' esta o script de criacao do banco MySQL
A conexao deve ser configurada no arquivo '.env' como a seguir
Você pode executar o comando 'cp .env.example .env' para gerar o .env

APP_ENV=local
APP_DEBUG=true
APP_KEY=
APP_TIMEZONE=UTC

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bancoeou
DB_USERNAME=[seu usuario]
DB_PASSWORD=[sua senha]

CACHE_DRIVER=file
QUEUE_DRIVER=sync


Instalação:

Dentro da raiz do projeto 'backEndEOU/backEndEOU' exeuctar o comando:
'composer install'

Execução:

Dentro da raiz do projeto 'backEndEOU/backEndEOU' exeuctar o comando:
php -S localhost:8000 -t public/


Rotas:
GET 'user' - lista todos os usuarios

GET 'user/[id]' - mostra um usuario especifico

POST 'user' - cadastra um usuario
Exemplo do corpo da requisicao JSON: 
{"nome" : "Espedito","email" : "e.jr2342@hotmail.com","cpf" : "11111111111","telefone" : "1111111", "latitude": "-23.5632103", "longitude": "-46.6542503"}

POST '/user/upload/csv' - upload de arquivo csv para cadastro de varios usuarios
O arquivo deve ser enviado como um valor de 'form-data'
O arquivo 'backEndEOU/listaUsuarios.csv' é um arquivo de teste, com o formato de csv usado

O 'core' da aplicação esta no arquivo 'backEndEOU/Http/Controllers/UserController.php'


Testes Unitarios:
Os teste se encontram em 'backEndEOU/tests/app/http/controllers/UserControllerTest.php'

Para executar os testes, em 'backEndEOU/backEndEOU' executar o comando:
vendor/bin/phpunit



