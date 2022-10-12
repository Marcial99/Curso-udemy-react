<?php
/*------------------------------------------------------------------------------
* Archivo             : trpa425.php
* Sistema             : TF - Trafico 
* Titulo              : Rutas Autorizadas Asignacion Manual
* Tipo                : php
* Fecha Creacion      : 05/10/2022
* Version             : 1.0
* Realizado por       : Maria Guadalupe Garcia Hernandez
* Fecha Actualizacion : --/--/----
-----------------------------------------------------------------------------*/
ini_set ('display_errors','on');
date_default_timezone_set('America/Mexico_City');
class trpa425 extends GLOBAL{
  private function quickAccess($db){
    $Add='<td class="linkCont" ><a href="?F=trpa425&amp;_f=add" >Nuevo</a></td>';
    // $Error=$this->validaDerechos($db,'trpa425.php','I');
    if($Error["error"]==1){
      $Title= $Error["MSG"];
      $Add='<td class="linkCont" >----</td>';
    }
    $Ref='';
    // $Sql="select oficina from VARIABLES_SIA where indice = 'A'";
    // $Oficina = $db->GetOne($Sql);
    // if ($Oficina=='COO' or $Oficina=='MAT' ){
    //   $Ref='<td class="txtTitEncab"> | </td>'
    //     .'<td class="linkCont" ><a href="?F=trpa425&amp;_f=ref" >Refresh</a></td>';
    // }
    $Echo = '
      <table cellspacing="0" cellpadding="4" >
        <tr>
          <td class="linkCont" ><a href="?F=trpa425&amp;_f=see" >Lista</a></td>
          <td class="txtTitEncab"> | </td>
          '.$Add.'
          '.$Ref.'
        </tr>
      </table>';
    return $Echo;
  }
  
  public function see(){
    $db=$this->_db();
    $Content='
    <div style="position:relative;top:0px;">
    '.$this->quickAccess($db).'
    <p class="txtTitles" id="recarga">Rutas Autorizadas Asignacion Manual</p>
    <table id="trpa425_tbl_1" class="bordered" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
        <thead>
          </tr>
            <th class="cabeceraTablajq">Sucursal</th>
            <th class="cabeceraTablajq">Origen</th>
            <th class="cabeceraTablajq">Destino</th>
            <th class="cabeceraTablajq">Tipo Unidad</th>
            <th class="cabeceraTablajq">Tipo Viaje</th>
            <th class="cabeceraTablajq">Usuario Autorizado</th>
          </tr>    
          <tr>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_1" style="width:90%" type="text" value="" name="sucursal"></th>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_1" style="width:90%" type="text" value="" name="origen"></th>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_1" style="width:90%" type="text" value="" name="destino"></th>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_1" style="width:90%" type="text" value="" name="tipo_unidad"></th>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_1" style="width:90%" type="text" value="" name="tipo_viaje"></th>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_1" style="width:90%" type="text" value="" name="usuario_autorizado"></th>
          </tr>
          <tr>
            <th><p></p></th>
            <th><p></p></th>
            <th><p></p></th>
            <th><p></p></th>
            <th><p></p></th>
            <th><p></p></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    <br>
    <br>
    </div>
    <script type="text/javascript" src="js/trpa425_see.js?v=0.02"></script>'; 
    return $Content;
  }//see

  public function add(){
    $IdUsuario = $_SESSION['idUsuario'];
    $db = $this->_db();
    $db->debug = false;
    
    // $Error=$this->validaDerechos($db, 'trpa425.php', 'I');
    if($Error["error"] == 1){
      $echo='<script type="text/javascript">
          setTimeout("alert(\'MENSAJE:'.$Error["MSG"].' \');",100); 
          setTimeout("top.location.href = \'?F=trpa425&_f=see\'",1000);
        </script>';
      return $echo;
    }
    $Sql="Select vs.sucursal from VARIABLES_SIA vs JOIN SUCURSALES s on vs.sucursal=s.sucursal";
    $sucursal = $db->GetOne($Sql);
    $Sql="Select s.nombre from VARIABLES_SIA vs JOIN SUCURSALES s on vs.sucursal=s.sucursal";
    $sucursalNombre = $db->GetOne($Sql);
    
    $aData['SUCURSAL'] = $sucursal;
    $aData['ORIGEN'] = '';
    $aData['DESTINO'] = '';
    $aData['TIPO_UNIDAD'] = '';
    $aData['TIPO_VIAJE'] = '';
    $aData['USUARIO_AUTORIZADO'] = '';

    $aData['POBLACION'] = '';
    $aData['NOMBRE'] = '';
    $aData['ESTADO_PROVINCIA'] = '';

    $aData['NOMBREUSUARIO'] = '';
    $aData['USUARIO'] = '';
    
    $aData['SUCURSAL_NOMBRE'] = $sucursalNombre;
    
    $aData['update_tips_msg'] = 'Ingrese los datos en el formulario';
    $Accion = 'insert';
    $Title = 'Nueva Ruta Autorizada Asignacion Manual';
    $aData['Accion'] = 'I';
    $Echo = $this->formHtml($db, $aData, $Accion, $Title);
    return $Echo;
  }
  
