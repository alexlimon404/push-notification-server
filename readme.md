## About PushNotificationServer

PushNotificationServer is a web application used to collect subscriber base, segmentation and sending push notifications.

## Quickstart

PushNotificationServer is written in PHP and Laravel, using MySQL as its primary database.

## Install

### 1. Clone the source code or create new project.

```shell
git clone https://github.com/mirrorbitmirror/push-server.git
```

### 2. Set the basic config

```shell
cp .env.example .env
```

Edit the `.env` file and set the `database` and other config for the system after you copy the `.env`.example file.

### 3. Install the extended package dependency.

Install the `Laravel` extended repositories: 

```shell
composer install -vvv
```

### 4. Run the blog install command, the command will run the `migrate` command and generate test data.

```shell
php artisan migrate
```

## Contributors

- [AlexLimon](http://github.com/mirrorbitmirror)

## License
The project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).