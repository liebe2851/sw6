# Set Up
```
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install mysql-server
sudo apt-get install apache2 
sudo apt-get install php
sudo apt-get install libmysqlclient-dev
```

if you can't start mysql
```
sudo /etc/init.d/mysql start
```

# MYSQL
### start mysql

```
create user root@'%' identified by 'sjoo';
FLUSH PRIVILEGES;
create database cose451;
```

### create table
```
use cose451;
create table `Users`(`id` char(100) , `pw` char(100),`name` char(100));
create table `groups`(`id` char(100), `pw` char(100), `name` text(100), `money` int(100) default 0);
create table group_user(`group` char(100),user char(100));
create table board(memo text(100),id char(100));
```

# Apache
```
sudo service apache2 restart

cd /var/www/html
```
you can see Apache2 Ubuntu Default Page on localhost

# git clone and make
you must do it in **/var/www/html**

```
git clone https://github.com/liebe2851/sw6.git
```
then you can see our login page in **localhost/sw6/index.php**

but you can't login


```
cd sw6
make clean
make
```



## My server! :)
http://13.209.70.52/

일단 제 서버에 올라 와 있으니 잘 작동하는지 기능 비교하는 용도로만 사용해주세요!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!11

aws free 티어 간당간당해요

코드 짜서 돌리지 말아주세요 제발
상용 툴 쓰지 말아주세요

저 10만원 빠져나가ㅏ요....
50만원 일수도...

hi

I'm almost out of my AWS free tier usage.. :(

If you use python script or automatic tool, it will cost some payment..

Please use automatic tool or script on your computer or local environment.

Please use it only to check if it works the same as the local environment.

thank you!
 
