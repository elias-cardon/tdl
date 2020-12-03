<?php 
     
    include('Classes/Db.php');
    include('Classes/Todo.php');

    $db = new DB();

    
    $success = "";
    $error = "";
    

    // DELETE TODO BY ID
    if ( isset($_POST['id'])) {

        $id = $_POST['id'];
        $res = $db->delete($id);
        $success = "Tache supprimée avec succès!";
      
    }
    
    //ADD TODO TO DB
    else if ( isset($_POST['todo']) && isset($_POST['tags']) ) {
        
        $todo = $_POST['todo'];
        $tags = $_POST['tags'];

       

        if (strlen($todo) < 3) {
            
            $error .= "Le nom de la tache doit <strong>obligatoirement</strong> contenir <strong>au moins</strong> 3 charactères !";
        
        }

        //TODO: add duplicate data protection
        
        else {
            $db->insert($todo,$tags);
            $success .= "Tache ajoutée avec succès!";
        }
        
    }

        
    $table = 'todo';
    $res = $db->select($table);

    $num_rows = mysqli_num_rows($res);



    
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Todo List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" /> 
    

    <!-- STYLES -->
    <link rel="stylesheet" href="/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/main.css" />

</head>
<body>
    <header>
        <h1>To do list</h1>
        <nav>
            <a href="logout.php">Déconnexion</a>
        </nav>
    </header>
    <!-- ALERT -->
    <div class="container" id="alert-container">

            <?php if ($error) { ?>

                    <div class='alert alert-danger alert-dismissible rounded-0' role="alert">
                        <span class="alert-message"><?php echo $error; ?></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                <?php }

                else if($success) { ?>
                    
                    <div class='alert alert-light alert-dismissible rounded-0' role="alert">
                        <span class="alert-message"><?php echo $success; ?></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

            <?php    
                
                }

            ?>

    </div>

    <?php
            
           
        if ($error || $success) { ?>

            <div class="container">
                <hr />
            </div>            
    <?php     
            
        }

    ?>

    <!-- MAIN DIV -->
    <div class="container rounded-right" id="main">

        

      <form class="form-group" method="post">
        <div class="row">
          
            <!-- INPUTS AND ADD BUTTON -->

            <div class="col-sm-4 col-md-6 align-items-center">
                <h3><label for="todo">Entrez le nom de la tache</label><h3>
                <input type="text" name="todo" id="todo" class="form-control" autofocus><br/>
                <h3><label for="todo">Ajouter un tag à votre tache</label></h3>
                <input type="text" name="tags" id="tags" class="form-control" ><br/>

                <input type="submit" class="btn btn-secondary" id="submit" value="Ajouter"/>
            </div>
            <div class="col-sm-8 col-md-6">
                <h1 class="display-4">Votre liste
                    <small class="text-muted">(<?php echo $num_rows; ?>)</small>
                </h1>
                
                <!-- FETCH TODOS FROM DB AND DISPLAY THEM -->
                <ul class="list-group list-group-flush" id="sortable">
                    <?php 
                            while ($row = mysqli_fetch_row($res)) {
                    ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $row[1]; ?>
                                    <span class="badge badge-secondary badge-pill"><?php echo $row[2]; ?></span>
                                    
                                    <button type="submit" class="close" name="id" value=<?php echo $row[0]; ?> >
                                        &times;                                       
                                    </button>
                                </li>
                    <?php 
                           }
                    ?>
                </ul>
            
            </div>
        </div>

                          
       
      </form>

      

      
    </div>

    
    <!-- JQUERY/JS SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/tweaks.js"></script>


</body>

</html>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display+SC');

* {
    margin: 0;
    padding: 0;
}

a {
    text-decoration: none;
    color: inherit;
}

body {
    font: normal 18px 'Open Sans', sans-serif;
    background: #fafafa;
    color: #333;
}

main {
    min-height: 100vh;
}

    h1{
        font: normal 4em 'Playfair Display SC', serif;
        text-align:center;
    }

    nav {
        max-width: 800px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
    }

        nav a {
            flex-grow: 1;
            text-align: center;
            padding: 1em;
            position: relative;
        }

        // animmation
        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right:0;
            height: 2px;
            transform: scaleX(0);
            background: #333;
            transition: 0.7s transform cubic-bezier(0.06, 0.9, 0.28, 1);
        }

        nav a:hover::after{
            transform: scaleX(1)
        }

</style>