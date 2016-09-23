# hatchbuck-popup-form-generator
This script parses the code from a Hatchbuck form and uses it to generate a popup form. It will ignore any input fields that are not first name, last name, email address, or one of the required, hidden fields. 

To use the generated code, paste the entire code block just before the closing </body> tag of a website. 

This also allows you to customize the title of the pop-up, the button text, and add Hatchbuck webpage tracking code. Since this is using the default submission script hosting at app.hatchbuck.com, the tracking cookie will indeed drop when the form is submitted, unlike API calls.
