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

                $plan=new Reservation;
                $resa_research=$plan->getPlanning();
                for($heure=8;$heure<=19;$heure++){
                echo"<tr>
                <td><p> $heure h</p></td>";
                for($jour=1;$jour<=5;$jour++){
                    if(!empty($resa_research))
                    {                                                                                             
                        foreach($resa_research as $resa => $resa_hour)
                            {                                                
                                $j_hour= explode(" ",  $resa_hour['debut']);
                                $h_hour= explode(":", $j_hour[1]);
                                $heure_resa = date("G", mktime($h_hour[0], $h_hour[1], $h_hour[2], 0, 0, 0));                
                                $j = explode("-", $j_hour[0]);
                                $jour_resa= date("N", mktime(0, 0, 0, $j[1], $j[2], $j[0]));   
                                $case_resa = $heure_resa . $jour_resa;                                   
                                $titre =$resa_hour["titre"];
                                $login = $resa_hour["login"];
                                $id =$resa_hour["id"];                                 
                                $case = $heure . $jour;
                                if($case == $case_resa)
                                    {                                                 
                                        ?>
                                            <td class="resa"><a href="reservation.php/?id=<?php echo $id;?>"><p><?php echo $titre;?></p><p><?php echo $login;?></p></a></td>
                                        <?php                                                
                                        break; 
                                    }
                                else 
                                    {
                                        $case = null; 
                                    }                                                                                         
                            }                                                                       
                        if ($case == null)
                            {                                                                                                                                                                                                           
                                ?>
                                <td class="case"><a href="reservation-form.php?heure_debut=<?php echo $jour_resa;?>&amp;date_debut=<?php echo $jour;?>">Réserver un créneau</a></td>
                                <?php
                            }                                                                                                                                                
                    }                                                                                                       
                else
                    {                        
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