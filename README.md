
# Blogs System Task

## About task
A special task for creating a Laravel project. The process of entering the site is required. It is divided into a user and an editor. The editor adds a Post and edits it. He can add a title image and an article, and the user can comment on the post only.

### Features in this task
* See all created Post 
* Create an Post 
    * validation for all inputs
    * can add title when creating
    * can add author when creating
    * can upload image when creating
    * Connect post to my user_id
* Update a Post campaign
    * validation for all inputs
    * can update images that you uploaded when creating
* Show details for an Post
* Create an Post
    * comment name with Post
* Delete a Post SoftDelete
    * Deletion by Observer
    * When deleting post it deletes every comment (soft)
    * When I delete a post permanently, I delete every comment via Observer

### How to setup this project?
* First step you need to clone it in your computer using this command:
```php
    git clone https://github.com/Ahmed-Sharkawy/Nofal-seo-task
```

* Second step just need to run this command:
    * this command will install all dependinseis
    * this command will migrate all database
    * this command will seed fake data if database is empty
    * this command will run the project
```php
    php artisan run:app //this a custom command I created to run project in one command
```