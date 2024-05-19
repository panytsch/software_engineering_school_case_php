## How to run

Project is dockerized.
To make it work you need to run next commands in the right order
 - `docker-compose up --build` - to start application
 - `docker-compose exec php bash -c 'php artisan migrate'` - run it when application is started to migrate database
 - `docker-compose exec php bash -c 'php artisan schedule:work'` - run it after migration to start scheduler. It's needed to send daily email with currency rate. This command will start cron job which will check every minute if it's time to run any of the scheduled command. Sending currency rate report to subscribers will be triggered at 14:00 Kyiv time

### Configuration

I did it zero-configuration, so you don't need to worry
but if you want to use your own mail credentials or API key here's few configs you can change. All of them located in ```.env``` file
- `CURRENCYBEACON_API_KEY` - token for Currency beacon API. API limited for calls so don't waste it or cretae new token later
- `MAIL_HOST` - smtp host of the email service used to send emails
- `MAIL_PORT` - port of mail service
- `MAIL_USERNAME` and `MAIL_PASSWORD` - credentials to authorize to your mails service
- `MAIL_ENCRYPTION` - mail service encryption method
- `MAIL_FROM_ADDRESS` - email address that will be displayed as "from" in the sent email

## DB
Project uses PostgresQL and it's configured already. All you need is to run migration

## Business logic

I did only one layer of abstraction in the project it's interface ```CurrencyRateInterface```.
It's needed only to easily replace third-party dependency in the application. 

Simply implement API integration using this interface and replace in app binding in `AppServiceProvider` class.

Saving new email logic is small part of logic and located in dedicated controller. Only `SubscriberExists` rule was added to extract logic of checking dublicated email

Sending current rates logic located inside `SendRatesCommand`. It's dedicated console command you may run `php artisan app:send-rates-command` or outside of container `docker-compose exec php bash -c 'php artisan app:send-rates-command'`

By default, this command runs every day at `14:00` `Europe/Kyiv` timezone
if you want change time simply change `CURRENCY_RATE_REPORT_TIME` variable in `.env` abd rerun `docker-compose up --build`
