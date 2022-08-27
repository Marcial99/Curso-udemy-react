import { useState } from "react";
import AppLetras from "./components/AppLetras";
import { LetrasProvider } from "./context/LetrasProvider";
function App() {
  return (
    <LetrasProvider>
      <AppLetras></AppLetras>
    </LetrasProvider>
  );
}

export default App;
