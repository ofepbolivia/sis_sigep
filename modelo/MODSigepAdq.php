<?php
/**
 *@package pXP
 *@file gen-MODSigepAdq.php
 *@author  (rzabala)
 *@date 15-03-2019 21:10:26
 *@description Clase que envia los parametros requeridos a la Base de datos para la ejecuciostatusC31n de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
 */
include_once(dirname(__FILE__).'/../rest/PxpRestSigep.php');
//include_once(dirname(__FILE__).'/../../lib/rest/PxpRestSigep.php');
// __DIR__.'/../rest/PxpRestClient2.php';

class MODSigepAdq extends MODbase{

    function __construct(CTParametro $pParam){
        parent::__construct($pParam);
    }

    function listarSigepAdq(){
        //Definicion de variables para ejecucion del procedimientp
        $this->procedimiento='sigep.ft_sigep_adq_sel';
        $this->transaccion='SIGEP_SADQ_SEL';
        $this->tipo_procedimiento='SEL';//tipo de transaccion
        $this->setCount(true);

        //$this->setParametro('nro_preventivo','nro_preventivo','int4');
        //$this->setParametro('sigep_adq','sigep_adq','varchar');
        //Definicion de la lista del resultado del query
        $this->captura('id_sigep_adq','int4');
        $this->captura('estado_reg','varchar');
        $this->captura('num_tramite','varchar');
        $this->captura('estado','varchar');
        $this->captura('momento','varchar');
        $this->captura('ultimo_mensaje','varchar');
        $this->captura('clase_gasto','varchar');
        $this->captura('id_service_request','varchar');
        $this->captura('nro_preventivo','int4');
        $this->captura('nro_comprometido','int4');
        $this->captura('nro_devengado','int4');
        $this->captura('id_usuario_reg','int4');
        $this->captura('fecha_reg','timestamp');
        $this->captura('id_usuario_ai','int4');
        $this->captura('usuario_ai','varchar');
        $this->captura('id_usuario_mod','int4');
        $this->captura('fecha_mod','timestamp');
        $this->captura('usr_reg','varchar');
        $this->captura('usr_mod','varchar');

        //Ejecuta la instruccion
        $this->armarConsulta(); //echo $this->consulta;exit;
        $this->ejecutarConsulta();

        //Devuelve la respuesta
        //var_dump('respuesta consult:', $this->ejecutarConsulta());
        return $this->respuesta;
    }

    function insertarSigepAdq(){
        //Definicion de variables para ejecucion del procedimiento
        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_SADQ_INS';
        $this->tipo_procedimiento='IME';

        //Define los parametros para la funcion
        $this->setParametro('estado_reg','estado_reg','varchar');
        $this->setParametro('num_tramite','num_tramite','varchar');
        $this->setParametro('estado','estado','varchar');
        $this->setParametro('momento','momento','varchar');
        $this->setParametro('ultimo_mensaje','ultimo_mensaje','varchar');
        $this->setParametro('clase_gasto','clase_gasto','varchar');
        $this->setParametro('id_service_request','id_service_request','varchar');
        $this->setParametro('nro_preventivo','nro_preventivo','int4');


        //Ejecuta la instruccion
        $this->armarConsulta();
        $this->ejecutarConsulta();

        //Devuelve la respuesta
        return $this->respuesta;
    }

    function modificarSigepAdq(){
        //Definicion de variables para ejecucion del procedimiento
        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_SADQ_MOD';
        $this->tipo_procedimiento='IME';

        //Define los parametros para la funcion
        $this->setParametro('id_sigep_adq','id_sigep_adq','int4');
        $this->setParametro('estado_reg','estado_reg','varchar');
        $this->setParametro('num_tramite','num_tramite','varchar');
        $this->setParametro('estado','estado','varchar');
        $this->setParametro('momento','momento','varchar');
        $this->setParametro('ultimo_mensaje','ultimo_mensaje','varchar');
        $this->setParametro('clase_gasto','clase_gasto','varchar');
        $this->setParametro('id_service_request','id_service_request','varchar');
        $this->setParametro('nro_preventivo','nro_preventivo','int4');


        //Ejecuta la instruccion
        $this->armarConsulta();
        $this->ejecutarConsulta();

        //Devuelve la respuesta
        return $this->respuesta;
    }

    function eliminarSigepAdq(){
        //Definicion de variables para ejecucion del procedimiento
        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_SADQ_ELI';
        $this->tipo_procedimiento='IME';

        //Define los parametros para la funcion
        $this->setParametro('id_sigep_adq','id_sigep_adq','int4');

        //Ejecuta la instruccion
        $this->armarConsulta();
        $this->ejecutarConsulta();

        //Devuelve la respuesta
        return $this->respuesta;
    }
    function consultaMonSigep(){

        $this->procedimiento='sigep.ft_sigep_adq_sel';
        $this->transaccion='SIGEP_CONS';
        $this->tipo_procedimiento='SEL';
        $this->count=false;

        //Define los parametros para la funcion
        $this->setParametro('id_sigep_adq','id_sigep_adq','int4');

        $this->captura('id_sigep_adq','int4');
        $this->captura('gestion','int4');
        $this->captura('clase_gasto_cip','int4');
        $this->captura('moneda','int4');
        $this->captura('total_autorizado_mo','numeric');
        $this->captura('id_ptogto','int4');
        $this->captura('monto_partida','numeric');
        $this->captura('nro_doc_rdo','int4');
        $this->captura('sec_doc_rdo','int4');
        $this->captura('tipo_doc_rdo','int4');
        $this->captura('fecha_elaboracion','date');
        $this->captura('justificacion','varchar');
        $this->captura('id_fuente','varchar');
        $this->captura('id_organismo','varchar');
        $this->captura('cuenta','varchar');
        $this->captura('beneficiario','varchar');
        $this->captura('banco_benef','varchar');
        $this->captura('cuenta_benef','varchar');
        $this->captura('banco_origen','varchar');
        $this->captura('cta_origen','varchar');
        $this->captura('libreta_origen','varchar');
        $this->captura('usuario_apro','varchar');
        $this->captura('clase_gasto','varchar');
        $this->captura('momento','varchar');
        $this->captura('nro_preventivo','int4');
        $this->captura('nro_comprometido','int4');
        $this->captura('nro_devengado','int4');
        $this->captura('monto_benef','numeric');
        $this->captura('liquido_pagable','numeric');
        $this->captura('multaMo','numeric');
        $this->captura('retencionMo','numeric');
        $this->captura('cuenta_contable','varchar');
        $this->captura('sisin','varchar');
        $this->captura('otfin','varchar');
        $this->captura('usuario_firm','varchar');

        $this->captura('cod_multa','varchar');
        $this->captura('cod_retencion','varchar');
        $this->captura('total_retencion','numeric');
        $this->captura('mes_rdo','int4');
        $this->captura('tipo_rdo','varchar');
        $this->captura('tipo_contrato','varchar');
        $this->captura('fecha_tipo_cambio','date');
        $this->captura('preventivo_sigep','integer');

        $this->captura('nro_deposito','varchar');
        $this->captura('fecha_deposito','date');
        $this->captura('monto_deposito','numeric');
        $this->captura('total_deposito','numeric');

        $this->captura('beneficiarios','jsonb');

        $this->armarConsulta();//var_dump($this->consulta);exit;
        $this->ejecutarConsulta();

        //var_dump('consulta preventivo:',$this->respuesta);
        return $this->respuesta;
    }

