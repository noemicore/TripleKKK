class UniformJs{

    //METODOS PARA REALIZAR OPERACIONES MDL
     //Metodo para insertar prcedimientos
    insertUniform() {
        var object = new FormData(document.querySelector("#insert_uniform"));
        fetch("UniformController/insertUniform", {
        method: "POST",
        body: object,
        })
        .then((resp) => resp.text())
        .then(function (data) {
            try {
            object = JSON.parse(data);
            toastr.error(object.message);
            } catch (error) {
            document.querySelector("#content").innerHTML = data;
            toastr.success("El registro fue guardado");
            }
        })
        .catch(function (error) {
            console.log(error);
        }
        );
    }

    //Metodo para buscar prendas o piezas
    filterUniform(){
        var object = new FormData(document.querySelector("#filter_uniform"));
        fetch("UniformController/filterUniform", {
          method: "POST",
          body: object,
        })
          .then((resp) => resp.text())
          .then(function (data) {
            try {
              object = JSON.parse(data);
              toastr.error(object.message);
            } catch (error) {
              document.querySelector("#content").innerHTML = data;
            }
          })
          .catch(function (error) {
            console.log(error);
          });
          
      }

    //Metodo para mostrar el formulario para agregar un nuevo uniforme
    showFormUniform() {        
        var object = new FormData();
        $("#my_modal").modal("show"); //Saber en donde vamos a mostrar el contenido
        document.querySelector("#modal_title").innerHTML =
        "Agregar un nuevo uniforme";
        fetch("UniformController/showFormUniform", {
        method: "POST",
        body: object,
        })
        .then((resp) => resp.text())
        .then(function (data) {
            document.querySelector("#modal_content").innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    showUniform(id_uniform){
      //Crear un formulario
      var object = new FormData();
  
      //Añardir al formulario el codigo del usuario
      object.append("id_uniform", id_uniform);
  
      $("#my_modal").modal("show");
  
      document.querySelector("#modal_title").innerHTML = "Actualizar uniforme";
  
      fetch("UniformController/showUniform", {
        method: "POST",
        body: object,
      })
        .then((resp) => resp.text())
        .then(function (data) {
          document.querySelector("#modal_content").innerHTML = data;
        })
        .catch(function (error) {
          console.log(error);
        });
    }

    //Metodo para actualizar un procedimiento
  updateUniform(id_uniform) {
    swal({
      icon: "warning",
      title: "Confirmar actualizar uniforme",
      text: "Esta seguro de actualizar el uniforme?",
      buttons: {
        cancel: true,
        confirm: true,
      },
    }).then((confirm) => {

      if (confirm) {
       
        //Obtener y agregar al formulario el codigo del usuario
        var object = new FormData(document.querySelector("#update_uniform"));
        object.append("id_uniform", id_uniform);

        fetch("UniformController/updateUniform", {
          method: "POST",
          body: object,
        })
          .then((resp) => resp.text())
          .then(function (data) {
            try {
              object = JSON.parse(data);

              toastr.error(object.message);
            } catch (error) {
              document.querySelector("#content").innerHTML = data;
              toastr.success("El registro fue guardado");
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    });
  }
}


//Creamos el objeto 
var Uniform = new UniformJs();