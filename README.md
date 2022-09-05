# ITL Asistencias

## Requirements

- MySQL Connector/NET [6.6.6](https://downloads.mysql.com/archives/c-net/) version or lower.
- [XAMPP](https://www.apachefriends.org/download.html) (PHP development enviroment).
- Web Browser, recommended:
  - [Mozilla Firefox](https://www.mozilla.org/en-US/firefox/new/).
  - [Google Chrome](https://www.google.com/chrome/).
- Text Editor:
  - Notepad (included on Windows).
  - [Visual Studio Code](https://code.visualstudio.com/download).
 
## Installation

1. First you need to download this repository and extract the .zip file to get the web application folder.
2. After setting up XAMPP in your computer you need to go to the next path in your File Explorer **`C:\xampp\htdocs`** and move the extracted folder inside.
    - You can rename the **`itl_asistencias-master`** folder to just **`itl_asistencias`** (recommended) or something else. This will have an impact when trying to access the web app so choose whatever you like best.
3. Now go to your web browser and type **`localhost`** on the Search Bar and press Enter.
4. To import the Web App's database structure follow the next steps:
    - On localhost: click **`phpmyAdmin`** on the top-right of the page.
    - Now inside of the phpMyAdmin page click on **`Databases`** and give the database the name of **`itl_asistencias`** (required) and press **`Create`**.
    - Select the database we just created and click on **`Import`** then **`Select File`**.
    - Navigate to **`C:\xampp\htdocs\itl_asistencias-master\baseDatos`** and select the **`.sql`** file, then press **`Next`**.
    - Database structure has been succesfully imported.
5. Go to **`C:\xampp\htdocs\itl_asistencias\conexion`** and open the **`conexion.php`** file with the text editor of your choice.
6. Edit the following variables with whatever you assign when installing MySQL/XAMPP then save changes:
    - **`$db_user`**
    - **`$db_password`**
    
**After following this steps the Web Application should be completely installed in your computer!**

## Accessing the Web App

1. On the Search Bar of your Web Browser go to **`http://localhost/itl_asistencias/`**
    - **Note:** What comes after **`localhost/`** depends on the folder's name that you assigned on step 2 of the installation process.
    - Now you're in the Web App. Is the first time you access it so the system still doesn't have an account to give access to the Main Menu.
2. Double click on the clock displaying the current time, this is gonna display a message telling you to register the first user.
3. Click on **`Registro`**.
4. Enter the user name and password that you'll like to be attached to your account then press **`Registrar`**.
    - **Your user has been successfully registered.**
5. Now you can double click again on the clock and access to the system using the account you just created.
