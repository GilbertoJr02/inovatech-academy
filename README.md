InovaTech Academy
Projeto desenvolvido para a disciplina de HTML, CSS e PHP.

Objetivo
Desenvolver um portal de oficinas utilizando PHP, HTML, CSS e armazenamento de dados em JSON.

Funcionalidades
Página Inicial
Apresentação da instituição e destaques.

Catálogo de Oficinas
Exibe as oficinas disponíveis organizadas por categorias.

Inscrição
Permite ao usuário realizar inscrição em uma oficina.

Validação
O sistema valida:

Nome mínimo de 3 caracteres;
E-mail válido;
Seleção de oficina;
Aceite dos termos.
Persistência
As inscrições são armazenadas em:

dados/inscricoes.json
Listagem
Exibe todas as inscrições registradas e o total de inscritos.

Tecnologias Utilizadas
HTML5
CSS3
PHP 8
JSON
Estrutura do Projeto
public/
includes/
dados/
docs/
Execução
Servidor local:

php -S localhost:8000 -t public