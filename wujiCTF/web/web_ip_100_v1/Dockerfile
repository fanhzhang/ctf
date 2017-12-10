FROM ubuntu:14.04


RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y  apache2 php5 libapache2-mod-php5 php5-mysql 
RUN apt-get install -y mysql-server

RUN echo "Listen 8000" >> /etc/apache2/ports.conf
COPY ./file/db.sql /root/
COPY ./file/index.php /var/www/html
RUN rm /var/www/html/index.html

RUN apt-get clean
RUN service apache2 stop
RUN service mysql stop
EXPOSE 8000
CMD /etc/init.d/mysql start && mysql -e "source /root/db.sql;" &&/usr/sbin/apache2ctl -D FOREGROUND
