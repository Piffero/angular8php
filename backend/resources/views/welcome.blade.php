<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Task Frontpage - Start Task Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Task Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Quadro de Tarefas
              <span class="sr-only">(current)</span>
            </a>
          </li>          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-5">Aplicação simples para controle de tarefas.</h1>      
          <ul class="text-white mb-5">
              <li>A listar as tarefas é ordenada por prioridade e estado, além de permitir a inclusão de uma nova tarefa. </li>
              <li>Você pode adicionar mais de um desenvolvedor para estarem contidos na mesma tarefa.</li>
              <li>Você pode Alterar os estados de Em Andamento para Finalizado.</li>
              <li>Você pode também pode remover uma tarefa, mais não será possível recuperá-la.</li>
          </ul>
	      <p class="lead text-white-50 text-right"><i class="text-white">Lembre-se com grandes poderes vem grandes responsabilidades.</i></p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>O que há de novo?</h2>
        <hr>
        
        <form class="needs-validation" name="formTask" novalidate>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="exampleFormControlTaskName">Nome da Tarefa.</label>
              <input type="text" class="form-control" id="exampleFormControlTaskName" placeholder="Informe o titulo objetivo para tarefa." value="" required>
              <div class="valid-feedback">Tudo certo!</div>
              <div class="invalid-feedback">Por favor, escolha um nome para tarefa.</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="exampleFormControlTaskPriority">Selecione uma prioridade.</label>
              <select class="form-control" id="exampleFormControlTaskPriority" required>
                  <option value="1">Baixo</option>
                  <option value="2">Normal</option>
                  <option value="3">Alto</option>
              </select>
              <div class="valid-feedback">Tudo certo!</div>
              <div class="invalid-feedback">Por favor, escolha uma nome prioridade para tarefa.</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="exampleFormControlTaskPriority">Selecione um ou mais Desenvolvedores (select múltiplo)</label>
              <select multiple class="form-control" id="exampleFormControlDev" required>
              	<option value="1">Devs1</option>
              	<option value="2">Devs2</option>      
              	<option value="3">Devs3</option>      
              	<option value="4">Devs4</option>      
              	<option value="5">Devs5</option>      
              </select>
              <div class="valid-feedback">Tudo certo!</div>
              <div class="invalid-feedback">Por favor, escolha pelo menos um desenvolvedor para tarefa.</div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="exampleFormControlTaskDescription">Descreva a Tarefa a ser executada.</label>
              <textarea class="form-control" id="exampleFormControlTaskDescription" rows="3" required></textarea>
              <div class="valid-feedback">Tudo certo!</div>
              <div class="invalid-feedback">Por favor, descreva a terefa para o desenvolvedor que for assumir possa executar de forma mais objetiva.</div>
            </div>
          </div>
          <button class="btn btn-primary btn-lg" type="submit">Adicionar Tarefa?</button>
		</form>		
      </div>
      <div class="col-md-4 mb-5">
        <h2>Algumas dicas.</h2>
        <hr>
        <p class="card-text">Assim que voçê começar a registrar as tarefas, elas vão surgir abaixo do formulário.</p> 
        <p class="card-text">Com as informações inseridas e disponibilizadas em quadros, note que junto a estes mesmos quadros você terar dois botões para
          Finalizar e Excluir.</p> 
      </div>
    </div>
    <!-- /.row -->

    <div class="row" id="listTask">
      
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
        var forms = document.getElementsByClassName('needs-validation');
        // Faz um loop neles e evita o envio
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
          	event.preventDefault();
            if (form.checkValidity() === false) {
              event.stopPropagation();
            }          	  
            form.classList.add('was-validated');
            
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("listTask").innerHTML =
                  this.responseText;
                }
            };
            
            
        	xhttp.open("POST", "{{route('task.add')}}", true);
        	xhttp.setRequestHeader("Content-type", "application/json");
        	xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}"); 
        
        	var TaskUsers = Array.from(document.getElementById("exampleFormControlDev").options).filter(option => option.selected).map(option => option.value);
        	
        	var jsonText = '{ "TaskName": "'+form[1].value+'", "TaskPriority":"'+form[2].value+'", "TaskUsers": "'+TaskUsers+'", "TaskDescription":"'+form[4].value+'"}';
        	var obj = JSON.parse(jsonText);         	
        	xhttp.send(jsonText);
                     
                               
          }, false);
        });
      }, false);      
    })();
    
    function doneTask(id) {
    		var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("listTask").innerHTML =
                  this.responseText;
                }
            };
            
            
        	xhttp.open("PUT", "task/done/"+id+"", true);
        	xhttp.setRequestHeader("Content-type", "application/json");
        	xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}"); 
        
        	var TaskUsers = Array.from(document.getElementById("exampleFormControlDev").options).filter(option => option.selected).map(option => option.value);
        	
        	var jsonText = '{ "TaskDone": "1" }';
        	var obj = JSON.parse(jsonText);         	
        	xhttp.send(jsonText);
    }
    
    function deleteTask(id) {
    		var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("listTask").innerHTML =
                  this.responseText;
                }
            };
            
            
        	xhttp.open("DELETE", "task/delete/"+id+"", true);
        	xhttp.setRequestHeader("Content-type", "application/json");
        	xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}"); 
        
        	var TaskUsers = Array.from(document.getElementById("exampleFormControlDev").options).filter(option => option.selected).map(option => option.value);
        	
        	var jsonText = '{ "TaskDone": "1" }';
        	var obj = JSON.parse(jsonText);         	
        	xhttp.send(jsonText);
    }
  </script>
    
    
</body>

</html>

