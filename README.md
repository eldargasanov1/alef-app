# Инструкция по запуску

```shell
git clone https://github.com/eldargasanov1/alef-app.git
cd eg
cp .env.example .env

docker run --rm -v "$PWD":/app composer install
./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```

# Postman

https://web.postman.co/workspace/7a744d6a-39f2-4d9f-b0e3-eb912519bf2c
