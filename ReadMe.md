Project Name: Ca1 Basic Web application

Description: I developed a simple web application using the laravel framework
The application allows the user to create, read, update and delete
content of their choice. The application has authenticity functionality
which allows users to register and log in Once logged in the user can
create, read, upate and delete content.

Steps to Set up the Project:
1. Launch Xampp
2. Start the Apache and MySQL servers
3. Open windows terminal and open the path to the project folder
4. Run the command "php artisan migrate" to run the database migrations. Creates the restaurants table. (Run "php artisan migrate:refresh" to run all the migrations again from scratch)
5. Run the comand "php artisan db:seed" to add all of the restaurant records to the table.
4. In one tab enter the command "php artisan serve" to start the local server, Then enter the url "http://127.0.0.1:8000/" into a browser
5. In another terminal enter the command "npm run dev" to to start the application in developer mode

How to use the project:
1. When the project starts the user will be sent to the homepage where they can either register or log in if they have an acount already. Once logged in the user will be sent to the dashboard.
2. the user can click on the "View All Restaurants" button on the top bar which will redirect them to the index page where a list of all of the restaurants in the database are displayed. Each restaurant also has an edit and delete button.
3. If the user clicks the delete button on a restaurant a popup will appear at the top of the screan which says "Are you sure you want to delete this restaurant?". If the user selects cancel then the restaurant will not be deleted. If the user selects ok then the restaurant will be deleted from the database and will not be shown in the list of restaurants. A success message will also appear at the top of the screen which says "Restaurant deleted successfully!".
3. If the user clicks the edit button on a restaurant they are redirected to the edit form whcih has an input field for name,description, location and image. All of these fields will already be filled with the information of the restaurant the user is currently editing. The user can change any information they like in the input fields and when they are done they can click the "UPDATE RESTAURANT" button which will update the record in the database with the new information the user entered. The user will then be redirected back to the index page and a message will appear at the top of the screen that says "Restaurant updated successfully!". The restaurant that has been edited will also display the updated information in the list of restaurants on the index page.
5. if the user clicks on the "Create new Restaurant" button at the top of the page they will be redirected to the create form. The create form has an input field for the restaurant name, description, location and image. The user can input any data they like into the fields and then click the "ADD RESTAURANT" button. The user will then be redirected back to the index page and there will be a success message displayed that says "Restaurant created successfully!" and the restaurant the user created will be displayed in the list of restaurants.
6. If the user clicks on a restaurant in the list they are redirected to a pacge with all of that restaurants details displayed.


CA2: 
For CA2 I Added a reviews table and a suppliers table. I created a one-to-many relationship for restaurants and reviews, a many-to-many relationship for restaurants and suppliers, and 2 roles for users: user and admin, onto the original CA1 project.

User Roles:
While regestering a new user the user has the option to select between the User role and the Admin role.
Users can view restaurants and suppliers and can also leave a reviews on restaurants.
Users cannot create, edit or delete any restaurants or suppliers and cannot edit or delete other users reviews.
Admins can view, create, edit and delete any restaurants, suppliers or reviews.

Restaurants and reviews have a  one to many relationship. On the show page for restaurants the user has the option to create a review on that restaurant by giving it a raiting from 1-5 and writing a comment.

The restaurants table and suppliers table are connected by a pivot table and suppliers are randomly assigned restaurants to create the many to many rleationship. Suppliers have the restaurants they supply to listed under them in the suppliers show page.

Known Bugs:
Currently I cannot edit any of the reviews in the database.
I also cannot edit any of the suppliers in the database.