### CRUD Application - Student Database with PHP
#### Features/pages:
1. Form to send Students data to database (index.php) </br>
2. Show student data on a table (students.php). <br>
        - Table with active/inactive button,<br> 
        - show show(link with profile.php),<br>
        - delete button,<br> 
        - and Edit button (link with Edit.php)br <br>
3. Show single student data in separate page (profile.php).
4. Edit data form to update student profile (edit.php) 

-------
#### Index.php (The form page).
* Only form
        * form with POST Method and file/photo receive ready.
    * Receive data with POST function.
    * Check empty cells and send validation notificaiton
    * create database and create connection with it
    * Send data to database
    * give success message.
-------
#### edit.php page (steps)
 * Copy index.php to create a new form
 * set page link at Edit button (on students.php page), also send student id via url
 * get the student id by GET function
 * Run query to get the data of that student (SELECT * FROM student WHERE id =)
 * Run fetch_assoc() function to unpack(😁) the data  

-----
#### Status active and inactive 
* send user_id on the url (sent from both active and inactive button)
* Receive the data from url with get function
* Run Update query to databae with $active_id 
* and Run Update query to databae with $inactive_id (copy and change).

 *Note:* 
 - its taking time to change from active to inactive (vise varsa).
 - There is no effect on the view button despite change in status

 Final output:

 Live link:

 [project live View](https://cpazad.github.io/New_student_db/)

**The New Student Form page**
![The New Student Form page](addNewStudentform.png)

<br>

**All Student Database View Page**
![All Student Database View Page](allStudentView.png)

<br>

**Profile Page**
![Profile Page](profilePage.png)

<br>

**Profile update form Page**
![profile update form page](updateForm.png)


 [Follow me on twitter](https://twitter.com/freedombyte)
        
 
