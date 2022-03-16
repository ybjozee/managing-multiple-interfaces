Symfony Services and Twig
==================

Project
=================
This is a demo application built to demonstrate how to use a Symfony service from a twig template. This process involves four steps:
1. Define your interface (sample interface in the `App/Interfaces` folder)
2. Provide implementations of the interface (`src/Service/FlutterwaveValidator.php` and `src/Service/PaystackValidator.php`)
3. Create "factory" service (sample service in `src/Service/PaymentValidatorService.php`)
4. Tag services and autowire factory service (sample in `config/services.yaml`)

You can read the accompanying article [here](https://medium.com/@UP634182/today-i-learnt-how-to-inject-multiple-instances-of-an-interface-in-a-service-1488cf7836bd)


Deploying
=================

## Technical Requirements

Before creating your first Symfony application you must:
* Install PHP 8.0.2 or higher and these PHP extensions (which are installed and enabled by default in most PHP installations):
  [Ctype](https://www.php.net/book.ctype), [iconv](https://www.php.net/book.iconv), [JSON](https://www.php.net/book.json) ,[PCRE](https://www.php.net/book.pcre), [Session](https://www.php.net/book.session), [SimpleXML](https://www.php.net/book.simplexml), and [Tokenizer](https://www.php.net/book.tokenizer);

* Install [Composer](https://getcomposer.org/download/), which is used to install PHP packages.

* [Symfony CLI](https://symfony.com/download). This creates a binary called symfony that provides all the tools you need to develop and
  run your Symfony application locally.

* The symfony binary also provides a tool to check if your computer meets all requirements. Open your console terminal and run this command:

        symfony check:requirements


Please visit [The Symfony Official Page](https://symfony.com/doc/current/setup.html) for more information on this project's technical
requirements.


## Installation
- Clone the project from Github

        git clone https://github.com/ybjozee/managing-multiple-interfaces.git

- cd into the project

        cd managing-multiple-interfaces

- install the project dependencies

        composer install

## Usage

For demo purposes, I wrote a command to validate payments. 

    symfony console validatePayment --help
    
```
Description:
Command to validate payment based on payment service provider

Usage:
validatePayment <provider> <reference>

Arguments:
provider              Payment service provider
reference             Payment reference

Options:
-h, --help            Display help for the given command. When no command is given display help for the list command
-q, --quiet           Do not output any message
-V, --version         Display this application version
--ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
-n, --no-interaction  Do not ask any interactive question
-e, --env=ENV         The Environment name. [default: "dev"]
--no-debug        Switch off debug mode.
-v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

- For a successful payment validation (from Flutterwave)


    symfony console validatePayment flutterwave FLW3211

- For a successful payment validation (from Paystack)


    symfony console validatePayment paystack PYS3211  

- For an unsuccessful payment validation (from Flutterwave)


    symfony console validatePayment paystack FLU3211  

- For an unsuccessful payment validation (from Paystack)


    symfony console validatePayment flutterwaveew PAY3211

- For payment validation by an unsupported service provider


    symfony console validatePayment unknown FLW3211
      
