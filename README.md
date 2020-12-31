# GoodsSpikeSystemYuan
A small project for Internet development class. It's deployed in my server, you can experience my goods spike system by the following way:

- **Client**

  you can visit http://39.106.175.222:8080/login/to_login to try client. An account is prepared for you: 

  username: 15011063359

  password: 123456

- **Back-end management system**

  you can visit http://www.hanggenewbee.com/login/index.html to try Back-end management system, three accounts with different limits of authority are prepared for you:

  - super administrators

    username: root

    password: root

  - normal administrators

    username: admin

    password: admin

  - normal users

    username: normal

    password: normal

# Introdection to files

There are two folders: **Backend** and **Client**.

In Backend are all the source files of the Back-end management system, and in Client are all the source files of client of this goods spike system.

And there is a file: miaosha.jar. It's an executable java file in Linux system, you can run this file to easily deploy the client.

# How to deploy Client

### Enviorment

- Linux Server
- Java
- Redis
- RabbitMQ
- MySQL

### easy way to run client

1. upload miaosha.jar to your Linux Server;
2. input `nohup java -jar miaosha.jar &` in your terminal to start;
3. then you can visit http://`your ip`:8080/login/to_login to try this project.

**note: if you run client in this way you are using my database, so I will provide you with a account:**

**username: 15011063359**

**password: 123456**

### run this client with your own database

you need to reproduce miaosha.jar, because we will change many things in source file.

1. change the setting file Client/src/main/resources/applications.properties, you will need to change these ip to your own ip:

   ```
   spring.datasource.url=jdbc:mysql://39.106.175.222:3306/miaosha?useUnicode=true&characterEncoding=utf-8&allowMultiQueries=true&useSSL=false
   redis.host=39.106.175.222
   spring.rabbitmq.host=39.106.175.222
   ```

2. then use the following command to reproduce miaosha.jar:

   ```
   mvn clean package
   ```

3. finally you will find a new miaosha.jar file in Client/target/ directory, now you can follow the steps in **easy way to run client.**

# How to deploy Back-end

### Environment

- Linux Server
- php-7.2
- ThinkPHP-5.0

### deploy

1. create a web based on ThinkPHP-5.0 and php-7.2;
2. delete all files in your web;
3. upload all files in `Backend` to the root directory of your web page.

### PS

If you are using **BaoTa** to help you manipulate your server, you may **additionally** need to change this fies: Backend/public/.user.ini, the content of this file now is:

```
open_basedir=/www/wwwroot/www.hanggenewbee.com/:/tmp/
```

you need change it to this form:

```
open_basedir={Absolut path of your web}:/tmp/
```

