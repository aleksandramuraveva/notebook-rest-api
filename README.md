# notebook-rest-api
 REST API PHP MySQL Swagger Docker

## Инструкции по установке

Выполните следующие действия, чтобы настроить и протестировать API:

1. **Клонируйте репозиторий GitHub**: Клонируйте этот репозиторий на свой локальный компьютер, используя следующую команду в вашем терминале:

``bash
git clone https://github.com/aleksandramuraveva/notebook-rest-api.git
```

2. **Создайте базу данных MySQL**: Создайте новую базу данных MySQL на своем локальном компьютере или сервере. Обычно это можно сделать с помощью клиента MySQL или командной строки.

3. **Импортируйте дамп базы данных **: Импортируйте файл `dump.sql` во вновь созданную базу данных, используя следующую команду:

``bash
mysql -u [имя пользователя] -p[пароль] [имя_базы данных] < dump.sql
```

Замените "[имя пользователя]", "[пароль]" и "[имя_базы_данных]" на ваше имя пользователя MySQL, пароль и название базы данных, в которую вы хотите импортировать данные.

4. **Обновите конфигурацию базы данных**: Откройте файл `index.php` в текстовом редакторе. Найдите следующую строку номер 41:

``php
$database = новая конфигурация\база данных("localhost", "notebookdb", "notebook_user", "12345password");
```

Замените "localhost", "notebookdb", "notebook_user" и "12345password" на ваш хост MySQL, имя базы данных, логин и пароль соответственно.

5. **Протестируйте API **: Теперь вы можете протестировать API. Это можно сделать с помощью таких инструментов, как Postman или curl. Отправляйте запросы к конечным точкам API и проверяйте ответы.



## Setup Instructions

Follow these steps to set up and test the API:

1. **Clone the GitHub Repository**: Clone this repository to your local machine using the following command in your terminal:

    ```bash
    git clone https://github.com/aleksandramuraveva/notebook-rest-api.git
    ```

2. **Create a MySQL Database**: Create a new MySQL database on your local machine or server. This can usually be done through a MySQL client or the command line.

3. **Import the Database Dump**: Import the `dump.sql` file into your newly created database using the following command:

    ```bash
    mysql -u [username] -p[password] [database_name] < dump.sql
    ```

    Replace `[username]`, `[password]`, and `[database_name]` with your MySQL username, password, and the name of the database where you want to import the data.

4. **Update the Database Configuration**: Open the `index.php` file in a text editor. Find the following line number 41:

    ```php
    $database = new config\Database("localhost", "notebookdb", "notebook_user", "12345password");
    ```

    Replace `"localhost"`, `"notebookdb"`, `"notebook_user"`, and `"12345password"` with your MySQL host, database name, username, and password, respectively.

5. **Test the API**: Now you can test the API. This can be done using tools like Postman or curl. Make requests to the API endpoints and check the responses.
