import { useState } from "react";
import Header from "./components/Header";
import Formulario from "./components/Formulario";
import ListadoPacientes from "./components/ListadoPacientes";
function App() {
  const [pacientes, setPacientes] = useState([]);

  return (
    <div className="container mx-auto mt-20">
      <Header></Header>
      <div className="mt-12 md:flex">
        <Formulario
          pacientes={pacientes}
          setPacientes={setPacientes}
        ></Formulario>
        <ListadoPacientes></ListadoPacientes>
      </div>
    </div>
  );
}

export default App;
