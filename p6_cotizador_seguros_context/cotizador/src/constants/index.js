export const MARCAS = [
  { id: 1, nombre: "Europeo" },
  { id: 2, nombre: "Americano" },
  { id: 3, nombre: "Asiatico" },
];

const YEARMAX = new Date().getFullYear() + 1;

export const YEARS = Array.from(
  new Array(20),
  (valor, index) => YEARMAX - index
);