    /*function ReenviarC31() {
        $cone = new conexion();
        $link = $cone->conectarpdo();
        $id_sigep_adq = $this->objParam->getParametro('id_sigep_adq');
        //$procesando = $this->verificarProcesamiento($link);

        //if ($id_sigep_adq != '') {
            $sql = "SELECT 	sdet.id_sigep_adq,
                            sdet.clase_gasto_cip,
		                    sdet.fecha_elaboracion,
                            sdet.gestion,
                            sdet.id_ptogto,
                            sdet.justificacion,
                            sdet.moneda,
                            sdet.monto_partida,
                            sdet.nro_doc_rdo,
                            sdet.sec_doc_rdo,
                            sdet.tipo_doc_rdo,
                            sdet.total_autorizado_mo,
                            usu1.cuenta as usr_reg,
                            sig.clase_gasto,
                            sig.momento,
                            sdet.id_fuente,
                            sdet.id_organismo,
                            sdet.beneficiario,
                            sdet.banco_benef,
                            sdet.cuenta_benef,
                            sdet.banco_origen,
                            sdet.cta_origen,
                            sdet.libreta_origen,
                            sig.nro_preventivo,
                            sdet.usuario_apro
                    FROM sigep.tsigep_adq_det sdet
                    inner join segu.tusuario usu1 on usu1.id_usuario = sdet.id_usuario_reg
                    left join segu.tusuario usu2 on usu2.id_usuario = sdet.id_usuario_mod
                    inner join sigep.tsigep_adq sig on sig.id_sigep_adq = sdet.id_sigep_adq
                    WHERE sdet.id_sigep_adq =$id_sigep_adq";


        try {
            $consulta = $link->query($sql);
            $consulta->execute();
            $list = $consulta->fetchAll(PDO::FETCH_ASSOC);


            $str = new stdClass();
            $str->id_sigep_adq = "".$id_sigep_adq."";
            $json = json_encode($list);

            var_dump('respuesta registrarServiceERP:',$res);exit;
            $res = $this->registrarServiceERP($link, $list, 'PREVE');

            $this->respuesta = new Mensaje();
            $this->respuesta->setMensaje('EXITO', $this->nombre_archivo, 'Procesamiento exitoso ', 'Procesamiento exitoso ', 'modelo', $this->nombre_archivo, 'procesarServices', 'IME', '');
            $this->respuesta->setDatos($json);


        //return $this->respuesta;
            //var_dump('valores consulta', $str);exit;
            $this->modificaProcesamientoERP($link,$id_sigep_adq);
        }catch (Exception $e) {
            //$this->modificaProcesamiento($link,'no');
            $this->respuesta=new Mensaje();
            $this->respuesta->setMensaje('ERROR',$this->nombre_archivo,$e->getMessage(),$e->getMessage(),'modelo','','','','');
        }
        return $this->respuesta;
    }*/
    function registrarServiceERP($link, $list, $service_code, $estado_c31){
        //var_dump('registrarServiceERP',$this->objParam->getParametro('nro_preventivo'), $service_code);

        $tipo_cbte = $this->objParam->getParametro ('tipo_cbte');
        $service_codes = array('CON_IMPUTACION','SIN_IMPUTACION','CON_IMPUTACION_V','REGULARIZAC','REGULARIZAS','CON_IMPUTACION_EXT','REGULARIZAC_REV','REGULARIZAS_REV','CON_IMPUTACION_REV','DOC_C31_REF_VIA');

        if ( in_array ($service_code, $service_codes) ){

        /*if ($service_code == 'CON_IMPUTACION' || $service_code == 'SIN_IMPUTACION'  || $service_code == 'CON_IMPUTACION_V' || $service_code == 'REGULARIZAC'
            || $service_code == 'REGULARIZAS' || $service_code == 'CON_IMPUTACION_EXT' || $service_code == 'REGULARIZAC_REV' || $service_code == 'REGULARIZAS_REV' || $service_code == 'CON_IMPUTACION_REV') {*/

            $service = json_decode($list, true);
            foreach ($service as $servicio) { //var_dump('FOR EACH ', $servicio);exit;
                //var_dump('ENTRA ', $servicio);
                $fecha_new = str_replace('-', '/', $servicio["fecha_elaboracion"]);
                $fecha_elaboracion = date("d/m/Y", strtotime($fecha_new));
                $fecha_tipo_cambio = DateTime::createFromFormat('Y-m-d', $servicio["fecha_tipo_cambio"])->format('d/m/Y');
                $usuario = $servicio["cuenta"];
                $gestion = $servicio["gestion"];
                $clase_gasto_cip = $servicio["clase_gasto_cip"];
                $resumen = $servicio["justificacion"];
                $moneda = $servicio["moneda"];
                $total_autorizado = $servicio["total_autorizado_mo"];
                $liquido_pagable = $servicio["liquido_pagable"];
                $tipo_doc_rdo = $servicio["tipo_doc_rdo"];
                $nro_doc_rdo = $servicio["nro_doc_rdo"];
                $sec_doc_rdo = $servicio["sec_doc_rdo"];
                $total_doc_rdo = $servicio["total_doc_rdo"];
                $momento = $servicio["momento"];
                $id_adq = $servicio["id_sigep_adq"];
                $tipo_contrato = $servicio["tipo_contrato"];
                $usuario_apro = $servicio["usuario_apro"];
                $usuario_firm = $servicio["usuario_firm"];
                $id_fuente = $servicio["id_fuente"];
                $id_organismo = $servicio["id_organismo"];
                $beneficiario = $servicio["beneficiario"];
                $banco_benef = $servicio["banco_benef"];
                $cuenta_benef = $servicio["cuenta_benef"];
                $monto_benef = $servicio["monto_benef"];
                $banco_origen = $servicio["banco_origen"];
                $cuenta_origen = $servicio["cta_origen"];
                $libreta_origen = $servicio["libreta_origen"];
                $multa_mo = $servicio["multamo"];
                $retencion_mo = $servicio["retencionmo"];
                $localidad = $servicio["localidad"];
                $sisin = $servicio["sisin"];
                $idCatproy = $servicio["sisin"];
                $otfin = $servicio["otfin"];
                $cod_multa = $servicio["cod_multa"];
                $cod_retencion = $servicio["cod_retencion"];
                $total_retenciones = $servicio["total_retencion"];
                $mesRdo = $servicio["mes_rdo"];
                $tipoRdo = $servicio["tipo_rdo"];

                if ($service_code == 'CON_IMPUTACION_REV'){
                    $nro_deposito =  $servicio["nro_deposito"];
                    $fecha_deposito = DateTime::createFromFormat('Y-m-d',$servicio["fecha_deposito"])->format('d/m/Y');
                    $monto_deposito = $servicio["monto_deposito"];
                    $total_deposito = $servicio["total_deposito"];
                }
                /*var_dump('campos', $servicio["nro_deposito"],DateTime::createFromFormat('Y-m-d',$servicio["fecha_deposito"])->format('d/m/Y'), $servicio["monto_deposito"], $servicio["total_deposito"]);
                var_dump('campos', $nro_deposito,$fecha_deposito, $monto_deposito, $total_deposito);exit;*/
                //franklin.espinoza 15/10/2020
                if ($service_code == 'REGULARIZAC_REV' || $service_code == 'REGULARIZAS_REV' || $service_code == 'CON_IMPUTACION_REV') {
                    $nro_preventivo = $servicio["nro_preventivo"];
                    $nro_compromiso = $servicio["nro_comprometido"];
                    $nro_devengado = $servicio["nro_devengado"];
                }else{
                    $nro_preventivo = $servicio["preventivo_sigep"];
                }

                $beneficiarios = $servicio["beneficiarios"];

            }
            $stri = array();
            $strin = array();
            $ret = array();
            for ($i = 0; $i < count($service); ++$i) {
                $data[$i] = $service[$i];
                if ($data[$i]["id_ptogto"] <> null) {
                    if ($data[$i]["monto_partida"] == (0.87 * $data[$i]["liquido_pagable"])) {
                        $stri[] = array("idPtogto" => $data[$i]["id_ptogto"], "montoMo" => $data[$i]["liquido_pagable"]);
                    } else {
                        $stri[] = array("idPtogto" => $data[$i]["id_ptogto"], "montoMo" => $data[$i]["monto_partida"]);
                    }
                } else if ($data[$i]["cuenta_contable"] <> '') {
                    $strin[] = array("cuentaContable" => $data[$i]["cuenta_contable"], "montoMo" => $data[$i]["monto_partida"]);
                }
                if ($data[$i]["cod_retencion"] <> '') {
                    $ret[] = array("acreedor" => $data[$i]["cod_retencion"], "montoMo" => $data[$i]["retencionmo"]);
                }
            }

            $acreedor="";
            $montoA="";
            $array_destino =array();
            if(!empty($ret) && $tipo_contrato == "EVE"){
                foreach($ret as $valor){
                    $repeat=false;
                    for($i=0;$i<count($array_destino);$i++)
                    {
                        if($array_destino[$i]['acreedor']==$valor['acreedor'])
                        {
                            $array_destino[$i]['montoMo']+=$valor['montoMo'];
                            $repeat=true;
                            break;
                        }
                    }
                    if($repeat==false)
                        $array_destino[] = array('acreedor' => $valor['acreedor'], 'montoMo' => $valor['montoMo']);
                }
            }



        }

        //var_dump('MOMENTO', $momento);exit;
        //f.e.a
        //$pxpRestClient = PxpRestClient2::connect('172.17.58.62', 'kerp/pxp/lib/rest/')->setCredentialsPxp('admin', 'admin');

        //echo($pxpRestClient->doPost('sigep/ServiceRequest/insertarServiceRequest', $servicio));exit;
        if ($momento == "CON_IMPUTACION" || $momento == "CON_IMPUTACION_V") {
            if ($moneda == '34' || $moneda == '69') {
                $tipo = 'C';
            } else {
                $tipo = 'V';
            }
            if($sisin ==255429 || $sisin == 331891 || $sisin == 350238){
                //var_dump('catproy:', (string)$sisin);
                $otfin = 'BOA-FINPRO-2018';
            }else{
                $otfin = null;
            }

            if (!empty($cod_multa)) {
                $str = new stdClass();
                $str->usuario = "" . $usuario . "";
                $str->user_apro = "".$usuario_apro."";
                $str->user_firm = "".$usuario_firm."";
                $str->gestion = $gestion;
                //$str->nroPreventivo = $nro_preventivo;
                $str->fechaElaboracion = "" . $fecha_elaboracion . "";
                $str->claseGastoCip = $clase_gasto_cip;
                $str->idCatpry = $idCatproy;
                $str->sigade = null;
                $str->otfin = $otfin;
                $str->resumenOperacion = "" . $resumen . "";
                $str->moneda = $moneda;
                $str->fechaTipoCambio = "" . $fecha_elaboracion . "";
                $str->compraVenta = "" . $tipo . "";
                $str->totalAutorizadoMo = $total_autorizado;
                $str->totalRetencionesMo = 0;
                $str->totalMultasMo = $multa_mo;
                $str->liquidoPagableMo = $liquido_pagable;
                $str->partidas = $stri;
                $str->respaldos [] = array("tipoDocRdo" => "" . $tipo_doc_rdo . "", "nroDocRdo" => "" . $nro_doc_rdo . "", "secDocRdo" => "" . $sec_doc_rdo . "", "totalDocRdo" => "" . $sec_doc_rdo . "", "fechaElaboracionRdo" => "" . $fecha_elaboracion . "", "fechaRecepcionRdo" => "" . $fecha_elaboracion . "", "fechaVencimientoRdo" => "" . $fecha_elaboracion . "");
                $str->beneficiarios [] = array("beneficiario" => "" . $beneficiario . "", "banco" => "" . $banco_benef . "", "cuenta" => "" . $cuenta_benef . "", "montoMo" => "" . $monto_benef . "", "montoRetencionesMo" => 0, "montoMultasMo" => 0);
                $str->multas [] = array("multa" => "". $cod_multa ."", "montoMo" => "" . $multa_mo . "");
                $str->libretas [] = array("idFuente" => "" . $id_fuente . "", "idOrganismo" => "" . $id_organismo . "", "bancoOrigen" => "" . $banco_origen . "", "cuentaOrigen" => "" . $cuenta_origen . "", "libretaOrigen" => "" . $libreta_origen . "");
                $json = json_encode($str);
                $service_code = 'CON_IMPUTACION_M';
                //var_dump("JSON de multa:", $cod_multa);exit;
            } else if (!empty($cod_retencion)){
                if($tipo_contrato == 'EVE'){
                    $reten = $array_destino;
                }else{
                    $reten = $ret;
                }
                $str = new stdClass();
                $str->usuario = "" . $usuario . "";
                $str->user_apro = "".$usuario_apro."";
                $str->user_firm = "".$usuario_firm."";
                $str->gestion = $gestion;
                $str->fechaElaboracion = "" . $fecha_elaboracion . "";
                $str->claseGastoCip = $clase_gasto_cip;
                $str->resumenOperacion = "" . $resumen . "";
                $str->moneda = $moneda;
                $str->fechaTipoCambio = "" . $fecha_elaboracion . "";
                $str->compraVenta = "" . $tipo . "";
                $str->totalAutorizadoMo = $total_autorizado;
                $str->totalRetencionesMo = $total_retenciones;
                $str->totalMultasMo = 0;
                $str->liquidoPagableMo = $liquido_pagable;
                $str->partidas = $stri;
                $str->respaldos [] = array("tipoDocRdo" => "" . $tipo_doc_rdo . "", "nroDocRdo" => "" . $nro_doc_rdo . "", "secDocRdo" => "" . $sec_doc_rdo . "", "totalDocRdo" => "" . $sec_doc_rdo . "", "gestionRdo" => "" . $gestion . "","mesRdo" => "" . $mesRdo . "","tipoRdo" => "" . $tipoRdo . "", "fechaElaboracionRdo" => "" . $fecha_elaboracion . "", "fechaRecepcionRdo" => "" . $fecha_elaboracion . "", "fechaVencimientoRdo" => "" . $fecha_elaboracion . "");
                $str->beneficiarios [] = array("beneficiario" => "" . $beneficiario . "", "banco" => "" . $banco_benef . "", "cuenta" => "" . $cuenta_benef . "", "montoMo" => "" . $monto_benef . "", "montoRetencionesMo" => 0, "montoMultasMo" => 0);
                $str->multas [] = array("multa" => "". $cod_multa ."", "montoMo" => "" . $multa_mo . "");
                $str->retenciones = $reten;
                $str->libretas [] = array("idFuente" => "" . $id_fuente . "", "idOrganismo" => "" . $id_organismo . "", "bancoOrigen" => "" . $banco_origen . "", "cuentaOrigen" => "" . $cuenta_origen . "", "libretaOrigen" => "" . $libreta_origen . "");
                $json = json_encode($str);
                $service_code = 'PLANI';
            } else {

                $tipos = array ('refrigerio','viatico_administrativo','viatico_operativo');

                if ( in_array($tipo_cbte, $tipos) ){

                    $str = new stdClass();
                    $str->usuario = "" . $usuario . "";
                    $str->user_apro = "".$usuario_apro."";
                    $str->user_firm = "".$usuario_firm."";
                    $str->gestion = $gestion;
                    $str->nroPreventivo = $nro_preventivo;
                    $str->fechaElaboracion = "" . $fecha_elaboracion . "";
                    $str->claseGastoCip = $clase_gasto_cip;
                    $str->idCatpry =$idCatproy;
                    $str->sigade = null;
                    $str->otfin = $otfin;
                    $str->resumenOperacion = "" . $resumen . "";
                    $str->moneda = $moneda;
                    $str->fechaTipoCambio = "" . $fecha_elaboracion . "";
                    $str->compraVenta = "" . $tipo . "";
                    $str->totalAutorizadoMo = $total_autorizado;
                    $str->totalRetencionesMo = 0;
                    $str->totalMultasMo = 0;
                    $str->liquidoPagableMo = $liquido_pagable;
                    $str->partidas = $stri;
                    $str->respaldos [] = array("tipoDocRdo" => "" . $tipo_doc_rdo . "", "nroDocRdo" => "" . $nro_doc_rdo . "", "secDocRdo" => "" . $sec_doc_rdo . "", "totalDocRdo" => "" . $sec_doc_rdo . "", "fechaElaboracionRdo" => "" . $fecha_elaboracion . "", "fechaRecepcionRdo" => "" . $fecha_elaboracion . "", "fechaVencimientoRdo" => "" . $fecha_elaboracion . "");

                    /********************************* beneficiarios *********************************/
                    $beneficiarios = json_decode($beneficiarios, true);
                    $str->beneficiarios = array();
                    foreach ($beneficiarios as $beneficiario){
                        $str->beneficiarios [] = array("beneficiario" => "" . $beneficiario['beneficiario'] . "", "banco" => "" . $beneficiario['banco'] . "", "cuenta" => "" . $beneficiario['cuenta'] . "", "montoMo" => "" . $beneficiario['montoMo'] . "", "montoRetencionesMo" => "" . $retencion_mo . "", "montoMultasMo" => "" . $multa_mo . "");
                    }
                    /********************************* beneficiarios *********************************/

                    $str->libretas [] = array("idFuente" => "" . $id_fuente . "", "idOrganismo" => "" . $id_organismo . "", "bancoOrigen" => "" . $banco_origen . "", "cuentaOrigen" => "" . $cuenta_origen . "", "libretaOrigen" => "" . $libreta_origen . "");
                    $json = json_encode($str);
                    $service_code = 'DOC_C31_REF_VIA';
                }else {
                    $str = new stdClass();
                    $str->usuario = "" . $usuario . "";
                    $str->user_apro = "" . $usuario_apro . "";
                    $str->user_firm = "" . $usuario_firm . "";
                    $str->gestion = $gestion;
                    $str->nroPreventivo = $nro_preventivo;
                    $str->fechaElaboracion = "" . $fecha_elaboracion . "";
                    $str->claseGastoCip = $clase_gasto_cip;
                    $str->idCatpry = $idCatproy;
                    $str->sigade = null;
                    $str->otfin = $otfin;
                    $str->resumenOperacion = "" . $resumen . "";
                    $str->moneda = $moneda;
                    $str->fechaTipoCambio = "" . $fecha_elaboracion . "";
                    $str->compraVenta = "" . $tipo . "";
                    $str->totalAutorizadoMo = $total_autorizado;
                    $str->totalRetencionesMo = 0;
                    $str->totalMultasMo = 0;
                    $str->liquidoPagableMo = $liquido_pagable;
                    $str->partidas = $stri;
                    $str->respaldos [] = array("tipoDocRdo" => "" . $tipo_doc_rdo . "", "nroDocRdo" => "" . $nro_doc_rdo . "", "secDocRdo" => "" . $sec_doc_rdo . "", "totalDocRdo" => "" . $sec_doc_rdo . "", "fechaElaboracionRdo" => "" . $fecha_elaboracion . "", "fechaRecepcionRdo" => "" . $fecha_elaboracion . "", "fechaVencimientoRdo" => "" . $fecha_elaboracion . "");
                    $str->beneficiarios [] = array("beneficiario" => "" . $beneficiario . "", "banco" => "" . $banco_benef . "", "cuenta" => "" . $cuenta_benef . "", "montoMo" => "" . $monto_benef . "", "montoRetencionesMo" => "" . $retencion_mo . "", "montoMultasMo" => "" . $multa_mo . "");
                    $str->libretas [] = array("idFuente" => "" . $id_fuente . "", "idOrganismo" => "" . $id_organismo . "", "bancoOrigen" => "" . $banco_origen . "", "cuentaOrigen" => "" . $cuenta_origen . "", "libretaOrigen" => "" . $libreta_origen . "");
                    $json = json_encode($str);
                    //$service_code = 'CON_IMPUTACION';
                    $service_code = 'CON_IMPUTACION';
                }
            }

            /////////////////////PREVENTIVO/////////////////////
            /*$str = new stdClass();
            $str->usuario = "".$usuario."";
            $str->usuario_apro = "".$usuario_apro."";
            $str->gestion = $gestion;
            $str->fechaElaboracion = "".$fecha_elaboracion."";
            $str->claseGastoCip = $clase_gasto_cip;
            $str->idCatprv = null;
            $str->sigade = null;
            $str->otfin = null;
            $str->resumenOperacion = "".$resumen."";
            $str->moneda = $moneda;
            $str->fechaTipoCambio = "".$fecha_elaboracion."";
            $str->compraVenta = "C";
            $str->totalAutorizadoMo = $total_autorizado;
            $str->totalRetencionesMo = 0;
            $str->totalMultasMo = 0;
            $str->liquidoPagableMo = $liquido_pagable;
            $str->partidas = $stri;
            $str->respaldos []= array("tipoDocRdo"=>"".$tipo_doc_rdo."", "nroDocRdo"=>"".$nro_doc_rdo."", "secDocRdo"=>"".$sec_doc_rdo."", "totalDocRdo"=>"".$total_doc_rdo."", "fechaElaboracionRdo"=>"".$fecha_elaboracion."", "fechaRecepcionRdo"=>"".$fecha_elaboracion."", "fechaVencimientoRdo"=>null);
            $json = json_encode($str);
            $service_code = 'PREVE';*/
            //////////////////////PREVENTIVO////////////////////////
            //var_dump('arreglo:', $stri);exit;
            //var_dump('json envio sigep', $json, $service_code);exit;

        } else if ($momento == 'SIN_IMPUTACION') {
            if ($moneda == '34' || $moneda == '69') {
                $tipo = 'C';
            } else {
                $tipo = 'V';
            }
            if ($beneficiario <> '83797') {
                $str = new stdClass();
                $str->usuario = "" . $usuario . "";
                $str->user_apro = "".$usuario_apro."";
                $str->user_firm = "".$usuario_firm."";
                $str->gestion = $gestion;
                $str->fechaElaboracion = "" . $fecha_elaboracion . "";
                $str->claseGastoSip = $clase_gasto_cip;
                $str->idCatprv = $sisin;
                $str->sigade = null;
                $str->otfin = $otfin;
                $str->resumenOperacion = "" . $resumen . "";
                $str->moneda = $moneda;
                $str->fechaTipoCambio = "" . $fecha_elaboracion . "";
                $str->compraVenta = "" . $tipo . "";
                $str->totalAutorizadoMo = $total_autorizado;
                $str->totalRetencionesMo = $retencion_mo;
                $str->totalMultasMo = $multa_mo;
                $str->liquidoPagableMo = $liquido_pagable;
                $str->respaldos [] = array("tipoDocRdo" => "" . $tipo_doc_rdo . "", "nroDocRdo" => "" . $nro_doc_rdo . "", "secDocRdo" => "" . $sec_doc_rdo . "", "totalDocRdo" => "" . $sec_doc_rdo . "", "fechaElaboracionRdo" => "" . $fecha_elaboracion . "", "fechaRecepcionRdo" => "" . $fecha_elaboracion . "", "fechaVencimientoRdo" => "" . $fecha_elaboracion . "");
                $str->beneficiarios [] = array("beneficiario" => "" . $beneficiario . "", "banco" => "" . $banco_benef . "", "cuenta" => "" . $cuenta_benef . "", "montoMo" => "" . $monto_benef . "", "montoRetencionesMo" => "" . $retencion_mo . "", "montoMultasMo" => "" . $multa_mo . "");
                $str->contables = $stri;
                $str->libretas [] = array("bancoOrigen" => "" . $banco_origen . "", "cuentaOrigen" => "" . $cuenta_origen . "", "libretaOrigen" => "" . $libreta_origen . "");
                $json = json_encode($str);
                $service_code = 'SIN_IMPUTACION';
            } else {
                $str = new stdClass();
                $str->usuario = "" . $usuario . "";
                $str->gestion = $gestion;
                //$str->nroPreventivo = $nro_preventivo;
                $str->fechaElaboracion = "" . $fecha_elaboracion . "";
                $str->claseGastoSip = $clase_gasto_cip;
                $str->idCatprv = $sisin;
                $str->sigade = null;
                $str->otfin = $otfin;
                $str->resumenOperacion = "" . $resumen . "";
                $str->moneda = $moneda;
                $str->fechaTipoCambio = "" . $fecha_elaboracion . "";
                $str->compraVenta = "" . $tipo . "";
                $str->totalAutorizadoMo = $total_autorizado;
                $str->totalRetencionesMo = $retencion_mo;
                $str->totalMultasMo = $multa_mo;
                $str->liquidoPagableMo = $liquido_pagable;
                $str->respaldos [] = array("tipoDocRdo" => "" . $tipo_doc_rdo . "", "nroDocRdo" => "" . $nro_doc_rdo . "", "secDocRdo" => "" . $sec_doc_rdo . "", "totalDocRdo" => "" . $sec_doc_rdo . "", "fechaElaboracionRdo" => "" . $fecha_elaboracion . "", "fechaRecepcionRdo" => "" . $fecha_elaboracion . "", "fechaVencimientoRdo" => "" . $fecha_elaboracion . "");
                $str->beneficiarios [] = array("beneficiario" => "" . $beneficiario . "", "banco" => "" . $banco_benef . "", "cuenta" => "" . $cuenta_benef . "", "montoMo" => "" . $monto_benef . "", "montoRetencionesMo" => "" . $retencion_mo . "", "montoMultasMo" => "" . $multa_mo . "");
                $str->contables = $stri;
                $str->libretas [] = array("bancoOrigen" => "" . $banco_origen . "", "cuentaOrigen" => "" . $cuenta_origen . "", "libretaOrigen" => "" . $libreta_origen . "");
                $json = json_encode($str);
                $service_code = 'SIN_IMPUTACION_CP';
            }


            //////////////////COMPROMETIDO-DEVENGADO////////////////////////////
            /*$str = new stdClass();
            $str->usuario = "".$usuario."";
            //$str->usuario_apro = "".$usuario_apro."";
            $str->gestion = $gestion;
            $str->nroPreventivo = $nro_preventivo;
            $str->fechaElaboracion = "".$fecha_elaboracion."";
            $str->claseGastoCip = $clase_gasto_cip;
            $str->idCatprv = null;
            $str->sigade = null;
            $str->otfin = null;
            $str->resumenOperacion = "".$resumen."";
            $str->moneda = $moneda;
            $str->fechaTipoCambio = "".$fecha_elaboracion."";
            $str->compraVenta = "C";
            $str->totalAutorizadoMo = $total_autorizado;
            $str->totalRetencionesMo = 0;
            $str->totalMultasMo = 0;
            $str->liquidoPagableMo = $liquido_pagable;
            $str->partidas = $stri;
            $str->respaldos []= array("tipoDocRdo"=>"".$tipo_doc_rdo."", "nroDocRdo"=>"".$nro_doc_rdo."", "secDocRdo"=>"".$sec_doc_rdo."", "totalDocRdo"=>"".$sec_doc_rdo."", "fechaElaboracionRdo"=>"".$fecha_elaboracion."", "fechaRecepcionRdo"=>"".$fecha_elaboracion."", "fechaVencimientoRdo"=>"".$fecha_elaboracion."");
            $str->beneficiarios []= array("beneficiario"=>"".$beneficiario."", "banco"=>"".$banco_benef."", "cuenta"=>"".$cuenta_benef."", "montoMo"=>"".$monto_benef."");
            $str->libretas []= array("idFuente"=>"".$id_fuente."", "idOrganismo"=>"".$id_organismo."", "bancoOrigen"=>"".$banco_origen."", "cuentaOrigen"=>"".$cuenta_origen."", "libretaOrigen"=>"".$libreta_origen."");
            $json = json_encode($str);
            $service_code = 'COMPRDEVEN';*/
            //////////////////COMPROMETIDO-DEVENGADO////////////////////////////


        }else if($momento == 'REGULARIZAC'){
            if($moneda == '34'){
                $tipo = 'C';
            }else{
                $tipo = 'V';
            }

            $str = new stdClass();
            $str->usuario = "".$usuario."";
            $str->user_apro = "".$usuario_apro."";
            $str->user_firm = "".$usuario_firm."";
            $str->gestion = $gestion;
            //$str->nroPreventivo = $nro_preventivo;
            $str->regularizacion = "".'S'."";
            $str->fechaElaboracion = "".$fecha_elaboracion."";
            $str->claseGastoCip = $clase_gasto_cip;
            $str->idCatprv = null;
            $str->sigade = null;
            $str->otfin = null;
            $str->resumenOperacion = "".$resumen."";
            $str->moneda = "".$moneda."";//
            $str->fechaTipoCambio = "".$fecha_tipo_cambio."";//$fecha_elaboracion
            $str->compraVenta = "".$tipo."";
            $str->totalAutorizadoMo = $total_autorizado;
            $str->totalRetencionesMo = 0;
            $str->totalMultasMo = 0;
            $str->liquidoPagableMo = $liquido_pagable;
            $str->partidas = $stri;
            $str->respaldos []= array("tipoDocRdo"=>"".$tipo_doc_rdo."", "nroDocRdo"=>"".$nro_doc_rdo."", "secDocRdo"=>"".$sec_doc_rdo."", "totalDocRdo"=>"".$sec_doc_rdo."", "fechaElaboracionRdo"=>"".$fecha_elaboracion."", "fechaRecepcionRdo"=>"".$fecha_elaboracion."", "fechaVencimientoRdo"=>"".$fecha_elaboracion."");
            $str->beneficiarios []= array("beneficiario"=>"".$beneficiario."", "montoMo"=>"".$monto_benef."");
            $str->libretas []= array("idFuente"=>"".$id_fuente."", "idOrganismo"=>"".$id_organismo."", "bancoOrigen"=>"".$banco_origen."", "cuentaOrigen"=>"".$cuenta_origen."", "libretaOrigen"=>"".$libreta_origen."");
            $json = json_encode($str);
            $service_code = 'REGULARIZAC';

        }else if($momento == 'REGULARIZAS'){
            if($moneda == '34'){
                $tipo = 'C';
            }else{
                $tipo = 'V';
            }

            $str = new stdClass();
            $str->usuario = "".$usuario."";
            $str->user_apro = "".$usuario_apro."";
            $str->user_firm = "".$usuario_firm."";
            $str->gestion = $gestion;
            $str->regularizacion = "".'S'."";
            $str->fechaElaboracion = "".$fecha_elaboracion."";
            $str->claseGastoSip = $clase_gasto_cip;
            $str->idCatprv = null;
            $str->sigade = null;
            $str->otfin = null;
            $str->resumenOperacion = "".$resumen."";
            $str->moneda = "".$moneda."";//
            $str->fechaTipoCambio = "".$fecha_tipo_cambio."";//$fecha_elaboracion
            $str->compraVenta = "".$tipo."";
            $str->totalAutorizadoMo = $total_autorizado;
            $str->totalRetencionesMo = 0;
            $str->totalMultasMo = 0;
            $str->liquidoPagableMo = $liquido_pagable;
            $str->partidas = $stri;
            $str->respaldos []= array("tipoDocRdo"=>"".$tipo_doc_rdo."", "nroDocRdo"=>"".$nro_doc_rdo."", "secDocRdo"=>"".$sec_doc_rdo."", "totalDocRdo"=>"".$sec_doc_rdo."", "fechaElaboracionRdo"=>"".$fecha_elaboracion."", "fechaRecepcionRdo"=>"".$fecha_elaboracion."", "fechaVencimientoRdo"=>"".$fecha_elaboracion."");
            $str->beneficiarios []= array("beneficiario"=>"".$beneficiario."", "montoMo"=>"".$monto_benef."");
            $str->contables = $strin;
            $str->libretas []= array("idFuente"=>"".$id_fuente."", "idOrganismo"=>"".$id_organismo."", "bancoOrigen"=>"".$banco_origen."", "cuentaOrigen"=>"".$cuenta_origen."", "libretaOrigen"=>"".$libreta_origen."");
            $json = json_encode($str);
            $service_code = 'REGULARIZAS';

            /*var_dump($str->contables);
            var_dump($str->respaldos);
            var_dump($str->beneficiarios);
            var_dump($str->libretas);exit;*/

        }else if($momento == 'CON_IMPUTACION_EXT'){

            if ($moneda == '34' || $moneda == '69') {
                $tipo = 'C';
            } else {
                $tipo = 'V';
            }

            $str = new stdClass();
            $str->usuario = "" . $usuario . "";
            $str->user_apro = "".$usuario_apro."";
            $str->user_firm = "".$usuario_firm."";
            $str->gestion = $gestion;
            $str->fechaElaboracion = "" . $fecha_elaboracion . "";
            $str->claseGastoCip = $clase_gasto_cip;
            $str->idCatpry =$idCatproy;
            $str->sigade = null;
            $str->otfin = $otfin;
            $str->resumenOperacion = "" . $resumen . "";
            $str->moneda = $moneda;
            $str->fechaTipoCambio = "" . $fecha_elaboracion . "";
            $str->compraVenta = "" . $tipo . "";
            $str->totalAutorizadoMo = $total_autorizado;
            $str->totalRetencionesMo = 0;
            $str->totalMultasMo = 0;
            $str->liquidoPagableMo = $liquido_pagable;
            $str->partidas = $stri;
            $str->respaldos [] = array("tipoDocRdo" => "" . $tipo_doc_rdo . "", "nroDocRdo" => "" . $nro_doc_rdo . "", "secDocRdo" => "" . $sec_doc_rdo . "", "totalDocRdo" => "" . $sec_doc_rdo . "", "fechaElaboracionRdo" => "" . $fecha_elaboracion . "", "fechaRecepcionRdo" => "" . $fecha_elaboracion . "", "fechaVencimientoRdo" => "" . $fecha_elaboracion . "");
            $str->beneficiarios [] = array("beneficiario" => "" . $beneficiario . "", "banco" => "" . $banco_benef . "", "cuenta" => "" . $cuenta_benef . "", "montoMo" => "" . $monto_benef . "", "montoRetencionesMo" => "" . $retencion_mo . "", "montoMultasMo" => "" . $multa_mo . "");
            $str->libretas [] = array("idFuente" => "" . $id_fuente . "", "idOrganismo" => "" . $id_organismo . "", "bancoOrigen" => "" . $banco_origen . "", "cuentaOrigen" => "" . $cuenta_origen . "", "libretaOrigen" => "" . $libreta_origen . "");
            $json = json_encode($str);

            $service_code = 'CON_IMPUTACION_EXT';

        }else if($momento == 'CON_IMPUTACION_REV'){
            if($moneda == '34'){
                $tipo = 'C';
            }else{
                $tipo = 'V';
            }

            $str = new stdClass();
            $str->usuario = "".$usuario."";
            $str->user_apro = "".$usuario_apro."";
            $str->user_firm = "".$usuario_firm."";
            $str->gestion = $gestion;
            $str->nroPreventivo = $nro_preventivo;
            $str->nroCompromiso = $nro_compromiso;
            $str->nroDevengado = $nro_devengado;
            $str->regularizacion = "".'N'."";
            $str->fechaElaboracion = "".$fecha_elaboracion."";
            $str->claseGastoCip = $clase_gasto_cip;
            $str->idCatprv = null;
            $str->sigade = null;
            $str->otfin = null;
            $str->resumenOperacion = "".$resumen."";
            $str->moneda = "".$moneda."";//
            $str->fechaTipoCambio = "".$fecha_tipo_cambio."";//$fecha_elaboracion
            $str->compraVenta = "".$tipo."";
            $str->totalAutorizadoMo = $total_autorizado;
            $str->totalRetencionesMo = 0;
            $str->totalMultasMo = 0;
            $str->liquidoPagableMo = $liquido_pagable;
            $str->partidas = $stri;
            $str->respaldos []= array("tipoDocRdo"=>"".$tipo_doc_rdo."", "nroDocRdo"=>"".$nro_doc_rdo."", "secDocRdo"=>"".$sec_doc_rdo."", "totalDocRdo"=>"".$sec_doc_rdo."", "fechaElaboracionRdo"=>"".$fecha_elaboracion."", "fechaRecepcionRdo"=>"".$fecha_elaboracion."", "fechaVencimientoRdo"=>"".$fecha_elaboracion."");
            $str->beneficiarios [] = array("beneficiario" => "" . $beneficiario . "", "banco" => "" . $banco_benef . "", "cuenta" => "" . $cuenta_benef . "", "montoMo" => "" . $monto_benef . "", "montoRetencionesMo" => 0, "montoMultasMo" => 0);

            $str->boletas []= array("nroDeposito"=>"".$nro_deposito."", "fecha"=>"".$fecha_deposito."", "importeExtbanMo"=>"".$monto_deposito."", "montoMo"=>"".$total_deposito."", "banco"=>"".$banco_origen."", "cuenta"=>"".$cuenta_origen."", "libreta"=>"".$libreta_origen."");

            $str->libretas []= array("idFuente"=>"".$id_fuente."", "idOrganismo"=>"".$id_organismo."", "bancoOrigen"=>"".$banco_origen."", "cuentaOrigen"=>"".$cuenta_origen."", "libretaOrigen"=>"".$libreta_origen."");
            $json = json_encode($str);
            $service_code = 'CON_IMPUTACION_REV';

        } else if($momento == 'REGULARIZAC_REV'){
            if($moneda == '34'){
                $tipo = 'C';
            }else{
                $tipo = 'V';
            }

            $str = new stdClass();
            $str->usuario = "".$usuario."";
            $str->user_apro = "".$usuario_apro."";
            $str->user_firm = "".$usuario_firm."";
            $str->gestion = $gestion;
            $str->nroPreventivo = $nro_preventivo;
            $str->nroCompromiso = $nro_compromiso;
            $str->nroDevengado = $nro_devengado;
            $str->regularizacion = "".'S'."";
            $str->fechaElaboracion = "".$fecha_elaboracion."";
            $str->claseGastoCip = $clase_gasto_cip;
            $str->idCatprv = null;
            $str->sigade = null;
            $str->otfin = null;
            $str->resumenOperacion = "".$resumen."";
            $str->moneda = "".$moneda."";//
            $str->fechaTipoCambio = "".$fecha_tipo_cambio."";//$fecha_elaboracion
            $str->compraVenta = "".$tipo."";
            $str->totalAutorizadoMo = $total_autorizado;
            $str->totalRetencionesMo = 0;
            $str->totalMultasMo = 0;
            $str->liquidoPagableMo = $liquido_pagable;
            $str->partidas = $stri;
            $str->respaldos []= array("tipoDocRdo"=>"".$tipo_doc_rdo."", "nroDocRdo"=>"".$nro_doc_rdo."", "secDocRdo"=>"".$sec_doc_rdo."", "totalDocRdo"=>"".$sec_doc_rdo."", "fechaElaboracionRdo"=>"".$fecha_elaboracion."", "fechaRecepcionRdo"=>"".$fecha_elaboracion."", "fechaVencimientoRdo"=>"".$fecha_elaboracion."");
            $str->beneficiarios []= array("beneficiario"=>"".$beneficiario."", "montoMo"=>"".$monto_benef."");
            $str->libretas []= array("idFuente"=>"".$id_fuente."", "idOrganismo"=>"".$id_organismo."", "bancoOrigen"=>"".$banco_origen."", "cuentaOrigen"=>"".$cuenta_origen."", "libretaOrigen"=>"".$libreta_origen."");
            $json = json_encode($str);
            $service_code = 'REGULARIZAC_REV';

        }else if($momento == 'REGULARIZAS_REV'){
            if($moneda == '34'){
                $tipo = 'C';
            }else{
                $tipo = 'V';
            }

            $str = new stdClass();
            $str->usuario = "".$usuario."";
            $str->user_apro = "".$usuario_apro."";
            $str->user_firm = "".$usuario_firm."";
            $str->gestion = $gestion;
            $str->nroPreventivo = $nro_preventivo;
            $str->nroCompromiso = $nro_compromiso;
            $str->nroDevengado = $nro_devengado;
            $str->regularizacion = "".'S'."";
            $str->fechaElaboracion = "".$fecha_elaboracion."";
            $str->claseGastoSip = $clase_gasto_cip;
            $str->idCatprv = null;
            $str->sigade = null;
            $str->otfin = null;
            $str->resumenOperacion = "".$resumen."";
            $str->moneda = "".$moneda."";//
            $str->fechaTipoCambio = "".$fecha_tipo_cambio."";//$fecha_elaboracion
            $str->compraVenta = "".$tipo."";
            $str->totalAutorizadoMo = $total_autorizado;
            $str->totalRetencionesMo = 0;
            $str->totalMultasMo = 0;
            $str->liquidoPagableMo = $liquido_pagable;


            $str->partidas = $stri;
            $str->respaldos []= array("tipoDocRdo"=>"".$tipo_doc_rdo."", "nroDocRdo"=>"".$nro_doc_rdo."", "secDocRdo"=>"".$sec_doc_rdo."", "totalDocRdo"=>"".$sec_doc_rdo."", "fechaElaboracionRdo"=>"".$fecha_elaboracion."", "fechaRecepcionRdo"=>"".$fecha_elaboracion."", "fechaVencimientoRdo"=>"".$fecha_elaboracion."");
            $str->beneficiarios []= array("beneficiario"=>"".$beneficiario."", "montoMo"=>"".$monto_benef."");
            $str->contables = $strin;
            $str->libretas []= array("idFuente"=>"".$id_fuente."", "idOrganismo"=>"".$id_organismo."", "bancoOrigen"=>"".$banco_origen."", "cuentaOrigen"=>"".$cuenta_origen."", "libretaOrigen"=>"".$libreta_origen."");
            $json = json_encode($str);

            $service_code = 'REGULARIZAS_REV';

        }else if($service_code == 'BENEF'){
            $servicio=json_decode($list, true);
            //var_dump('beneficiario elaboracion:',$servicio);exit;

            //$usuario = 'beneficiario';
            $usuario = $servicio['datos']['usuario_sigep'];//'franklin.espinoza';
            $id_proveedor = $servicio['datos']['id_proveedor'];
            $nit = $servicio['datos']['nit'];
            $ci = $servicio['datos']['ci'];
            $id_institucion = $servicio['datos']['id_institucion'];
            $id_persona = $servicio['datos']['id_persona'];
            $nombre = $servicio['datos']['nombre'];
            $ap_paterno = $servicio['datos']['ap_paterno'];
            $ap_materno = $servicio['datos']['ap_materno'];
            $fecha_nacimiento = date("d-m-Y", strtotime($servicio['datos']['fecha_nacimiento']));
            //var_dump('objeto desde successSegip:', $servicio);exit;

            if($nit == '') {
                $str = new stdClass();
                $str->usuario = "" . $usuario . "";
                $str->numeroDocumento = $ci;
                $str->primerApellido = "" . $ap_paterno . "";
                $str->segundoApellido = "" . $ap_materno . "";
                $str->nombres = "" . $nombre . "";
                $str->fechaNacimiento = "" . $fecha_nacimiento . "";

                $json = json_encode($str);
                $service_code = 'BENEFN';
                //var_dump($json);exit;
            }else{
                $str = new stdClass();
                $str->usuario = "" . $usuario . "";
                $str->numeroDocumento = $nit;
                $json = json_encode($str);
                $service_code = 'BENEF';
            }
        }else if($service_code == 'DEL'){
            $servicio=json_decode($list, true);
            //var_dump('beneficiario elaboracion:',$servicio);exit;
            $usuario = 'clelia.soria';

            $gestion = $servicio['gestion'];
            $nro_preventivo = $servicio['nro_preventivo'];
            $nro_compromiso = $servicio['nro_comprometido'];
            $nro_devengado = $servicio['nro_devengado'];


            $str = new stdClass();
            $str->usuario = "" . $usuario . "";
            $str->gestion = $gestion;
            $str->nroPreventivo = $nro_preventivo;
            $str->nroCompromiso = $nro_compromiso;
            $str->nroDevengado =$nro_devengado;

            $json = json_encode($str);
            $service_code = 'DEL';
        }
        //var_dump('json cargado:', $json, $service_code);exit;
        $pxpRestClient = PxpRestClient2::connect('172.17.58.62', 'kerp/pxp/lib/rest/')->setCredentialsPxp('admin', 'admin');
        $variable = $pxpRestClient->doPost('sigep/ServiceRequest/insertarServiceRequest',
            array(	"sys_origin"=>'erp',
                "json"=>''.$json.'',
                "service_code"=>"".$service_code.""
            ));//var_dump($json, $service_code);exit;


        $result= json_decode($variable, true);
        //var_dump('request', $variable);exit;
        $id_service_request=$result['ROOT']['datos']['id_service_request'];
        //var_dump($json, $service_code, $id_service_request);exit;
        $str = new stdClass();

        $service_codes = array('CON_IMPUTACION','CON_IMPUTACION_M','SIN_IMPUTACION','SIN_IMPUTACION_CP','CON_IMPUTACION_V','CON_IMPUTACION_EXT','REGULARIZAC_REV','REGULARIZAS_REV','CON_IMPUTACION_REV','DOC_C31_REF_VIA');

        if ( in_array ($service_code, $service_codes) ){
        /*if($service_code == 'CON_IMPUTACION' || $service_code == 'CON_IMPUTACION_M'|| $service_code == 'SIN_IMPUTACION' || $service_code == 'SIN_IMPUTACION_CP' || $service_code == 'CON_IMPUTACION_V' || $service_code ==  'CON_IMPUTACION_EXT' || $service_code == 'REGULARIZAC_REV' || $service_code == 'REGULARIZAS_REV' || $service_code == 'CON_IMPUTACION_REV' || $service_code == 'DOC_C31_REF_VIA' ){*/
            $this->actualizaEstados('registrado', $id_service_request, '','', $id_adq); //actualizaEstados($estado, $dato, $preve, $mensaje, $valor)
            //var_dump('resultado registrado', $id_service_request);exit;
            $this->ProcesarC31($id_service_request, $id_adq, 25, $estado_c31);
            $str->id_sigep_adq = "".$id_adq."";
            $str->service_code = "".$service_code."";
            ////////////////////PREVENTIVO//////////////////////////
            /*$this->actualizaEstados('registrado', $id_service_request, '','', $id_adq); //actualizaEstados($estado, $dato, $preve, $mensaje, $valor)
            //var_dump('resultado registrado', $id_service_request);exit;
            $this->ProcesarC31($id_service_request, $id_adq, 15);
            $str->id_sigep_adq = "".$id_adq."";
            //$this->modificaInsertarERP($link, $id_adq, $id_service_request);*/
            ////////////////////PREVENTIVO//////////////////////////
        }else if($service_code == 'nada'){
            ////////////////////COMPROMETIDO-DEVENGADO//////////////////////////
            /*$this->actualizaEstados('registrado', $id_service_request, '','', $id_adq); //actualizaEstados($estado, $dato, $preve, $mensaje, $valor)
            //var_dump('resultado registrado', $id_service_request);exit;
            $this->ProcesarC31($id_service_request, $id_adq, 25);
            $str->id_sigep_adq = "".$id_adq."";
            $str->nroPreventivo = "".$nro_preventivo."";
            $str->service_code = "".$service_code."";*/
            ////////////////////COMPROMETIDO-DEVENGADO//////////////////////////
        }else if($service_code == 'REGULARIZAC'){
            $this->actualizaEstados('registrado', $id_service_request, '','', $id_adq); //actualizaEstados($estado, $dato, $preve, $mensaje, $valor)
            //var_dump('resultado registrado', $id_service_request);exit;
            $this->ProcesarC31($id_service_request, $id_adq, 25, $estado_c31);
            $str->id_sigep_adq = "".$id_adq."";
            $str->service_code = "".$service_code."";
        }else if($service_code == 'REGULARIZAS'){
            $this->actualizaEstados('registrado', $id_service_request, '','', $id_adq); //actualizaEstados($estado, $dato, $preve, $mensaje, $valor)
            //var_dump('resultado registrado', $id_service_request);exit;
            $this->ProcesarC31($id_service_request, $id_adq, 25, $estado_c31);
            $str->id_sigep_adq = "".$id_adq."";
            $str->service_code = "".$service_code."";
        }else{
            $this->ProcesarC31('', '', 2, $estado_c31);
            //$this->registroBeneficiarioERP($id_proveedor,$id_service_request);
            $str->id_proveedor = "" . $id_proveedor . "";
            $str->service_code = "".$service_code."";
        }
        $str->id_sigep_adq = "".$id_adq."";
        //$str->id_proveedor = "" . $id_proveedor . "";
        $str->id_service_request = "" . $id_service_request . "";
        //return $json ;

        $this->respuesta = new Mensaje();
        $this->respuesta->setMensaje('EXITO', $this->nombre_archivo, 'Procesamiento exitoso ', 'Procesamiento exitoso ', 'modelo', $this->nombre_archivo, 'registrarServices', 'IME', '');
        $this->respuesta->setDatos($str);
        return $this->respuesta;
        //return $json;
    }

