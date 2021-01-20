	 <?php foreach ($taskList as $rows) :?>
	 <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="img/300px-Task.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title"><?php echo $rows['TaskName']; ?></h4>
            <p class="card-text"><?php echo $rows['TaskDescription']; ?></p>
            <p class="card-text">Abertura: <?php echo $rows['TaskTime']; ?></p>
            <p class="card-text">Desenvolvodores: <?php 
                foreach ($rows['TaskDevs'] as $dev) {
                    echo $dev['TaskUserId'] . ', ';
                } 
                ?></p>
            <p class="card-text">
            	Estado: <?php echo (empty($rows['TaskDone']))? '<span class="text-primary"> Em Andamento</span>': '<span class="text-primary">Finalizado</span>'; ?><br>
            	Prioridadade: <?php 
            	                   switch ($rows['TaskPriority']) {
                                	    case 1:
                                	       echo '<span class="text-success"> Baixo</span>';
                                	    break;
                                	    case 2:
                                	       echo '<span class="text-warning"> Normal</span>';
                            	        break;
                                	    case 3:
                                	       echo '<span class="text-danger"> Alto</span>';
                            	        break;
                                	    default:
                                	        echo '<span class="text-primary"> Não Informado</span>';
                                	    break;
                                	} 
                                ?>            	
            </p>
          </div>
          <div class="card-footer text-center">
            <a href="javascript: doneTask(<?php echo $rows->id;?>);" class="btn btn-primary">Finalizar Tafera!</a>
            <a href="javascript: deleteTask(<?php echo $rows->id;?>)" class="btn btn-danger">Excluir Tafera!</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>