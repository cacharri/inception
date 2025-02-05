# Variables
DOCKER_COMPOSE = docker compose -f srcs/docker-compose.yml

# Reglas
all:
	$(DOCKER_COMPOSE) up --build

clean:
	$(DOCKER_COMPOSE) down -v

re: clean all
