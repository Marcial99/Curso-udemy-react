import React from "react";
import useLetras from "../hooks/useLetras";
const Letra = () => {
  const { letra, cargando } = useLetras();
  retur(cargando ? "Cargando" : <div className="letra">{letra}</div>);
};

export default Letra;
