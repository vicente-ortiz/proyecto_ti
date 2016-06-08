
# proyecto_ti
CROWDFUNDING PROJECT
Crowdfunding project is a site where people can submit their projects publicly seeking investors to finance their ideas. Investors may freely pursue projects that interest them and with higher projections to invest in them .

DOWNLOAD PROCESS
First you must download and unzip file in C : \ xampp \ htdocs \ moodle \ Local , giving the name " proyecto_ti " finally to get started entering the site "http : // localhost / moodle / local / proyecto_ti / inicio.php " .

DATABASE
localhost->phpmyadmin->moodle->new->name table: mdl_add_project

Then you proceed to fill the database with these columns

-name->varchar(100)
-category->varchar(100)
-phone->int(13)
-email->varchar(45)
-content->longtext
-needmoney->bigint(255)
-gatheredmoney->bigint(255)
-id->int(11)-> it must be auto_increment so you have to activate the A_I option