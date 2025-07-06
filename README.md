Sistema de Publicidades em PHP

Olá! Este sistema foi desenvolvido utilizando PHP puro, juntamente com HTML, CSS e JavaScript para a parte visual do sistema.

Pré-requisitos:
- [Docker](https://www.docker.com/) instalado e em execução na sua máquina
- [Git](https://git-scm.com/) instalado
- Editor de texto como [Visual Studio Code](https://code.visualstudio.com/)

Passos para utilizaçao do sistema:
1. Clonar o repositório:
Abra o terminal e execute:
git clone https://github.com/jonathanwilliam01/publicidades-php

2. Acessar a pasta do projeto:
cd publicidades-php

3. Subir os containers com Docker Compose:
docker compose up --build

4. Criar a tabela do banco de dados:
http://localhost:8080/db.php

5. Acessar o sistema: 
http://localhost:8080/index.php

Observações:
As imagens carregadas ficam armazenadas localmente na pasta /uploads.
O banco de dados utilizado é o PostgreSQL, rodando em container Docker.
