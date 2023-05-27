## About App

This app was developed according to case requirement you may find here [requirements](https://drive.google.com/file/d/18QrNBw3fKne3EHn8RyJ9vPDl1lB34qbt/view)

Main functionality is getting current rate BTC to UAH. You also may subscribe to emails where you will have this rate too

## Simple

Application is simple to use. You need only docker & docker-compose.
Run app by simple command ```docker-compose up```

## ENV variables and keys

This app uses external services to receive BTC rate and send emails. To keep app simple I decided to commit credentials for this services with .env file that contains it

After case will be checked I'll clean up these tokens to avoid any trouble

If you want to use you own keys you need:

- Token for [CoinAPI](https://www.coinapi.io/) and put it in `COIN_API_KEY` environment var 
- SMTP credentials

I used [ElasticEmail](https://elasticemail.com/) for this case, but you may use any other smtp service, even your own email address

to configure emails sending you need to replace these environment variables:

- `MAIL_HOST` domain of your service
- `MAIL_PORT` port
- `MAIL_USERNAME` username for authentication
- `MAIL_PASSWORD` password for authentication
- `MAIL_FROM_ADDRESS` email address that will be shown if "from" fields in email
- `MAIL_FROM_NAME` name of sender (optional)

You may also configure file name that stores subscribed emails. To do it use `STORAGE_FILE` env variable