    function ProcesarC31($id_service_request , $id_adq, $valor, $estado_c31) {
        $momento = $this->objParam->getParametro('momento');

        //var_dump('ProcesarC31a',$estado_c31, $momento);exit;
        //$valor = 2;
        $x = 0;

        if($valor != 2){
            $this->actualizaEstados('procesando', $id_service_request, '','', $id_adq);
        }else{
            $x = 2;
        }
        //var_dump('procesar Entrega',$estado_c31, $momento);exit;
        $response_status = true;
        $pxpRestClient = PxpRestClient2::connect('172.17.58.62', 'kerp/pxp/lib/rest/')->setCredentialsPxp('admin','admin');//10.150.0.90
        //while($x <= $valor) {
        while($response_status) {

            //sleep(2);
            $variable = $pxpRestClient->doPost('sigep/SigepServiceRequest/procesarServices',
                array(
                    "user" => 'admin',
                    "estado_c31" => $estado_c31,
                    "momento" => $momento
                )
            );
            $resul = json_decode($variable,true);//var_dump('VARIABLE ANTES: ',$variable,$resul['ROOT']['datos'], $variable);exit;
            $str = new stdClass();
            $str->resultado = "" . $resul . "";
            $x ++;

            $next = json_decode($resul['ROOT']['datos']['end_process']);
            if( $next ){
                $response_status = $next;
                //var_dump('VARIABLE: ',$resul['ROOT']['datos'], $response_status, gettype($response_status));//exit;
            }else{
                $response_status = false;
            }
        }
        $this->respuesta = new Mensaje();
        $this->respuesta->setMensaje('EXITO', $this->nombre_archivo, 'Procesamiento exitoso ERP', 'Procesamiento exitoso ERP', 'modelo', $this->nombre_archivo, 'procesarServices', 'IME', '');
        $this->respuesta->setDatos($str);
        return $this->respuesta;
    }
    function StatusC31 (){


        $id_service_request = $this->objParam->getParametro('id_service_request');
        $service_code = $this->objParam->getParametro('service_code');
        $id_adq = $this->objParam->getParametro('id_sigep_adq');
        $id_int_comprobante = $this->objParam->getParametro('id_int_comprobante');
        $id_entrega = $this->objParam->getParametro('id_entrega');
        $tipo = $this->objParam->getParametro('tipo');


        /*begin franklin.espinoza 21/09/2020*/
        $cone = new conexion();
        $link = $cone->conectarpdo();
        if ($tipo == 'entrega'){
            $sql = "UPDATE  conta.tentrega SET
                      id_service_request = " . $id_service_request . "
                    WHERE id_entrega = " . $id_entrega;
        }else {
            $sql = "UPDATE  conta.tint_comprobante SET
                      id_service_request = " . $id_service_request . "
                    WHERE id_int_comprobante = " . $id_int_comprobante;
        }

        $stmt = $link->prepare($sql);
        $stmt->execute();
        /*end franklin.espinoza 21/09/2020*/

        $pxpRestClient = PxpRestClient2::connect('172.17.58.62', 'kerp/pxp/lib/rest/')->setCredentialsPxp('admin','admin');

        $variable = $pxpRestClient->doPost('sigep/ServiceRequest/getServiceStatus',
            array(	"id_service_request"=>''.$id_service_request.''
            ));
        $result= json_decode($variable, true);

        /*franklin.espinoza 16/09/2020 actualizar id_service_request*/

        //var_dump('status', $result['ROOT']['datos']['status']);
        if($result['ROOT']['datos']['status'] == 'success' || $result['ROOT']['datos']['status'] == 'pending'){
            $resp = $result['ROOT']['datos']['status'];
            if($service_code == 'PREVE'){

                $id_sigep_adq = $this->objParam->getParametro('id_sigep_adq');
                $nro_preventivo = $result['ROOT']['datos']['output']['nroPreventivo'];
                //var_dump('finalizado nro:', $id_beneficiario);

                $str = new stdClass();
                $str->nro_preventivo = "" . $nro_preventivo . "";
                $str->id_sigep_adq = "" . $id_sigep_adq . "";

                $this->actualizaEstados('finalizado', $id_service_request, $nro_preventivo, $resp, $id_adq);

            }elseif($service_code == 'COMPRDEVEN'){
                //IMPLEMENTAR RESULTADO COMPROMETIDO-DEVENGADO
                $id_sigep_adq = $this->objParam->getParametro('id_sigep_adq');
                $nro_comprometido = $result['ROOT']['datos']['output']['nroCompromiso'];
                $nro_devengado = $result['ROOT']['datos']['output']['nroDevengado'];

                $str = new stdClass();
                $str->nro_comprometido = "" . $nro_comprometido . "";
                $str->nro_devengado = "" . $nro_devengado . "";
                $str->id_sigep_adq = "" . $id_sigep_adq . "";
                $str->service_code = "" . $service_code . "";

                $this->actualizaEstadosC('finalizado', $id_service_request, $nro_comprometido, $nro_devengado, $resp, $id_adq);
            }elseif($service_code == 'CON_IMPUTACION_M' || $service_code == 'CON_IMPUTACION' || $service_code == 'SIN_IMPUTACION' || $service_code == 'SIN_IMPUTACION_CP' || $service_code == 'CON_IMPUTACION_V' || $service_code == 'REGULARIZAC' || $service_code == 'REGULARIZAS' || $service_code == 'REGULARIZAC_REV' || $service_code == 'REGULARIZAS_REV' || $service_code == 'CON_IMPUTACION_REV'){
                $id_sigep_adq = $this->objParam->getParametro('id_sigep_adq');
                $nro_preventivo = $result['ROOT']['datos']['output']['nroPreventivo'];
                $nro_comprometido = $result['ROOT']['datos']['output']['nroCompromiso'];
                $nro_devengado = $result['ROOT']['datos']['output']['nroDevengado'];

                /*begin franklin.espinoza 21/09/2020 update c31*/
                if($service_code == 'CON_IMPUTACION' || $service_code == 'CON_IMPUTACION_REV') {
                    $nro_documento = $nro_preventivo.','.$nro_comprometido;
                }

                if( $service_code == 'REGULARIZAC' || $service_code == 'REGULARIZAC_REV' ){
                    $sql = "UPDATE  conta.tentrega SET
                            c31 = 'CIP " . $nro_preventivo . "'
                            WHERE id_entrega = " . $id_entrega;
                }else if($service_code == 'CON_IMPUTACION' || $service_code == 'CON_IMPUTACION_REV') {
                    $sql = "UPDATE  conta.tentrega SET
                            c31 = 'CIP " . $nro_documento . "'
                            WHERE id_entrega = " . $id_entrega;
                }else{
                    $sql = "UPDATE  conta.tentrega SET
                            c31 = 'SIP " . $nro_devengado . "'
                            WHERE id_entrega = " . $id_entrega;
                }

                $stmt = $link->prepare($sql);
                $stmt->execute();
                /*end franklin.espinoza 21/09/2020*/

                $str = new stdClass();
                $str->nro_preventivo = "" . $nro_preventivo . "";
                $str->nro_comprometido = "" . $nro_comprometido . "";
                $str->nro_devengado = "" . $nro_devengado . "";
                $str->id_sigep_adq = "" . $id_sigep_adq . "";
                $str->service_code = "" . $service_code . "";
                $str->id_service_request = "" . $id_service_request . "";

                $this->actualizaEstadosC('finalizado', $id_service_request, $nro_comprometido, $nro_devengado, $resp, $id_adq);
            }else{
                $id_proveedor = $this->objParam->getParametro('id_proveedor');
                $id_beneficiario = $result['ROOT']['datos']['output']['beneficiario'];
                $razon_social = $result['ROOT']['datos']['output']['razonSocial'];
                //var_dump('finalizado nro:', $id_beneficiario, $razon_social);exit;
                $str = new stdClass();
                $str->id_beneficiario = "" . $id_beneficiario . "";
                $str->razon_social = "" . $razon_social . "";
                $str->id_proveedor = "" . $id_proveedor . "";
            }

        }else{

            $error = $result['ROOT']['datos']['last_message'];
            $error = str_replace("MENSAJE:","", $error);
            $error = str_replace("CAUSA:","", $error);
            $error = str_replace("ACCION: ","", $error);
            //var_dump('finalizado nro:', $id_beneficiario);
            $str = new stdClass();
            $str->error = "" . $error . "";
            $str->id_service_request = "" . $id_service_request . "";

            $this->actualizaError('error', $id_service_request, $error, $id_adq);
        }

        $this->respuesta = new Mensaje();
        $this->respuesta->setMensaje('EXITO', $this->nombre_archivo, 'Procesamiento exitoso ', 'Procesamiento exitoso ', 'modelo', $this->nombre_archivo, 'procesarServices', 'IME', '');
        $this->respuesta->setDatos($str);
        return $this->respuesta;
    }

