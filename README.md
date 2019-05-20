# Entrega por Drone
Aplicação Back-end REST API para gerenciar entregas por drone.


Utiliza a linguagem "PHP"
Utiliza banco de dados "MySQL"
Utiliza o Framework “Lumen”
Utiliza o ORM "Eloquent"
Utiliza o controle de versão "GIT"
Utiliza a conteinerização com "Docker".

rotas:
| GET /drones
| Insert: GET /drones
| Update: PUT /drones/{id}
| Delete: DEL /drones/{id}
| Create: POST /drones/{id}
| Paginate: GET /drones?_page=7&_limit=20
| Sort: GET /drones?_sort=id&_order=asc
| Filter: GET /drones?name=daniel&status=fail
| Filter: GET /drones?id=1&id=2

Instruções para executar API ( comando de docker-compose, composer, etc...)

#Modelo Drone
     
{
    "id": 1,
    "image": "https://robohash.org/verovoluptatequia.jpg",
    "name": "Suzann",
    "address": "955 Springview Junction",
    "battery": 90,
    "max_speed": 3.8,
    "average_speed": 11.6,
    "status": "failed",
    "fly": 94
}
PS: Valores definidos para 'status': 'success', 'delayed', 'flying', 'failed', 'offiline' e 'charging';

# Mysql
> mysql -u root-p
> CREATE USER 'entregapordrone'@'localhost' IDENTIFIED BY 'entregapordronepass';
> GRANT ALL PRIVILEGES ON *.* TO 'entregapordrone'@'localhost';
> CREATE DATABASE entregapordrone;

# Migration
> php artisan migrate

# Seed
> php artisan db:seed

# Server
> php -S localhost:8080 -t public/


