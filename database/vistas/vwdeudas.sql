CREATE VIEW vwdeudas AS
SELECT de.*, d.empresa_id, e.nombre empresa,d.codigocliente codigocliente FROM deudas de
INNER JOIN deudores d ON d.id = de.deudore_id
INNER JOIN empresas e ON e.id =d.empresa_id