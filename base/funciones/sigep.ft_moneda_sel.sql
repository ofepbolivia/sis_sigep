CREATE OR REPLACE FUNCTION sigep.ft_moneda_sel (
  p_administrador integer,
  p_id_usuario integer,
  p_tabla varchar,
  p_transaccion varchar
)
RETURNS varchar AS
$body$
/**************************************************************************
 SISTEMA:		Integracion SIGEP
 FUNCION: 		sigep.ft_moneda_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'sigep.tmoneda'
 AUTOR: 		 (franklin.espinoza)
 FECHA:	        07-09-2017 16:21:25
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

	v_nombre_funcion = 'sigep.ft_moneda_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************
 	#TRANSACCION:  'SIGEP_MONEDA_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		franklin.espinoza
 	#FECHA:		07-09-2017 16:21:25
	***********************************/

	if(p_transaccion='SIGEP_MONEDA_SEL')then

    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						moneda.id_moneda_boa,
						moneda.moneda,
                        moneda.pais,
						moneda.id_moneda,
						moneda.desc_moneda,
						moneda.estado_reg,
						moneda.id_usuario_ai,
						moneda.id_usuario_reg,
						moneda.fecha_reg,
						moneda.usuario_ai,
						moneda.fecha_mod,
						moneda.id_usuario_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod,
                        (''(''||tm.codigo||'') - ''||tm.moneda)::varchar as desc_mon

						from sigep.tmoneda moneda
						inner join segu.tusuario usu1 on usu1.id_usuario = moneda.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = moneda.id_usuario_mod
                        left join param.tmoneda tm on tm.id_moneda = moneda.id_moneda
				        where  ';

			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;

		end;

	/*********************************
 	#TRANSACCION:  'SIGEP_MONEDA_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		franklin.espinoza
 	#FECHA:		07-09-2017 16:21:25
	***********************************/

	elsif(p_transaccion='SIGEP_MONEDA_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_moneda_boa)
					    from sigep.tmoneda moneda
					    inner join segu.tusuario usu1 on usu1.id_usuario = moneda.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = moneda.id_usuario_mod
                        left join param.tmoneda tm on tm.id_moneda = moneda.id_moneda
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
PARALLEL UNSAFE
COST 100;
