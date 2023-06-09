class PieceJs{


     //Metodo para insertar piezas
    insertPiece() {
        var object = new FormData(document.querySelector("#insert_piece"));
        fetch("PieceController/insertPiece", {
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

    //Metodo para mostrar el formulario para agregar un nuevo piezas
    showFormPiece() {        
        var object = new FormData();
        $("#my_modal").modal("show"); //Saber en donde vamos a mostrar el contenido
        document.querySelector("#modal_title").innerHTML =
        "Agregar una nueva prenda";
        fetch("PieceController/showFormPiece", {
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


    //Metodo para buscar prendas o piezas
    filterPiece(){
      var object = new FormData(document.querySelector("#filter_piece"));
      fetch("PieceController/filterPiece", {
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

    showPiece(id_piece){
      //Crear un formulario
      var object = new FormData();
  
      //Añardir al formulario el codigo del usuario
      object.append("id_piece", id_piece);
  
      $("#my_modal").modal("show");
  
      document.querySelector("#modal_title").innerHTML = "Actualizar prenda";
  
      fetch("PieceController/showPiece", {
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

    

    //Metodo para eliminar una piezas
    deletePiece(id_piece){
    swal({
      icon: "warning",
      title: "Confirmar eliminar una prenda",
      text: "Esta seguro de eliminar la prenda?",
      buttons: {
        cancel: true,
        confirm: true,
      },
    }).then((confirm) => {
      if (confirm) {
        //Obtener y agregar al formulario el codigo del usuario
        var object = new FormData();
        object.append("id_piece", id_piece);

        fetch("PieceController/deletePiece", {
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
              toastr.success("La prenda fue eliminada");
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    });
  }

}

var Piece = new PieceJs();