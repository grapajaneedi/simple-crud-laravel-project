# Yaraku Web Developer Assignment - Book List Application

This web application is a **Book List** that allows users to manage a collection of books.  
It is built using **PHP version 7.2.5** and **Laravel version 6.18**
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

-   **PHP version 7.2.5** or higher
-   **Laravel version 6.18**
-   **Composer** for package management
-   [Docker](https://docs.docker.com/install)
-   [Docker Compose](https://docs.docker.com/compose/install)

## Installation

1.  Clone the repository.
2.  Start the containers by running  `docker-compose up -d`  in the project root.
3.  Install the composer packages by running  `docker-compose exec laravel composer install`.
4.  Access the Laravel instance on  `http://localhost`  (If there is a "Permission denied" error, run  `docker-compose exec laravel chown -R www-data storage`).

## Usage

1.  Access the application in your web browser `http://localhost`.
2.  Navigate to the "Add Book" page to add new books to the list.
3.  Use the "Delete" button to remove a book from the list.
4.  Click on the "Edit" button to change an author's name.
5.  Click on the table headers "Title" or "Author" to sort the list.
6.  Use the search bar to search for books by title or author.
7.  To export the list, click on the "Export" button and choose the desired format (CSV or XML).

## Folder Structure

-   **app**: Contains the Laravel application files.
-   **resources**: Contains views, CSS, and JavaScript files.
-   **routes**: Contains the application's route definitions.
-   **database**: Contains migration files for database setup.



## Contributors

-   [Janeedi Grapa ](https://github.com/grapajaneedi)

## Acknowledgments

Thank you for considering me to be your new Web Developer. I hope this project meets your expectations and demonstrates my proficiency in PHP and Laravel development. Feel free to reach out if you have any questions or feedback. 
