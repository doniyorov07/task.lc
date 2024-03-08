<?php
use yii\helpers\Html;



?>

<div class="alert alert-warning" role="alert">
    <?php
    if ($employee) {
        if ($check){
            echo $employee->first_name .' ' . $employee->last_name . ' ' .$employee->birthday ;
        }else{
            echo 'Sizga ruxsat yo\'q';
        }
    } else {
        echo "Bugun tug'ilgan xodimlar mavjud emas";
    }
    ?>
</div>
