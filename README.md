# cosc360_finalProject By Prabhmeet Deol - 31327995	

Our grocery price tracker app, developed for the sample project on the Canvas website, allows users to track prices for various grocery products based on the available data in the app's database. With a wide range of features, users can add comments and track prices as guests, or register for a basic login or create an account for more advanced features. Additionally, an administration panel allows for easy user management, including the ability to delete users as needed.

This project was only done by one person.

Short demo of the project , since i was not able to upload it to the server :
https://vimeo.com/815810432

### Features.
- Grocery price tracker , as per average price over the week.
	- If higher than average displays as red , else green.
- Basic user login and display login user name . Can also log in as a guest user. 
	- Users can also add comments , and delete their own comments.
- Admin logins  , can delete users , and automatically their stored comments.



### How to launch the project.
1. Run the 2 sql scripts to populate a database called "project360" on a My sql server.
	- The 2 scripts are at ```test_data/Create_table.sql``` and ```test_data/data.sql```.
2. Run the apache server at ```serverDNSAddress/cosc360_finalproject/index.php```.



Thanks.