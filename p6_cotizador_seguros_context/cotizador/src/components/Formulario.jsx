import React from "react";
import { MARCAS, YEARS } from "../constants";
const Formulario = () => {
  return (
    <>
      <form>
        <div className="my-5">
          <label
            htmlFor="marca"
            className="block mb-3 font-bold text-gray-400 uppercase"
          >
            Marca
          </label>
          <select
            name="marca"
            id="marca"
            className="w-full p-3 bg-white border border-gray-200"
          >
            <option value="">-- Selecciona Marca --</option>
            {MARCAS.map((marca) => (
              <option value={marca.id} key={marca.id}>
                {marca.nombre}
              </option>
            ))}
          </select>
        </div>

        <div className="my-5">
          <label
            htmlFor="year"
            className="block mb-3 font-bold text-gray-400 uppercase"
          >
            Año
          </label>
          <select
            name="year"
            id="year"
            className="w-full p-3 bg-white border border-gray-200"
          >
            <option value="">-- Selecciona Marca --</option>
            {YEARS.map((year) => (
              <option value={year} key={year}>
                {year}
              </option>
            ))}
          </select>
        </div>
      </form>
    </>
  );
};

export default Formulario;
