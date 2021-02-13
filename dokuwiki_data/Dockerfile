FROM bitnami/dokuwiki:20200729-debian-10

#changes to root user, does commands, and then changes back
USER 0 
RUN apt-get update && apt-get install -y libpq-dev && apt-get install -y php7-pdo_pgsql
USER 1001

## Modify the ports used by Apache by default
# It is also possible to change these environment variables at runtime
ENV APACHE_HTTP_PORT_NUMBER=8081
ENV APACHE_HTTPS_PORT_NUMBER=8443
EXPOSE 8081 8443