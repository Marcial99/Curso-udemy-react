import React from "react";
import Link from "next/link";
import Image from "next/image";
import { formatearFecha } from "../helpers";
import styles from "../styles/Entrada.module.css";
const Entrada = ({ entrada }) => {
  const { titulo, resumen, imagen, published_at, id, url } = entrada;
  return (
    <article>
      <div className={styles.contenido}>
        <Image
          priority="true"
          src={imagen[0].url}
          alt={`Imagen blog ${titulo}`}
          width={800}
          height={600}
          layout="responsive"
        ></Image>
        <h3>{titulo}</h3>
        <p className={styles.fecha}>{formatearFecha(published_at)}</p>
        <p className={styles.resumen}>{resumen}</p>
        <Link href={`/blog/${url}`}>
          <a className={styles.enlace}>Leer entrada</a>
        </Link>
      </div>
    </article>
  );
};

export default Entrada;
