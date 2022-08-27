import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App";
import { ThemeChangeProvider } from "./context/ThemeChangeProvider";
ReactDOM.createRoot(document.getElementById("root")).render(
  <React.StrictMode>
    <ThemeChangeProvider>
      <App />
    </ThemeChangeProvider>
  </React.StrictMode>
);
