import React from "react";
import Link from "next/link";
import styles from "../styles/Footer.module.css";
const Footer = () => {
  return (
    <footer className={styles.footer}>
      <div className={`contenedor ${styles.contenido} `}>
        <nav className={styles.navegacion}>
          <Link href="/" crossOrigin="anonymous">
            Inicio
          </Link>
          <Link href="/nosotros" crossOrigin="anonymous">
            Nosotros
          </Link>
          <Link href="/blog" crossOrigin="anonymous">
            Blog
          </Link>
          <Link href="/tienda" crossOrigin="anonymous">
            Tienda
          </Link>
        </nav>
        <p className={styles.copyright}>Todos los derechos reservados</p>
      </div>
    </footer>
  );
};

export default Footer;
