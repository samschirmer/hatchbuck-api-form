# hatchbuck-api-form
This is an example of Hatchbuck's API being used with a web form.

This is a fairly simplistic implementation of the Hatchbuck API using a web form. The full API documentation is available here:

https://hatchbuck.freshdesk.com/support/solutions/articles/5000578765-hatchbuck-api-documentation

The key is pushing a properly structured JSON to the correct URL (duh). This example is in PHP, but as long as those two major criteria are met, you should be able to use almost anything you want... except AJAX. The API forces SSL, and because of cross-domain browser security, you can't send the AJAX data to a domain you don't control.

Using the API (as opposed to a standard Hatchbuck form), you can perform a dual form submission and push the captured data into a local database or another application (like Stripe or whatever).  
