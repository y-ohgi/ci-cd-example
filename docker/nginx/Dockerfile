FROM nginx:1.15-alpine

COPY public /var/www/html/public
COPY docker/nginx/default.conf.template /etc/nginx/conf.d/default.conf.template

EXPOSE "80"

CMD /bin/sh -c 'sed "s/\${PHP_HOST}/$PHP_HOST/" /etc/nginx/conf.d/default.conf.template  > /etc/nginx/conf.d/default.conf && nginx -g "daemon off;"'
