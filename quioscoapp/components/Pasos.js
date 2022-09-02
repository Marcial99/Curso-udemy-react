import React from "react";
import { useRouter } from "next/router";
import useQuiosco from "../hooks/useQuisco";
const pasos = [
  { paso: 1, nombre: "Menu", url: "/" },
  { paso: 2, nombre: "Resumen", url: "/resumen" },
  { paso: 3, nombre: "Datos y Total", url: "/total" },
];
const Pasos = () => {
  const { handleChangePaso, paso } = useQuiosco();
  const router = useRouter();
  const calcularProgreso = () => {
    const porcentaje = (paso / 3) * 100;
  };
  return (
    <>
      <div className="flex justify-between">
        {pasos.map((paso) => (
          <button
            key={paso.paso}
            className="text-2xl font-bold"
            onClick={() => {
              router.push(paso.url);
              handleChangePaso(paso.paso);
            }}
          >
            {paso.nombre}
          </button>
        ))}
      </div>
      <div className="bg-gray-100 mb-10">
        <div
          className="rounded-full bg-amber-500 text-xs leading-none h-2 text-center text-white"
          style={{ width: `${calcularProgreso()}` }}
        ></div>
      </div>
    </>
  );
};

export default Pasos;
