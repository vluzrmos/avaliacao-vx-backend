# Teste PHP
<hr>
O objetivo deste teste é conhecer suas habilidades em: 
- PHP, MySQL e JavaScript;  
- Entendimento e análise dos requisitos;  
- Modelagem de banco de dados;  
- Integração com API;  
A aplicação pode ser feita em PHP puro ou algum framework conhecido no mercado. Banco de dados MySQL. Será um diferencial se for usado o Framework Zend ou Laravel, pois é com eles que você vai trabalhar.  

## Problema
### Sistema de Vendas
- O cliente pediu para registrar as vendas de produtos da loja;
- Ele quer visualizar as vendas realizadas.
## Requisitos
- Modelar a tabela de vendas
- A venda tem que ter os produtos vendidos, data da compra
- Uma venda pode ter mais de um produto
- A única tela de cadastro que você precisa fazer é a de vendas, não precisa criar a tela de cadastro de produtos, somente a tabela no banco de dados. - - Popule a tabela de produtos diretamente no banco;
- Um produto deve conter nome, preço e previsão de entrega (Dias). Todos obrigatórios (lembrando que você não vai criar a tela de cadastro, mas deve tratar isso no banco de dados);
- O banco de dados não pode permitir 2 produtos com mesma referência;
- O front fica a seu critério, pode usar jquery, javascript ou algum framework;
- Considere sempre quantidade 1 para cada item adicionado na tela de venda;
- Os preços dos produtos sofrem atualização semanal, isso não pode interferir no valor das vendas registradas e de seus produtos. Modele o banco de dados de tal forma a tratar essa questão;
## Diferenciais
- Ao exibir as vendas informar o tempo de entrega com base na maior data de previsão;
- Semantica no código
- Legibilidade no código
- Utilizar conceito DRY
- Utilizar princípio da responsabilidade única