    function StatusPassC31 (){


        $id_service_request = $this->objParam->getParametro('id_service_request');
        $id_entrega = $this->objParam->getParametro('id_entrega');
        $tipo = $this->objParam->getParametro('tipo');

        $pxpRestClient = PxpRestClient2::connect('172.17.58.62', 'kerp/pxp/lib/rest/')->setCredentialsPxp('admin','admin');

        $variable = $pxpRestClient->doPost('sigep/ServiceRequest/getServiceStatus',
            array(	"id_service_request"=>''.$id_service_request.''
            ));
        $result= json_decode($variable, true);

        if($result['ROOT']['datos']['status'] == 'success' || $result['ROOT']['datos']['status'] == 'pending'){
            $resp = $result['ROOT']['datos'];

            $str = new stdClass();
            $str->resultado_pass = $resp;
            /*$nro_preventivo = $result['ROOT']['datos']['output']['nroPreventivo'];
            $nro_comprometido = $result['ROOT']['datos']['output']['nroCompromiso'];
            $nro_devengado = $result['ROOT']['datos']['output']['nroDevengado'];*/
        }else{

            $error = $result['ROOT']['datos']['last_message'];
            $error = str_replace("MENSAJE:","", $error);
            $error = str_replace("CAUSA:","", $error);
            $error = str_replace("ACCION: ","", $error);
            $str = new stdClass();
            $str->error = "" . $error . "";
            $str->id_service_request = "" . $id_service_request . "";

        }

        $this->respuesta = new Mensaje();
        $this->respuesta->setMensaje('EXITO', $this->nombre_archivo, 'Procesamiento exitoso ', 'Procesamiento exitoso ', 'modelo', $this->nombre_archivo, 'procesarServices', 'IME', '');
        $this->respuesta->setDatos($str);
        return $this->respuesta;
    }

