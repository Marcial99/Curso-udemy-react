import React from "react";
import Image from "next/image";
import Link from "next/link";
import styles from "../styles/Guitarra.module.css";
const Guitarra = ({ guitarra }) => {
  const { nombre, url, imagen, descripcion, precio } = guitarra;

  return (
    <div className={styles.guitarra}>
      <Image
        layout="responsive"
        width={250}
        height={500}
        src={imagen.url}
        alt={`Imagen Guitarra ${nombre}`}
        crossOrigin="anonymous"
      ></Image>
      <div className={styles.contenido}>
        <h3>{nombre}</h3>
        <p className={styles.descripcion}>{descripcion}</p>
        <p className={styles.precio}>${precio}</p>
        <Link href={`/guitarras/${url}`} crossOrigin="anonymous">
          <a className={styles.enlace}>Ver Producto</a>
        </Link>
      </div>
    </div>
  );
};

export default Guitarra;
