<?php

/*
| GET /drones
| Insert: GET /drones
| Update: PUT /drones/{id}
| Delete: DEL /drones/{id}
| Create: POST /drones/{id}
| Paginate: GET /drones?_page=7&_limit=20
| Sort: GET /drones?_sort=id&_order=asc
| Filter: GET /drones?name=daniel&status=fail
| Filter: GET /drones?id=1&id=2
|
*/

$router->get('/', function (){
    return "Bem vindo ao back-end Entrega por Drones";
});
$router->get('/drones', 'DroneController@index'); // GET /drones
$router->post('/drones', 'DroneController@create'); // Create: GET /drones/ ???
$router->put('/drones/{id}', 'DroneController@update'); // Update: PUT /drones/{id}
$router->delete('/drones/{id}', 'DroneController@destroy'); // Delete: DEL /drones/{id}


