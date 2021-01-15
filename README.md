# Books Library

Welcome to the 'Books Library' project, here you can add books to a table. What can you do?
- Enter the 'title' and 'author' of the book
- Edit book on the table
- Delete a book from the table
- Sort by title or author
- Search for a book by title or author
- Export and download:
  - a CSV file with all columns from the book table
  - a CSV file with either only the 'title' or 'author' column from the book table
  - an XML file with all columns from the book table
  - an XML file with either only the 'title' or 'author' column from the book table

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

You'll need
* Vagrant
* A Virtual Machine provider such as:
  * VirtualBox 6.1.x
  * VMWare
  * Parallels
  * Hyper-V
* Composer
* PHP
Install Vagrant Box
```
vagrant box add laravel/homestead
```

Follow these [installation steps](https://laravel.com/docs/8.x/homestead#installation-and-setup) to configure Homestead.

### Installation

* Install this repository
```
git clone https://github.com/arenzo97/BooksLibrary.git
```
* Or download using ZIP
* Create the database locally
* Open the console and go to the project directory
* Run `php artisan key:generate` to generate the APP_KEY for the .env file
* Run `php artisan migrate`
* Run `php artisan db:seed` to run seeders, if any
* Run `php artisan serve`

You should now be able to access this project at localhost:8000

You can also run [this example](http://bookslibrary-env.eba-c2rhdpgy.eu-west-2.elasticbeanstalk.com).

## Running the tests

You can run all of the tests using the PHPUnit command. Using a terminal, you must be in the `~/code/BooksLibrary` directory and enter:
```
phpunit
```
Additionally, if you want to run particular tests, you add `--filter` then the name of the test. For example:
```
phpunit --filter add_book_to_books_table
```
### List of feature tests:

Below are the list of available tests you can run using PHPUnit:

```
books_table_is_empty

add_book_to_books_table //adds book to the table
validate_title_has_value
validate_title_has_more_than_three_characters
validate_author_has_value
validate_author_has_more_than_three_characters

a_book_can_be_updated
delete_book_from_books_table

search_for_book_title
search_for_book_author

download_all_books_list_csv
download_title_only_books_list_csv
download_author_only_books_list_csv
download_all_books_list_xml
download_title_only_books_list_xml
download_author_only_books_list_xml
```

## Deployment
How to deploy:

* Download the repository as a ZIP file
* Extract the downloaded ZIP file
* Go to the directory `/code/BooksLibrary`
* Copy and paste the `.env.example` into a new file called `.env`
* Change the value `APP_ENV=prod` then close
* Generate a new APP_KEY
* Select all contents and re-compress these into a new ZIP
  * alternatively do `../laravel-default.zip -r * .[^.]* -x "vendor/*"`
* Upload and deploy to an instance
* Ensure that the root folder points to "/public"

## Built With

* [Laravel 8](https://laravel.com/docs/8.x) - The web framework used
* [Laravel Homestead](https://laravel.com/docs/8.x/homestead) - Pre-packaged Vagrant box for virtualisation
* [Tailwind CSS](https://tailwindcss.com/docs/theme) - Used to generate RSS Feeds


## Authors
* **Luis Lorenzo Arenas** - *Author* - [Arenzo97](https://arenzo97.github.io/)

## Acknowledgments

