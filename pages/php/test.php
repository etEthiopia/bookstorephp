<?php
/*                
                
                
                if(isset($_SESSION['logged'])){
                    
                        print_r($_SESSION);
                        session_destroy();
                    
                }*/
                ?>


                	<ul class="nav navbar-nav">
        <?php 
        session_start();
          if(isset($_SESSION['logged'])){
            if($_SESSION['logged']){
              echo "<li><a href='registerinstructor.html'>Add Book</a></li>";
            }
          }
        ?>
          </ul>