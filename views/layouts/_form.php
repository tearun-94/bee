<form method="post" action="main/create">

    <div class="form-group">
        <label for="inputName">Имя</label>
        <input type="text" class="form-control" id="inputName" name="name" placeholder="Введите имя" required>
    </div>
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Введите email" required>
    </div>

    <div class="form-group">
        <label for="inputText">Задача</label>
        <textarea class="form-control" id="inputText" name="text" rows="3" placeholder="Опишите вашу задачу" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Поставить задачу</button>

</form>