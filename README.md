# Mailchimp_API_welcome_registration
In this repository you can learn how to implement API Mailchimp for send welcome email to users registered. 

The registration template have downloaded at https://colorlib.com/wp/html5-and-css3-login-forms/


To create this demo I used the PHP language. 
After entering the fields in the form the data is saved in the MySQL database in the "persona" table.
This table consists of 4 fields:

- id: a numerical progressive identifier (AUTOINCREMENT) that serves as PRIMARY KEY;
- username;
- email;
- password: encrypted with md5 algorithm. 

You can find the sql file in the repository under the name of "persona.sql".

After that we can call the MailChimp's API.
It is important to enter your APIKey and ListID credentials.

To get them, you need to register on the site via https://mailchimp.com/ and then do the following:

1. First of all you need to create your first email campaign
    - click on "campaigns";
    - click on "create campaign";
    - click on "email";
    - click on "automated";
    - click on "welcome new subscribe";
    - create your personalized email.
    
2. Get APIKey
   - click on Mailchimp logo :monkey: ;
   - click on your name in top right of page dropdown;
   - click on "extra";
   - click on "apikey";
   - copy the string and paste in file php YOUR_APIKEY;
 
3. Get ListID
  - click on "audience" on navbar; 
  - click on "manage audience" dropdown;
  - click on "settings";
  - go botton on page;
  - copy the string and paste in file php YOUR_LISTID.
  
When people will subscribe in your website they automatically will receive the email that you created before in the step 1.
