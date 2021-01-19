# Group-Project
 Website created using bootstrap 4 and PHP as serverside language.

Table of Contents

- Introduction	
- Aims and objectives	
- Proposed solution	
- Front-End	
- Back-End	
- Background research and comparative studies	
- Comparison	
- Requirement Analysis and System Design	
- Requirement analysis	
- System Design	
- Guest
- User	
- Administrator	
- Design of the Proposed System	
- Database design	
- User interface design	
- Guest	
- User	
- Administrator	
- System interaction design
- Class Diagram	
- Use case diagram	
- Sequence diagram	
- Prototype Implementation	
- Testing	
- Unit test	
- Integration test	
- Conclusion & Future Work	
- The strength of the website	
- Weakness of the website and future improvements.	
- References	
- Appendix of individual contribution and reflection	


- Introduction
Aims and objectives
The group project aims to build a web application to sell any products online. This can be achieved by using a server-side programming language which will interact with relational database of choice. The application should provide excellent user experience for online shopping and payment.

- Proposed solution
The solution that the group came up with is to provide a website which will sell electronic items mainly computer parts and accessories called Systro.
- Front-End
The main design of the website was done using Bootstrap 4 framework. This was done because Bootstrap is a framework that is very customizable and flexible also very easy to implement as the design can be implemented just using class names. This was done in order to make the front end appealing and as well as save time so that more focus can be given towards the backend development of the system.
- Back-End
The website was developed using PHP PDO as the server-side language and MySQL as the relational database which will interact with the PHP code. PHP PDO was chosen because most members had more knowledge about PHP PDO than any other server-side programming language. MySQL was also chosen because of the same reasoning that it was much more recognized worked well with the group.

- Background research and comparative studies
The main decision that would affect the development in all other stages was to come up with a product or service that would easily be translated into online shopping. It would also decide how the product is categorized. 
The group finally selected to sell electronics which encompasses the computer space like computer parts, laptop, all in ones etc.
Other online website which focuses on selling computer parts were user to get an idea about how to build the website instead of general-purpose online websites were avoided like amazon etc.
The websites referenced were https://www.theitdepot.com/ and https://mdcomputers.in/. Both websites provided insight into what sorts of product would make sense as well as what sorts design elements could be practically be implemented without overshooting the scope of the project.

