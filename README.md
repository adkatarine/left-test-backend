# Teste Backend - Left

## Descrição
Teste técnico da Left de um sistema contendo as tabelas Categoria, Produto, Cliente e Endereço do cliente e seus respectivos CRUD's.

# Rotas

## Rotas Category

| Método HTTP  | Endpoint                    | Descrição                                |
| ------------ | --------------------------- | ---------------------------------------- |
| GET          | `/api/category`             | Retorna todos as categorias cadastradas  |
| GET          | `/api/category/{id}`        | Retorna uma categoria por Id             |
| POST         | `/api/category`             | Cadastra uma nova categoria              |
| PUT          | `/api/category{id}`         | Altera informações de uma categoria      |
| DELETE       | `/api/category{id}`         | Deleta uma categoria especifica          |


## Rotas Product

| Método HTTP   | Endpoint                    | Descrição                              |
| ------------- | --------------------------- | -------------------------------------- |
| GET           | `/api/product`              | Retorna todos os produtos cadastrados  |
| GET           | `/api/product/{id}`         | Retorna um produto por Id              |
| GET           | `/storage/{path-image}`     | Rota para visualizar imagem cadastrada |
| POST          | `/api/product`              | Cadastra um novo produto               |
| POST          | `/api/product{id}`          | Altera informações de um produto       |
| DELETE        | `/api/product{id}`          | Deleta um produto especifico           |


## Rotas Client

| Método HTTP  | Endpoint                   | Descrição                                 |
| ------------ | -------------------------- | ----------------------------------------- |
| GET          | `/api/client`              | Retorna todos os clientes cadastrados     |
| GET          | `/api/client/{id}`         | Retorna um cliente por Id                 |
| POST         | `/api/client`              | Cadastra um novo cliente                  |
| PUT          | `/api/client{id}`          | Altera informações de um cliente          |
| DELETE       | `/api/client{id}`          | Deleta um cliente especifico              |


## Rotas Address

| Método HTTP  | Endpoint                    | Descrição                                            |
| ------------ | --------------------------- | ---------------------------------------------------- |
| GET          | `/api/address`              | Retorna todos os enedereços de clientes cadastrados  |
| GET          | `/api/address/{id}`         | Retorna um endereço por Id                           |
| POST         | `/api/address`              | Cadastra um novo enedereço                           |
| PUT          | `/api/address{id}`          | Altera informações de um enedereço                   |
| DELETE       | `/api/address{id}`          | Deleta um enedereço especifico                       |


## Rotas Client Order

| Método HTTP  | Endpoint                         | Descrição                                           |
| ------------ | -------------------------------- | ----------------------------------------------------|
| GET          | `/api/client-order`              | Retorna todos os pedidos de produtos dos clientes   |
| GET          | `/api/client-order/{id}`         | Retorna um pedido por Id                            |
| POST         | `/api/client-order`              | Cadastra um novo pedido                             |
| PUT          | `/api/client-order{id}`          | Altera informações de um pedido                     |
| DELETE       | `/api/client-order{id}`          | Deleta um pedido especifico                         |


## Dados do body request em formato JSON - Category

```
🔃 POST/PUT

{
	"name": "Categoria 1"
}
```

## Dados do body request em formato Multipart Form - Product

```
🔃 POST

{
	"name": "Product 1",
	"description": "Description 1",
	"category_id": 1,
	"quantity_stock": 10,
	"price": 5,
    "image": image.jpg
}

🔃 POST para atualizar um product

{
	"name": "Product 1",
	"description": "Description 1",
	"category_id": 1,
	"quantity_stock": 10,
	"price": 5,
    "image": image.jpg,
    "_method": "PUT"
}
```


## Dados do body request formato JSON - Client

```
🔃 POST

{
	"name": "Iva Heaney",
	"email": "bernadette13@example.com",
	"phone_number": "072326781",
	"date_birth": "1971-07-31",
	"cpf": "00000000000",
	"cnpj": "00000000000000",
	"addresses": [
	{
			"cep": "00000000",
			"number": "10",
			"complement": ""
	},
	{
			"cep": "00000001",
			"number": "28",
			"complement": ""
	}]
}

🔃 PUT

{
	"name": "Iva Heaney",
	"email": "bernadette13@example.com",
	"phone_number": "072326781",
	"date_birth": "1990-06-30",
	"cpf": "00000000000",
	"cnpj": "00000000000000"
}
```


## Dados do body request em formato JSON - Address

```
🔃 POST/PUT

{
	"client_id": 2,
	"cep": "00000001",
	"number": "14",
	"complement": ""
}
```


## Dados do body request em formato JSON - Client Order

```
🔃 POST/PUT

{
	"client_id": 10,
	"product_id": 10,
	"quantity": 5
}
```

# Como executar o projeto em sua máquina

```
# Clone este repositório
$ git clone https://github.com/adkatarine/left-test-backend.git

# Acesse a pasta do projeto no terminal ou cmd ou editor de sua preferência

# Instale as dependências na raiz do projeto
$ composer install

# Configure as variáveis de ambiente do banco de dados no arquivo .env

# Crie uma nova chave para a aplicação
$ php artisan key:generate

# Execute este comando para criar todas as migrações
$ php artisan migrate

# Execute este comando para criar um link simbólico para o disco public
$ php artisan storage:link

# Execute este comando para popular as tabelas usando o Seeder
$ php artisan db:seed

# Execute a aplicação para acessar a API
$ php artisan serve

# Escolha um cliente da sua preferência para testar a API e configure as rotas ou importe o arquivo
insomnia-routes.json no Insominia. Caso deseje configurar as rotas, adicione no Headers de cada rota
POST/PUT um header Accept com value application/json

# Para que seja possível visualizar a imagem cadastrada é so utilizar a rota especificada anteriormente,
por exemplo: http://127.0.0.1:8000/storage/images\/XqJDTZNjBZHXPDVTiVwADGL3YVYMlAUwtbCoStka.jpg
```

# Decisões de projeto

## Tabelas
A tabela Client Order foi adiciona para simular uma "compra" de algum produto pelo cliente e assim obtendo interação entre as tabelas.

## API de requisição do endereço
A classe estática responsável pelos dados e requisição da API BrasilAPI implementa a interface BrasilAPI para minimizar grandes mudanças em outras partes do código caso seja necessário trocar de API.

## Service Container
Este recurso foi utilizado, junto com os repositories, afim de remover as regras de negócios dos controllers e utilizar a injeção de dependência.

## Cache do Laravel
A Cache do Laravel foi utilizada na requisição das categorias no banco, considerando que é provavel que raramente categorias seriam adicionadas ou removidas sempre, tornando descessário requisitar o banco com tanta frequência.

# Construído com

* [Laravel](https://laravel.com) - Framework na versão 9.x para criar a API
* [MySQL](https://www.mysql.com) - Database
* [Service Container](https://laravel.com/docs/master/container) - Ferramenta do Laravel para realizar injeção de dependência
* [Cache](https://laravel.com/docs/9.x/cache) - Cache do Laravel para não ser necessário consultar as categorias no banco a cada requisição
* [validator-docs](https://github.com/geekcom/validator-docs) - Biblioteca PHP para validação de documentos do Brasil usando Laravel
* [Brasil API](https://brasilapi.com.br/docs) - API para consulta dos endereços utilizando a versão 2 do serviço de busca por CEP
* [Insomnia](https://insomnia.rest) - Cliente para testar a API
