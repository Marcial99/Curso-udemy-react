import { useContext } from "react";
import ThemeChangeContext from "../context/ThemeChangeProvider";

const useThemeChange = () => {
  return useContext(ThemeChangeContext);
};

export default useThemeChange;
