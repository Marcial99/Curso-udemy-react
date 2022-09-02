import React from "react";
import Image from "next/image";
import { formatearDinero } from "../helpers";
import useQuiosco from "../hooks/useQuisco";
const Producto = ({ producto }) => {
  const { nombre, precio, imagen } = producto;
  const { handleSetProducto, handleChangeModal } = useQuiosco();

  return (
    <div className="border p-3">
      <Image
        src={`/assets/img/${imagen}.jpg`}
        width={400}
        height={500}
        alt={`Imagen platillo ${nombre}.jpg`}
      />
      <div className="p-5">
        <h3 className="text-2xl font-bold">{nombre}</h3>
        <p className="mt-5 font-black text-4xl text-amber-500">
          {formatearDinero(precio)}
        </p>

        <button
          type="button"
          className="bg-indigo-600 hover:bg-indigo-800 w-full text-white mt-5 p-3 uppercase font-bold"
          onClick={() => {
            handleChangeModal();
            handleSetProducto(producto);
          }}
        >
          Agregar
        </button>
      </div>
    </div>
  );
};

export default Producto;
