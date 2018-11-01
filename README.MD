Esta API Gerencia CRUD de lista de livros:
***************************************************
// No cliente consumir tabela de livros do banco de dados via REST:
**READ ( lista todos os arquivos com paginação 5 em 5) 
GET: {{ http://localhost/lemapi  }}/livros/listar?page=( número da página )
Retorna JSON:
{
	"0": {
		"id": "Auto Incremento",
		"0": "Auto Incremento",
		"codigo_interno": "Autoomático na inserção de dados",
		"1": "Autoomático na inserção de dados",
		"isbn": "PODE deixar vazio na inserção de dados",
		"2": "PODE deixar vazio na inserção de dados",
		"titulo": "",
		"3": "",
		"ano_edicao": "",
		"4": "",
		"tipo_suporte": "",
		"5": "",
		"num_paginas": "",
		"6": "",
		"editora": "",
		"7": "",
		"Participacoes": "",
		"8": "",
		"data_cadastro": "Autoomático na inserção de dados",
		"9": "Autoomático na inserção de dados"
	},
	"quantLivros": APRESENTA TOTAL DE LIVROS,
	"quantPaginas": APRESENTA QUANTIDADE DE PÁGINAS,
	"pagina": APRESENTA A PÁGINA ATUAL
}

**CREATE ( Insere novo livro ) 
POST: {{ http://localhost/lemapi }}/livros/add:
Content-Type: application/x-www-form-urlencoded
form:
name: isbn;
name: titulo;
name: ano_edicao;
name: tipo_suporte;
name: num_paginas;
name: editora;
name: participacoes;

**UPDATE ( Atera tabela livros no banco de dados ):
POST: {{ http://localhost/lemapi }}/livros/update:
Content-Type: application/x-www-form-urlencoded
form:
name: isbn;
name: titulo;
name: ano_edicao;
name: tipo_suporte;
name: num_paginas;
name: editora;
name: participacoes;
name: id.
Obs: id é a único campo obrigatório. Podendo deixar os demais em branco. Isto é, preencher somente o que for alterar.

**DELETE ( Deleta livro por id)
POST: {{ http://localhost/lemapi }}/livros/del:
Content-Type: application/x-www-form-urlencoded
form:
name: id.






