import React from "react";
import Formulario from "./Formulario";
import Alerta from "./Alerta";
import Letra from "./Letra";
import useLetras from "../hooks/useLetras";
import Spinner from "./Spinner";
const AppLetras = () => {
  const { alerta, letra, cargando } = useLetras();
  return (
    <>
      <header>Busqueda de letras de canciones</header>
      <Formulario></Formulario>
      <main>
        {alerta ? (
          <Alerta>{alerta}</Alerta>
        ) : letra ? (
          <Letra></Letra>
        ) : cargando ? (
          <Spinner />
        ) : (
          <p className="text-center">Busca letras de tus artistas favoritos</p>
        )}
      </main>
    </>
  );
};

export default AppLetras;