    function registrarPreventivo(){

        //var_dump('finalizado nro proveedor:',$id_proveedor);

        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_REG_PREVE';
        $this->tipo_procedimiento='IME';

        //Define los parametros para la funcion
        $this->setParametro('id_sigep_adq','id_sigep_adq','int4');
        $this->setParametro('nro_preventivo','nro_preventivo','varchar');

        $this->armarConsulta();
        $this->ejecutarConsulta();

        //Devuelve la respuesta
        //var_dump('consulta benef:',$this->respuesta);
        return $this->respuesta;
    }
    function registrarComprometidoDevengado(){

        //var_dump('finalizado nro proveedor:',$id_proveedor);

        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_COMPRODEVEN';
        $this->tipo_procedimiento='IME';

        //Define los parametros para la funcion
        $this->setParametro('id_sigep_adq','id_sigep_adq','int4');
        $this->setParametro('nro_comprometido','nro_comprometido','varchar');
        $this->setParametro('nro_devengado','nro_devengado','varchar');

        $this->armarConsulta();
        $this->ejecutarConsulta();

        //Devuelve la respuesta
        //var_dump('consulta benef:',$this->respuesta);
        return $this->respuesta;
    }
    function registrarResultado(){

        //var_dump('finalizado nro proveedor:',$id_proveedor);

        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_RESP';
        $this->tipo_procedimiento='IME';

        //Define los parametros para la funcion
        $this->setParametro('id_sigep_adq','id_sigep_adq','int4');
        $this->setParametro('nro_preventivo','nro_preventivo','varchar');
        $this->setParametro('nro_comprometido','nro_comprometido','varchar');
        $this->setParametro('nro_devengado','nro_devengado','varchar');

        $this->armarConsulta();
        $this->ejecutarConsulta();

        //Devuelve la respuesta
        //var_dump('consulta benef:',$this->respuesta);
        return $this->respuesta;
    }
    function actualizaEstados($estado, $dato, $preve, $mensaje, $valor) {
        if ($preve == ''){
            $preve = null;
        }
        $cone = new conexion();
        $link = $cone->conectarpdo();
        //var_dump('actualizaEstadoERP:', $estado, $dato, $preve, $mensaje, $valor);
        $sql = "UPDATE  sigep.tsigep_adq
                SET estado = '".$estado."',
                  id_service_request = ".$dato.",
                  nro_preventivo = ".$preve."::integer,
                  ultimo_mensaje = '".$mensaje."'
                WHERE id_sigep_adq =$valor";

        $stmt = $link->prepare($sql);
        //var_dump('actualizaEstadoERP:', $stmt);
        $stmt->execute();
        //var_dump('actualizaEstadoERP:', $stmt);

    }

