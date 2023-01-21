<h1 align="center">Desafio Coodesh</h1>
<h2 align="center">Sistema CRON e REST api com Laravel</h2>

<h3>Instruções para instalação do projeto:</h3>
<p><strong>1: </strong>Clone o projeto no seu computador.</p>
<p><strong>2: </strong>Execute o comando "composer update".</p>
<p><strong>3: </strong>Configure a conexão com seu banco de dados no arquivo .ENV (copiar o .env.example e renomear).</p>

<h3>Instruções para testar os scrips desenvolvidos:</h3>
<p><strong>1: </strong>Execute o comando "php artisan migrate:fresh" para criação/recriação da base dados (base criada através de migration do Laravel).</p>
<p><strong>2: </strong>Verifique as rotas disponíveis no arquivo api.php (pasta routes).</p>
<p><strong>3: </strong>Verifique os métodos de cada rota no seu respectível controller (ProductController)</p>
<p><strong>4: </strong>Acesse a o CRON script no diretório \app\console\commands\ImportProducts.php.</p>
<p><strong>5: </strong>Acesse o arquivo Kernel.php e modifique: $schedule->command('ImportProducts')->dailyAt('23:00'); para $schedule->command('ImportProducts')->everyMinute();</p>
<p><strong>6: </strong>Execute o seguinte comando para executar o script CRON de importação da base de dados: "php artisan schedule:run".</p>
<p><strong>7: </strong>Base de dados importada com sucesso. Hora de testar a REST api.</p>
<p><strong>8: </strong>Caso ocorra algum erro, execute o seguinte comando e tente novamente: "php artisan config:cache".</p>

<h4>OBSERVAÇÕES:</h4>
<p>Uma tabela chamada cron_details também será criada, nela você poderá encontrar detalhes do CRON script.</p>
