import React from "react";

import Layout from "../components/Layout";
import Image from "next/image";
import styles from "../styles/Nosotros.module.css";
const Nosotros = () => {
  return (
    <Layout pagina="Nosotros">
      <main className="contenedor">
        <h2 className="heading">Nosotros</h2>
        <div className={styles.contenido}>
          <Image
            layout="responsive"
            width={600}
            height={450}
            src="/img/nosotros.jpg"
            alt="Imagen sobre nosotros"
          ></Image>
          <div>
            <p>
              Nulla facilisis nulla nulla, id fringilla lectus sagittis vel. Sed
              porttitor, diam a malesuada molestie, nisi lorem scelerisque
              ipsum, sed malesuada arcu quam eu lorem. Mauris accumsan velit sed
              dui dignissim vestibulum. Nam porta lacus at vestibulum
              condimentum. Duis at sapien suscipit, elementum sem et, tempus
              leo. Etiam vestibulum, felis quis molestie rutrum, libero felis
              venenatis mi, vitae auctor libero urna id ex. Aenean quis dolor ut
              mi lobortis ullamcorper. In ultricies metus et felis laoreet, et
              consectetur lectus iaculis. Etiam condimentum elementum venenatis.
            </p>
            <p>
              Nulla facilisis nulla nulla, id fringilla lectus sagittis vel. Sed
              porttitor, diam a malesuada molestie, nisi lorem scelerisque
              ipsum, sed malesuada arcu quam eu lorem. Mauris accumsan velit sed
              dui dignissim vestibulum. Nam porta lacus at vestibulum
              condimentum. Duis at sapien suscipit, elementum sem et, tempus
              leo. Etiam vestibulum, felis quis molestie rutrum, libero felis
              venenatis mi, vitae auctor libero urna id ex. Aenean quis dolor ut
              mi lobortis ullamcorper. In ultricies metus et felis laoreet, et
              consectetur lectus iaculis. Etiam condimentum elementum venenatis.
            </p>
          </div>
        </div>
      </main>
    </Layout>
  );
};

export default Nosotros;