![image](https://user-images.githubusercontent.com/77658144/105010300-804b6e80-5a76-11eb-9a95-496971cab94f.png)

![image](https://user-images.githubusercontent.com/77658144/105010354-90fbe480-5a76-11eb-9f39-aa38f7286a22.png)

![image](https://user-images.githubusercontent.com/77658144/105010388-9d803d00-5a76-11eb-87d4-bbde6e4b2a8d.png)

![image](https://user-images.githubusercontent.com/77658144/105010436-ab35c280-5a76-11eb-9781-4bb787362419.png)

![image](https://user-images.githubusercontent.com/77658144/105010478-ba1c7500-5a76-11eb-86d5-907bc4d7a56f.png)

The comparison to the other two site ends here as the all the implementation of the design and other elements are similar even after the user signs up and log in. 


- Requirement Analysis and System Design
The website prototype (Systro) sells computer hardware. In this session the necessary requirement and the system design based on the requirements will be extensively discussed.
Requirement analysis
Requirement for building the website was achieved by first realizing what the website was going to sell online. The selected product was computer hardware which is a physical good.
 Second thing that needs clarification is who are the actors that will be able to interact with the system.
There are three actors which will interact with the system, guest, users and administrator. The action these actors will take will help get the requirements for building the software.
- {Actions of Guest}
-	Navigation for Guest
-	Browse products.
-	View products.
-	Add and remove products from the cart.
-	Register to become a user.
-	Checkout and pay.
- {Actions of User}
-	Login to the website as user.
-	Navigation for User
-	View user profile.
-	Update profile details
-	Browse products.
-	View products.
-	Add or remove products from the cart.
-	Leave a review for the product.
-	Checkout and pay.
-	View the order
-	Logout
- {Actions of Administrator}
-	Login to administrator area.
-	Navigation for administrator.
-	Add new products.
-	View products.
-	Modify products.
-	Delete products.
-	Add new categories.
-	View categories.
-	Modify categories.
-	Delete categories.
-	View users’ details.
-	View users’ reviews.
-	View all sales.
-	Logout
- System Design
System Design the requirements will be taken and explanation of how the system can be designed to fulfill these requirements.

![image](https://user-images.githubusercontent.com/77658144/105010894-3f078e80-5a77-11eb-9ce0-b51bf725ac8d.png)

![image](https://user-images.githubusercontent.com/77658144/105010919-475fc980-5a77-11eb-95ba-df8be35bac0f.png)

![image](https://user-images.githubusercontent.com/77658144/105010947-50509b00-5a77-11eb-84f1-3ab5754c1b9c.png)

![image](https://user-images.githubusercontent.com/77658144/105010977-59da0300-5a77-11eb-9f2e-4f4da7bcc3e1.png)

![image](https://user-images.githubusercontent.com/77658144/105011006-62323e00-5a77-11eb-84da-496b39855694.png)


- Design of the Proposed System
This section includes all the diagrams and design like database design, user interface design, system interaction design, etc. and contain detailed methodologies like class diagram, user case diagram, sequence diagram etc.
- Database design
The database design contains the database that were used to create the prototype and store the values this is the EER diagram.


![image](https://user-images.githubusercontent.com/77658144/105011128-8857de00-5a77-11eb-9ec4-558a1cc3d320.png)

- User interface design
In the system interface design, there will be wireframe of all the pages that will be shown to the actors of the website.

- For Guests


![image](https://user-images.githubusercontent.com/77658144/105011228-a6bdd980-5a77-11eb-8195-c552a0d08332.png)

![image](https://user-images.githubusercontent.com/77658144/105011236-aa516080-5a77-11eb-83ca-e621ff924108.png)

![image](https://user-images.githubusercontent.com/77658144/105011242-ade4e780-5a77-11eb-89e3-d6f010dc9e10.png)

![image](https://user-images.githubusercontent.com/77658144/105011250-b3423200-5a77-11eb-99b8-654f1257b6e0.png)

![image](https://user-images.githubusercontent.com/77658144/105011265-b76e4f80-5a77-11eb-959f-38dfe3ea05e6.png)

![image](https://user-images.githubusercontent.com/77658144/105011278-bc330380-5a77-11eb-97e5-1a81c84e6e1b.png)

![image](https://user-images.githubusercontent.com/77658144/105011288-bf2df400-5a77-11eb-9e3e-83f8bb1ddc85.png)

![image](https://user-images.githubusercontent.com/77658144/105011307-c3f2a800-5a77-11eb-8d09-19cb5db738f7.png)


- For Users


![image](https://user-images.githubusercontent.com/77658144/105011384-da98ff00-5a77-11eb-8066-513810ee857d.png)

![image](https://user-images.githubusercontent.com/77658144/105011391-dd93ef80-5a77-11eb-8bcc-401f0a527497.png)

![image](https://user-images.githubusercontent.com/77658144/105011406-e1c00d00-5a77-11eb-8ccd-5d4284cd0d2a.png)

![image](https://user-images.githubusercontent.com/77658144/105011414-e4bafd80-5a77-11eb-94a8-71ce499c269d.png)

![image](https://user-images.githubusercontent.com/77658144/105011438-e97fb180-5a77-11eb-8b98-cae49ff085ed.png)

- For Administrator


![image](https://user-images.githubusercontent.com/77658144/105011485-f8fefa80-5a77-11eb-80f0-dc3c9650dd76.png)

![image](https://user-images.githubusercontent.com/77658144/105011492-fbf9eb00-5a77-11eb-9954-07c8d13bf4d5.png)

![image](https://user-images.githubusercontent.com/77658144/105011501-fe5c4500-5a77-11eb-9748-2bc8c20eb6ce.png)

![image](https://user-images.githubusercontent.com/77658144/105011516-01573580-5a78-11eb-83aa-f4ce3064cc3a.png)

![image](https://user-images.githubusercontent.com/77658144/105011529-04eabc80-5a78-11eb-9a6a-31e578a5f9ef.png)

![image](https://user-images.githubusercontent.com/77658144/105011536-074d1680-5a78-11eb-9ee8-3f921ad4f308.png)

![image](https://user-images.githubusercontent.com/77658144/105011547-0a480700-5a78-11eb-9837-143d0970b0db.png)

![image](https://user-images.githubusercontent.com/77658144/105011558-0d42f780-5a78-11eb-95eb-8d1e5238ee8f.png)

![image](https://user-images.githubusercontent.com/77658144/105011570-10d67e80-5a78-11eb-8e2a-f583442cd7a2.png)

![image](https://user-images.githubusercontent.com/77658144/105011582-13d16f00-5a78-11eb-8767-bbfaef44b805.png)


- System interaction design
This section contains the chart of how all the pages of the website interacts with each other.

- Guest 

![image](https://user-images.githubusercontent.com/77658144/105011809-5eeb8200-5a78-11eb-9919-755e9916acd2.png)

- User

![image](https://user-images.githubusercontent.com/77658144/105011820-61e67280-5a78-11eb-8aca-442475886cca.png)

- Administrator

![image](https://user-images.githubusercontent.com/77658144/105011830-64e16300-5a78-11eb-81ed-d4d9c9cebf9e.png)

- Class Diagram

![image](https://user-images.githubusercontent.com/77658144/105011838-6874ea00-5a78-11eb-82fa-c11561910c45.png)

- Use Case Diagram

![image](https://user-images.githubusercontent.com/77658144/105011848-6c087100-5a78-11eb-886e-f4c3d809848f.png)

- Sequence Diagram

![image](https://user-images.githubusercontent.com/77658144/105011855-6f9bf800-5a78-11eb-9d7b-b346016bb077.png)


- Prototype Implementation
There were three different software’s was used to create an environment were the development of the prototype could be done as easily as possible.
There three areas that needed to be covered 
1.	The Host
The host software will host the website in a localhost and will enable the group to work with server-side programming language.
2.	Database manager
Database manager is useful for managing database looking up data in the database and overall is of dealing with the database to ensure the correct and proper data were being handled by the website.
3.	Programming code editor.
To program effectively the editor needs to highlight codes and should have proper handling of inputs as well as tools that will make the development much easier.
Below is the software solution that was agreed upon by the team for building the software. Its essential to make sure all the team members are using the same environment or else there could be unexpected errors and exceptions that can’t be compared to other members of the team.
- Vagrant
Vagrant was used with the help of v.je was used to host the website in local host as hosting the website this way it was much more easy to transfer the database as the database was always saved as a “database.sql” and could be transferred to the other members without any complication.
- MySQL Workbench
MySQL workbench 8.0 was used to manage the MySQL database as the software was flexible and provided a very good GUI for the users to manage the database. In the database a connection to the local host using v.je was defined and users just needed to click on it to get full access to the database.
- Visual Studio Code
Visual Studio Code was essential in working with HTML and PHP coding in a concise manner. Visual Studio Code allowed the group to create a common workshop which folder was shared between computers which allowed multiple people to connect and work with the software at the sometime.
- Programming language justification
First the design was made using the help of HTML and CSS with the help of bootstrap. Then later server-side programming language PHP PDO was used to make connection to the database and make the website dynamic.
- HTML and CSS with bootstrap
Making a website front end using HTML and CSS becomes harder as the website gets bigger and more styles and elements are added. So, the group decided to make the website using bootstrap framework as it is already a predefined styling which can be applied by naming the appropriate classes in the HTML script. The version of bootstrap that was considered was version 4 as it is the new release. Bootstrap also have inbuild jQuery’s which can be utilized to achieve an interactive website.
By using bootstrap, the main advantage was for the group to focus on the backend development by setting up the necessary front end quickly.
- PHP PDO for server-side programming.
PHP PDO was chosen because it is a very versatile programming language. It was very easy and simple to learn by everyone in the group as it does not need intensive studying to program. PHP is extremely flexible if any changes need to be made can be made after the project was started and need not spend much time rewriting codes. The integration was very easy, and the compatibility of PHP is also very high. It gave the group members more control in making changes to the codes and also made the process much simple.

- Testing
Here, all the functionalities of the website will be tested, and the test will be done in as Unit test were the test will be conducted in every single function to check whether it works as expected and Integration test were test is conducted to see whether all functions work together in the system.

- Unit Test

![image](https://user-images.githubusercontent.com/77658144/105012149-cbff1780-5a78-11eb-83d2-3d84a8c2cde7.png)

![image](https://user-images.githubusercontent.com/77658144/105012177-d3bebc00-5a78-11eb-886e-d50ff731f325.png)

![image](https://user-images.githubusercontent.com/77658144/105012203-da4d3380-5a78-11eb-846d-ee47f65cce76.png)

![image](https://user-images.githubusercontent.com/77658144/105012222-e2a56e80-5a78-11eb-8ec2-26e73b9758d0.png)

![image](https://user-images.githubusercontent.com/77658144/105012249-e9cc7c80-5a78-11eb-960c-cdb73c205f48.png)

![image](https://user-images.githubusercontent.com/77658144/105012278-f355e480-5a78-11eb-8790-f089ec5b80ac.png)

![image](https://user-images.githubusercontent.com/77658144/105012317-fe107980-5a78-11eb-852e-ed753612ef60.png)

![image](https://user-images.githubusercontent.com/77658144/105012349-05378780-5a79-11eb-88b4-47cb08fada4d.png)

![image](https://user-images.githubusercontent.com/77658144/105012374-0bc5ff00-5a79-11eb-8d01-f3efc0cfedba.png)

![image](https://user-images.githubusercontent.com/77658144/105012404-1385a380-5a79-11eb-8e00-fc9e5ac1da94.png)

![image](https://user-images.githubusercontent.com/77658144/105012426-1a141b00-5a79-11eb-9b0b-42fda13548d7.png)

![image](https://user-images.githubusercontent.com/77658144/105012464-239d8300-5a79-11eb-9f96-f2e5b5635276.png)

![image](https://user-images.githubusercontent.com/77658144/105012485-2b5d2780-5a79-11eb-96dc-e57f01ef28f0.png)


- Integration Testing

![image](https://user-images.githubusercontent.com/77658144/105012572-3fa12480-5a79-11eb-87eb-d6b5e24bf14d.png)

![image](https://user-images.githubusercontent.com/77658144/105012600-46c83280-5a79-11eb-9c39-2d392c972bf3.png)

![image](https://user-images.githubusercontent.com/77658144/105012620-4cbe1380-5a79-11eb-9769-9f05edc7ad19.png)

![image](https://user-images.githubusercontent.com/77658144/105012643-55164e80-5a79-11eb-8b5f-05e7fde86cef.png)

![image](https://user-images.githubusercontent.com/77658144/105012674-5c3d5c80-5a79-11eb-88ea-74b356b9a898.png)

- Conclusion & Future Work
A website application prototype was built with the help of front-end design, server-side programming language and a database. The prototype allows guests to browse products and buy them or they can register and become a member and buy a product. There is also an administrator who can add and delete product and the categories for the website as well as view various data like users and sale. This prototype was built because of the delegation of work and necessary actions taken to get to the end of the goal.
- The strength of the website
The site works without any major errors or glitches all pages are coherent and users will not find it difficult to navigate the pages of the website. The administrator’s job was made easy by making a separate session for the admin to add and modify the products according to its need. The website looks quite good because of the use of bootstrap and no major aesthetic changes can be seen from one page too another. Because of use of bootstrap one other advantage was flawless working on mobile devices. The website is capable of complete use inn mobile devices as it can easily adapt to different screen sizes.
- Weakness of the website and future improvements.
The website has several weaknesses apart from the ones mentioned in the failed testing. 
The website could’ve been developed in such a way that there were no separate pages for user and guest instead add elements of user page into the guest page which would get active when user logs in and the guest elements gets inactive. Though this have been implemented in a small manner in the end.
More jQuery could have been used to make user interface much more alive to the user as the website mainly rely on static PHP coding and some bootstrap elements.
Ajax could have been implemented into the cart.
The search product filter uses way too many if and else statements to achieve the results.
Payment system could’ve been much more flushed out with PayPal developer API implementation and other payment implementation for developers.


- References
www.php.net (2020).
PHP documentation.
[online] Available at: https://www.php.net/manual/en/ 
[Accessed 20 Dec. 2020].

getbootstrap.com (2020).
Bootstrap documentation.
[online] Available at: https://getbootstrap.com/docs/4.4/getting-started/introduction/
[Accessed 14 Feb. 2020].

www.webslesson.info (2020).
Bootstrap checkout form.
[online] Available at: https://getbootstrap.com/docs/4.4/examples/checkout/ 
[Accessed 20 Apr. 2020].

bootstrapious.com (2020).
collapsible HTML sidebar navigation using Bootstrap 4 with some CSS and jQuery.
[online] Available at: https://bootstrapious.com/p/bootstrap-sidebar 
[Accessed 10 Feb. 2020].

www.webslesson.info (2020).
Simple PHP Shopping Cart using Cookies 
[online] Available at: https://www.webslesson.info/2018/05/simple-php-shopping-cart-using-cookies.html 
[Accessed 25 Apr. 2020].


- Appendix of individual contribution and reflection

- Narukkottil Hameed Mohammed Unais

The bootstrap that was done for the site was my contribution to the group project as people were having trouble starting design aspect of the project. So, majority of HTML using bootstrap was done by me. The team was given this template made from bootstrap to work on their individual portion of the assignment using the PHP coding according to their abilities.
Direct individual Contribution to the assignment is listed below.
•	Login for admin.
•	Signup/login for user.
•	Registration form for the guest.
•	User profile.
•	Modify user details
•	Logout
•	Search functionality
•	Search form
•	All the filters
•	Product body
•	Product view
•	Add user review
•	Update user review
Sign Up / Admin login
This was a major part of the assignment as most of the functionality are from administrator and users. And the perspective users should stay at their area and not access to any of the others file.
The first way the login was set up was have two different login pages for admin and users but then realised that can be solved by some simple code. Where the login page would first check for details from the admin table first and compare it to the data entered by the users and only if that is false the user’s data will be checked.
Also, admin and user have two sessions so it will be separate, and the user will also have a session with the user’s username so the website will know who the user is at all the time.
- Product image carousel
So, another problem was dealt with was in the image carousel of the product view page were the image carousel was built using PHP programming instead of JavaScript which would have been better for image carousel for the product. Since the product will have three images max because of the design limit. When uploading the image admin can upload three image one image or no image the result coming up in the product view page will be according to that If no image is available for the product it will say that no image is available. This is all done using the if and else statement.

-  Product search filter
The product filter search was a very complicated one to deal with as it had three variables to deal with and the over reliance of if and else statement made this process of selecting the correct query based on the selected query made it a challenge.

-  Problems faced by the group.


![image](https://user-images.githubusercontent.com/77658144/105012946-b2aa9b00-5a79-11eb-9b45-98eb89674e80.png)

There were other minor problems and inconveniences that had to be overcome to complete the overall project.
The main thing was that the website was completed without any major problem or glitches on the website and works perfectly fine with all its functionality.
- what still need to be improved
The main personal improvement is to stop over realign a few programing statements like if and else and need to use more complexity as well as use more languages and use it effectively. By doing the group project all these problems have come to light and can be good opportunity to curb them.

![image](https://user-images.githubusercontent.com/77658144/105013379-28af0200-5a7a-11eb-9b37-7b7d81fce130.png)


The cart system was different from others in the sense that it does not use database. The cart system relies on cookies to store all the data in an array of a product.
At the beginning of the implementation there was two other ways the cart was trying to be implemented. First is using SQL but this dropped in favor as the SQL is very taxing to always call and keep in the database and redundant data became a problem. Then the second method of implementing using session was tried but still was unsuccessful as the session data started misbehaving. So, the last option was to implement using cookies which worked quite well.
More improvement to the cart might be possible by using jQuery or Ajax.


- Piyush Kothari

Summary of Contribution

![image](https://user-images.githubusercontent.com/77658144/105013179-ee456500-5a79-11eb-89e7-0abe0b5d01c2.png)

![image](https://user-images.githubusercontent.com/77658144/105013221-fb625400-5a79-11eb-9b7b-ec6bb7b33a94.png)

![image](https://user-images.githubusercontent.com/77658144/105013249-0321f880-5a7a-11eb-94b9-60777cf4ac26.png)

- Reflection 
As soon as the group leader assigned me the administrator page, I started learning specific php functions that I was going to use to add and delete items from the database. Approach will simple, to plan each webpage for the administrator and make a time sheet so that all the functionalities are included within the given time constraint. I started with the index and moved towards administrator functions namely, adding and modifying products and categories. To add products, PDO queries were used but the challenge I faced was the first product added was not being displayed on the webpage. Another challenge was to store images of a single product but after reviewing all the possible solution, I found mkdir() suitable for the problems I was facing, which made separate directories for products and saved images in the image location. I tried adding separate subcategory and link it with the category id in the category table, but it was very time consuming and difficult to implement and also to display them in different drop-down menus.  The search tab had some problems, after selecting a specific category to filter the products, the filter dropdown showed the last searched term two time, which after editing shows last searched in bracket. To hide a product or a category I assigned a hide table to both product and category tables with Boolean value of 1 and 0, so in the php code 1 specifies visible and 0 specifies hidden, later which was linked to the categories and products. Displaying the user details was a query using post to get the data related to that user id. Adding a star rating functionality for the product was challenging, that’s why couldn’t finish in the given time. It can be done with review and rating function and a query which adds a star to the rating and links with the rating id in the database. All I learned throughout the group project was to strategies the given problem, setting targets with time constraints, to communicate with group members and discuss each other’s point of view and how to implement them together and be productive. To have good interaction skills so that all important points are covered. To effectively solve the problems and generate solution from the alternatives. I need to improve IT skills so that I can understand a specific query or a code and use it according to the requirement. Through the problem-solving period I came across small hurdles, being in a group helped me understand and learn efficiently.   

- I was guided to do the homepage, so I included bootstrap scripts to make the webpage look user friendly. I started with the navigation bar and made sure the website looks same on a computer as well as a mobile phone. The navigation bar includes a home icon, categories, search tab, signup icon, login icon and a cart icon. I added the link of the home page to the home icon using html code <li> So on clicking the home from anywhere on the website, it ends up on the home page. Using the font awesome helped me to get good user interface icons for all the specified pages for the navigation bar. The category is a drop-down list of all the categories added by the admin. Search tab uses cookies to get the entered data and then opens in the search page.  On clicking the signup icon, the webpage for registration opens. The login icon will open a webpage with a login form for the user and admin. The cart icon will open all the items added to cart by the users and guests and list down will the total calculations. The image carousel has custom made images for the Systro website which appeals the user to buy more products and build their own PC. It also shows that the website has good contact services. The client can add some products to the banner ads which is displayed right below the image carousel to make it like a flash sale. All the products are listed below with maximum four products in one row and maximum of 24 products on the home page which at chosen at random. The footer has all the social media icons with their specific links. The contact details for Systro are visible in the footer. Customers can email just by clicking on the highlighted email id. I tried implementing extra features such as categorizing all the products by recommendations and sales on the home page, it was quite challenging, and I stumbled upon a lot of errors and couldn’t make it in time. I learned to communicate properly with all the group members and making sure I do my part as assigned within the given timeframe. I will have to work on learning new bootstrap scripts as new versions comes from time to time and I need to be updated. As well as making sure there are no small code errors while testing the websites. Being in a group made me manage my time well.