  public function insert(){
    $aData = $_POST["adata"];
    $db = $this->_db();
    var_dump($aData);
    
    // $Error = $this->validaDerechos($db, 'trpa425.php', 'I');
    if($Error["error"] == 1){ 
      $Echo='<script type="text/javascript">
          setTimeout("alert(\'MENSAJE:'.$Error["MSG"].' \');",100); 
          setTimeout("top.location.href = \'?F=trpa425&_f=see\'",1000);
        </script>';
      return $Echo;
    }
    
    $db->BeginTrans();
    $db->debug = true;
    $Ok = true;
    
    // $aData['fecha_captura'] = date('d/m/Y');
    // $aData['hora_captura'] = date('His');
    // $aData['usuario_captura'] = $_SESSION['idUsuario'];
    
    // $aQuitaesto = array("'",'"','>',',',"\n","[\n\r]","[\n]",'-');
    
    // $NoEmpleadoCaptura = '';
    // $Sql = "select no_empleado "
    //   ."from GENERALES_PERSONAL gp "
    //   ."inner join USUARIOS us on gp.rfc = us.rfc "
    //   ."where us.usuario='{$aData['usuario_captura']}'";
    // $NoEmpleadoCaptura =  $db->GetOne($Sql);
    
    $Sucursal = '';
    $Sql = "BEGIN insert into RUTAS_AUT_ASIGNACION_MANUAL( sucursal,origen, destino, "
        ."tipo_unidad, tipo_viaje, usuario_autorizado "
        .") values ('{$aData['sucursal']}', '{$aData['origen']}', "
        ."'{$aData['destino']}', '{$aData['tipo_unidad']}', "
        ."'{$aData['tipo_viaje']}', '{$aData['usuario_autorizado']}' "
      .") RETURNING sucursal into :Sucursal; end;";
    $Stmt = $db->PrepareSP($Sql);
    $db->OutParameter($Stmt,$Sucursal,'Sucursal');
    $Ok = $db->Execute($Stmt);
    
    if ($Ok){
      $db->CommitTrans();
      $Echo = '<script type="text/javascript">
          setTimeout("alert(\'MENSAJE: EL REGISTRO HA SIDO INSERTADO\');",100); 
          setTimeout("top.location.href = \'?F=trpa425&_f=edit&id='.$Sucursal.'\'",1000);
        </script>';
    }else{ 
      $db->RollbackTrans();
      $ErrorL = $db->ErrorMsg();
      $ErrorL = str_replace($aQuitaesto,'',$ErrorL);
      $Echo='<script type="text/javascript">
          setTimeout("alert(\'ERROR LOCAL: '.trim($ErrorL).' \');",100); 
          setTimeout("top.location.href = \'?F=trpa425&_f=add\'",1000);
        </script>';
    }
    return $Echo;
  }
  
