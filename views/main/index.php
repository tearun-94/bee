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
        <th scope="col" width="5%"><a href="?order=<?=\App\Helper::sort('id')?>">#</a></th>
        <th scope="col"width="20%"><a href="?order=<?=\App\Helper::sort('name')?>">Имя</a></th>
        <th scope="col" width="20%"><a href="?order=<?=\App\Helper::sort('email')?>">Email</a></th>
        <th scope="col" width="25%">Задача</th>
        <th scope="col" ><a href="?order=<?=\App\Helper::sort('status')?>">Статус</a></th>
        <?php if (\models\Users::isUser()):?>
            <th scope="col" >Действие</th>
        <?php endif;?>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($model as $item):
        ?>
        <tr>
            <form method="post">
                <th scope="row"><?=$item->id?></th>
                <td><?=$item->name?></td>
                <td><?=$item->email?></td>
                <?php if (\models\Users::isUser()):?>
                    <td style="display: none"><input name="id" type="text" value="<?=$item->id?>"/></td>
                    <td><textarea name="text"><?=$item->text?></textarea></td>
                    <td>
                        <input class="form-check-input" type="checkbox" value="1" id="statusCheck<?=$item->id?>" name="status" <?=$item->status == 0 ? '': 'checked'?>>
                        <label class="form-check-label" for="statusCheck<?=$item->id?>">
                            Выполнена
                        </label>
                    </td>
                    <td><button type="submit" class="btn btn-primary">Сохранить</button></td>
                <?php else:?>
                    <td><?=$item->text?></td>
                    <td><?=$item->status == 0 ? 'Не выполнена': 'Выполнена'?><?=$item->edit == 1 ? '<br>Отредактированна администратором': ''?></td>
                <?php endif; ?>
            </form>
        </tr>
        <?php
    endforeach;
    ?>
    </tbody>
</table>

