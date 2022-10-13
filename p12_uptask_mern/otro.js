$(".eliminar").live(function () {
  let sucursal = $(this).attr(id1);
  let origen = $(this).attr(id2);
  let destino = $(this).attr(id3);
  let tipo_unidad = $(this).attr(id4);
  let confirma = confirm(
    `sucursal:${sucursal}, origen:${origen}, destino:${destino}, unidad:${unidad}`
  );
  if (confirma) {
    $.ajax({
      type: "POST",
      data: {
        sucursal,
        origen,
        destino,
        tipo_unidad,
        action: "borrarRegistro",
      },
      url: "class/trpa48_ajax.php",
      success: function (res) {
        console.log(res);
      },
    });
  } else {
    return;
  }
});
