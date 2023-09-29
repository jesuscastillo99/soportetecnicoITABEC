//Scripts para formulario de Domicilios
 const inputCodigoPostal = document.getElementById('codigo_postal');
    
 inputCodigoPostal.addEventListener('input', function() {
   const valor = this.value;
   if (!/^\d{5}$/.test(valor)) {
     this.setCustomValidity('Ingresa un Código Postal de 5 dígitos.');
   } else {
     this.setCustomValidity('');
   }
 });