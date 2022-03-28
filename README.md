<h1>Установка</h1>
Первый вариант. В корне проекта: <pre><i>make install</i></pre>
<br>
Второй вариант. В корне проекта:<br>
<pre>
docker-compose build 
docker-compose up -d
docker-compose exec php composer install
docker-compose exec php chmod 777 -R . 
docker-compose exec php yii migrate 
</pre>
<h1>Для проекта</h1>
Запустить миграции
<br>
Заполнить вручную таблицы, так как нет фикстур. 
<pre>roles
1,client
2,employee
3,admin</pre>
<pre>
book_states
1,bad
2,good
3,great
</pre>
Добавить несколько книг в таблицу books и пользователей в таблицу users с разными ролями (client, employee)
