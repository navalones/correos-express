<?php if (current_user_can('manage_woocommerce')) : ?>
<?php 
$CEX=new Correosexpress();
$CEX->CEX_styles_datepicker();  


?>
<div id="CEX">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="row">
                    <div id="introjsFormRemitente" class="col-12 col-md-6 col-lg-6">
                        <div id="introjsCopiarRemitente" class="form-group CEX-background-bluelight2 p-2 rounded" title="<?php esc_html_e("Intercambiar los datos con los del destinatario", "cex_pluggin");?>">
                            <input type="checkbox" class="form-control" id="copia_remitente" value=""
                                onchange="pedirRemitente();">
                            <label for="copia_remitente" class="mb-1"><?php esc_html_e("Copiar datos remitente", "cex_pluggin");?></label>
                        </div>
                        <div id="introjsRemitente" class="form-group">
                            <label for="select_remitente"><?php esc_html_e("Remitentes", "cex_pluggin");?></label>
                            <select id="select_remitentes" name="select_remitentes" class="form-control"
                                onchange="pedirRemitente();">
                                <option disabled=""><?php esc_html_e("Seleccione un remitente", "cex_pluggin");?></option>
                            </select>
                        </div>
                        <div id="introjsValoresRemitente">
                        <div class="form-group">
                            <label for="nombre_remitente"><?php esc_html_e("Nombre remitente", "cex_pluggin");?></label>
                            <input id="nombre_remitente" class="form-control" name="nombre_remitente" maxlength="40"
                                type="text" placeholder="<?php esc_html_e("Nombre remitente", "cex_pluggin");?>">
                        </div>
                        <div class="form-group">
                            <label for="persona_contacto_rem"><?php esc_html_e("Persona contacto", "cex_pluggin");?></label>
                            <input id="persona_contacto_rem" class="form-control" name="persona_contacto_rem"
                                maxlength="80" type="text" placeholder="<?php esc_html_e("Persona contacto", "cex_pluggin");?>">
                        </div>                        
                        <div class="form-group">
                            <label for="direccion_recogida"><?php esc_html_e("Direcci&oacute;n recogida", "cex_pluggin");?></label>
                            <input id="direccion_recogida" class="form-control" name="direccion_recogida" maxlength="40"
                                type="text" placeholder="<?php esc_html_e("Direcci&oacute;n recogida", "cex_pluggin");?>">
                        </div>
                        <div class="form-group">
                            <label for="codigo_postal_rem"><?php esc_html_e("C&oacute;digo postal recogida", "cex_pluggin");?></label>
                            <input type="text" class="form-control" id="codigo_postal_rem" name="codigo_postal_rem"
                                placeholder="00000">
                        </div>
                        <div class="form-group">
                            <label for="poblacion"><?php esc_html_e("Poblaci&oacute;n recogida", "cex_pluggin");?></label>
                            <input id="poblacion" class="form-control" name="poblacion" maxlength="40" type="text"
                                placeholder="<?php esc_html_e("Poblaci&oacute;n", "cex_pluggin");?>">
                        </div>
                        <div class="form-group">
                            <label for="select_paisrte"><?php esc_html_e("Pa&iacute;s recogida", "cex_pluggin");?></label>
                            <select class="form-control" id="select_paisrte" name="select_paisrte">
                                <option disabled=""><?php esc_html_e("Seleccione un pa&iacute;s", "cex_pluggin");?></option>                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telefono"><?php esc_html_e("Tel&eacute;fono remitente", "cex_pluggin");?></label>
                            <input id="telefono" class="form-control" name="telefono" type="tel"
                                placeholder="<?php esc_html_e("612345789", "cex_pluggin");?>" maxlength="9">
                        </div>
                        <div class="form-group">
                            <label for="email_remitente"><?php esc_html_e("Email remitente", "cex_pluggin");?></label>
                            <input id="email_remitente" class="form-control" name="email_remitente" maxlength="40"
                                type="email" placeholder="email@email.com">
                        </div>
                        </div>
                        <div id="introjsObservacionesRemitente" class="form-group">
                            <label for="observaciones_recogida"><?php esc_html_e("Observaciones recogida", "cex_pluggin");?></label>
                            <textarea id="observaciones_recogida" class="form-control" maxlength="69"
                                name="observaciones_recogida" rows="5" type="text" wrap="soft"
                                placeholder="<?php esc_html_e("Observaciones recogida", "cex_pluggin");?>"></textarea>
                        </div>
                    </div>
                    <div id="introjsFormDestinatario" class="col-12 col-xs-12 col-md-6 col-lg-6">
                        <div id="introjsDevolucion" class="form-group CEX-background-bluelight2 p-2 rounded" title="<?php esc_html_e("Intercambiar los datos con los del remitente", "cex_pluggin");?>">
                            <input type="checkbox" class="form-control" id="es_devolucion" value=""
                                onclick="esUnaDevolucion();">
                            <label for="es_devolucion" class="mb-1"><?php esc_html_e("Es una devoluci&oacute;n", "cex_pluggin");?></label>
                        </div>
                        <div id="introjsValoresDestinatario">
                        <div class="form-group">
                            <label for="select_destinatarios"><?php esc_html_e("Direcci&oacute;n de destino", "cex_pluggin");?></label>
                            <select id="select_destinatarios" class="form-control" name="select_destinatarios"
                                onchange="pedirDestinatario();">
                                <option disabled=""><?php esc_html_e("Seleccione una direcci&oacute;n de destino", "cex_pluggin");?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre_destinatario"><?php esc_html_e("Nombre destinatario", "cex_pluggin");?></label>
                            <input id="nombre_destinatario" class="form-control" name="nombre_destinatario"
                                maxlength="40" type="text" placeholder="<?php esc_html_e("Nombre destinatario", "cex_pluggin");?>">
                        </div>
                        <div class="form-group">
                            <label for="persona_contacto_dest"><?php esc_html_e("Persona contacto", "cex_pluggin");?></label>
                            <input id="persona_contacto_dest" class="form-control" name="persona_contacto_dest"
                                maxlength="40" type="text" placeholder="<?php esc_html_e("Persona contacto", "cex_pluggin");?>">
                        </div>
                        <div class="form-group">
                            <label for="direccion"><?php esc_html_e("Direcci&oacute;n destino", "cex_pluggin");?></label>
                            <input id="direccion" class="form-control" name="direccion" maxlength="80" type="text"
                                placeholder="<?php esc_html_e("Direcci&oacute;n", "cex_pluggin");?>">
                        </div>
                        <div class="form-group">
                            <label for="codigo_postal_dest"><?php esc_html_e("C&oacute;digo postal destino", "cex_pluggin");?></label>
                            <input id="codigo_postal_dest" class="form-control" name="codigo_postal_dest" maxlength="9"
                                type="text" placeholder="<?php esc_html_e("C&oacute;digo postal", "cex_pluggin");?>">
                        </div>
                        <div class="form-group">
                            <label for="ciudad"><?php esc_html_e("Poblaci&oacute;n destino", "cex_pluggin");?></label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="<?php esc_html_e("Ciudad", "cex_pluggin");?>"
                                maxlength="40">
                        </div>
                        <div class="form-group">
                            <label for="select_paises"><?php esc_html_e("Pa&iacute;s destino", "cex_pluggin");?></label>
                            <select id="select_paises" class="form-control" name="select_paises">
                                <option disabled><?php esc_html_e("Seleccione un pa&iacute;s", "cex_pluggin");?></option>
                            </select>
                        </div>
                        <div class="form-group">                            
                            <label for="telefono_destinatario"><?php esc_html_e("Tel&eacute;fono destinatario", "cex_pluggin");?></label>
                            <input class="form-control" type="tel" id="telefono_destinatario" name="telefono_destinatario" placeholder="<?php esc_html_e("Tel&eacute;fono", "cex_pluggin");?>" maxlength="9">                            
                        </div>
                        <?php /*
                        <div class="row form-group">
                            <div class="col-6 col-xs-6">
                                <label for="telefono_fijo"><?php esc_html_e("Tel&eacute;fono fijo", "cex_pluggin");?></label>
                                <input class="form-control" type="tel" id="telefono_fijo" name="telefono_fijo"
                                    placeholder="<?php esc_html_e("Tfn. Fijo", "cex_pluggin");?>" maxlength="9">
                            </div>
                            <div class="col-6 col-xs-6">
                                <label for="telefono_movil"><?php esc_html_e("M&oacute;vil", "cex_pluggin");?></label>
                                <input class="form-control" type="tel" id="telefono_movil" name="telefono_movil"
                                    placeholder="<?php esc_html_e("Tfn. M&oacute;vil", "cex_pluggin");?>" maxlength="12">
                            </div>
                        </div>*/ ?>
                        <div class="form-group">
                            <label for="email_destinatario"><?php esc_html_e("Email destinatario", "cex_pluggin");?></label>
                            <input id="email_destinatario" class="form-control" maxlength="40" name="email_destinatario"
                                size="20" type="email" placeholder="<?php esc_html_e("email@email.com", "cex_pluggin");?>">
                        </div>
                        </div>
                        <div id="introjsObservacionesEntrega" class="form-group">
                            <label for="observaciones_entrega"><?php esc_html_e("Observaciones entrega", "cex_pluggin");?></label>
                            <textarea id="observaciones_entrega" class="form-control" maxlength="69"
                                name="observaciones_entrega" rows="5" type="text" wrap="soft"
                                placeholder="<?php esc_html_e("Observaciones entrega", "cex_pluggin");?>"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div id="introjsFormExtra" class="col-12 col-xs-12 col-md-4 col-lg-4">
                <div class="CEX-background-bluelight2 p-2 rounded mb-3">
                    <label class="mb-1"><?php esc_html_e("Datos del env&iacute;o", "cex_pluggin");?></label>
                </div>
                <div id="introjsCodCliente" class="form-group">
                    <label><?php esc_html_e("C&oacute;digo cliente de facturaci&oacute;n", "cex_pluggin");?></label>
                    <select id="select_codigos_cliente" class="form-control" name="select_codigos_cliente">
                    </select>
                </div>                
                <div id="introjsRefEnvio" class="form-group">
                    <label for="referencia_envio"><?php esc_html_e("Referencia de env&iacute;o", "cex_pluggin");?></label>
                    <input id="referencia_envio" class="form-control" name="referencia_envio" size="20" type="text"
                        placeholder="<?php esc_html_e("Referencia de env&iacute;o", "cex_pluggin");?>">
                </div>
                <div class="form-group">
                    <label for="descripcion1"><?php esc_html_e("Descripci&oacute;n referencia(1)", "cex_pluggin");?></label>
                    <input id="descripcion1" class="form-control" name="descripcion1" size="20" type="text"
                        placeholder="<?php esc_html_e("Descripci&oacute;n referencia(1)", "cex_pluggin");?>">
                </div>
                <div class="form-group">
                    <label for="descripcion2"><?php esc_html_e("Descripci&oacute;n referencia(2)", "cex_pluggin");?></label>
                    <input id="descripcion2" class="form-control" name="descripcion2" size="20" type="text"
                        placeholder="<?php esc_html_e("Descripci&oacute;n referencia(2)", "cex_pluggin");?>">
                </div>
                <div id="introjsFechaEntrega" class="form-group">
                    <label for="fecha_entrega"><?php esc_html_e("Fecha de grabaci&oacute;n", "cex_pluggin");?></label>
                    <div class="input-group date" id="fecha_entrega" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#fecha_entrega"/>
                        <div class="input-group-append" data-target="#fecha_entrega" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div id="introjsHHMM" class="row form-group">
                    <div class="col-6 col-xs-6">
                        <label for="desdeh"><?php esc_html_e("Recogida desde(h:m)", "cex_pluggin");?></label>
                    </div>
                    <div class="col-6 col-xs-6">
                        <label for="hastah"><?php esc_html_e("Recogida hasta(h:m)", "cex_pluggin");?></label>
                    </div>
                    <div class="col-6 col-xs-6 d-flex">
                        <input class="form-control d-inline-block mr-1 p-2" type="number" min="0" max="23" step="1"
                            value="00" id="desdeh" name="desdeh">
                        <span class="d-inline-block my-auto"><strong>:</strong></span>
                        <input class="form-control d-inline-block ml-1 p-2" type="number" min="0" max="59" step="1"
                            value="00" id="desdem" name="desdem">
                    </div>
                    <div class="col-6 col-xs-6 d-flex">
                        <input class="form-control d-inline-block mr-1 p-2" type="number" min="0" max="23" step="1"
                            value="00" id="hastah" name="desdeh">
                        <span class="d-inline-block my-auto"><strong>:</strong></span>
                        <input class="form-control d-inline-block ml-1 p-2" type="number" min="0" max="59" step="1"
                            value="00" id="hastam" name="desdem">
                    </div>
                </div>
                <div id="introjsBultosKilos" class="row form-group">
                    <div class="col-6 col-xs-6">
                        <label for="bultos"><?php esc_html_e("Bultos", "cex_pluggin");?></label>
                        <input class="form-control" type="number" id="bultos" name="bultos" min="0" max="9999" step="1" placeholder="<?php esc_html_e("N&uacute;mero de bultos por defecto", "cex_pluggin");?>">
                    </div>
                    <div class="col-6 col-xs-6">
                        <label id="unidadMedida" for="kilos"><?php esc_html_e("Peso por defecto", "cex_pluggin");?>                                
                                <span></span>
                        </label>
                        <input class="form-control" type="number" id="kilos" name="kilos" value="1"  min="0" max="9999" step="0.01" placeholder="<?php esc_html_e("KG", "cex_pluggin");?>">
                    </div>
                </div>
                <div id="introjsContrareembolso" class="form-group">
                    <input type="checkbox" id="contrareembolso" class="form-control" value=""
                        onchange="pedirPrecioPedido();">
                    <label for="contrareembolso"><?php esc_html_e("Contrareembolso", "cex_pluggin");?></label>
                    <div id="introjsValorContrareembolso">
                    <input id="valor_contrareembolso" class="form-control" name="valor_asegurado"
                        placeholder="<?php esc_html_e("Valor contrareembolso", "cex_pluggin");?>" size="20" type="text">
                    </div>
                </div>
                <div id="introjsValorAsegurado" class="form-group">
                    <label for="valor_asegurado"><?php esc_html_e("Valor asegurado", "cex_pluggin");?></label>
                    <input id="valor_asegurado" class="form-control" name="valor_asegurado" size="20" type="text">
                </div>
                <div id="introjsModalidadEnvio">
                <div class="form-group">
                    <label for="select_movilidad_envio"><?php esc_html_e("Modalidad de env&iacute;o", "cex_pluggin");?></label>
                    <select id="select_modalidad_envio" class="form-control" name="select_modalidad_envio"
                        onchange="mostrarCheck();">
                        <option disabled><?php esc_html_e("Seleccione una modalidad de env&iacute;o", "cex_pluggin");?></option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="entrega_sabado" class="form-control" value=""
                        onclick="comprobarMetodo()">
                    <label for="entrega_sabado"><?php esc_html_e("Entrega s&aacute;bado", "cex_pluggin");?></label>
                </div>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-8 col-lg-8">
                <div class="row CEX-background-bluelight2 py-3 rounded-2 m-0">
                <div id="introjsCaracteristicasEtiquetas" class="col-12">
                <div class="row">
                    <div id="introjsTipoEtiquetas" class="form-group col-6 col-xs-6">
                        <label for="select_etiqueta"><?php esc_html_e("Tipo de etiqueta", "cex_pluggin");?></label>
                        <select class="form-control" id="select_etiqueta" onchange="pintarSelectPosicion()">
                            <option disabled><?php esc_html_e("Seleccione el tipo de Etiqueta", "cex_pluggin");?></option>
                            <option value="1"><?php esc_html_e("Adhesiva", "cex_pluggin");?></option>
                            <option value="2"><?php esc_html_e("Medio folio", "cex_pluggin");?></option>
                            <option value="3"><?php esc_html_e("T&eacute;rmica", "cex_pluggin");?></option>
                        </select>
                    </div>
                    <div id="introjsPosicionEtiquetas" class="form-group col-6 col-xs-6">
                        <label for="posicion_etiqueta"><?php esc_html_e("Posici&oacute;n de etiqueta", "cex_pluggin");?></label>
                        <select class="form-control" id="posicion_etiqueta">
                            <option disabled><?php esc_html_e("Seleccione la posici&oacute;n de la Etiqueta", "cex_pluggin");?></option>
                        </select>
                    </div>
                    </div>
                    </div>
                    <div class="form-group col-12 col-xs-12">
                        <input type="checkbox" class="form-control mt-0" id="grabar_recogida" value="">
                        <label for="grabar_recogida" class="mb-0"><?php esc_html_e("Grabar Recogida", "cex_pluggin");?></label>
                    </div>
                    <div class="col-12 col-xs-12">
                        <button id="grabar_envio" class="CEX-btn CEX-button-success" name="grabar_envio"
                            onclick="validarDatos(event);"><?php esc_html_e("Grabar Env&iacute;o", "cex_pluggin");?></button>
                    </div>
                </div>
            </div>
            <div id="informacion_oficina" class="form-group alert alert-info col-12 col-sm-4 col-md-4 col-lg-4 mt-3 mt-sm-0 py-3 px-sm-1 mb-1 d-none">
                <div class="form-group d-flex mb-1">
                <input type="checkbox" class="form-control m-0" id="entrega_oficina" name="entrega_oficina" onchange="mostrarBoton();">
                <label for="entrega_oficina"><?php esc_html_e("Entrega en oficinas de correos", "cex_pluggin");?></label>
                </div>
                <p class="mb-1"><small><?php esc_html_e("*El servicio de entrega en oficinas no se puede realizar con importe de reembolso.", "cex_pluggin");?></small></p>
                <p class="mb-1"><strong><?php esc_html_e("C&oacute;digo de Oficina: ", "cex_pluggin");?></strong>
                    <span id="span_text_oficina" style="display:none;"></span>
                    <span id="span_codigo_oficina"></span></p>
                <p class="mb-0"><button name="buscador_oficina" id="buscador_oficina" class="CEX-btn CEX-button-blue d-none"
                        onclick="mostrarBuscador(event);"><?php esc_html_e("BUSCADOR OFICINAS", "cex_pluggin");?></button></p>                
            </div>
        </div>
        <div id="CEX-loading" class="cexmodal d-none"></div>
    </div>

    <div id="buscador_ofi" class="cexmodal d-none">
        <div id="buscador_ofiContent" class="cexmodal-content CEX-background-bluelight2 CEX-text-blue rounded">
            <span class="cexclose" onclick="cerrarModal();">&times;</span>
            <h3 class="mt-1 mb-4 CEX-text-blue"><?php esc_html_e("Buscador", "cex_pluggin");?></h3>
            <div class="row">            
                <div class="col-6 col-md-6 col-lg-6 form-group">
                    <label for="codigo_postal_ofi"><?php esc_html_e("C&oacute;digo Postal", "cex_pluggin");?></label>
                    <input type="number" class="form-control" name="codigo_postal_ofi" id="codigo_postal_ofi">
                </div>
                <div class="col-6 col-md-6 col-lg-6 form-group">
                    <label for="poblacion_ofi"><?php esc_html_e("Poblaci&oacute;n", "cex_pluggin");?></label>
                    <input type="text" class="form-control" name="poblacion_ofi" id="poblacion_ofi">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <button class="CEX-btn CEX-button-red" name="buscar_oficina" value=""
                        onclick="buscarOficina(event);">
                        <?php esc_html_e("Buscar oficinas", "cex_pluggin");?>
                    </button>
                </div>
            </div>

            <div id="contenedor_tab_oficinas" class="row mt-3 mx-1 d-none">
                <div id="tab_oficinas" class="col-12 col-md-12 col-lg-12 px-0 table-responsive">
                    <table id="tabla_oficinas" border="0" class="table table-striped m-0"></table>
                </div>
            </div>
        </div>
    </div>
    <div id="respuestaWS" class="container-fluid d-none"></div>

    <a id='etiqueta' download='etiqueta.pdf' href="" title='Download pdf document' class="d-none"> </a>
