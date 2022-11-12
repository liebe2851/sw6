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
git clone....
```
make clean
make
```




http://13.209.70.52/

안녕하세요...

aws free 티어 간당간당해요

코드 짜서 돌리지 말아주세요 제발
상용 툴 쓰지 말아주세요

저 10만원 빠져나가ㅏ요....

hi

I'm almost out of my AWS free tier usage.. :(

If you use python script or automatic tool, it will cost some payment..

Please use automatic tool or script on your computer or local environment.

thank you!
 
### compile option

```
gcc -z execstack -fno-stack-protector -z norelro -g -O0 -o login  login.c `mysql_config --cflags --libs`

```
모두 같은 옵션으로 컴파일 했습니다.



