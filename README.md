## README.md

### Проект тестового задания

Этот проект предназначен для выполнения тестового задания.

## Необходимые инструменты:

* Docker: Необходимо установить Docker Engine на ваш сервер.
    * [Инструкции по установке Docker](https://docs.docker.com/engine/install/)
* Make: Утилита Make должна быть установлена на вашем сервере. 
    * [Инструкции по установке Make](https://www.gnu.org/software/make/manual/make.html) 

## Установка:

1. Клонируйте репозиторий:
```sh
git clone [URL репозитория]
```
   
2. Перейдите в корневую директорию проекта:
```sh
cd [Имя папки проекта]
```

3. Установка переменных окружения (установка своих значений):
```env
DB_CONNECTION=mysql
DB_HOST=123.123.123.12
DB_PORT=3306
DB_DATABASE=asdasdasd
DB_USERNAME=asdasdasd
DB_PASSWORD=123123123
```

4. Установите зависимости:
```sh
make dev
```
   
5. Инициализируйте приложение:
```sh
make init-app
```

## Использование:
2. API конечные точки доступны по пути 
```
<domain>/<endpoint-name>
```
