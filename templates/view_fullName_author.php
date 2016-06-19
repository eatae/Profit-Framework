
<style>
    .auth {
        margin: 20px;
        border: 4px solid #c0c69b;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
    }
    .auth td, th {
        padding: 10px;
        border: 2px solid #c0c69b;
    }
</style>
<table class='auth'>
    <th>Id</th>
    <th>Полное имя</th>
    <?php foreach ($this->models as $model): ?>
        <tr>
            <?php foreach ($model as $key => $val) {
                if ($key == 'id') {
                    echo '<td>' . $this->functions['id']($val) . '</td>';
                }
                if ($key == 'firstname') {
                    //придёт функция с замыканием
                    $this->fullName = $this->functions['fullName']($val);
                }
                if ($key == 'lastname') {
                    echo '<td>' . call_user_func($this->fullName, $val) . '</td>';
                }
            }
            ?>
        </tr>
    <?php endforeach ?>
</table>
