FROM debian:bullseye

RUN apt-get update && apt-get install -y nginx openssl
RUN apt-get update && apt-get install -y curl


# Generar certificado SSL
RUN mkdir -p /etc/nginx/ssl && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/nginx/ssl/nginx.key \
    -out /etc/nginx/ssl/nginx.crt \
    -subj "/CN=${DOMAIN_NAME}"

COPY conf/nginx.conf /etc/nginx/conf/nginx.conf

CMD ["nginx", "-g", "daemon off;"]