</div>

<?php
    $CEX->CEX_scripts();   
    $CEX->CEX_introJS('templateOrder');
    $CEX->CEX_scripts_datepicker();   

?>


<script type="text/javascript">
// Cabeceras de la orden 
    var introjsFormRemitente = "<?php esc_html_e("Secci&oacute;n de datos referente al remitente.", "cex_pluggin");?>";
    var introjsFormDestinatario = "<?php esc_html_e("Secci&oacute;n de datos referente al destinatario.", "cex_pluggin");?>";
    var introjsFormExtra = "<?php esc_html_e("Informaci&oacute;n extra sobre el pedido.", "cex_pluggin");?>";

    // Configuración de remitente
    var introjsRemitente = "<?php esc_html_e("Desplegable con el listado de remitentes de la tienda en curso. Siempre vendr&aacute; seleccionado nuestro “Remitente por defecto”, pudiendo cambiarlo cuando se desee.", "cex_pluggin");?>";
    var introjsCopiarRemitente = "<?php esc_html_e("Utilidad que nos permite rellenar autom&aacute;ticamente la secci&oacute;n remitente con los datos del remitente seleccionado en el apartado inferior.", "cex_pluggin");?>";
    var introjsValoresRemitente = "<?php esc_html_e("Resto de campos con informaci&oacute;n del remitente.", "cex_pluggin");?>";
    var introjsObservacionesRemitente = "<?php esc_html_e("Campo para indicar cualquier detalle de inter&eacute;s, sobre la recogida del pedido.", "cex_pluggin");?>";

    // Configuración Destinatario
    var introjsDevolucion = "<?php esc_html_e("Utilidad que nos permite copiar los datos del remitente al destinatario, en caso de que sea una devoluci&oacute;n.", "cex_pluggin");?>";
    var introjsValoresDestinatario = "<?php esc_html_e("Resto de campos con informaci&oacute;n del destinatario.", "cex_pluggin");?>";
    var introjsObservacionesEntrega = "<?php esc_html_e("Campo para indicar cualquier detalle de inter&eacute;s, sobre la entrega del pedido.", "cex_pluggin");?>";

    // Configuración Orden Extra
    var introjsCodCliente = "<?php esc_html_e("C&oacute;digo de cliente sobre el que se graba el env&iacute;o.", "cex_pluggin");?>";
    var introjsFechaEntrega = "<?php esc_html_e("Fecha marcada para la entrega del pedido.", "cex_pluggin");?>";
    var introjsHHMM = "<?php esc_html_e("Horario en el que se realizar&aacute; la recogida", "cex_pluggin");?>";
    var introjsRefEnvio = "<?php esc_html_e("C&oacute;digo de referencia del env&iacute;o.", "cex_pluggin");?>";
    var introjsPaisDestino = "<?php esc_html_e("Pa&iacute;s de destino del pedido, el CP del destinatario debe pertenecer al pa&iacute;s seleccionado.", "cex_pluggin");?>";
    var introjsContrareembolso = "<?php esc_html_e("Utilidad que nos permite cobrar un importe contrareembolso.", "cex_pluggin");?>";
    var introjsValorContrareembolso = "<?php esc_html_e("Valor a cobrar por el m&eacute;todo contrareembolso.", "cex_pluggin");?>";
    var introjsValorAsegurado = "<?php esc_html_e("Si el pedido est&aacute; asegurado, aqu&iacute; se introducir&aacute; el importe del mismo.", "cex_pluggin");?>";
    var introjsBultosKilos = "<?php esc_html_e("Campos para establecer el n&uacute;mero de bultos y los kilos del paquete respectivamente.", "cex_pluggin");?>";
    var introjsModalidadEnvio = "<?php esc_html_e("Seleccionable de los productos activos seleccionados en la configuraci&oacute;n por usted.", "cex_pluggin");?>";

    // Tipo y posicion etiqueta
    var introjsTipoEtiquetas = "<?php esc_html_e("Desplegable mediante el que seleccionaremos el tipo de etiqueta que queramos obtener.", "cex_pluggin");?>";
    var introjsPosicionEtiquetas = "<?php esc_html_e("Desplegable con las posiciones posibles para el tipo de etiqueta seleccionado.", "cex_pluggin");?>";

    // Grabaciones
    var grabar_recogida = "<?php esc_html_e("Solo seleccionar esta opci&oacute;n en caso de necesitar env&iacute;o con recogida.", "cex_pluggin");?>";
    var grabar_envio = "<?php esc_html_e("Bot&oacute;n mediante el que grabaremos el env&iacute;o y obtendremos la etiqueta.", "cex_pluggin");?>";

    // Tabla historico
    var tabla_historico = "<?php esc_html_e("Tabla en la que podremos consultar el hist&oacute;rico del pedido.", "cex_pluggin");?>";

