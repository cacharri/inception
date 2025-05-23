# Variables
DOCKER_COMPOSE = docker compose
COMPOSE_FILE = ./srcs/docker-compose.yml

# Objetivo por defecto
all: build

build:
	$(DOCKER_COMPOSE) -f $(COMPOSE_FILE) build

up:
	$(DOCKER_COMPOSE) -f $(COMPOSE_FILE) up -d

down:
	$(DOCKER_COMPOSE) -f $(COMPOSE_FILE) down

clean:
	$(DOCKER_COMPOSE) -f $(COMPOSE_FILE) down --volumes --remove-orphans

fclean: clean
	docker image prune -af
	docker volume prune -f

re: fclean all up
