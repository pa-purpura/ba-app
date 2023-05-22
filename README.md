
# Assignment App

This app accepts a JSON-RPC format call with two dates as parameters and returns the average price of Brent crude oil in JSON-RPC format for each day within the range indicated by the two dates.


## Installation and run Locally

Clone the project

```bash
  git clone https://github.com/pa-purpura/ba-app.git
```

Go to the project directory

```bash
  cd ba-app
```

Install dependencies

```bash
  composer install
```

Create a env file

```bash
  cp env.example .env
```

Create a key app

```bash
  php artisan key:generate
```

Start the server

```bash
  php artisan serve
```


## Usage/Examples

You can send a curl request to the service
```
curl --location --request POST 'http://127.0.0.1:8000/api/v1/GetOilPriceTrend' \
--header 'Content-Type: application/json' \
--data-raw '{
	"jsonrpc":"2.0",
	"method":"Assignment@GetOilPriceTrend",
	"params": {
		"startDateISO8601": "2012-01-01",
		"endDateISO8601": "2012-01-05"
	},
	"id":1
}'
```


## API Reference

#### Get prices by day, beetwen two date.

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `startDateISO8601` | `date ISO8601` | **Required** |
| `endDateISO8601` | `date ISO8601` | **Required** |

The dates must be formated on ISO8601 format, like in Usage/Examples section above.


## Running Tests

To run tests, run the following command

```bash
  php artisan test
```


## Related

Thanks to a public API of https://datahub.io

[Public API used for thi project](https://datahub.io/core/oil-prices/r/brent-day.json)


## License
Free for Private use 
[MIT](https://choosealicense.com/licenses/mit/)


[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)



## Authors

- [PP](https://pa-purpura.github.io/)

