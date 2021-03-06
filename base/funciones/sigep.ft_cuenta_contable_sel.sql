CREATE OR REPLACE FUNCTION sigep.ft_cuenta_contable_sel (
  p_administrador integer,
  p_id_usuario integer,
  p_tabla varchar,
  p_transaccion varchar
)
RETURNS varchar AS
$body$
/**************************************************************************
 SISTEMA:		Integracion SIGEP
 FUNCION: 		sigep.ft_cuenta_contable_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'sigep.tcuenta_contable'
 AUTOR: 		 (franklin.espinoza)
 FECHA:	        07-09-2017 16:53:56
 COMENTARIOS:
***************************************************************************
 HISTORIAL DE MODIFICACIONES:

 DESCRIPCION:
 AUTOR:
 FECHA:
***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;

BEGIN

	v_nombre_funcion = 'sigep.ft_cuenta_contable_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************
 	#TRANSACCION:  'SIGEP_CUE_CONT_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		franklin.espinoza
 	#FECHA:		07-09-2017 16:53:56
	***********************************/

	if(p_transaccion='SIGEP_CUE_CONT_SEL')then

    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						cue_cont.id_cuenta_contable,
						cue_cont.des_cuenta_contable,
						cue_cont.cuenta_contable,
						cue_cont.imputable,
						cue_cont.id_cuenta,
						cue_cont.estado_reg,
						cue_cont.id_gestion,
						cue_cont.modelo_contable,
						cue_cont.id_usuario_ai,
						cue_cont.id_usuario_reg,
						cue_cont.fecha_reg,
						cue_cont.usuario_ai,
						cue_cont.id_usuario_mod,
						cue_cont.fecha_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod,
                        (''(''||tc.nro_cuenta||'') - ''||tc.nombre_cuenta)::varchar as desc_cuenta,
                        tg.gestion
						from sigep.tcuenta_contable cue_cont
						inner join segu.tusuario usu1 on usu1.id_usuario = cue_cont.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = cue_cont.id_usuario_mod
                        left join conta.tcuenta tc on tc.id_cuenta = cue_cont.id_cuenta
                        inner join param.tgestion tg on tg.id_gestion = cue_cont.id_gestion
				        where  ';

			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;

		end;

	/*********************************
 	#TRANSACCION:  'SIGEP_CUE_CONT_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		franklin.espinoza
 	#FECHA:		07-09-2017 16:53:56
	***********************************/

	elsif(p_transaccion='SIGEP_CUE_CONT_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_cuenta_contable)
					    from sigep.tcuenta_contable cue_cont
					    inner join segu.tusuario usu1 on usu1.id_usuario = cue_cont.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = cue_cont.id_usuario_mod
                        left join conta.tcuenta tc on tc.id_cuenta = cue_cont.id_cuenta
                        inner join param.tgestion tg on tg.id_gestion = cue_cont.id_gestion
					    where ';

			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;

			--Devuelve la respuesta
			return v_consulta;

		end;

	else

		raise exception 'Transaccion inexistente';

	end if;

EXCEPTION

	WHEN OTHERS THEN
			v_resp='';
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje',SQLERRM);
			v_resp = pxp.f_agrega_clave(v_resp,'codigo_error',SQLSTATE);
			v_resp = pxp.f_agrega_clave(v_resp,'procedimientos',v_nombre_funcion);
			raise exception '%',v_resp;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
CALLED ON NULL INPUT
SECURITY INVOKER
COST 100;