  public function edit(){
    $db = $this->_db();
    $db->debug = FALSE;
    $Sucursal = $_GET["sucursal"];
    $Origen = $_GET["origen"];
    $Destino = $_GET["destino"];
    $TipoUnidad = $_GET["tipo_unidad"];
    // var_dump($Sucursal);
    // var_dump($Origen);
    // var_dump($Destino);
    var_dump($TipoUnidad);
                      
    $Sql = "select rut.sucursal as sucursal,
        s.nombre as sucursal_nombre,
        rut.origen as origen,
        po.nombre as nombreori,
        rut.destino as destino,
        pd.nombre as nombredes,
        rut.tipo_unidad,
        rut.tipo_viaje,
        rut.usuario_autorizado,
        gp.nombres || ' ' || gp.apellidos nombreusuario
        from rutas_aut_asignacion_manual rut
        join SUCURSALES s on rut.sucursal=s.sucursal
        join POBLACIONES po on rut.origen=po.poblacion
        join POBLACIONES pd on rut.destino=pd.poblacion
        join USUARIOS u on rut.usuario_autorizado=u.usuario 
        join GENERALES_PERSONAL gp on u.rfc=gp.rfc
        where rut.sucursal = '$Sucursal' and rut.origen='$Origen' and rut.destino = '$Destino' and tipo_unidad='$TipoUnidad'";
    
    
    // "select ru.rubro, ru.descripcion as "
    //     ."rubro_desc  "
    //     ."from JU_RUBROS_PAGO_SINIESTRO ru "
    //     ."where ru.rubro = '$Id'";
    $aData = $db->GetRow($Sql);
    
    $Title = "Actualizar Rubro";
    $Accion = "update";
    $aData["Accion"] = "U";
    $aData["update_tips_msg"] = "Ingresa los datos requeridos";
    $Echo = $this->formHtml($db,$aData,$Accion,$Title);
    return $Echo;
  }

  public function update(){
    $aData = $_POST['adata'];
    $db = $this->_db();
    $db->debug = FALSE;
    $aQuitaesto = array("'",'"','>',',',"\n","[\n\r]","[\n]",'-');
    // $Error = $this->validaDerechos($db,'trpa425.php','I');
    if($Error["error"] == 1){
      $Echo='<script type="text/javascript">
          setTimeout("alert(\'MENSAJE:'.$Error["MSG"].' \');",100);
          setTimeout("top.location.href = \'?F=trpa425&_f=see\'",1000);
        </script>';
      return $Echo;
    }
    $db->BeginTrans();
    $Ok = false;
    $aData['fecha_captura'] = date('d/m/Y');
    $aData['hora_captura'] = date('His');
    $aData['usuario_captura'] = $_SESSION['idUsuario'];
    
    $NoEmpleadoCaptura = '';
    $Sql = "select no_empleado "
      ."from GENERALES_PERSONAL gp "
      ."inner join USUARIOS us on gp.rfc = us.rfc "
      ."where us.usuario='{$aData['usuario_captura']}'";
    $NoEmpleadoCaptura =  $db->GetOne($Sql);
    
    $Sql="update JU_RUBROS_PAGO_SINIESTRO set "
        ."descripcion = '".$aData['descripcion']."', "
        ."fecha_captura = to_date('".$aData['fecha_captura'].$aData['hora_captura']."','dd/mm/yyyyHH24MISS'), "
        ."usuario_captura = '".$aData['usuario_captura']."', "
        ."no_empleado_captura = '$NoEmpleadoCaptura' "
      ."where rubro = '".$aData['id']."' ";
    $db->Execute($Sql);
    
    if ($db->Affected_Rows() == 1){
      $Ok = true;
    }
    
    if ($Ok){
      $db->CommitTrans();
      $Echo = '<script type="text/javascript">
          setTimeout("alert(\'MENSAJE: EL REGISTRO HA SIDO ACTUALIZADO\');",100); 
          setTimeout("top.location.href = \'?F=trpa425&_f=edit&id='.$aData["id"].'\'",1000);
        </script>';
    }else{
      $db->RollbackTrans();
      $ErrorL = $db->ErrorMsg();
      $ErrorL = str_replace($aQuitaesto,'',$ErrorL);
      $Echo = '<script type="text/javascript">
          setTimeout("alert(\'ERROR LOCAL: '.trim($ErrorL). ' \');",100);
          setTimeout("top.location.href = \'?F=trpa425&_f=edit&id='.$aData["id"].'\'",1000);
        </script>';
    }
    return $Echo;
  }
  
