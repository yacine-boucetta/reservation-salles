<?php
require '../config/db.php'

?>
<?php
require '../template/header.php';
$jour_semaine=date('d/m', strtotime(''));
?>
<article>
<h1>Planning <?php echo $jour_semaine = date('Y', time());?></h1>
        <h2>Semaine <?php echo $jour_semaine = date('W', time());?></h2>
        <table>
            <thead>
                <tr>
                    <th class="vide"></th>
                    <th class="jour">Lundi <?php echo $jour_semaine = date('d/m', strtotime('monday this week'));?></th>
                    <th class="jour">Mardi <?php echo $jour_semaine = date('d/m', strtotime('tuesday this week'));?></th>
                    <th class="jour">Mercredi <?php echo $jour_semaine = date('d/m', strtotime('wednesday this week'));?></th>
                    <th class="jour">Jeudi <?php echo $jour_semaine = date('d/m', strtotime('thursday this week'));?></th>
                    <th class="jour">Vendredi <?php echo $jour_semaine = date('d/m', strtotime('friday this week'));?></th>
                </tr>                              
            </thead>
            <tbody>
                <?php
                for($i=1;$i<=5;$i++){
                   
                    for($j=1;$j<=11;$j++){

                    }
                }        
                ?>
            </tbody>
        </table>
</article>


<?php
require '../template/footer.php';
?>