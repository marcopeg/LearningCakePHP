CakePHP + CakePOWER REST Service Tutorial Demo
==============================================

@author:	Marco Pegoraro
@contact:	marco(dot)pegoraro(at)gmail(dot)com
@follow:	@thepeg
@blog:		http://movableapp.com






This application provides 3 main actions:
- register an identity
- login
- edit profile data and optionally change password

These actions are provided in 3 modes:

1. CakePHP Standard - "http://your_install/users/login"
=======================================================

a very simple MVC app that uses a model to handle users data,
a controller to drive actions and requests and some views to
present data to the user.

2. Desktop Ajax App - "http://your_install/ui/desktop"
======================================================
it offers the same functionalities of the app above but is 
developed in Javascript (jQuery+BackboneJS) and uses AJAX
to interact with server side resources (read later!).

3. jQuery Mobile Ajax App - "http://your_install/ui/mobile"
===========================================================
it offers the same functionalities of the app above but is 
developed on jQuery Mobile framework to offer a simple
yet comfortable mobile experience.







SERVER SIDE RESOURCES
=====================

In this app UsersController's action methods are called "resources" or "services".
A resource (or service) allow to exchange data between the client side and
the server side component of a modern web app.

If you call a service by it's CakePHP url it will use a CakePHP view to
provide a "classic" HTML response:

"/users/register"
-> outputs a registration form
<- handle form data to create a new user then redirects to a confirmation page

If you call the same url "as a service" things change.
"as a service" means your caller object needs data, not HTML so we
append a "json" extension to tell our server side we espect to receive some data
in JSON format:

"/users/register.json"
-> a message who explai how to use the service
<- handle form or JSON data to create new user.
<- confirm or provide errors informations
<- if confirm then "suggest" the next resource to use







DIFFERENT SCOPE - SAME IMPLEMENTATION
=====================================

It is important to understand that call "register" action from a web browser
or from a REST client means different things and different behaviors of
the server side component.

Here at CakePOWER we think to REST webservice as a subset of functionality of
a classic page request. but data is the same!

We don't like to write code so much so we thought a way to use the same code
for both types of requests.

This is WHY State Notifications Utilities was made for.
(http://movableapp.com/2012/07/cakepower-notification-system/)

A classic page request app needs to perform these actions just before to
render a view:

- set some data
- confirm an actions happens correctly
- alert for errors
- redirects to other pages

CakePOWER ask you to use some simple methods to implement above actions:

- $this->Session->success( 'user was created!' );
- $this->Session->error( 'validation errors found!' );
- $this->redirect('/');
- $this->tell(array( 'name'=>'Marco', 'surname'=>'Pegoraro' ))

These methods recognise a REST or AJAX request is used then change the
rendering behavior for our app exposing JSON or XML data.

You are not asked to do nothing else!
(yep, you need to use the RequestHandler component and to implement REST in your routes!)
(http://book.cakephp.org/2.0/en/development/rest.html#the-simple-setup)




EXAMPLE's USERS DATABASE - Where is it?
=======================================

You may ask yourself why this app works without to setup a MySQL database and run
some setup queries as you always was teached to do...

Well, the focus of this example is REST and AJAX communications and implementations...
not a database configuration so I don't want you waste your time in configuring anything!

I used a simple TXT file as users database. Users profiles data are stored in JSON format.
/app/tmp/users.txt (it may not exists if you didn't create any user!)

This is the story of HOW our app uses these database:

1. UsersController uses AuthComponent to ensure authentication services and password hashing
2. AuthComponent is teached to use User model to handle users data
3. UsersController uses User model to handle users data the CakePHP way
4. User model is teached to use "json_users" database configuration
5. "json_users" db configuration points to JsonUsersSource Datasource
6. JsonUsersSource is responsible to read and write the json database file

It is not the focus of this app to talk about datasources but they are a very convenient 
way to think about data allowing an application to implement data with Models. simple.






