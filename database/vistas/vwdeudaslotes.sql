CREATE VIEW vwdeudaslotes AS
SELECT de.*, d.empresa_id, e.nombre empresa,d.codigocliente codigocliente,(SELECT finalizado FROM lotedeudas WHERE deuda_id=de.id ORDER BY lotedeudas.id DESC LIMIT 1) AS finalizado FROM deudas de
INNER JOIN deudores d ON d.id = de.deudore_id
INNER JOIN empresas e ON e.id =d.empresa_id
HAVING finalizado = 1
OR finalizado IS NULL