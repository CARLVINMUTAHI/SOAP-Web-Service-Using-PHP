## Lab 3: Service Invocation and Description in SOAP and WSDL using PHP

> Scripts

[client.php](https://github.com/AllanVikiru/DistributedObjectsWebServices/blob/soap/client.php) : SOAP client for consuming SOAP service 'fetch'
  
[db.php](https://github.com/AllanVikiru/DistributedObjectsWebServices/blob/soap/db.php) : contains database operations - connection, registration and fetch student details

[register.php](https://github.com/AllanVikiru/DistributedObjectsWebServices/blob/soap/register.php) : form for registering students.

[service.php](https://github.com/AllanVikiru/DistributedObjectsWebServices/blob/soap/service.php) : declares SOAP service and WSDL file configuration.

[students.sql](https://github.com/AllanVikiru/DistributedObjectsWebServices/blob/soap/students.sql) : SQL file for defining student information.


> Prerequisites

[Include PHP NuSOAP Library](https://sourceforge.net/projects/nusoap/) : download the NuSOAP library, extract it and include the lib folder to your project directory.  


> Program Execution
```
1. Create a folder 'dows-soap' within the local web server folder and paste the scripts on there. 

2. Create a MYSQL database and import students.sql as a new table. 

3. In credentials.php enter your database connection credentials as indicated - server name, username, password and database name.

4. Consequently, run localhost/dows-soap/register.php and localhost/dows-soap/client.php on your web browser to carry out registration and consume 'fetch student details' service.

5. Run localhost/dows-soap/service.php to view service details and localhost/dows-soap/service.php?wsdl to view the WSDL file generated
            
```
