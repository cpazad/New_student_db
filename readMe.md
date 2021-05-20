# This is a CRUD Application
# Features:
> Form to send to database (index.php)
> Show student data to a table (students.php)
    > table with active/inactive button, show show(link with profile.php), delete button, and Edit button (link with Edit.php)
> Show single student data in separate page (profile.php) 

## edit.php page (steps)
 > Copy index.php to create a new form
 > set page link at Edit button (on students.php page), also send student id via url
 > get the student id by GET function
 > Run query to get the data of that student (SELECT * FROM student WHERE id =)
 > Run fetch_assoc() function to unpack(😁) the data  


# Status active and inactive 
> send user_id on the url (sent from both active and inactive button)
> Receive the data from url with get function
> Run Update query to databae with $active_id 
> and Run Update query to databae with $inactive_id (copy and change).
** Note: 
 . its taking time to change from active to inactive (vise varsa).
 . There is no effect on the view button despite change in status
        
 
