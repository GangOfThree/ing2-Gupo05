CREATE EVENT finalizar_subastas
ON SCHEDULE
EVERY 1 DAY
DO
	UPDATE subasta
	SET Activo=0
	WHERE Activo=1 and Fec_fin < current_date();