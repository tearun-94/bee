<?php
if ($message == 1):
?>
<div class="alert alert-success" role="alert">
    Задача добавлена!
</div>
<?php
endif;

for ($i = 1; $i < $count/$limit+1; $i++):
    $argv = "";
    foreach ($_GET as $key => $value) {

        if ($key == "page") {
            continue;
        }
        $argv = "&$key=$value";
    }
    $argv = "?page=$i$argv";

    ?>
    <a href="<?=$argv?>" class="btn <?=($i==$_GET['page']||(empty($_GET['page'])&&$i==1))?"btn-success":"btn-primary"?>"><?=$i?></a>

<?php
endfor;
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><a href="?order=<?=\App\Helper::sort('id')?>">#</a></th>
        <th scope="col"><a href="?order=<?=\App\Helper::sort('name')?>">Имя</a></th>
        <th scope="col"><a href="?order=<?=\App\Helper::sort('email')?>">Email</a></th>
        <th scope="col">Задача</th>
        <th scope="col"><a href="?order=<?=\App\Helper::sort('status')?>">Статус</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($model as $item):
        ?>
        <tr>
            <th scope="row"><?=$item->id?></th>
            <td><?=$item->name?></td>
            <td><?=$item->email?></td>
            <td><?=$item->text?></td>
            <td><?=$item->status == 0 ? 'Не выполнена': 'Выполнена'?></td>
        </tr>
        <?php
    endforeach;
    ?>
    </tbody>
</table>

