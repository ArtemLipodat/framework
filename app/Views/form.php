<?php $this->error->display(); ?>
<form id="userAdd" action="add/" method="post" class="mt-5">
    <div class="form-outline mb-4">
        <input type="text" id="name"  name="name" class="form-control" />
        <label class="form-label" for="name">Имя</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="lastname" name="lastname" class="form-control" />
        <label class="form-label" for="lastname">Фамилия</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="age" name="age" class="form-control" />
        <label class="form-label" for="age">Возраст</label>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <button type="button" class="btn btn-success">Выгрузить</button>
</form>
