import { createTheme } from "@mui/material/styles";
import { createContext, useEffect, useState } from "react";

const ThemeChangeContext = createContext();

const ThemeChangeProvider = ({ children }) => {
  const [modo, setModo] = useState(localStorage.getItem("modo") ?? "dark");
  useEffect(() => {
    localStorage.getItem("modo") ?? localStorage.setItem("modo", "dark");
    setModo(localStorage.getItem("modo"));
  }, []);
  const theme = createTheme({
    palette: {
      mode: modo,
    },
  });
  const cambiarTema = async () => {
    modo === "dark" ? setModo("light") : setModo("dark");
    localStorage.setItem("modo", modo === "dark" ? "light" : "dark");
  };
  return (
    <ThemeChangeContext.Provider
      value={{
        cambiarTema,
        theme,
        modo,
      }}
    >
      {children}
    </ThemeChangeContext.Provider>
  );
};

export { ThemeChangeProvider };

export default ThemeChangeContext;
