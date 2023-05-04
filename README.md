## Desarrollo de un a API de consulta de datos de Stack Overflow.

#Installation
1. git clone git@github.com:sulecita/apirest.git
2. cd apirest
3. composer install
4. php artisan serve

You can now access the server at http://localhost:8000

Endpoint:
http://localhost:8000/api/v1/stackoverflow/questions/php/2023-04-03/2023-05-03
, in this url

tagged = php

fromDate = 2023-04-03(optional)

toDate = 2023-05-03(optional)


If fromDate is null, the url is http://localhost:8001/api/v1/stackoverflow/questions/php/-/2022-05-03
fromDate is -
