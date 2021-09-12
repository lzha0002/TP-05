



![image-20210913031647189](C:\Users\kjguo\AppData\Roaming\Typora\typora-user-images\image-20210913031647189.png)

#### Update:

##### Compare with iteration 1, the iteration 2 upade:

1. Create the fact page which is about the solar panel installation and carbon emission
2. Update the calculator function: add the saving money calculator and appliance calculator
3. Update the News and Article page: Summary the bullet point instead of provide the link
4. Reset the UI of calculator:  More readability for users
5. Reset the UI of New and Article page: More readability for users
6. Reset the UI of homepage: More readability for users
7. Reset all of UI design: Use the different template 





#### Tech:

Built with EC2 instance , Route 53 DNS mangement. WordPress AMI, using phpMyAdmin as database server

##### Plugin:

1. Visualizer: this plugin is used to display data visualizaitions that support user interation with data in Carbon emission page
2. wpDataTables; this plugin is used to display data visualizations that support user interation with data in Fact page
3. Calculated Fields Form: this plugin is used to display calculate function that support user interation with calculator in calculator page
4. Colibri: this plugin is used to edit UI and layout of the template in global
5. Elementor: this plugin is used to edit UI and layout of each page.
6. WP-phpMyAdmin:  this plugin use to link database and create four tables in the database

##### Codebase structure:

The codebase of solar system consists of around 1000 files and directions. in the root directory, there are some initial bootstrap files, such as index.php, wp-config.php, wp-load.php, wp-setting.php. The fout documents are wp-admin, wp-content, wp-includes and licenses. the licenses document includes the plugin licenses. wp-admin, wp-content, wp-includes are include plugins code. front-end code and the back-end code.  

