# Sistema de Estoque (PHP + MySQL)

Aplicação de um Sistema de Estoque para o projeto da cadeira de Programação Web - Segunda - Manhã

**Você pode ver o vídeo de demonstração aqui:**  
[Link do vídeo no YouTube](https://youtu.be/nGbaIN5E7so?si=rk2dOWucHICLcHFb)

## Descrição  
Este projeto é um sistema web simples desenvolvido em PHP com banco de dados MySQL, para gerenciar:  
- Produtos  
- Movimentações de estoque (entrada e saída)  
- Fornecedores  

Ele utiliza CRUD completo (Create, Read/List, Update, Delete) para algumas entidades, que são Produtos e Fornecedores, com interface básica utilizando Bootstrap.

## Funcionalidades  
- Cadastro, listagem, edição, detalhamento e exclusão de **produtos**  
- Cadastro, listagem e exclusão de **movimentações**, que automaticamente ajustam o estoque do produto  
- Cadastro, listagem, edição e exclusão de **fornecedores**  
- Home (painel inicial) com botões coloridos para navegação  
- Estrutura de pastas organizada:  
  - `components/`: header, footer  
  - `core/Produtos/`, `core/Movimentos/`, `core/Fornecedores/`: funcionalidades CRUD  
  - `infra/`: arquivo de conexão com banco de dados (`db.php`)   
  - `index.php`: página inicial do sistema  

## Instalação  
1. Instale o pacote **XAMPP** (Apache + MySQL) ou similar.  
2. Coloque a pasta do projeto dentro de `htdocs` (ou equivalente) do XAMPP.  
3. Inicie os módulos Apache e MySQL do XAMPP.  
4. Acesse no navegador: `http://localhost/Sistema-Estoque/`  
5. O arquivo `infra/db.php` cuidará de criar o banco de dados (`estoque_db`) e as tabelas se ainda não existirem.

## Uso  
- Na página inicial, clique em “Produtos”, “Movimentações” ou “Fornecedores”.
- Para produtos: adicione o nome do produto, descrição, quantidade, preço, categoria e estoque mínimo.
- Para movimentações: selecione o produto, tipo (entrada/saída), quantidade e observação. O sistema atualiza o estoque automaticamente.  
- Para fornecedores: insira o nome do fornecedor, email e telefone.
- Listagens mostram os dados, com botões para editar/excluir onde aplicável.

## Ambiente e Tecnologias  
- Linguagens: PHP 
- Banco de dados: MySQL  
- Interface: Bootstrap 5 para layout simples  
- Estrutura: sem frameworks PHP, seguindo as regras da disciplina (CRUD “puro”)
