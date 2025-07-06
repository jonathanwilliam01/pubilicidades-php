Olá!
Esta versão foi construída apenas com a linguagem PHP e utilizando as linguagens de tipagem visuais (HTML, CSS e JavaScript)

Para utilizar este sistema, basta selecionar uma pasta local de sua maquina e com o terminal utilizar o comando git clone para clonar o repositório:
git clone https://github.com/jonathanwilliam01/publicidades-php

Assim que clonado o repositório e com o Docker aberto em sua maquina, acesse o terminal do vs code ou terminal da maquina e utilize o comando:
docker composse up --build 

Assim que criado a imagem, acesse a pagina web abaixo para criar as dependências do banco de dados:
localhost:8080/db.php

Assim que executado os passos acima o sistema já pode ser acessado na web pelo caminho abaixo:
localhost:8080/index.php