    function actualizaEstadosC($estado, $dato, $compro, $deven, $mensaje, $valor) {
        $cone = new conexion();
        $link = $cone->conectarpdo();
        //var_dump('actualizaEstadoC:', $estado, $dato, $compro, $deven, $mensaje, $valor);
        $sql = "UPDATE  sigep.tsigep_adq
                SET estado = '".$estado."',
                  id_service_request = ".$dato.",
                  nro_comprometido = ".$compro."::integer,
                  nro_devengado = ".$deven."::integer,
                  ultimo_mensaje = '".$mensaje."'
                WHERE id_sigep_adq =$valor";

        $stmt = $link->prepare($sql);
        //var_dump('actualizaEstadoERP:', $stmt);
        $stmt->execute();
        //var_dump('actualizaEstadoERP:', $stmt);
    }

    function consultaBeneficiario(){

        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_BENEF';
        $this->tipo_procedimiento='IME';

        //Define los parametros para la funcion
        $this->setParametro('id_proveedor','id_proveedor','int4');



        $this->armarConsulta();
        $this->ejecutarConsulta();

        //var_dump('consulta benef:',$this->respuesta);
        return $this->respuesta;
    }
    function registrarBeneficiario(){

        //var_dump('finalizado nro proveedor:',$id_proveedor);

        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_REG_BENEF';
        $this->tipo_procedimiento='IME';

        //Define los parametros para la funcion
        $this->setParametro('id_proveedor','id_proveedor','int4');
        $this->setParametro('id_beneficiario','id_beneficiario','varchar');
        $this->setParametro('razon_social_sigep','razon_social_sigep','varchar');

        $this->armarConsulta();
        $this->ejecutarConsulta();

        //Devuelve la respuesta
        //var_dump('consulta benef:',$this->respuesta);
        return $this->respuesta;
    }
    function actualizaError($estado, $dato, $mensaje, $valor) {
        $cone = new conexion();
        $link = $cone->conectarpdo();
        //var_dump('actualizaEstadoERP:', $estado, $dato, $preve, $mensaje, $valor);
        $sql = "UPDATE  sigep.tsigep_adq
                SET estado = '".$estado."',
                  id_service_request = ".$dato.",
                  ultimo_mensaje = '".$mensaje."'
                WHERE id_sigep_adq =$valor";

        $stmt = $link->prepare($sql);
        //var_dump('actualizaEstadoERP:', $stmt);
        $stmt->execute($data);
        //var_dump('actualizaEstadoERP:', $stmt);
    }
    function resultadoMsg(){

        $this->procedimiento='sigep.ft_sigep_adq_ime';
        $this->transaccion='SIGEP_RESULT';
        $this->tipo_procedimiento='IME';
        $this->arreglo['ids_input'] = $this->objParam->getParametro('ids');
        //var_dump('valores:', $this->arreglo['ids_input']);
        //Define los parametros para la funcion
        //$this->setParametro('id_proveedor','id_proveedor','int4');
        $this->setParametro('ids','ids','text');

        $this->armarConsulta();
        $this->ejecutarConsulta();

        return $this->respuesta;
    }
    function consultaDelete(){

        $this->procedimiento='sigep.ft_sigep_adq_sel';
        $this->transaccion='SIGEP_DEL';
        $this->tipo_procedimiento='SEL';
        $this->count=false;

        //Define los parametros para la funcion
        $this->setParametro('id_int_comprobante','id_int_comprobante','int4');

        $this->captura('id_service_request','varchar');
        $this->captura('nro_preventivo','int4');
        $this->captura('nro_comprometido','int4');
        $this->captura('nro_devengado','int4');
        $this->captura('gestion','int4');
        //$this->captura('total','numeric');


        $this->armarConsulta();//var_dump($this->consulta);exit;
        $this->ejecutarConsulta();

        //var_dump('consulta preventivo:',$this->respuesta);exit;
        return $this->respuesta;
    }

