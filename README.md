# Prueba TOBS

Mi web app lo que hace es a partir de buscar un jugador de futbol, muestre sus datos y luego se puedan ver datos del equipo en el que juega
o las ligas que hay en el pais del jugador.

En el index se ingresa el apellido del jugador de futbol que se desea buscar y devuelve todos los jugadores con ese mismo apellido donde
clickeando en el jugador se redirige a jugador.php enviandole por GET el id del jugador.
Ya en el jugador muestra los datos del mismo (pais,equipo,edad,goles asistencias y tarjetas en la temporada), donde puede hacer click en
el equipo para ver datos como la plantilla, o el pais donde luego muestra las ligas que hay para eso recibi por GET el nombre del pais y
cinecte la api para que me traiga el las ligas disponibles y comparo el pais de la liga con el recibido por GET y muestro el nombre de las 
ligas que hay en ese pais. 
Si se selecciona el equipo se manda por GET el id del equipo, y ya en equipo.php muestra 2 botones, plantilla, que si le hacen click
muestra todos los jugadores del equipo y si se selecciona algun jugador muestra sus datos, y fixture que no lo pude desarrollar ya que
no trae datos fixture.


Hubo problemas con los datos que habia en las api (fixture estaba vacia), y las conexiones, como que los equipos no tengan un id liga/pais
ni el nombre de la liga/pais del que estan, la unica manera de conecectar la liga con el pais que encontre fue la desarrollada y ademas 
solo hay 2 ligas cargadas que son la ligue 2, de Francia y la de Premiership de Escocia, por ser la version free.
