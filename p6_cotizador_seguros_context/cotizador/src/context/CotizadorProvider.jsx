import { createContext } from "react";

const CotizadorContext = createContext();

const CotizadorProvider = ({ children }) => {
  const hola = "Hola mundo";
  const fnHolaMundo = () => {
    console.log("Hola desde funcion");
  };
  return (
    <CotizadorContext.Provider
      value={{
        hola,
        fnHolaMundo,
      }}
    >
      {children}
    </CotizadorContext.Provider>
  );
};

export { CotizadorProvider };
export default CotizadorContext;
