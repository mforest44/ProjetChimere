<!DOCTYPE html>
<html>
    <head>
        <title>Bijouterie Chimère</title>
        <meta charset="UTF-8">
        <link href="SiteClient.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body style="background-color: rgb(254, 239, 216);">
        
    <?php
    include_once("config.php");
    $pdo = new PDO("mysql:host=".config::SERVERNAME.";"
            . "dbname=".config::DBNAME, 
            config::USER, 
            config::PASSWORD);
    ?>
        
        <div class="header"> 
            <img src="Image/BandeauComplet.jpg" alt="" style="max-width:100%;min-width: 100%"/>
        </div>
        
        <div id="Page">

        <img src="Image/pierre.png" alt="" id="Pierre">
        <h1 id="TexteVente"> NOS BIJOUX EN STOCK</h1>
        <table>
            <tr>
                <?php
                $req=$pdo-> prepare("SELECT Nom from projetbijoux WHERE Statut='Fini'");
                $req->execute();
                $i=0;
                foreach ($req as $row) {
                $Nom = $row['Nom'];
                
                              echo'<td>  <!-- Case de Bijoux -->
                    <div class="InLineBlock">
              
                        <img src="Image/ParureSaphir.jpg" alt=""/>  <!-- Photo du bijoux (en local pour le moment) -->
              
                        <p id="NomBijoux">  <!-- Nom du bijoux -->
                            <b>'.$Nom.'</b>
                        </p>
                        <button id="Contact">  <!-- Boutton contact (ne renvoie rien pour le moment) -->
                        <img src="Image/enveloppe.png" alt=""/>
                        Contactez-nous
                        </button>
                        
                    </div>
                        </td>';
                              
                $i = $i +1;
              
                if($i == 3)
                {
                    echo'</tr><tr>';
                    $i = 0;
                }
                
                } 
                ?>
            </tr>
        </table>
        
        
        <center>    

        </center>
        
        </div>
    </body>
</html>