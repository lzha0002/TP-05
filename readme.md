



![image-20211010015016118](C:\Users\kjguo\AppData\Roaming\Typora\typora-user-images\image-20211010015016118.png)

#### Update:

##### Compare with iteration 2, the iteration 3 upade:

1. Create the front page which in the fact, rebate and calculator menu
2. Update the calculator function: add the function choose the roofsize to show how many solar panels
3. Update the News and Article page: Summary the bullet point instead of provide the link
4. Add the function rebate
5. Add the function step 
6. Add the map function in the fact page
7. Reset the UI of calculator:  More readability for users
8. Reset the UI of New and Article page: More readability for users
9. Reset the UI of homepage: More readability for users
10. Reset all of UI design: Reset the style and color
11. Reset the UI of Fact page





#### Tech:

Built with EC2 instance , Route 53 DNS mangement. WordPress AMI, using phpMyAdmin as database server

##### Plugin:

1. Visualizer: this plugin is used to display data visualizaitions that support user interation with data in Carbon emission page
2. wpDataTables; this plugin is used to display data visualizations that support user interation with data in Fact page
3. Calculated Fields Form: this plugin is used to display calculate function that support user interation with calculator in calculator page
4. Colibri: this plugin is used to edit UI and layout of the template in global
5. Elementor: this plugin is used to edit UI and layout of each page.
6. WP-phpMyAdmin:  this plugin use to link database and create four tables in the database
7. MetaSlider: this plugin use to show the slide
8. Forminator:  this plugin use to use the interactive quiz in the rebate
9. Frontend Chcklist: Use cookies not refresh
10. Popup anything on click: Use it to do the pop window
11. Text sliders: This plugin use the text add the slider .

##### Codebase structure:

The codebase of solar system consists of around 1000 files and directions. in the root directory, there are some initial bootstrap files, such as index.php, wp-config.php, wp-load.php, wp-setting.php. The fout documents are wp-admin, wp-content, wp-includes and licenses. the licenses document includes the plugin licenses. wp-admin, wp-content, wp-includes are include plugins code. front-end code and the back-end code.  

 