# web_dev_project
![student_management_website](https://user-images.githubusercontent.com/108840691/177801134-278393ed-6944-4e7c-a5e9-e75b7b954558.png)
# About the project

This is a project that illustrates a student management website , it's meant to be used by professors to keep track of their students and manage them : add students or groups of students, delete students or groups of students, mark absences, look up students or groups of students using ids or initials.

## Installation

Step 1 : Download the existing files and folders in the repository "web_dev_project" and place them in a folder (let's name it "folderX") .

Step 2 : Download and Setup XAMPP application using the following [tutorial](https://www.youtube.com/watch?v=081xcYZKOZA).

Step 3 : Place "folderX" from step 1 inside the "htdocs" folder which you'll most likely find following this path "C:\xampp\htdocs"

Step 4 : Copy the SQL code from the file "gestion_etudiant" in "folderX", paste the SQL code in the SQL window in  phpmyadmin and press "go" to create the needed databases. you can follow this [tutorial](https://www.youtube.com/watch?v=4c50g_RXPZo) on running SQL queries in phpmyadmin.

Step 5 : After starting Apache and MySQL on XAMPP you can access the login page of the website through this link "http://localhost/folderX/login.php".

## Usage

you can access every functionality in the navbar at the top of every page.

NOTE:

1- You have to sign up in order to login if you don't have an account in the database you wouldn't be allowed to go past the login page.

2- Every group that you want to add or search for must be written as such "INFO{1,2,3}-X".

3- You can't add a student to a non existing group.
