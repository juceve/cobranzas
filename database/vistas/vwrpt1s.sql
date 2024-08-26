CREATE VIEW vwrpt1s AS
SELECT u.id user_id, 
(SELECT COUNT(*) FROM lotedeudas ld INNER JOIN lotes l ON l.id = ld.lote_id WHERE ld.finalizado = 0 AND l.user_id=u.id) cantdeudas,
(SELECT COUNT(*) FROM pagos WHERE user_id=u.id) cantpagos,
(SELECT COUNT(*) FROM recordatorios WHERE user_id=u.id AND atendido=0) cantrecordatorios,
(SELECT COUNT(*) FROM compromisopagos WHERE user_id=u.id AND contactado=0) cantcompromisos
FROM users u
GROUP BY u.id