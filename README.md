# Projeto Prático Chico Rei
Este é um projeto que tem como objetivo fazer web srap da [página de camisetas da Chico Rei.](https://chicorei.com/camiseta/)

## Instalação
- Clone este repositório em sua máquina local.
- Abra o terminal e navegue até o diretório raiz do projeto.
- Execute o comando `composer install` para instalar as dependências do projeto.
- Renomeie o arquivo `.env.example` para `.env`.
- Execute o comando `php artisan key:generate` para gerar uma chave para a aplicação.
- Configure as informações de acesso ao banco de dados no arquivo .env.
- Execute o comando `php artisan migrate` para criar as tabelas no banco de dados.
- Execute o comando `php artisan db:seed` para popular as tabelas com dados de teste.
- Execute o comando `php artisan serve` para iniciar o servidor de desenvolvimento.


## Uso
Após seguir os passos de instalação, abra o navegador e acesse o endereço http://localhost:8000/scraper para realizar o web scrap da página e salvar os dados obtidos no banco de dados.


## Nota
- Infelizmente não consegui terminar a integração do projeto frontend com o backend, devido a contratempos familiares que pensei que seriam resolvidos a tempo, porém não foram. 

### Funcionalidades previstas que não chegaram a ser implementadas:
#### Backend:
- Criação de uma Model e de uma tabela `Details`, que ficasse responsável por armazenar e relacionar tamanhos, cores, modelagem, descrição, categorias e detalhes disponíveis sobre cada uma das camisetas. Esses dados foram scrapados, porém não estão relacionados no banco de dados final. 
#### Frontend:
- Integrar com as rotas do backend, refinar estilos e implementar do gerenciador de estados para poder simular o carrinho e finalização dos produtos no site.
