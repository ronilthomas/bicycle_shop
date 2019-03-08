# bicycle_shop
This is a web app to book rental bikes with login and registration
---
This is a web application that would suit a college bike rental service. It works like a library for bikes.

The features of the application are as follows:  
* Students and staff can register and login with their college details(They will be allowed to registered only if their details were entered by the admin account. This is to ensure that a random preson does not register with the college).
* Staffs can assign, re-assign and remove rented bike details to students.
* Staffs and students can the bikes available in the store.
* Students can book bikes through the website.
* Admin can make changes to bike, student and staff details.

Security features for the Web Application are as follows:
* Parameterized queries to avoid SQL Injection
* Input filtering to remove special characters
* Session Management to authorize users
* Salting and hashing to secure passwords in the database
* Password and username requirements with regular expessions
