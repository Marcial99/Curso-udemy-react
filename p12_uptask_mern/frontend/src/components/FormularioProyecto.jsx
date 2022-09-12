import React from "react";
import { useState } from "react";
import useProyectos from "../hooks/useProyectos";
import Alerta from "./Alerta";
const FormularioProyecto = () => {
  const [nombre, setNombre] = useState("");
  const [descripcion, setDescripcion] = useState("");
  const [fechaEntrega, setFechaEntrega] = useState("");
  const [cliente, setCliente] = useState("");

  const { alerta, mostrarAlerta, submitProyecto } = useProyectos();

  const handleSubmit = async (e) => {
    e.preventDefault();
    if ([nombre, descripcion, fechaEntrega, cliente].includes("")) {
      mostrarAlerta({
        msg: "Todos los campos son obligatorios",
        error: true,
      });
      return;
    }

    //Pasar los datos al Provider
    await submitProyecto({
      nombre,
      descripcion,
      fechaEntrega,
      cliente,
    });
    setNombre("");
    setDescripcion("");
    setFechaEntrega("");
    setCliente("");
  };

  const { msg } = alerta;

  return (
    <form
      className="bg-white py-10 px-5 md:w-1/2 rounded-lg shadow"
      onSubmit={handleSubmit}
    >
      {msg && <Alerta alerta={alerta} />}
      <div className="mb-5">
        <label
          htmlFor="nombre"
          className="text-gray-700 uppercase font-bold text-sm"
        >
          Nombre Proyecto:
        </label>
        <input
          value={nombre}
          onChange={(e) => setNombre(e.target.value)}
          type="text"
          id="nombre"
          className="border w-full p-2 mt-2 placeholder-gray-400
          rounded-md"
          placeholder="Nombre del Proyecto"
        />
      </div>

      <div className="mb-5">
        <label
          htmlFor="descripcion"
          className="text-gray-700 uppercase font-bold text-sm"
        >
          Descripción:
        </label>
        <textarea
          value={descripcion}
          onChange={(e) => setDescripcion(e.target.value)}
          id="descripcion"
          className="border w-full p-2 mt-2 placeholder-gray-400
          rounded-md"
          placeholder="Descripción del Proyecto"
        />
      </div>

      <div className="mb-5">
        <label
          htmlFor="fecha-entrega"
          className="text-gray-700 uppercase font-bold text-sm"
        >
          Fecha de Entrega:
        </label>
        <input
          value={fechaEntrega}
          onChange={(e) => setFechaEntrega(e.target.value)}
          type="date"
          id="fecha-entrega"
          className="border w-full p-2 mt-2 placeholder-gray-400
          rounded-md"
        />
      </div>

      <div className="mb-5">
        <label
          htmlFor="cliente"
          className="text-gray-700 uppercase font-bold text-sm"
        >
          Nombre Cliente:
        </label>
        <input
          value={cliente}
          onChange={(e) => setCliente(e.target.value)}
          type="text"
          id="cliente"
          className="border w-full p-2 mt-2 placeholder-gray-400
          rounded-md"
          placeholder="Nombre del Cliente"
        />
      </div>
      <input
        type="submit"
        value={"Crear Proyecto"}
        className="bg-sky-600 w-full p-3 uppercase font-bold text-white
        rounded cursor-pointer hover:bg-sky-700 transition-colors"
      />
    </form>
  );
};

export default FormularioProyecto;