</script>

<script type="text/javascript">

    
(jQuery)('#woocommerce-order-cex').hide();
(jQuery)('#woocommerce-order-cex-hide').hide();
(jQuery)('label[for="woocommerce-order-cex-hide"]').hide();

(jQuery)(document).ready(function($) {    

    inicializar();
    pintarSelectPosicion();
    (jQuery)('#ManualOrder').hide();    
    $("#buscador_ofi input").keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            buscarOficina(event);
        }
    });


    (jQuery)('#fecha_entrega').datetimepicker({
        locale: '<?php bloginfo('language'); ?>',
        defaultDate: moment(),
        format: convertirFormatoWP('<?php echo get_option("date_format") ?>'),
        weekStartDay:  '<?php echo get_option("start_of_week") ?>'
    });

});

function inicializar() {
    var body = (jQuery)("body");

    (jQuery).ajax({
        type: "POST",
        url: 'admin-ajax.php',
        data: {
            'action': 'cex_form_order_template',
            'id': getQueryVariable('post'),
            'nonce': (jQuery)('#cex-nonce').val(),
        },
        success: function(msg) {
            pintarRespuestaAjax(msg);
            mostrarCheck();
            if ((jQuery)('#select_modalidad_envio').val() == 44) {
                (jQuery)('#entrega_oficina').prop('checked', 'checked');
            }
            mostrarBoton();
            (jQuery)('#CEX-loading').addClass("d-none");

        },
        error: function(msg) {
            pintarRespuestaAjax(msg);
            (jQuery)('#CEX-loading').addClass("d-none");
        }
    });
    return false;
}

