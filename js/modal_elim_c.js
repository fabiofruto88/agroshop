function confirmacion(e){
if (confirm("¿seguro que quieres eliminar este usuario?\n ADVERTENCIA!! esta accion no tiene recuperacion alguna de los datos borrrados")) {
  return true;  
} else {
    e.preventDefault();
 }
}
let linkDelete = document.querySelectorAll(".table__item__link");
for (let i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click', confirmacion);
    
}