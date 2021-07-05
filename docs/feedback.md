1) paysera-master/composer.json - we should remove redundant dependencies like symfony/framework-bundle, symfony/flex, symfony/runtime application should work without component, because you should use sceleton of customers and shouldn't include whole symfony framework, just necessary components form symfony
2) calculation of script is wrong, values should be calculated like in example with appropriate precision and values should be similar to values of example, for now for some cases results are wrong
3) paysera-master/config - there are a lot of redundant files, we need to keep just config/services.yaml
4) paysera-master/src/Application/OperationStorageFactory.php:17 - interfaces should build dependencies based on interfces not based on implementation here src/Presenter/Console/CalculateCommand.php:21(SOLID Dependency Inversion)
5) paysera-master/src/Application/OperationStorageFactory.php:24 - file validation should be placed in console comand, before parsing process
6) paysera-master/src/Application/OperationStorageFactory.php:28 - responsibility of this class is storing data, not parsing, it should be placed in new file based on interface, we would like to have possibility extend format of files in future and you need take this idea into account in all application, and you should use iterator or generator to read all files
7) paysera-master/src/Presenter/Console/CalculateCommand.php:45 - unhandled exceptions, you should handle all type of exceptions here and log it if something went wrong and if there are some issues with current line you shouldn't stop the script (just handling exception, log it and move loop forward to the next string of file)
8) paysera-master/src/Domain/User/UserException.php - exceptions should be placed at least in separate folders
9) paysera-master/src/Domain - models should not contains any business logic, it should be placed in separate services
10) paysera-master/src/Domain - all names of services should be end by Service for example UserService.php
11) paysera-master/src/Domain/Operation.php:29 - model should not contain any business logic and it should be implemented based on Strategy pattern, every type of calculation should have own strategy
12) paysera-master/src/Domain/Operation.php:34, 43, 54, 61 - all commission rates should be configured in application configuration, not hardcoded into application
13) all money calculations should use bc_math library with appropriate precisions, default precision should be placed in env file
14) paysera-master/src/Infrastructure/Exchangerates/CurrencyExchange.php:12 - just used in tests, we shouldn't create separate service for tests, we need to test existing tests
15) paysera-master/src/Infrastructure/Exchangerates/CurrencyExchange.php:25 - there are no exception handling
16) paysera-master/tests/Functional/Presenter/Console/CalculateCommandTest.php:32-61 - we should remove redundant code
17) paysera-master/tests/Functional/Presenter/Console/CalculateCommandTest.php:26 - we should use data providers with example data from requirements and test should check that results the same like in requirements, for now not enough to check SUCCESS parameter
18) paysera-master/tests/Unit/Domain/PriceTest.php:16 - 23 - should be removed
19) paysera-master/.env:21 - you shold place here url of currency api too
20) paysera-master/.env -  here should be configured default currency for application and all rates should be based on this currency
21) all code must comply with the SOLID principles
22) paysera-master/src/Domain/Price.php:12 - not so good way to convert string to float and then to int
23) paysera-master/src/Domain/Price.php:14 - need to take into account that price can have different precision and every currency can have different precision like in example of task requirement
24) paysera-master/src/Infrastructure/Exchangerates/CurrencyExchange.php - you should use this service to calculate values for script results and need to make sure that script won't request for new currencies every time, application should have intermediate store for this currencies which we already taken