    /*{developer: franklin.espinoza, date:27/08/20202, description: "Aprobar C31 Sistema Sigep"}*/
    function aprobarC31 (){

        $id_service_request = $this->objParam->getParametro('id_service_request');
        $service_code = $this->objParam->getParametro('service_code');

        $pxpRestClient = PxpRestClient2::connect('172.17.58.62', 'kerp/pxp/lib/rest/')->setCredentialsPxp('admin','admin');

        $variable = $pxpRestClient->doPost('sigep/ServiceRequest/processSingleService',
            array(
                "id_service_request" => $id_service_request,
                "service_code" => $service_code
            )
        );
        $result= json_decode($variable, true);


        $this->respuesta = new Mensaje();
        $this->respuesta->setMensaje('EXITO', $this->nombre_archivo, 'Procesamiento exitoso ', 'Procesamiento exitoso ', 'modelo', $this->nombre_archivo, 'procesarServices', 'IME', '');
        $this->respuesta->setDatos($result);
        return $this->respuesta;
    }

    /*{developer: franklin.espinoza, date:27/08/20202, description: "Firmar C31 Sistema Sigep"}*/
    function firmarC31 (){

        $id_service_request = $this->objParam->getParametro('id_service_request');
        $service_code = $this->objParam->getParametro('service_code');

        $pxpRestClient = PxpRestClient2::connect('172.17.58.62', 'kerp/pxp/lib/rest/')->setCredentialsPxp('admin','admin');

        $variable = $pxpRestClient->doPost('sigep/ServiceRequest/processSingleService',
            array(
                "id_service_request" => $id_service_request,
                "service_code" => $service_code
            )
        );
        $result= json_decode($variable, true);

        $this->respuesta = new Mensaje();
        $this->respuesta->setMensaje('EXITO', $this->nombre_archivo, 'Procesamiento exitoso ', 'Procesamiento exitoso ', 'modelo', $this->nombre_archivo, 'procesarServices', 'IME', '');
        $this->respuesta->setDatos($result);
        return $this->respuesta;
    }

}
?>