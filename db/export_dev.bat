D:\xampp\mysql\bin\mysqldump -d --comments=FALSE -u root fl_solar  > 1_schema.sql
D:\xampp\mysql\bin\mysqldump -t --order-by-primary --comments=FALSE -u root fl_solar  > 2_init_data.sql