  public function formHtml($db, $aData, $Accion, $Title){
    $aData["DISABLED_SUBMIT"] = '';
    // $Error = $this->validaDerechos($db, 'trpa425.php', $aData["Accion"]);
    if($Error["error"] == 1){ 
      $aData["DISABLED_SUBMIT"] = "disabled";
    }
    if($Accion == 'update'){
      $aData["DISABLED"] = 'disabled';
    }
    
    $Echo = '
      <div class="tabber">
      '. $this->quickAccess($db).'
      <p class="txtTitles">'.$Title.'</p>
      <form id="trpa425_form_1" class="form-horizontal" style="width:100%;"  name="trpa425_form_1" enctype="multipart/form-data" method="post" action="?F=trpa425&amp;_f='.$Accion.'">
        <input type="hidden" name ="adata[sucursal]" value="'.$aData["SUCURSAL"].'"/>
        <fieldset style="width:100%">
          <table style="border-collapse: separate; border-spacing:2px; width:800px; " cellspacing="" border="0">
            <tbody>
              <tr id="tabs">
                <td class="nor" id="tdtab1" >
                  <p><a href="#" rel="div.tab1" relu="tdtab1">Ruta Autorizada Asignacion Manual</a></p>
                </td>
              </tr>
            </tbody>
          </table>
          <table style="border-collapse: separate; border-spacing:; width:100%; " cellspacing="1px" border="0" >
            <tbody>
              <tr>
                <td colspan="4" style="paddingn-top:2px;">
                  <p class="validateTips" id="sitips" >'.$aData["update_tips_msg"].'</p>
                </td>
              </tr>  
            </tbody>
          </table>
          <div class="tab tab1">
            <table  style="border-collapse: separate; border-spacing:2px; width:100%; " cellspacing="" border="0">
              <tr>
                <td width="150px">
                  <label class="desc">Sucursal:</label>
                </td>
                <td>
                  <input '.$aData["DISABLED_SUBMIT"].'  name="adata[sucursal_nombre]" type="text" id="sucursal" value="'.$aData["SUCURSAL_NOMBRE"].'" readonly/>  
                </td>
              </tr>
              <tr>
                <td width="150px">
                  <label class="desc">Origen:</label>
                </td>
                <td>
                  <table>
                    <tr>
                      <td>
                        <input readonly '.$aData["DISABLED_SUBMIT"].'  name="adata[origen]" type="text" id="origen" class="clsnoempleado"  style="width:90px;" place-holder="click aquí" value="'.$aData["ORIGEN"].'" readonly/>  
                      </td>
                      <td>
                        <div id="no_origen_desc" ><p id="origen_desc">Nombre:</b>'.$aData["NOMBREORI"].'</div>
                      </td>
                    </tr>
                  </table>                  
                </td>
              </tr>
              <tr>
                <td width="150px">
                  <label class="desc">Destino:</label>
                </td>
                <td>
                  <table>
                    <tr>
                      <td>
                        <input readonly '.$aData["DISABLED_SUBMIT"].'  name="adata[destino]" type="text" id="destino" class="clsnoempleado"  style="width:90px;" place-holder="click aquí" value="'.$aData["DESTINO"].'" readonly/>  
                      </td>
                      <td>
                        <div id="no_destino_desc" ><p id="destino_desc">Nombre:</b>'.$aData["NOMBREDES"].'</div>
                      </td>
                    </tr>
                  </table>                  
                </td>
              </tr>
              <tr>	 
		            <td width="150px">
			            <label class="control-label desc">Tipo Unidad:</label>
		            </td>
		            <td>
			            <select id="tipo_unidad" name="adata[tipo_unidad]" style="width:120px;">
			              <option value="TR" '.($aData['TIPO_UNIDAD']==='TR'?'selected':'').' >TRACTO</option>
                    <option value="TO" '.($aData['TIPO_UNIDAD']==='TO'?'selected':'').' >TORTON</option>
			            </select>
		            </td>
		          </tr>
              <tr>	 
		            <td width="150px">
			            <label class="control-label desc">Tipo Viaje:</label>
		            </td>
		            <td>
			            <select id="tipo_viaje" name="adata[tipo_viaje]" style="width:120px;">
			              <option value="P">PAQUETER&IacuteA</option>
				            <option value="C">COMPLETO</option>
			            </select>
		            </td>
		          </tr>
              <tr>
                <td width="150px">
                  <label class="desc">Usuario Autorizado:</label>
                </td>
                <td>
                  <table>
                    <tr>
                      <td>
                        <input readonly '.$aData["DISABLED_SUBMIT"].'  name="adata[usuario_autorizado]" type="text" id="usuario_autorizado" class="clsnoempleado"  style="width:90px;" maxlength="8" place-holder="click aquí" value="'.$aData["USUARIO_AUTORIZADO"].'" readonly/>  
                      </td>
                      <td>
                        <div id="no_usuario_autorizado_desc" ><p id="usuario_autorizado_desc">Nombre:</b>'.$aData["NOMBREUSUARIO"].'</div>
                      </td>
                    </tr>
                  </table>                  
                </td>
              </tr>
            </table>
          </div>
          
          <div class="tab tab2">
            <p class="txtTitles2">CAPA OCULTA</p>
            <table style="border-collapse: separate; border-spacing:1px; width:100%; " cellspacing="" border="0" >
              <tbody>
                <tr>                                           
                  <td>                      
                  </td>
                </tr>
              </tbody>    
            </table>
          </div>
          <table width="100%">
            <tbody>              
              <tr>
                <td colspan="2" style="width:100%">
                <hr>
                </td>
            </tr>
            <tr> 
              <td colspan="" style="text-align: left; width:20%" >
                <span class="mark-required" >*</span> Campo Requerido
              </td>
              <td colspan="" style="text-align: right">
                <input  name="enviar" type="button" '.$aData["DISABLED_SUBMIT"].' id="send"  class=""   value="Guardar" />
                <input name="cancelar" type="button" id="btn_cancel" class="" onclick="location.href=\'?F=trpa425&_f=see\'" value="Cancelar" />
              </td>
            </tr>  
          </tbody>  
        </table>
      </fieldset2
      </form>
    </div>

    <div id="trpa425_dlgtbl_origen" title="Poblaciones">
      <table id="trpa425_tbl_origen" class="bordered" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px ;">
        <thead>
          </tr>
            <th class="cabeceraTablajq">Población</th>
            <th class="cabeceraTablajq">Nombre</th>
            <th class="cabeceraTablajq">Estado Provincia</th>
          </tr>    
          <tr>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_origen" style="width:90%" type="text" value="" name="poblacion"></th>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_origen" style="width:90%" type="text" id="descprov" value="" name="nombre"></th>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_origen" style="width:90%" type="text" value="" name="estado_provincia"></th>
          </tr>
          <tr>
            <th><p></p></th>
            <th><p></p></th>
            <th><p></p></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

    <div id="trpa425_dlgtbl_usuario" title="Usuarios Autorizados">
      <table id="trpa425_tbl_usuario" class="bordered" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px ;">
        <thead>
          </tr>
            <th class="cabeceraTablajq">Población</th>
            <th class="cabeceraTablajq">Nombre</th>
          </tr>    
          <tr>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_usuario" style="width:90%" type="text" value="" name="usuario"></th>
            <th class="cabeceraTablajq"><input class="thinputtrpa425tbl_usuario" style="width:90%" type="text" id="descprov" value="" name="nombre"></th>
          </tr>
          <tr>
            <th><p></p></th>
            <th><p></p></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    
    <script type="text/javascript" src="js/trpa425_formHtml.js?v=0.03"></script>';
    return $Echo;
  }
  
