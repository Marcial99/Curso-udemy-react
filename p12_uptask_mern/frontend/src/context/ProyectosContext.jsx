import { createContext, useState, useEffect } from "react";
import clienteAxios from "../config/clienteAxios";
import { Navigate, useNavigate } from "react-router-dom";
const ProyectosContext = createContext();

const ProyectosProvider = ({ children }) => {
  const [proyectos, useProyectos] = useState([]);
  const [alerta, setAlerta] = useState({});

  const navigate = useNavigate();

  const mostrarAlerta = (alerta) => {
    setAlerta(alerta);
    setTimeout(() => {
      setAlerta({});
    }, 5000);
  };

  const submitProyecto = async (proyecto) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) {
        return;
      }
      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const { data } = clienteAxios.post("/proyectos", proyecto, config);
      console.log(data);
      setAlerta({
        msg: "Proyecto creado correctamente",
        error: false,
      });
      setTimeout(() => {
        setAlerta({});
        navigate("/proyectos");
      }, 4000);
    } catch (error) {
      console.log(error);
    }
  };
  return (
    <ProyectosContext.Provider
      value={{
        proyectos,
        mostrarAlerta,
        alerta,
        submitProyecto,
      }}
    >
      {children}
    </ProyectosContext.Provider>
  );
};

export { ProyectosProvider };
export default ProyectosContext;