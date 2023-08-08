
# Yaraku Web Developer Assignment - Book List Application
This web application is a **Book List** that allows users to manage a collection of books.  
<div style="display: flex;"> 

 [Features](#features) - [Requirements](#requirements) - [Installation](#installation) - [Persistent database](#persistent-database) - [Usage](#usage) - [Folder Structure](#folder-structure) - [Contributors](#contributors) - [Acknowledgments](#acknowledgments)

## Features

-   Add a book to the list
-   Delete a book from the list
-   Change an author's name
-   Sort the list by title or author
-   Search for a book by title or author
-   Export the list to CSV and XML formats
    -   Export with Title and Author
    -   Export with only Titles
    -   Export with only Authors

## Requirements

-   **PHP version 7.2.5** 
-   **Laravel version 6.18**
-   **Composer** for package management
-   [Docker](https://docs.docker.com/install)
-   [Docker Compose](https://docs.docker.com/compose/install)

## Installation

1.  Clone the repository.
2.  Start the containers by running  `docker-compose up -d`  in the project root.
3.  Install the composer packages by running  `docker-compose exec laravel composer install`.
4.  Access the Laravel instance on  `http://localhost`  (If there is a "Permission denied" error, run  `docker-compose exec laravel chown -R www-data storage`).

## Persistent database

If you want to make sure that the data in the database persists even if the database container is deleted, add a file named  `docker-compose.override.yml`  in the project root with the following contents.

```
version: "3.7"

services:
  mysql:
    volumes:
    - mysql:/var/lib/mysql

volumes:
  mysql:

```

Then run the following.

```
docker-compose stop \
  && docker-compose rm -f mysql \
  && docker-compose up -d
```

## Usage

1.  Access the application in your web browser `http://localhost`.
2.  Click on the "Add Book" button to add new books to the list.
3.  Use the "Delete" button to remove a book from the list.
4.  Click on the "Edit" button to change an author's name.
5.  Click on the table headers "Title" or "Author" to sort the list.
6.  Use the search bar to search for books by title or author.
7.  To export the list, click on the "Export CSV" or "Export XML" button and choose either Title and Author, Title only or Author only.

## Folder Structure

-   **app**: Contains the Laravel application files.
-   **resources**: Contains views, CSS, and JavaScript files.
-   **routes**: Contains the application's route definitions.
-   **database**: Contains migration files for database setup.


## Contributors

-   [Janeedi Grapa ](https://github.com/grapajaneedi)
