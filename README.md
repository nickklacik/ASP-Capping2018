# ASP-Capping2018

### Project Goal: 

  Our application, Pastyle, is an artistic stylizer platfor that allows users to upload a photo of their choice, select an artistic style, and have the selected style transferred to their content photo. Users will have the option to purchase their stylized photo, share their photo on social media, or have it printed on canvas. The style transfer is completed using a machine learning style transfer API. 
  
### Our Use Cases (UML Design):
  Pastyle is an application that will allow users to create a stylized photo of their choice. First, users will begin by creating an account for our platform. Users will create a username and password of their choice that they will use for authentication on login. The user will have the option of uploading content that they would like to have stylized and then select one of our six styles to be applied to the content image. These content images must be of high quality or they will receive and error and the image will not be uploaded. Images do not have to be stylized immediately upon upload, but they will be deleted if they have not been paid for in the 24 hours following the image upload. Images that have been paid for will remain on the account until the user deletes the image. After the user has uploaded a content image, they have the ability to stylize their photo using one of the six default styles given to all users. The user will be able to view a scaled down preview of their stylized image before deciding whether to purchase and print the image. If the user chooses to purchase the image, they will be redirected to the Stripe payment service and then have the ability to share the image to a social media platform. After the image has been printed and paid for, the user will have the ability to upload and stylize more images. The other type of users in the system will be system administrators, who will have access to usage data and logs. Administrators will be able to see how many people are engaging with the application, the number of uploads, and the number of purchases.  
  
![](https://github.com/nickklacik/ASP-Capping2018/blob/master/Homework/ASP-Capping2018%20UML.jpeg )

### Database Design (Entity-Relationship Diagram):

### User Interface/Wireframe Design:

![](https://github.com/nickklacik/ASP-Capping2018/blob/master/Homework/Wireframe.JPG )

![](https://github.com/nickklacik/ASP-Capping2018/blob/master/Homework/Wireframe_Upload.JPG )
### Our Machine Learning Style API:

### CanvasPop:
  CanvasPop is a photo printing service that we implemented in our application to allow users to have their stylized pictures printed on canvas. The CanvasPop API pop-up store was implemented by including the Javascript SDK, as seen below. 
  ```
  insert code here
  ```
### Stripe:
  Stripe is a payment service API that we use to handle payments for transactions in which the watermark is removed from a user's photo. 


