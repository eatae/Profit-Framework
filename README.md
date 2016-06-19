1.
generator
https://github.com/eatae/profitPHP2.local/blob/4480efe15a3fe0a1bb6b7265a27569b20c00a2f4/App/Db.php#L41

Изменяю немного метод модели findAll
https://github.com/eatae/profitPHP2.local/blob/4480efe15a3fe0a1bb6b7265a27569b20c00a2f4/App/Model.php#L23

В контролере вызываю findAll (получаем выборку с помощью генератора)
https://github.com/eatae/profitPHP2.local/blob/4480efe15a3fe0a1bb6b7265a27569b20c00a2f4/App/Controllers/Index.php#L13



2, 3.
AdminDataTable
https://github.com/eatae/profitPHP2.local/blob/4480efe15a3fe0a1bb6b7265a27569b20c00a2f4/App/AdminDataTable.php

Author::getFullName() - получаем массив функций, одна из них с замыканием
https://github.com/eatae/profitPHP2.local/blob/4480efe15a3fe0a1bb6b7265a27569b20c00a2f4/App/models/Author.php#L21

В контролере Admin создаю объект AdminDataTable и вызываю метод render()
https://github.com/eatae/profitPHP2.local/blob/4480efe15a3fe0a1bb6b7265a27569b20c00a2f4/App/Controllers/Admin.php#L54-L55

Тут view для AdminDataTable:
    - в $this->fullName придёт функция с замыканием на firstname.
    - далее вызываем и передаем lastname.
https://github.com/eatae/profitPHP2.local/blob/4480efe15a3fe0a1bb6b7265a27569b20c00a2f4/templates/view_fullName_author.php
