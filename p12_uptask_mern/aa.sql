select rut.sucursal ,
    rut.origen,
    (SELECT descripcion FROM POBLACIONES
    WHERE id=rut.origen FETCH FIRST 5 ROWS ONLY), as origen_descripcion
    rut.destino,
    (SELECT descripcion FROM POBLACIONES
    WHERE id=rut.destino FETCH FIRST 5 ROWS ONLY), as origen_descripcion
    rut.tipo_unidad ,
    rut.tipo_viaje ,
    rut.usuario_autorizado,
    gp.nombres || ' ' || gp.apellidos as nombre_usuario
    from rutas_aut_asignacion_manual rut
    join USUARIOS u on rut.usuario_autorizado=u.usuario
    join GENERALES_PERSONAL gp on u.rfc=gp.rfc;

select rut.sucursal ,
    rut.origen,
    org.descripcion as origen_descripcion,
    rut.destino,
    dest.descripcion as destino_descripcion,
    (SELECT descripcion FROM POBLACIONES
    WHERE id=rut.destino FETCH FIRST 5 ROWS ONLY), as origen_descripcion
    rut.tipo_unidad ,
    rut.tipo_viaje ,
    rut.usuario_autorizado,
    gp.nombres || ' ' || gp.apellidos as nombre_usuario
    from rutas_aut_asignacion_manual rut
    join USUARIOS u on rut.usuario_autorizado=u.usuario
    join GENERALES_PERSONAL gp on u.rfc=gp.rfc
    join (SELECT id,descripcion from POBLACIONES where id=rut.origen FETCH FIRST 1 ROWS ONLY) as org
    on org.id=rut.origen
    join (SELECT id,descripcion from POBLACIONES where id=rut.destino FETCH FIRST 1 ROWS ONLY) as dest
    on dest.id=rut.destino
    ;


    <select id="tipo_unidad" name="adata[tipo_unidad]" style="width:120px;">
			              <option value="TR" >TRACTO</option>
				            <option value="TO">TORTON</option>
			            </select>