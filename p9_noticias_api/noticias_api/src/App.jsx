import {
  Container,
  Grid,
  Typography,
  AppBar,
  Toolbar,
  IconButton,
  Fab,
  Fade,
  Box,
} from "@mui/material";
import BrightnessHighSharpIcon from "@mui/icons-material/BrightnessHighSharp";
import BedtimeSharpIcon from "@mui/icons-material/BedtimeSharp";
import KeyboardArrowUpIcon from "@mui/icons-material/KeyboardArrowUp";
import { ThemeProvider } from "@mui/material/styles";
import CssBaseline from "@mui/material/CssBaseline";
import Formulario from "./components/Formulario";
import { NoticiasProvider } from "./context/NoticiasProvider";
import ListadoNoticias from "./components/ListadoNoticias";
import useThemeChange from "./hooks/useThemeChange";
import PropTypes from "prop-types";
import useScrollTrigger from "@mui/material/useScrollTrigger";

function ScrollTop(props) {
  const { children } = props;
  const trigger = useScrollTrigger({
    disableHysteresis: true,
    threshold: 100,
  });

  const handleClick = (event) => {
    const anchor = (event.target.ownerDocument || document).querySelector(
      "#back-to-top-anchor"
    );

    if (anchor) {
      anchor.scrollIntoView({
        block: "center",
      });
    }
  };

  return (
    <Fade in={trigger}>
      <Box
        onClick={handleClick}
        role="presentation"
        sx={{ position: "fixed", bottom: 16, right: 16 }}
      >
        {children}
      </Box>
    </Fade>
  );
}

ScrollTop.propTypes = {
  children: PropTypes.element.isRequired,
};

function App(props) {
  const { cambiarTema, theme, modo } = useThemeChange();
  return (
    <ThemeProvider theme={theme}>
      <CssBaseline>
        <NoticiasProvider>
          <AppBar position="static">
            <header>
              <Toolbar variant="dense">
                <Typography
                  variant="h5"
                  color="inherit"
                  componen="div"
                  sx={{
                    flexGrow: 1,
                  }}
                >
                  Buscador de noticias
                </Typography>
                <IconButton
                  edge="end"
                  color="inherit"
                  sx={{ mr: 2 }}
                  onClick={cambiarTema}
                >
                  {modo === "light" ? (
                    <BrightnessHighSharpIcon />
                  ) : (
                    <BedtimeSharpIcon />
                  )}
                </IconButton>
              </Toolbar>
            </header>
          </AppBar>
          <Toolbar id="back-to-top-anchor" />
          <Container sx={{ marginTop: 0 }}>
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
          <ScrollTop {...props}>
            <Fab size="small" aria-label="scroll back to top">
              <KeyboardArrowUpIcon />
            </Fab>
          </ScrollTop>
        </NoticiasProvider>
      </CssBaseline>
    </ThemeProvider>
  );
}

export default App;
