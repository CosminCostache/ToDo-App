## Installation

### Step1:

Make sure you have installed local server (WAMPP, XAMPP, LAMPP or other if you know) is installed on your computer.

### Step2:

Clone the project and copy to the htdocs folder(for Xampp, Lampp) or www folder(Wampp).

### Step3:

Make a database name 'testing' and import table 'todo.sql'. If you want to change database in process.php and list.php

```
### database_connection.php
$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
session_start();
$_SESSION["category_id"] = "1";

```
### Step4:

Run the project on your browser.. http://localhost/TODO