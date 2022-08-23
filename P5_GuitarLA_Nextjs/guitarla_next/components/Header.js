import React from "react";
import Image from "next/image";
import Link from "next/link";
import styles from "../styles/Header.module.css";
import { useRouter } from "next/router";
const Header = ({ guitarra }) => {
  const router = useRouter();

  return (
    <header className={styles.header}>
      <div className="contenedor">
        <div className={styles.barra}>
          <Link href="/" crossOrigin="anonymous">
            <a>
              <Image
                width={400}
                height={100}
                crossOrigin="/img/logo.svg"
                alt="Imagen logo"
              ></Image>
            </a>
          </Link>

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
            <Link href="/carrito" crossOrigin="anonymous">
              <a>
                <Image
                  layout="fixed"
                  width={30}
                  height={25}
                  crossOrigin="/img/carrito.png"
                  alt="imagen carrito"
                ></Image>
              </a>
            </Link>
          </nav>
        </div>

        {guitarra && (
          <div className={styles.modelo}>
            <h2>Modelo {guitarra.nombre}</h2>
            <p>{guitarra.descripcion}</p>
            <p className={styles.precio}>${guitarra.precio}</p>
            <Link href={`/guitarras/${guitarra.url}`} crossOrigin="anonymous">
              <a className={styles.enlace}>Ver producto</a>
            </Link>
          </div>
        )}
      </div>
      {router.pathname === "/" && (
        <div className={styles.guitarra}>
          <Image
            layout="fixed"
            width={500}
            height={1200}
            src="/img/header_guitarra.png"
            crossOrigin="anonymous"
            alt="Imagen header guitarra"
          ></Image>
        </div>
      )}
    </header>
  );
};

export default Header;
