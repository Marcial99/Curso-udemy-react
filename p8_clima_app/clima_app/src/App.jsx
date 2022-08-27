import { useState } from "react";
import AppClima from "./components/AppClima";
import { ClimaProvider } from "./context/ClimaProvider";
function App() {
  return (
    <ClimaProvider>
      <header>
        <h1>Buscador de clima</h1>
      </header>
      <AppClima></AppClima>
    </ClimaProvider>
  );
}

export default App;