function abrirPostBox(){
    (jQuery)('#woocommerce-order-cex').removeClass('closed');    
    (jQuery)('#woocommerce-history-cex').removeClass('closed');    
}


function pintarRespuestaAjax(msg) {
    (jQuery)('#CEX-loading').removeClass("d-none");

    //console.log(msg);
    var retorno = JSON.parse(msg);

    if (retorno.selectCodCliente != 'undefined' && retorno.selectCodCliente != null)
        (jQuery)('#select_codigos_cliente').html(retorno.selectCodCliente);

    if (retorno.selectRemitentes != 'undefined' && retorno.selectRemitentes != null) {
        (jQuery)('#select_remitentes').html(retorno.selectRemitentes);
    }

    if (retorno.selectDestinatarios != 'undefined' && retorno.selectDestinatarios != null) {
        (jQuery)('#select_destinatarios').html(retorno.selectDestinatarios);
    }

    if (retorno.productos != 'undefined' && retorno.productos != null)
        (jQuery)('#select_modalidad_envio').html(retorno.productos);

    if (retorno.paises != 'undefined' && retorno.paises != null)
        (jQuery)('#select_paisrte').html((jQuery)('#select_paisrte').html() + retorno.paises);
        (jQuery)('#select_paises').html((jQuery)('#select_paises').html() + retorno.paises);

    if (retorno.mensaje != 'undefined' && retorno.mensaje != null)
        pintarNotificacion(retorno.mensaje);

    if (retorno.datosRemitente != 'undefined' && retorno.datosRemitente != null)
        pintarInformacionRemitente(retorno.datosRemitente);

    if (retorno.etiquetaDefecto != 'undefined' && retorno.etiquetaDefecto != null) {
        (jQuery)('#select_etiqueta').val(retorno.etiquetaDefecto);
        pintarSelectPosicion();
    }

    if (retorno.metodoEnvio != 'undefined' && retorno.metodoEnvio != null)
        (jQuery)('#select_modalidad_envio').val(retorno.metodoEnvio);

    if (retorno.referenciaOrder != 'undefined' && retorno.referenciaOrder != null)
        (jQuery)('#referencia_envio').val(retorno.referenciaOrder);

    if (retorno.datosEnvio != 'undefined' && retorno.datosEnvio != null){
        pintarInformacionEnvio(retorno.datosEnvio);
        (jQuery)('#telefono_destinatario').val(retorno.datosEnvio.phone);
    }
    //fijo_valido(retorno.datosEnvio);

    if (retorno.contrareembolso != 'undefined' && retorno.contrareembolso != null) {
        (jQuery)('#contrareembolso').prop('checked', 'checked');
        (jQuery)('#valor_contrareembolso').val(retorno.contrareembolso);
    }
    
    if (retorno.manual != 'undefined' &&
        retorno.manual != null &&
        retorno.manual != '' &&
        retorno.manual != 0) {
            (jQuery)('#advanced-sortables').prepend(retorno.manual);
    }
    
    if (retorno.esCEX == true) {
        (jQuery)('#ManualOrder').show();
        (jQuery)('#woocommerce-order-cex').show();
        (jQuery)('#woocommerce-order-cex-hide').show();
        (jQuery)('label[for="woocommerce-order-cex-hide"]').show();
        (jQuery)('#woocommerce-history-cex').show();
        (jQuery)('#woocommerce-history-cex-hide').show();
        (jQuery)('label[for="woocommerce-history-cex-hide"]').show();
        (jQuery)('#woocommerce-order-label-cex').show();
        (jQuery)('#woocommerce-order-label-cex-hide').show();
        (jQuery)('label[for="woocommerce-order-label-cex-hide"]').show();
    }else{
        (jQuery)('#ManualOrder').hide();
    }

    if (retorno.peso != 'undefined' &&
        retorno.peso != null &&
        retorno.peso != '' &&
        retorno.peso != 0) {
        (jQuery)('#kilos').val(retorno.peso);
    }

    if (retorno.unidadMedida != 'undefined' && retorno.unidadMedida != null) {
            (jQuery)('#unidadMedida span').html(" ("+retorno.unidadMedida+")");
        }
    return false;
}

function pintarInformacionRemitente(pago) {
    var str = pago.phone;
    if (str != "" && str != null) {
        var phone = str.replace('+', '00');
    } else {
        var phone = '';
    }
    (jQuery)('#nombre_remitente').val(pago.name);
    (jQuery)('#persona_contacto_rem').val(pago.contact);
    (jQuery)('#direccion_recogida').val(pago.address);
    (jQuery)('#codigo_postal_rem').val(pago.postcode);
    (jQuery)('#poblacion').val(pago.city);
    (jQuery)('#telefono').val(phone);
    (jQuery)('#email_remitente').val(pago.email);
    //Asignar rango horario
    (jQuery)('#desdeh').val(pago.from_hour);
    (jQuery)('#desdem').val(pago.from_minute);
    (jQuery)('#hastah').val(pago.to_hour);
    (jQuery)('#hastam').val(pago.to_minute);
    //valor del select de codigo cliente
    (jQuery)('#select_codigos_cliente').val(pago.id_cod_cliente);
    //valor del select de remitente
    (jQuery)('#select_remitentes').val(pago.id_sender);
    //bultos y kg por defecto
    (jQuery)('#bultos').val(pago.bultos_defecto);
    (jQuery)('#kilos').val(pago.kg_defecto);
    //cehck superior izq
    (jQuery)("#copia_remitente").prop('checked', true);
    //el numero de referencia es el id del post
    //(jQuery)('#referencia_envio').val(getQueryVariable('post'));
    //codigo del pais
    (jQuery)("#select_paisrte").val(pago.iso_code); 

}

function fijo_valido(envio) {
    var RegExPattern = /^(00[0-9]{2})?(8|9)[0-9]{8}$/;
    var telefono = envio.phone;
    var phone;
    if (telefono != "" && telefono != null) {
        phone = telefono.replace('+', '00');
        if (phone.match(RegExPattern) && (phone != '')) {
            (jQuery)('#telefono_fijo').val(phone);            
        } else {
            (jQuery)('#telefono_movil').val(phone);;
        }
    }
}

function pintarInformacionEnvio(envio) {
    //fijo_valido(envio);
    var oficina = envio.oficina;
    if (oficina != null && oficina != '') {
        var split_oficina = oficina.split("#!#");
        (jQuery)('#entrega_oficina').prop('checked', true);
        (jQuery)('#span_codigo_oficina').html(split_oficina[0]);
        (jQuery)('#span_text_oficina').html(oficina);
        mostrarCheck();
        mostrarBoton();
    }
    (jQuery)('#nombre_destinatario').val(envio.name);
    (jQuery)('#persona_contacto_dest').val(envio.contact);
    (jQuery)('#direccion').val(envio.address);
    (jQuery)('#codigo_postal_dest').val(envio.postcode);
    (jQuery)('#ciudad').val(envio.city);
    (jQuery)('#email_destinatario').val(envio.email);
    (jQuery)('#observaciones_entrega').val(envio.customer_message);
    (jQuery)('#select_paises').val(envio.country);
    (jQuery)('#telefono_destinatario').val(envio.phone);

}

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
    return false;
}

function pintarSelectPosicion() {
    var option = "";
    if ((jQuery)("#select_etiqueta").val() == '1') {
        (jQuery)("#introjsPosicionEtiquetas").removeClass('d-none');
        option += "<option value='1'>1</option>" +
            "<option value='2'>2</option>" +
            "<option value='3'>3</option>";
    } else if ((jQuery)("#select_etiqueta").val() == '2') {
        (jQuery)("#introjsPosicionEtiquetas").removeClass('d-none');
        option += "<option value='1'>1</option>" +
            "<option value='2'>2</option>";
    } else {
        (jQuery)("#introjsPosicionEtiquetas").addClass('d-none');
        option += "<option value='1' selected>1</option>";
    }
    (jQuery)("#posicion_etiqueta").html(option);
}

