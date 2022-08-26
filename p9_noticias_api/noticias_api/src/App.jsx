import {
  Container,
  Grid,
  Typography,
  AppBar,
  Toolbar,
  Button,
} from "@mui/material";
import { ThemeProvider } from "@mui/material/styles";
import CssBaseline from "@mui/material/CssBaseline";
import Formulario from "./components/Formulario";
import { NoticiasProvider } from "./context/NoticiasProvider";
import ListadoNoticias from "./components/ListadoNoticias";
import useThemeChange from "./hooks/useThemeChange";
function App() {
  const { cambiarTema, theme } = useThemeChange();
  return (
    <ThemeProvider theme={theme}>
      <CssBaseline>
        <NoticiasProvider>
          <AppBar position="static">
            <header>
              <Toolbar variant="dense">
                <Typography
                  variant="h6"
                  color="inherit"
                  componen="div"
                  align="center"
                  sx={{
                    flexGrow: 1,
                  }}
                >
                  Buscador de noticias
                </Typography>
                <Button
                  edge="end"
                  color="inherit"
                  aria-label="menu"
                  sx={{ mr: 2 }}
                  onClick={cambiarTema}
                >
                  Cambiar tema
                </Button>
              </Toolbar>
            </header>
          </AppBar>
          <Container sx={{ marginTop: 5 }}>
            <Grid
              container
              direction="row"
              justifyContent="center"
              alignItems="center"
            >
              <Grid item md={6} xs={12} lg={4}>
                <Formulario></Formulario>
              </Grid>
            </Grid>
            <ListadoNoticias></ListadoNoticias>
          </Container>
        </NoticiasProvider>
      </CssBaseline>
    </ThemeProvider>
  );
}

export default App;
