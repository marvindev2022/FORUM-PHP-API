# Fórum de Discussão - Backend

## Descrição
Este é o backend da aplicação de "Fórum de Discussão" para a plataforma de LMS SaaS. Ele gerencia todas as operações do fórum, como criação de tópicos, postagem de mensagens, pesquisa por categorias, entre outras funcionalidades.

### Requisitos Técnicos

- **Laravel e PHP**: Utilizamos o framework Laravel para criar uma API RESTful eficiente.
- **Banco de Dados MySQL**: O MySQL é usado para armazenar informações sobre tópicos, mensagens, usuários, etc.
- **Git**: Utilizamos o Git para controle de versão do código-fonte.

#### Como Executar o Backend

1. Clone este repositório.

   ```js
   git clone git@gitlab.com:marvindev2022/forum-backend.git
   ```

2. Navegue até a pasta do projeto.

   ```js
   cd forum-backend
   ```

3. Instale as dependências.

   ```js
   composer install
   ```

4. Configure o arquivo `.env` com as configurações do banco de dados.

5. Execute as migrações para criar as tabelas no banco de dados.

   ```js
   php artisan migrate
   ```

6. Inicie o servidor de desenvolvimento.

   ```
   php artisan serve
   ```

7. O backend estará disponível em `http://localhost:8000/api`.

#### Estrutura do Projeto

- `app/`: Contém os controladores, modelos e outras classes do aplicativo.
- `database/`: Migrações e sementes de banco de dados.
- `routes/`: Definição das rotas da API.
- `config/`: Configurações da aplicação.
- ...

#### Documentação

- [Documentação da api - Swagger](https://app.swaggerhub.com/apis-docs/MAVIROLERO/forum-api/1.0.0)

#### Autor

- Marcus Roza