function generarEtiqueta() {
    (jQuery).ajax({
        type: "POST",
        url: 'admin-ajax.php',
        data: {
            'action': 'cex_generar_etiquetas',
            'numCollect': (jQuery)('#referencia_envio').val(),
            'tipoEtiqueta': (jQuery)('#select_etiqueta').val(),
            'posicion': (jQuery)('#posicion_etiqueta').val(),
            'nonce': (jQuery)('#cex-nonce').val(),
        },
        success: function(msg) {
            (jQuery)('#CEX-loading').addClass("d-none");
            var base64 = msg.substring(153);
            var date = new Date();
            var nombre = 'etiqueta' + date.getTime() + '.pdf';
            (jQuery)("#etiqueta").attr("download", nombre);
            (jQuery)("#etiqueta").attr("href", "data:application/pdf;base64," + base64);
            (jQuery)("#etiqueta")[0].click();
            sleep(5000);
            location.reload();
        },
        error: function(msg) {
            //console.log(msg);
            (jQuery)('#CEX-loading').addClass("d-none");
        }
    });
    return false;
}
function generarEtiquetaRest(etiqueta){
    var date = new Date();
    var nombre = 'etiqueta' + date.getTime() + '.pdf';
    (jQuery)("#etiqueta").attr("download", nombre);
    (jQuery)("#etiqueta").attr("href", "data:application/pdf;base64," + etiqueta);
    (jQuery)("#etiqueta")[0].click();
    sleep(5000);
    location.reload();
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function esUnaDevolucion() {
    if (!(jQuery)('#es_devolucion').prop('checked')) {
        //auxiliar < == destinatario
        var auxnombredestinatario = (jQuery)('#nombre_destinatario').val();
        var auxpersonacontactodest = (jQuery)('#persona_contacto_dest').val();
        var auxdireccion = (jQuery)('#direccion').val();
        var auxcodigopostaldest = (jQuery)('#codigo_postal_dest').val();
        var auxciudad = (jQuery)('#ciudad').val();
        //var auxtelefonofijo = (jQuery)('#telefono_fijo').val();
        var auxtelefonofijo = (jQuery)('#telefono_destinatario').val();
        var auxemaildestinatario = (jQuery)('#email_destinatario').val();
        var auxpaisdestinatario = (jQuery)('#select_paises option:selected').val();
        
        //destinatario   <=== remitente
        (jQuery)('#nombre_destinatario').val((jQuery)('#nombre_remitente').val());
        (jQuery)('#persona_contacto_dest').val((jQuery)('#persona_contacto_rem').val());
        (jQuery)('#direccion').val((jQuery)('#direccion_recogida').val());
        (jQuery)('#codigo_postal_dest').val((jQuery)('#codigo_postal_rem').val());
        (jQuery)('#ciudad').val((jQuery)('#poblacion').val());
        //(jQuery)('#telefono_fijo').val((jQuery)('#telefono').val());
        (jQuery)('#telefono_destinatario').val((jQuery)('#telefono').val());
        (jQuery)('#email_destinatario').val((jQuery)('#email_remitente').val());
        (jQuery)('#select_paises').val((jQuery)('#select_paisrte option:selected').val()).change();
        
               
        //(jQuery)('#telefono_movil').val();

        //remitente  <=== axiliar
        (jQuery)('#nombre_remitente').val(auxnombredestinatario);
        (jQuery)('#persona_contacto_rem').val(auxpersonacontactodest);
        (jQuery)('#direccion_recogida').val(auxdireccion);
        (jQuery)('#codigo_postal_rem').val(auxcodigopostaldest);
        (jQuery)('#poblacion').val(auxciudad);
        (jQuery)('#telefono').val(auxtelefonofijo);
        (jQuery)('#email_remitente').val(auxemaildestinatario);
        (jQuery)('#select_paisrte').val(auxpaisdestinatario).change();

        //si la ultima letra ye una d, la quitamos que la pusimos nosotros
        var referencia = (jQuery)('#referencia_envio').val();
        var ultimaLetra = referencia.slice(referencia.length - 1, referencia.length);
        if (ultimaLetra == 'd') {
            referencia = referencia.slice(0, referencia.length - 1);
            (jQuery)('#referencia_envio').val(referencia);
        }
        (jQuery)('#grabar_recogida').prop('checked',false);
    } else {
        //auxiliar    <=== remitente
        var auxnombreremitente = (jQuery)('#nombre_remitente').val();
        var auxpersonacontactorem = (jQuery)('#persona_contacto_rem').val();
        var auxdireccionrecogida = (jQuery)('#direccion_recogida').val();
        var auxcodigopostalrem = (jQuery)('#codigo_postal_rem').val();
        var auxpoblacion = (jQuery)('#poblacion').val();
        var auxtelefono = (jQuery)('#telefono').val();
        var auxemailremitente = (jQuery)('#email_remitente').val();
        var auxepaisremitente = (jQuery)('#select_paisrte option:selected').val();
        var auxpaisremitente = (jQuery)('#select_paisrte option:selected').val();       
       

        //remitente  <=== destinatario
        (jQuery)('#nombre_remitente').val((jQuery)('#nombre_destinatario').val());
        (jQuery)('#persona_contacto_rem').val((jQuery)('#persona_contacto_dest').val());
        (jQuery)('#direccion_recogida').val((jQuery)('#direccion').val());
        (jQuery)('#codigo_postal_rem').val((jQuery)('#codigo_postal_dest').val());
        (jQuery)('#poblacion').val((jQuery)('#ciudad').val());
        //(jQuery)('#telefono').val((jQuery)('#telefono_fijo').val());
        (jQuery)('#telefono').val((jQuery)('#telefono_destinatario').val());
        (jQuery)('#email_remitente').val((jQuery)('#email_destinatario').val());
        (jQuery)('#select_paisrte').val((jQuery)('#select_paises option:selected').val()).change();
        

        //destinatario   <=== auxiliar
        (jQuery)('#nombre_destinatario').val(auxnombreremitente);
        (jQuery)('#persona_contacto_dest').val(auxpersonacontactorem);
        (jQuery)('#direccion').val(auxdireccionrecogida);
        (jQuery)('#codigo_postal_dest').val(auxcodigopostalrem);
        (jQuery)('#ciudad').val(auxpoblacion);
        //(jQuery)('#telefono_fijo').val(auxtelefono);
        (jQuery)('#telefono_destinatario').val(auxtelefono);
        (jQuery)('#email_destinatario').val(auxemailremitente);
        (jQuery)('#select_paises').val(auxpaisremitente).change();               

        //si ye una devolucion, concatenamos la d a la referencia
        (jQuery)('#referencia_envio').val((jQuery)('#referencia_envio').val() + 'd');
        (jQuery)('#grabar_recogida').prop('checked',true);
    }
}

function pedirRemitente() {
    var id = (jQuery)('#select_remitentes').find(":selected").val();
    if ((jQuery)('#copia_remitente').prop('checked')) {
        (jQuery).ajax({
            type: "POST",
            url: 'admin-ajax.php',
            data: {
                'action': 'cex_retornar_remitente',
                'id': id,
                'nonce': (jQuery)('#cex-nonce').val(),
            },
            success: function(msg) {
                //console.log(msg);

                var remitente = JSON.parse(msg);

                (jQuery)('#nombre_remitente').val(remitente.name);
                (jQuery)('#persona_contacto_rem').val(remitente.contact);
                (jQuery)('#direccion_recogida').val(remitente.address);
                (jQuery)('#codigo_postal_rem').val(remitente.postcode);
                (jQuery)('#poblacion').val(remitente.city);
                (jQuery)('#telefono').val(remitente.phone);
                (jQuery)('#email_remitente').val(remitente.email);
                //cambiar el codigo de cliente
                (jQuery)('#select_codigos_cliente').val(remitente.id_cod_cliente);
                //cambiar el horario ¿?¿?¿?¿?¿? 
                //"from_hour":"10","from_minute":"0","to_hour":"12","to_minute":"0",
                (jQuery)('#desdeh').val(remitente.from_hour);
                (jQuery)('#desdem').val(remitente.from_minute);
                (jQuery)('#hastah').val(remitente.to_hour);
                (jQuery)('#hastam').val(remitente.to_minute);
                (jQuery)('#select_paisrte').val(remitente.iso_code_pais);

            },
            error: function(msg) {
                //console.log(msg);
            }
        });
    } else {
        /*    
            (jQuery)('#nombre_remitente').val('');
            (jQuery)('#persona_contacto_rem').val('');
            (jQuery)('#direccion_recogida').val('');
            (jQuery)('#codigo_postal_rem').val('');
            (jQuery)('#poblacion').val('');
            (jQuery)('#telefono').val('');
            (jQuery)('#email_remitente').val('');
            //cambiar el codigo de cliente
            //(jQuery)('#select_codigos_cliente').val();
            //cambiar el horario ¿?¿?¿?¿?¿? 
            //"from_hour":"10","from_minute":"0","to_hour":"12","to_minute":"0",
            (jQuery)('#desdeh').val('00');
            (jQuery)('#desdem').val('00');
            (jQuery)('#hastah').val('00');
            (jQuery)('#hastam').val('00');
            */
    }
}

function pedirDestinatario() {
    var tipo = (jQuery)('#select_destinatarios').find(":selected").val();
    (jQuery).ajax({
        type: "POST",
        url: 'admin-ajax.php',
        data: {
            'action': 'cex_retornar_destinatario',
            'tipo': tipo,
            'id': getQueryVariable('post'),
            'nonce': (jQuery)('#cex-nonce').val(),
        },
        success: function(msg) {
            //console.log(msg);
            var remitente = JSON.parse(msg);
            (jQuery)('#nombre_destinatario').val(remitente.name);
            (jQuery)('#persona_contacto_dest').val(remitente.contact);
            (jQuery)('#direccion').val(remitente.address);
            (jQuery)('#codigo_postal_dest').val(remitente.postcode);
            (jQuery)('#ciudad').val(remitente.city);
            //(jQuery)('#telefono_fijo').val(remitente.phone);
            (jQuery)('#telefono_destinatario').val(remitente.phone);
        },
        error: function(msg) {
            //console.log(msg);
        }
    });
}

function pedirPrecioPedido() {
    //si esta checkeado, hago la peticion, sino quito el valor
    if ((jQuery)('#contrareembolso').prop('checked')) {
        (jQuery).ajax({
            type: "POST",
            url: 'admin-ajax.php',
            data: {
                'action': 'cex_retornar_precio_pedido',
                'id': getQueryVariable('post'),
                'nonce': (jQuery)('#cex-nonce').val(),
            },
            success: function(msg) {
                (jQuery)('#valor_contrareembolso').val(msg);
            },
            error: function(msg) {
                //console.log(msg);
            }
        });

    } else {
        (jQuery)('#valor_contrareembolso').val('');
    }

}

function mostrarCheck() {
    if ((jQuery)('#select_modalidad_envio').val() == 44) {
        (jQuery)('#informacion_oficina').removeClass('d-none');
        if ((jQuery)('#span_codigo_oficina').text() == '') {
            (jQuery)('#grabar_envio').attr('disabled', 'disabled');
            (jQuery)('#grabar_envio').addClass('disabled');
        }
    } else if ((jQuery)('#select_modalidad_envio').val() != 44) {
        (jQuery)('#entrega_oficina').prop('checked', false);
        (jQuery)('#span_codigo_oficina').text('');
        (jQuery)('#buscador_oficina').addClass('d-none');
        (jQuery)('#informacion_oficina').addClass('d-none');
        (jQuery)('#grabar_envio').removeClass('d-none');
        (jQuery)('#grabar_envio').removeAttr('disabled');
        (jQuery)('#grabar_envio').removeClass('disabled');
    }
    //console.log('Activar');
}

function mostrarBoton() {
    if ((jQuery)('#entrega_oficina').prop('checked') && !(jQuery)('#contrareembolso').prop('checked')) {
        (jQuery)('#buscador_oficina').removeClass('d-none');
    }
    if ((jQuery)('#entrega_oficina').prop('checked') && (jQuery)('#contrareembolso').prop('checked')) {
        alert("No se puede utilizar el servicio entrega en oficina con la opcion de contrareembolso activada");
        (jQuery)("#entrega_oficina").prop('checked', false);

    }
    if (!(jQuery)('#entrega_oficina').prop('checked')) {
        (jQuery)('#buscador_oficina').addClass('d-none');
    }
}

/*
DEPRECADO
function desactivaCheck() {
    if (document.getElementById('entrega_sabado').checked && (jQuery)('#select_modalidad_envio').val() != 62) {
        (jQuery)("#entrega_sabado").prop('checked', false);
    }
    //console.log('desactivar');
}
*/


function comprobarMetodo() {
    var myStack = {
        "dir1": "down",
        "dir2": "right",
        "push": "top"
    };

    /* Entrega en sabado permitido para : 
        63 => PAQ 24 (EXCEPTO DESTINO PORTUGAL)
        93 => ePaq 24
        76 => Paquetería Óptica
        // Los 13 y 77 no existen en este nuestro modulo
        13 => antiguos paq14 (deprecated)
        77 => preetiquetadas 
    */
    var contenido = (jQuery)('#select_modalidad_envio').val();
    var iso_code = (jQuery)('#select_paises').val();

    if (document.getElementById('entrega_sabado').checked){
        switch(contenido){
            case '13':
            case '93':
            case '76':
            case '77':
            break;
            case '63':
                if(iso_code != "ES"){
                    var literal = '<?php esc_html_e("El producto CEX seleccionado no permite entrega los sábados.",'cex_pluggin');?>'
                    alert(literal);
                    (jQuery)("#entrega_sabado").prop("checked",false);
                }
            break;
            default:
                var literal = '<?php esc_html_e("El producto CEX seleccionado no permite entrega los sábados.", "cex_pluggin");?>'
                alert(literal);
                (jQuery)("#entrega_sabado").prop("checked",false);
            break;
        }
    }
}


function buscarOficina(event) {
    event.preventDefault();
    (jQuery)('#CEX-loading').removeClass("d-none");
    (jQuery).ajax({
        type: "POST",
        url: 'admin-ajax.php',
        data: {
            'action': 'procesar_curl_oficina_rest',
            'cod_postal': (jQuery)('#codigo_postal_ofi').val(),
            'poblacion': (jQuery)('#poblacion_ofi').val(),
            'nonce': (jQuery)('#cex-nonce-user').val()

        },
        success: function(msg) {
            //console.log(msg);
            pintarOficinasModal(msg);
            (jQuery)('#CEX-loading').addClass("d-none");
        },
        error: function(msg) {
            //console.log(msg);
            (jQuery)('#CEX-loading').addClass("d-none");
        }
    });
}

function pintarOficinasModal(msg) {
    var oficinas = JSON.parse(msg);
    var tabla = '';
    tabla += '<thead><tr>';
    tabla += '<th><?php esc_html_e("Cod Oficina", "cex_pluggin");?></th>';
    tabla += '<th><?php esc_html_e("CP", "cex_pluggin");?></th>';
    tabla += '<th><?php esc_html_e("Direcci&oacute;n", "cex_pluggin");?></th>';
    tabla += '<th><?php esc_html_e("Nombre", "cex_pluggin");?></th>';
    tabla += '<th><?php esc_html_e("Poblaci&oacute;n", "cex_pluggin");?></th>';
    tabla += '<th></th>';
    tabla += '</tr></thead>';
    tabla += '<tbody>';   
    for (i = 0; i < oficinas.length; i++) {
        var concatenado = "'" + oficinas[i].codigoOficina + "#!#" +
            oficinas[i].direccionOficina + "#!#" +
            oficinas[i].nombreOficina + "#!#" +
            oficinas[i].codigoPostalOficina + "#!#" +
            oficinas[i].poblacionOficina + "'";
        tabla += '<tr>';
        tabla += '<td>' + oficinas[i].codigoOficina + '</td>';
        tabla += '<td>' + oficinas[i].codigoPostalOficina + '</td>';
        tabla += '<td>' + oficinas[i].direccionOficina + '</td>';
        tabla += '<td>' + oficinas[i].nombreOficina + '</td>';
        tabla += '<td>' + oficinas[i].poblacionOficina + '</td>';
        tabla += '<td><button type="button" class="CEX-btn CEX-button-blue" onclick="setCodigoOficina(' + concatenado +
            ',event);"><?php esc_html_e("Seleccionar", "cex_pluggin");?></button>';
        tabla += '</tr>'
    }
    tabla += '</tbody>';
    //console.log(oficinas[0].codigoOficina);
    //console.log(JSON.parse(msg));
    (jQuery)('#tabla_oficinas').html(tabla);
    (jQuery)('#contenedor_tab_oficinas').removeClass("d-none");

}

function setCodigoOficina(concatenado, event) {
    event.preventDefault();
    var split = concatenado.split("#!#");
    var codigofi = split[0];
    (jQuery)('#span_codigo_oficina').html(codigofi);
    (jQuery)('#span_text_oficina').html(concatenado);   
    (jQuery)('#grabar_envio').removeAttr('disabled');
    (jQuery)('#grabar_envio').removeClass('disabled');
    (jQuery)('#grabar_envio').removeClass('d-none');     
    cerrarModal();
}
function validarDatos(event){
    event.preventDefault();         
    (jQuery)('#grabar_envio').attr('disabled', 'disabled');
    (jQuery)('#grabar_envio').addClass('disabled');                                              
    if(!(jQuery)('#respuestaWS').hasClass('d-none')){
        (jQuery)('#respuestaWS').addClass('d-none');
        (jQuery)('#respuestaWS').html();
    }
    validarDestinoEnvio();       
}

function validarDestinoEnvio(){        
        var postcode_receiver       = (jQuery)('#codigo_postal_dest').val();
        var postcode_rem            = (jQuery)('#codigo_postal_rem').val();
        var contenidoText           = (jQuery)('#select_modalidad_envio').text();
        var contenidoVal            = (jQuery)('#select_modalidad_envio').val();
        var iso_code                = (jQuery)('#select_paises').val();

        //var iso_code                = (jQuery)('#select_paises option:selected').val();   
        var modificacionAutomatica  = 0;

        if(postcode_receiver.search('-') !== -1){
            // ELIMINAMOS DEL CODIGO POSTAL PORTUGUES LOS ULTIMOS TRES DIGITOS
            var split = postcode_receiver.split("-");
            (jQuery)('#codigo_postal_dest').val(split[0]);
        }
        if(postcode_rem.search('-') !== -1){
            // ELIMINAMOS DEL CODIGO POSTAL PORTUGUES LOS ULTIMOS TRES DIGITOS
            var split = postcode_rem.split("-");
            (jQuery)('#codigo_postal_rem').val(split[0]);
        }

        var myStack = {"dir1":"down", "dir2":"right", "push":"top"};

        if (iso_code.localeCompare("PT") == 0){
            (jQuery).ajax({
                type: "POST",
                url: 'admin-ajax.php', 
                data:
                {
                    'action'                    : 'cex_obtener_Productos_Cex',
                    'id_customer_code'          : (jQuery)('#select_codigos_cliente').val(),
                    'nonce'                     : (jQuery)('#cex-nonce').val(),
                },
                success: function(msg){               
                    if(postcode_receiver.search('-') !== -1 || 
                      (jQuery)('#select_paises').val().localeCompare('ES') != 0){
                        // COMPROBAMOS Y OCULTAMOS EN CASO NECESARIO => ENTREGA EN OFICINA Y SUS DATOS
                        (jQuery)('#entrega_oficina').prop("checked", false);
                    }                        
                    grabarEnvio(modificacionAutomatica);                                                     
                },
                error: function(msg){                     
                    return false;
                }
            });

        } else {
            grabarEnvio(modificacionAutomatica);                
            //return false;
        }
            

    }

function formatFecha(fecha){
    let formatoBbdd = '<?php echo get_option("date_format"); ?>';
    let fecha1Formateada = moment(fecha,formatoBbdd).format('YYYY-MM-DD');
    return fecha1Formateada;
}


function grabarEnvio(modificacionAutomatica = 0) {    

    (jQuery)('#referencia_envio').removeClass('is-invalid');

    if ((jQuery)('#select_modalidad_envio').val() == 44 && (jQuery)('#telefono_movil').val() == '') {        
        (jQuery)('#respuestaWS').html(
            "<span class='alert alert-danger mt-3 rounded-2 d-block'><?php esc_html_e("PARA LA ENTREGA EN OFICINA ES NECESARIO INTRODUCIR EL TEL&Eacute;FONO M&Oacute;VIL", "cex_pluggin");?></span>"
        );
        (jQuery)('#respuestaWS').removeClass('d-none');
    } else if ((jQuery)('#bultos').val() == 0 || (jQuery)('#bultos').val() == null || (jQuery)('#bultos').val() == '') {        
        (jQuery)('#respuestaWS').html(
            "<span class='alert alert-danger mt-3 rounded-2 d-block'><?php esc_html_e("N&uacute;MERO DE BULTOS NO PERMITIDO", "cex_pluggin");?></span>"
        );
        (jQuery)('#respuestaWS').removeClass('d-none');
    }else if ((jQuery)('#referencia_envio').val() == ''){
                (jQuery)('#respuestaWS').html("<span class='alert alert-danger mt-3 rounded-2 d-block'><?php esc_html_e("DEBE INTRODUCIR UNA REFERENCIA", "cex_pluggin");?></span>");
                (jQuery)('#respuestaWS').removeClass('d-none');
                (jQuery)('#referencia_envio').addClass('is-invalid');
                (jQuery)('#grabar_envio').removeAttr('disabled');
                (jQuery)('#grabar_envio').removeClass('disabled');
    } else {
 

        var telefono_destinatario = '';
        var telefono_destinatario2 = '';
        if ((jQuery)('#telefono_destinatario').val() !== '' && (jQuery)('#telefono_destinatario').val() !== null) {
            telefono_destinatario = (jQuery)('#telefono_destinatario').val();
        }
        if ((jQuery)('#desdeh').val() < 10) {
            var desdeh = '0' + parseInt((jQuery)('#desdeh').val());
        } else {
            var desdeh = parseInt((jQuery)('#desdeh').val());
        }
        if ((jQuery)('#desdem').val() < 10) {
            var desdem = '0' + parseInt((jQuery)('#desdem').val());
        } else {
            var desdem = parseInt((jQuery)('#desdem').val());
        }
            
        if ((jQuery)('#hastah').val() < 10) {
            var hastah = '0' + parseInt((jQuery)('#hastah').val());
        } else {
            var hastah = parseInt((jQuery)('#hastah').val());
        }
        if ((jQuery)('#hastam').val() < 10) {
            var hastam = '0' + parseInt((jQuery)('#hastam').val());
        } else {
            var hastam = parseInt((jQuery)('#hastam').val());
        }
        if (document.getElementById('contrareembolso').checked) {
            var contrareembolso = (jQuery)('#valor_contrareembolso').val();
        } else {
            var contrareembolso = 0;
        }
      
        var myStack = {
            "dir1": "down",
            "dir2": "right",
            "push": "top"
        };

        PNotify.prototype.options.styling = "bootstrap3";
        new PNotify({
            title: '<?php esc_html_e("Confirma la operaci&oacute;n", "cex_pluggin");?>',
            text: '<?php esc_html_e("¿Guardar datos de pedido?", "cex_pluggin");?>',
            icon: 'fas fa-question-circle',
            hide: false,
            stack: myStack,
            confirm: {
                confirm: true
            },
            buttons: {
                closer: false,
                sticker: false
            }
        }).get().on('pnotify.confirm', function() {
            (jQuery)('#CEX-loading').removeClass("d-none");

            let fechaEntrega = formatFecha((jQuery)('#fecha_entrega').datetimepicker('viewDate'));

            (jQuery).ajax({
                type: "POST",
                url: 'admin-ajax.php',
                data: {
                    'action': 'cex_form_pedido',
                    'id': getQueryVariable('post'),
                    //primera columna
                    'loadSender': (jQuery)('#select_remitentes').val(),
                    'name_sender': (jQuery)('#nombre_remitente').val(),
                    'contact_sender': (jQuery)('#persona_contacto_rem').val(),
                    'address_sender': (jQuery)('#direccion_recogida').val(),
                    'postcode_sender': (jQuery)('#codigo_postal_rem').val(),
                    'city_sender': (jQuery)('#poblacion').val(),
                    'country_sender': (jQuery)('#select_paisrte :selected').text(),
                    'iso_code_remitente': (jQuery)('#select_paisrte').val(),
                    'phone_sender': (jQuery)('#telefono').val(),
                    'email_sender': (jQuery)('#email_remitente').val(),
                    //'enviarEtiquetaMail'        :(jQuery)('#enviar_etiqueta').prop('checked'),
                    'grabar_recogida': (jQuery)('#grabar_recogida').prop('checked'),
                    'note_collect': (jQuery)('#observaciones_recogida').val(),
                    //segunda columna
                    'loadReceiver': (jQuery)('#es_devolucion').prop('checked'),
                    'name_receiver': (jQuery)('#nombre_destinatario').val(),
                    'contact_receiver': (jQuery)('#persona_contacto_dest').val(),
                    'address_receiver': (jQuery)('#direccion').val(),
                    'postcode_receiver': (jQuery)('#codigo_postal_dest').val(),
                    'city_receiver': (jQuery)('#ciudad').val(),
                    'phone_receiver1': telefono_destinatario,
                    //movil , en caso de que no haya, el que haya
                    'phone_receiver2': telefono_destinatario2, //fijo
                    'email_receiver': (jQuery)('#email_destinatario').val(),
                    'country_receiver': (jQuery)('#select_paises :selected').text(),
                    'note_deliver': (jQuery)('#observaciones_entrega').val(),
                    //tercera columna
                    'id_codigo_cliente': (jQuery)('#select_codigos_cliente').val(),
                    'codigo_cliente': (jQuery)('#select_codigos_cliente :selected').text(),
                    'codigo_solicitante': 'W' + (jQuery)('#select_codigos_cliente :selected').text(),
                    'datepicker': fechaEntrega,
                    //'datepicker': (jQuery)('#fecha_entrega').val().replace('/','-'),
                    'fromHH_sender': desdeh,
                    'fromMM_sender': desdem,
                    'toHH_sender': hastah,
                    'toMM_sender': hastam,
                    'ref_ship': (jQuery)('#referencia_envio').val(),
                    'desc_ref_1': (jQuery)('#descripcion1').val(),
                    'desc_ref_2': (jQuery)('#descripcion2').val(),
                    'selCarrier': (jQuery)('#select_modalidad_envio').val(),
                    'nombre_modalidad': (jQuery)('#select_modalidad_envio :selected').text(),
                    'deliver_sat': (jQuery)('#entrega_sabado').prop('checked'),
                    'iso_code': (jQuery)('#select_paises').val(),
                    'entrega_oficina': (jQuery)('#entrega_oficina').prop('checked'),
                    'codigo_oficina': (jQuery)('#span_codigo_oficina').text(),
                    'text_oficina': (jQuery)('#span_text_oficina').text(),
                    'payback_val': contrareembolso,
                    'insured_value': (jQuery)('#valor_asegurado').val(),
                    'bultos': (jQuery)('#bultos').val(),
                    'kilos': (jQuery)('#kilos').val(),                    
                    'contrareembolso': (jQuery)('#contrareembolso').prop('checked'),
                    'modificacionAutomatica'    :modificacionAutomatica,
                    'nonce': (jQuery)('#cex-nonce').val(),
                    'tipoEtiqueta':(jQuery)('#select_etiqueta :selected').val(),
                    'posicionEtiqueta': (jQuery)('#posicion_etiqueta :selected').val(),
                    'idioma'   : "<?php echo get_user_locale(get_current_user_id()) ?>",
                },
                success: function(msg) { 
                    (jQuery)('#CEX-loading').addClass("d-none");
                    pintarNotificacion(msg);                    
                    (jQuery)('#grabar_envio').removeAttr('disabled');
                    (jQuery)('#grabar_envio').removeClass('disabled'); 
                    //location.href = '#grabar_envio';
                },
                error: function(msg) {
                    // console.log(msg);
                    (jQuery)('#CEX-loading').addClass("d-none");
                    (jQuery)('#grabar_envio').removeAttr('disabled');
                    (jQuery)('#grabar_envio').removeClass('disabled'); 
                    location.href = '#grabar_envio';
                }
            });
        }).on('pnotify.cancel', function() {
            // alert('ok. Chicken, chicken, clocloclo.');
            (jQuery)('#grabar_envio').removeAttr('disabled');
            (jQuery)('#grabar_envio').removeClass('disabled'); 
        });
    }
    return false;
}

function pintarNotificacion(msg){
    if(msg.envio){
            pintarNotificacionSoap(msg);
        }else{
            pintarNotificacionRest(msg);
        }  
}

function pintarNotificacionRest(msg){    
    var msg = JSON.parse(msg);    
        var recogida = '';
        var literal_recogida = "<?php esc_html_e("La petici&oacute;n de recogida se ha cursado con &eacute;xito:", "cex_pluggin");?>";
        var envio = '';
        var literal_envio = "<?php esc_html_e("La petici&oacute;n de envio se ha cursado con &eacute;xito:", "cex_pluggin");?>";
                

        if(msg.resultado == 0){
            envio += "<span class='alert alert-danger mt-3 rounded-2 d-block'>"+msg.mensajeRetorno+"</span>";
        }else{
            if(msg.codigoRetorno == 0 && msg.mensajeRetorno != ""){
                envio += "<span class='alert alert-warning mt-3 rounded-2 d-block'>"+msg.mensajeRetorno+"</span>";
            }
            if( msg.mensajeRetorno == "" || msg.mensajeRetorno == null){
                envio += "<span class='alert alert-success mt-3 rounded-2 d-block'>"+literal_envio+msg.numShip+"</span>";
                recogida += "<span class='alert alert-success mt-3 rounded-2 d-block'>"+literal_recogida+msg.numRecogida+"</span>";
                if(msg.etiqueta){
                    generarEtiquetaRest(msg.etiqueta);
                }else{
                    generarEtiqueta(event);
                }
            }else{
                envio += "<span class='alert alert-danger mt-3 rounded-2 d-block'>"+msg.mensajeRetorno+"</span>";
            }
        } 
        (jQuery)('#respuestaWS').html(recogida + envio);
        (jQuery)('#respuestaWS').removeClass('d-none');
       //inicio();
    }

function pintarNotificacionSoap(msg) {  
    var aux = JSON.parse(msg); 
    var recogida = '';
    //recogida
    if (aux.recogida != null) {
        if (typeof aux.recogida !== 'undefined') {
            if (aux.recogida.resultado == 1) {
                    recogida +=
                        "<span class='alert alert-success mt-3 rounded-2 d-block'><?php esc_html_e("La petici&oacute;n de recogida se ha cursado con &eacute;xito:", "cex_pluggin");?> " +
                        aux.recogida.numRecogida + "</span>";
            } else {
                recogida += "<span class='alert alert-danger mt-3 rounded-2 d-block'>" + aux
                    .recogida.mensError + "</span>";
            }
        }
    }

    var envio = '';
    //ENVIO
    //que tenga respuesta.
    if (aux.envio != null) {
        if (typeof aux.envio !== 'undefined') {
            if (aux.envio.resultado == 1) {
                if (aux.envio.mensError == '') {
                    envio +=
                        "<span class='alert alert-success mt-3 rounded-2 d-block'><?php esc_html_e("La petici&oacute;n de envio se ha cursado con &eacute;xito:", "cex_pluggin");?> " +
                        aux.envio.datosResultado + "</span>";
                } else {
                    envio +=
                        "<span class='alert alert-success mt-3 rounded-2 d-block'>" 
                        + aux.envio.mensError+ " : "+ aux.envio.datosResultado+ 
                        "</span>";
                }

               
                    generarEtiquetaRest(aux.envio.etiqueta);
               
                
            } else {
                envio += "<span class='alert alert-danger mt-3 rounded-2 d-block'>" + aux.envio
                    .mensError + "</span>";
            }
        }
    }
    (jQuery)('#respuestaWS').html(recogida + envio);
    (jQuery)('#respuestaWS').removeClass('d-none');
    return false;    
}

function mostrarBuscador(event) {
    event.preventDefault();
    (jQuery)('#buscador_ofi').removeClass('d-none');
    (jQuery)('#grabar_envio').addClass('d-none');
    (jQuery)('html,body').animate({
            scrollTop: (jQuery)("#buscador_ofiContent").offset().top-200
        }, 'slow');
}

function cerrarModal() {
    (jQuery)('#buscador_ofi').addClass("d-none");      
    (jQuery)('#contenedor_tab_oficinas').addClass('d-none');
}

function pintarManual() {
    //si esta checkeado, hago la peticion, sino quito el valor    
    (jQuery).ajax({
        type: "POST",
        url: 'admin-ajax.php',
        data: {
            'action': 'cex_shop_order_manual',   
            'id': getQueryVariable('post'),             
            'nonce': (jQuery)('#cex-nonce').val(),
        },
        success: function(msg) {
            (jQuery)('#advanced-sortables').prepend(msg);                                
        },
        error: function(msg) {
            //console.log(msg);
        }
    });
}



function convertirFormatoWP(formato_fecha_wordpress){
    switch(formato_fecha_wordpress){
        case "d/m/Y":
            return "DD/MM/YYYY";
        break;
        case "m/d/Y":
            return "MM/DD/YYYY";
        break;
        case "Y-m-d":
            return "YYYY-MM-DD";
        break;
        case "d-m-Y":
            return "DD-MM-YYYY";
        break;
        default:
            return "DD/MM/YYYY";
        break;
    }
}


window.onclick = function(event) {
    if (event.target == document.getElementById('buscador_ofi')) {
        (jQuery)('#buscador_ofi').addClass("d-none");
        (jQuery)('#grabar_envio').removeClass('d-none');
    }
}




</script>

<?php else : ?>    
<p><?php esc_html_e("NO TIENES ACCESO A ESTA SECCI&Oacute;N", "cex_pluggin");?></p>
<?php endif; ?>
