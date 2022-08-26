import React from "react";
import Formulario from "./Formulario";
import Resultado from "./Resultado";
import Loading from "./Loading";
import useClima from "../hooks/useClima";
const AppClima = () => {
  const { resultado, cargando, noResultado } = useClima();
  return (
    <>
      <main className="dos-columnas">
        <Formulario></Formulario>
        {cargando ? (
          <Loading></Loading>
        ) : resultado?.name ? (
          <Resultado></Resultado>
        ) : noResultado ? (
          <p>{noResultado}</p>
        ) : (
          <p>El clima se va a mostrar aqui</p>
        )}
      </main>
    </>
  );
};

export default AppClima;
