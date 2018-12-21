# Simple Code Challenge

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/tulik/simple-code-challenge/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/tulik/simple-code-challenge/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/tulik/simple-code-challenge/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/tulik/simple-code-challenge/?branch=master)

## Quick start

Clone the repository
```
git clone git@github.com:tulik/simple-code-challenge.git
```

Install dependencies

```
composer install
```

Test the code

```
compooser check-code
```

Run as web service

```
php -S 127.0.0.1:8000 -t public
```

```
curl -X GET \
  http://127.0.0.1:8000/v1/gifs/random \
  -H 'API_KEY: foo-bar'
```