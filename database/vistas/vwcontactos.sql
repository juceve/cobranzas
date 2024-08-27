CREATE VIEW vwcontactos AS
SELECT cc.*,  ld.deuda_id, cp.id compromisopago_id, d.deudore_id, pa.id pago_id, e.id empresa_id,e.nombre empresa FROM contactos cc
LEFT JOIN compromisopagos cp ON cc.id=cp.contacto_id
LEFT JOIN pagos pa ON pa.compromisopago_id=cp.id
INNER JOIN lotedeudas ld ON ld.id=cc.lotedeuda_id
INNER JOIN deudas d ON d.id=p.deuda_id
INNER JOIN deudores de ON de.id=d.deudore_id
INNER JOIN empresas e ON e.id=de.empresa_id
