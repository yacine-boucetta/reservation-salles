<?php

require '../config/classReservation.php';

?>
<?php
require '../template/header.php';
$jour_semaine=date('d/m', strtotime(''));

?>

<h1>Planning <?php echo $jour_semaine = date('Y', time());?></h1>
        <h2>Semaine <?php echo $jour_semaine = date('W', time());?></h2>
        <table style='border: 1px solid black'>
            <thead style='border: 1px solid black'>
                <tr>
                    <th class="vide"></th>
                    <th class="jour">Lundi <?php echo $jour_semaine = date('d/m', strtotime('monday this week'));?></th>
                    <th class="jour">Mardi <?php echo $jour_semaine = date('d/m', strtotime('tuesday this week'));?></th>
                    <th class="jour">Mercredi <?php echo $jour_semaine = date('d/m', strtotime('wednesday this week'));?></th>
                    <th class="jour">Jeudi <?php echo $jour_semaine = date('d/m', strtotime('thursday this week'));?></th>
                    <th class="jour">Vendredi <?php echo $jour_semaine = date('d/m', strtotime('friday this week'));?></th>
                </tr>                              
            </thead>
            <tbody >
                <?php
                $h_debut=date('08:00');
                $h_fin=date('09:00');
                $plan=new Reservation;
                $eng=$plan->getPlanning();
                var_dump($jour_semaine);
                var_dump($eng);
                $heurs= explode (" ",$eng['debut']);
                var_dump($heurs);
                for($j=8;$j<19;$j++){
                echo"<tr>";
                for($i=0;$i<=5;$i++){
                    if($i==0){
                        echo"<td>$h_debut-$h_fin h</td>";
                        $h_debut++;
                        $h_fin++;
                    }
                    else{  
                        if(isset($eng['debut']) && $eng['debut']==$jour_semaine ){
                            echo "<td>c</td>";
                    }
                        else{
                        echo "<td>b</td>";
                        }
                } 
                }
                echo"</tr>";
                }   
                ?>
            </tbody>
        </table>



<?php
require '../template/footer.php';
?>