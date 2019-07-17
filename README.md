# ngoforlife
 A web portal for finding nearest blood donors and can post news online.
 
 
 Project demo [link](https://ngoforlife.herokuapp.com/)
 

# Technology used
    1. Laravel PHP framework
    2. HTML
    3. CSS
    4. Bootstrap 3
    5. jQuery
    6. Javascript
    7. SQL database
    8. AWS S3 storage


# setup AWS S3 storage 
    follow the instruction from this blog https://blog.larapulse.com/laravel/aws-s3-with-laravel-5
    create a bucket with name ngoforlife
    and choose the region as asia pasific mumbai
   
# generate policy in aws s3 bucket
     1. select bucket ngofor life
     2.go to permissions>bucket policy
     
     3.  add below json in the policy area
          {
              "Version": "2008-10-17",
              "Id": "Policy-id",
              "Statement": [
                  {
                      "Sid": "",
                      "Effect": "Allow",
                      "Principal": {
                          "AWS": "*"
                      },
                      "Action": "s3:GetObject",
                      "Resource": "arn:aws:s3:::ngoforlife/*",
                      "Condition": {}
                  }
              ]
          }
       4. save policy
       
# Setup permission
    1. select bucket ngofor life
    2. go to permissions>block public access and deselect all and save it
    3. go to access control list in the permission tab.
    4. select public access to everyone and allow object read and object write.
    
   

# direction to run this project
    1. Clone with git clone https://github.com/sammacorpy/ngoforlife.git
    2. install xampp or lampp if you use linux os.
    3. install composer from https://getcomposer.org/
    4. import database attached in this repo with name bigdatalife into xampp 
    5. setup .env file in root folder of the project refer .env example file in this repo
    6. run composer install
    7. run this command php artisan generate:key
    8. php artisan serve
    9. open localhost:8000 hurray u got it.
    

    
