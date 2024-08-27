CREATE VIEW vwpagos AS
SELECT p.*, cp.contacto_id, cc.lotedeuda_id,ld.deuda_id deuda_id_inicial, d.deudore_id, e.id empresa_id,e.nombre empresa FROM pagos p
INNER JOIN compromisopagos cp ON cp.id=p.compromisopago_id
INNER JOIN contactos cc ON cc.id=cp.contacto_id
INNER JOIN lotedeudas ld ON ld.id=cc.lotedeuda_id
INNER JOIN deudas d ON d.id=p.deuda_id
INNER JOIN deudores de ON de.id=d.deudore_id
INNER JOIN empresas e ON e.id=de.empresa_id