  public function ref(){
    $db = $this->_db();
    $Accion="sendAll";
    $Echo='
      <div class="tabber">
      '.$this->quickAccess($db).'
      <br>
      <p class="txtTitles">Refresh Rubros</p>
      <form id="form" class="form-horizontal cpre"  name="trpa425_form_1" enctype="multipart/form-data" method="post" action="?F=trpa425&amp;_f='.$Accion.'" >
        <fieldset style="width:100%">
          <table style="border-collapse: separate; border-spacing:2px; width:100%; " cellspacing="" border="0" >
            <tbody>
              <tr id="tabs">
                <td class="nor" id="tdtab1" >
                  <p><a href="#" rel="div.tab1" relu="tdtab1">Refresh</a></p>
                </td>
              </tr>
            </tbody>                
          </table>
          <table style="border-collapse: separate; border-spacing:; width:100%; " cellspacing="1px" border="0" >
            <tbody>
              <tr>
                <td colspan="5" style="paddingn-top:2px;">
                  <p class="validateTips" id="sitips" >'.$msg.'</p>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="tab tab1">
           <table style="border-collapse: separate; border-spacing:2px; width:100%; " cellspacing="" border="0" >
              <tbody>                   
                 <tr>
                   <td >
                     <label  class="control-label desc" for="input01">Sucursal: </label>                    
                   </td>
                   <td colspan="5">
                     '.$this->listSucursalesRef($db).'
                   </td>
                 </tr> 
              </tbody>
            </table>
          </div>

          <div class="tab tab2">
            <p class="txtTitles2">CAPA OCULTA</p>
            <table style="border-collapse: separate; border-spacing:1px; width:100%; " cellspacing="" border="0" >
              <tbody>
                <tr>                                           
                  <td>
                  </td>
                </tr>
              </tbody>    
            </table>
          </div>

          <table width="100%">
            <tbody>              
              <tr>                 
                <td colspan="2" style="width:100%">
                 <hr>
                </td>
              </tr>
              <tr> 
                <td colspan="" style="text-align: left; width:20%" >
                  <span class="mark-required" >*</span> Campo Requerido
                </td>

                <td colspan="" style="text-align: right" >                      
                  <input '.$Disabled.' name="enviar" type="button" id="btn_send"   value="Enviar" />
                  <input name="cancelar" type="button" id="btn_cancel" onclick="location.href=\'?F=trpa425&_f=see\'" value="Cancelar" />
                </td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        </form>
      </div>
      <div id="dialog-confirm" title="Alerta">
        <p></p>
      </div>

      <script type="text/javascript">
      $(document).ready(function(){
        $( "#fecha_adquisicion_inicio" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange:\'-30\',
          dateFormat:\'dd/mm/yy\'
        });
   
        $( "#fecha_adquisicion_fin" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange:\'-30:+1\',
          dateFormat:\'yy-mm-dd\'
        });

        $("#categoria").chosen({width: "100%"});
        $("#sucursal").chosen({width: "100%"});
        $("#estado").chosen({width: "100%"});
        $("#tipo_compra").chosen({width: "100%"});
  
        $( "#btn_send").button({
          icons: {
            primary: "ui-icon-locked"
          }
        });
  
        $( "#btn_cancel").button({
          icons: {
            primary: "ui-icon-locked"
          }
        });
   
        var alltabs = $("div.tab");  
        var tabs = $("#tabs");
        alltabs.first().show();
        alltabs.hide()
        tabs.find("p:first").addClass("on");
        tabs.find("td:first").addClass("yes");
        $("div.tab1").fadeIn(500);
        tabs.find("a").on("click", function() {
        alltabs.hide();
        tabs.find("p").removeClass("on")
        tabs.find("td").removeClass("yes")    
        var tabrelu = $(this).attr("relu")
        $("#"+tabrelu).toggleClass("yes")
        var tabref = $(this).attr("rel")
        $(this).parent().toggleClass("on")

        $(tabref).fadeIn(500)
          this.blur()
          return false;     
        });

        function updateTips( t ) {
        $("html").animate({scrollTop:0}, 10);
          tips
          .text( t )
          .addClass( "ui-state-highlight" );
          setTimeout(function() {      
            tips.removeClass( "ui-state-highlight", 1500 );     
          }, 500 );
        }

        function checkLength( o, n, min, max ,msg) {
          if ( o.val().length > max || o.val().length < min ) {    
            o.addClass( "ui-state-error" );
            updateTips( msg );
            o.focus();
            return false;

          } else {
            return true;
          }  
        }

        function checkLengthSelMul( o, n, min, max ,msg) {
          var multipleValues = o.val() || [];
          if ( multipleValues.length == 0 ) {
            o.addClass( "ui-state-error" );
            updateTips( msg );
            o.focus();
            return false;
          } else {
            return true;
          }
        }

        var Sucursal = $("#sucursal");
        
        allFields = $( [] ).add( Sucursal );
        tips = $( ".validateTips" );
        $( "#btn_send" ).click(function() {
          allFields.removeClass( "ui-state-error" );          
          var bValid = true;
          bValid = bValid && checkLengthSelMul( Sucursal, "sucursal",1, 6,"Seleccione la sucursal","tab1" );
          if ( bValid ) {     
            ok = confirm("¿Realmnete Está Seguro De Continuar?");       
            if (ok){       
              $( "#form" ).submit();
            }
          }     
        });

      })
      </script>';
    return $Echo;  
  }
  
  public function sendAll(){
    $db = $this->_db();
    $db->debug=TRUE;
    $Sql = "select oficina from VARIABLES_SIA vs where indice='A' ";
    $aVarSia = $db->GetRow($Sql);
    
    $Sql = "select rubro, descripcion,  "
        ."to_char(fecha_captura,'dd/mm/yyyyHH24MISS') fecha_captura, "
        ."usuario_captura, no_empleado_captura "
      ."from JU_RUBROS_PAGO_SINIESTRO ";
    $rsAct = $db->Execute($Sql);
    $aRow = array();
    $aResultado = array();
    while (!$rsAct->EOF){
      $aRow = array();
      $aActInMat[] = $rsAct->fields['RUBRO'];
      $aRow['RUBRO'] = $rsAct->fields['RUBRO'];
      $aRow['DESCRIPCION'] = $rsAct->fields['DESCRIPCION'];
      
      $aRow['FECHA_CAPTURA'] = $rsAct->fields['FECHA_CAPTURA'];
      $aRow['USUARIO_CAPTURA'] = $rsAct->fields['USUARIO_CAPTURA'];
      $aRow['NO_EMPLEADO_CAPTURA'] = $rsAct->fields['NO_EMPLEADO_CAPTURA'];
      $aData['aaData'][$rsAct->fields['RUBRO']] = $aRow;
      $rsAct->MoveNext();
    }
    
    $aSucursales = $_POST['sucursal'];
    if (in_array('@', $aSucursales)){
      $lSucursales = '';
    }else{
      $lSucursales = "and oficina in ('".implode("','",$aSucursales)."')";
    }
    
    //Bases de Datos para refresh 
    $Sql = "select oficina, sucursal, ip, base, decriptPass(clave) clave "
      ."from BASES where oficina not in('NET','MAT','INH','COO') $lSucursales ";
    $rsBd = $db->Execute($Sql);  
    while(!$rsBd->EOF){
      $aOutput = array();
      $aOutput['OFICINA'] = $rsBd->fields['OFICINA'];
      $aOutput['BASE'] = $rsBd->fields['BASE'].".tresguerras.com.mx";
      $aOutput['SUCURSAL'] = $rsBd->fields['SUCURSAL'];
      $aOutput['IP'] = $rsBd->fields['IP'];
      $aOutput['PASS'] = $rsBd->fields['CLAVE'];
      $aBD['aaDB'][] = $aOutput;
      $rsBd->MoveNext();
    }

    //Recorremos arreglo de bases 
    $Ok = false;
    $aSucSinConn = array();
  
    foreach ($aBD["aaDB"] as $key => $aValue){
      //Conecxion a la sucursal
      try{
        $Ok = $dbSuc = $this->_dbSUC($aValue['IP'], $aValue['OFICINA'], $aValue['BASE'], $aValue['PASS']);
        $dbSuc->debug = true;
      } catch (Exception $e) {
        $Error = $dbSuc->ErrorMsg();
        
        $Ok = false;
      }
      //Registros en sucursal
      if($Ok){
        $cE = '';
        $ErroresSuc = '';
        $Sql="select rubro from JU_RUBROS_PAGO_SINIESTRO ";
        $rsSuc = $dbSuc->Execute($Sql);
        $aActInSuc = array();      
        while (!$rsSuc->EOF){
          $aActInSuc[] = $rsSuc->fields['RUBRO'];
          $rsSuc->MoveNext();
        }
        $aResultado[$aValue['OFICINA']]['U'] = $cUpdt;

        //Update registros
        $cUpdt = 0;
        foreach ( $aActInSuc as $key=>$valor){
          $cU = 0;
          $aRs = $this->updateref($dbSuc, $aData["aaData"][$valor]);
          $cU = $aRs['Aaffected_Rows'];
          $cUpdt = $cUpdt+$cU;
          if ($aRs['error'] != ''){
            $cE .= '<br>'.$aRs['error'];
            $cErr = $cErr + 1;
          }
        }
        $aResultado[$aValue["OFICINA"]]["U"] = $cUpdt;
       
        //Registros Nuevos
        $aActNews=array();
        $cInsert=0;
        foreach ($aActInMat as $key=>$Valor){
          if(!in_array($Valor, $aActInSuc)){
            $cI = 0;
            //Insert Nuevos Activos
            $aRs = $this->insertref($dbSuc, $aData["aaData"][$Valor]);
            $cI = $aRs['Aaffected_Rows'];
            $cInsert = $cInsert + $cI;
            if ($aRs['error'] != ''){
              $cE .= '<br>'.$aRs['error'];
              $cErr = $cErr + 1;
            }
          }
        }
        unset($Valor);
        $aResultado[$aValue["OFICINA"]]["I"]=$cInsert;
        $aResultado[$aValue["OFICINA"]]["OFICINA"]=$aValue["OFICINA"];
        $aResultado[$aValue["OFICINA"]]["E"] = $cE;
        //print_r($aActNews);
        $cE=''; 

      } else {
        
        echo "SC= ".$aValue["OFICINA"];
        $aResultado[$aValue["OFICINA"]]["OFICINA"]=$aValue["OFICINA"];
        $aResultado[$aValue["OFICINA"]]["U"]=000;
        $aResultado[$aValue["OFICINA"]]["I"]=000;
      }

    }//foreach bases

    //print_r($aResultado);
    $TIns=0;
    $TUpd=0;
    foreach ($aResultado as $key=>$aValor){
      $tBody.='
        <tr>
          <td>'.$aValor["OFICINA"].'</td>
          <td>'.$aValor["I"].'</td>
          <td>'.$aValor["U"].'</td>
          <td>'.$aValor["D"].'</td>
          <td>'.$aValor["E"].'</td>
        </tr>';
      $TIns=$TIns+$aValor["I"];
      $TUpd=$TUpd+$aValor["U"];
      $TDel=$TDel+$aValor["D"];
      $TErr=$TErr+$aValor["E"];
    }
    $total=$TIns+$TUpd;
    $tResultado = $this->quickAccess($db).'
      <p class="txtTitles">Refresh Rubros </p>
      <table id="tbl_res" class="bordered" width="97%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing: 3px;">
        <thead>
          <th>Sucursal</th>
          <th>Insert</th>
          <th>Update</th>
          <th>Delete</th>
          <th width="1000px">Errors</th>
        </thead>
        <tbody>'.
          $tBody.'
        </tbody>
        <tfoot>
          <tr>
            <td>Global: '.$total.'</td>
            <td>'.$TIns.'</td>
            <td>'.$TUpd.'</td>
            <td>'.$TDel.'</td>
            <td>'.$TErr.'</td>
          </tr>
        </tfoot>
      </table>
      <!--<script>
        $(document).ready(function(){
          $("#tbl_res").dataTable({
            //"bJQueryUI": true,
            "bLengthChange": false,       
            "iDisplayLength": 100,
            "sPaginationType": "full_numbers",
          });
        }); 
      </script>-->';

    return $tResultado;

  }

  private function insertref($db,$aRow){
    $succes=false;
    $Insert="insert into JU_RUBROS_PAGO_SINIESTRO ( rubro, descripcion, "
        ."fecha_captura, usuario_captura, no_empleado_captura "
      .") values ('{$aRow['RUBRO']}', '{$aRow['DESCRIPCION']}',  "
        ."to_date('{$aRow['FECHA_CAPTURA']}','dd/mm/yyyyHH24MISS'), "
        ."'{$aRow['USUARIO_CAPTURA']}', '{$aRow['NO_EMPLEADO_CAPTURA']}'  "
      .")";
    $Success = $db->Execute($Insert);
    if(!$Success){
      $aRes['error'] = $db->ErrorMsg();
    }
    if ($db->Affected_Rows() > 0){
      $Success = true;
    }
    $aRes['Aaffected_Rows'] = $db->Affected_Rows();
    return $aRes;
  }

  private function updateref($db,$aRow){
    $Success = false;
    $Update="update JU_RUBROS_PAGO_SINIESTRO set ".
        "descripcion = '".str_replace("'","",$aRow['DESCRIPCION'])."', ".  
        "fecha_captura =  to_date('{$aRow['FECHA_CAPTURA']}','dd/mm/yyyyHH24MISS'), ".
        "usuario_captura = '".str_replace("'","",$aRow['USUARIO_CAPTURA'])."', ".
        "no_empleado_captura = '".str_replace("'","",$aRow['NO_EMPLEADO_CAPTURA'])."' ".
      "where rubro = '{$aRow['RUBRO']}'";
    $Success = $db->Execute( $Update );
    if(!$Success){
      $aRes['error'] = $db->ErrorMsg();
    } 
    if ($db->Affected_Rows() > 0){
      $Success = true;
    } 
    $aRes['Aaffected_Rows'] = $db->Affected_Rows();
    return $aRes;
  }

  private function listSucursalesRef($db){
    $Sql="select perfil from USUARIOS where usuario='{$_SESSION['idUsuario']}'";
    $Perfil = $db->GetOne($Sql);
    $Multiple='';
    //if ($Perfil == '034'){
    $Multiple='multiple';
    //}
    
    $Select = '<select name="sucursal[]" data-placeholder="Seleccione la sucursal" id="sucursal" style="width: 100%;" '.$Multiple.' >'
      .'<option value="@">TODAS</option>';
    
    $Sql="select su.sucursal, ba.Oficina, su.nombre
      from SUCURSALES su
      inner join BASES ba on su.sucursal = ba.sucursal
      where ba.oficina not in ('MAT','INH','NET') 
      order by su.nombre";
    $rs = $db->Execute($Sql);
    while (!$rs->EOF){ 
      $Select .= '<option  value="'.$rs->fields["OFICINA"].'" >'.$rs->fields["NOMBRE"].'</option>';
      $rs->MoveNext();
    }
    return $Select.'</select>';
  }
}//class trpa425
?>