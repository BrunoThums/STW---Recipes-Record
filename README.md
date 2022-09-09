# STW - Recipes-Record
Um gerenciador de receitas feito totalmente em laravel

##### Ferramentas:
PHP 7.4.6 <br>
Laravel version 7.0<br>
Composer version 2.4.1<br>
MySQL Workbench 8.0 CE

# Tutorial de execução
1. Faça um clone do repositório<br>
2. Verifique se você possui as dependências instaladas. Em caso negativo, instale-as; estão na pasta "Dependências"<br>
3. Abra a pasta do projeto utilizando o <b>VSCode</b><br>
4. Abra o MySQL WorkBench 8.0 CE
5. De volta ao VSCode, abra o terminal e entre na pasta do projeto
6. Execute o comando <b>php artisan migrate</b> para criar as tabelas no banco de dados
7. Execute o comando <b>php artisan db:seed --class=DatabaseSeeder</b> (isto populará as tabelas Unidade e MotivoContato com os valores padrão)
8. Finalmente, execute o comando <b>php artisan serve</b> e desfrute do projeto

OBS: a ordenação dos ingredientes é feita de forma manual, evitando duplicatas com o atributo UNIQUE
