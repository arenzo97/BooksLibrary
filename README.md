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

What things you need to install the software and how to install them

```
Give examples
```

### Installing

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

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
*

## Built With

* [Laravel 8](https://laravel.com/docs/8.x) - The web framework used
* [Laravel Homestead](https://laravel.com/docs/8.x/homestead) - Pre-packaged Vagrant box for virtualisation
* [Tailwind CSS](https://tailwindcss.com/docs/theme) - Used to generate RSS Feeds


## Authors

* **Luis Lorenzo Arenas** - *Initial work* - [Arenzo97](https://arenzo97.github.io/)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.


## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc