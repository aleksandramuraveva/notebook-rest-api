# notebook-rest-api
 REST API PHP MySQL Swagger



## Инструкции по установке

Выполните следующие действия, чтобы настроить и протестировать API:

1. **Клонируйте репозиторий GitHub**: Клонируйте этот репозиторий на свой локальный компьютер, используя следующую команду в вашем терминале:

   ``bash
  git clone https://github.com/aleksandramuraveva/notebook-rest-api.git
  ``

2. **Создайте базу данных MySQL**:
   Создайте новую базу данных MySQL на своем локальном компьютере или сервере.
   Обычно это можно сделать с помощью клиента MySQL или командной строки.
  
3. **Импортируйте дамп базы данных**:
  Импортируйте файл `dump.sql` во вновь созданную базу данных, используя следующую команду:

  ``bash
  mysql -u [имя пользователя] -p[пароль] [имя_базы данных] < dump.sql
  ``

  Замените "[имя пользователя]", "[пароль]" и "[имя_базы_данных]" на ваше имя пользователя MySQL, пароль и название базы данных, 
  в которую вы хотите импортировать данные.

4. **Обновите конфигурацию базы данных**: Откройте файл `index.php` в текстовом редакторе.
 Найдите следующую строку номер 41:

  ``php
  $database = new config\Database("localhost", "notebookdb", "notebook_user", "12345password");
  ``

   Замените "localhost", "notebookdb", "notebook_user" и "12345password"
   на ваш хост MySQL, имя базы данных, логин и пароль соответственно.


5. **Протестируйте API**: Теперь вы можете протестировать API.
Это можно сделать с помощью таких инструментов, как Postman или curl.
Отправляйте запросы к endpoints API и проверяйте ответы.


5. **Swagger**: Чтобы использовать Swagger можно скачать файлы по этому адресу
   
    <br>
    ``https://github.com/swagger-api/swagger-ui/releases/tag/v5.17.14``
   <br>
   
   Запустить его локально например
   ``
   http://localhost/swagger-ui-5.17.14/swagger-ui-5.17.14/dist/#/
   ``
   <br>
   
   Адрес будет зависеть от местоположения ваших файлов
   <br>
   
   Запустите документацию введя следующую команду в поле для ввода и нажав "Explore"
    <br>
    
   ``
  http://localhost/notebook-rest-api/notebook.yaml
   ``
   
   <br>
## Endpoints 
**Получить все контакты** <br>

Endpoint: GET http://localhost/notebook-rest-api/api/v1/notebook/
<br>

По дефолту установлено что данный метод возвращает 1ю страницу с 10 записями


**Получить контакты c пагинацией** <br>

Endpoint: GET http://localhost/notebook-rest-api/api/v1/notebook/?page={page_number}&limit={limit}
<br>
Введите номер страницы и количество записей в поля page и limit соответственно

**Создать новый контакт** <br>

Endpoint: POST http://localhost/notebook-rest-api/api/v1/notebook/
<br>
Заполните все, либо же только обязательные поля в формате json
<br>
В API осуществляется валидация введенных данных, поэтому смотрите что не так 
если получаете сообщение с ошибкой
<br>
{
<br>
    "full_name": "Мария Иванова",
    <br>
    "company": "Фирма",
    <br>
    "email": "myemail@example.com",
    <br>
    "phone": "221-30-400",
    <br>
    "date_of_birth": "1993-10-23",
    <br>
    "photo_path": "uploads/placeholder.png"
    <br>
}
<br>

placeholder.png - картинка использутся для большинства контактов, можно свою загрузить



**Получить один контакт по ID** <br>

Endpoint: GET http://localhost/notebook-rest-api/api/v1/notebook/{id}
<br>
Введите номер в поле id


**Редактировать контакт по ID** <br>

Endpoint: PATCH http://localhost/notebook-rest-api/api/v1/notebook/{id}
<br>
Введите номер в поле id 
<br>
И также не забудьте указать какие поля меняете в формате json
<br>
{
<br>
    "full_name": "Мария Иванова",
    <br>
    "company": "Фирма",
    <br>
    "email": "myemail@example.com",
    <br>
    "phone": "221-30-400",
    <br>
    "date_of_birth": "1993-10-23",
    <br>
    "photo_path": "uploads/placeholder.png"
    <br>
}
<br>

placeholder.png - картинка использутся для большинства контактов, можно свою загрузить
  

**Удалить контакт по ID** <br>

Endpoint: DELETE http://localhost/notebook-rest-api/api/v1/notebook/{id}
<br>
Введите номер в поле id 

   




## Setup Instructions

Follow these steps to set up and test the API:

1. **Clone the GitHub Repository**: Clone this repository to your local machine using the following
command in your terminal:

    ```bash
    git clone https://github.com/aleksandramuraveva/notebook-rest-api.git
    ```

2. **Create a MySQL Database**: Create a new MySQL database on your local machine or server.
This can usually be done through a MySQL client or the command line.

3. **Import the Database Dump**: Import the `dump.sql` file into your newly created database using the following command:

    ```bash
    mysql -u [username] -p[password] [database_name] < dump.sql
    ```

    Replace `[username]`, `[password]`, and `[database_name]` with your MySQL username, password,
and the name of the database where you want to import the data.

4. **Update the Database Configuration**: Open the `index.php` file in a text editor.
Find the following line number 41:

    ```php
    $database = new config\Database("localhost", "notebookdb", "notebook_user", "12345password");
    ```

    Replace `"localhost"`, `"notebookdb"`, `"notebook_user"`, and `"12345password"`
with your MySQL host, database name, username, and password, respectively.

5. **Test the API**: Now you can test the API. This can be done using tools like Postman or curl.
Make requests to the API endpoints and check the responses.
