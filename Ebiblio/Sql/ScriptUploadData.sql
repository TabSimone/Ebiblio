use ebiblio;
-- Script per caricamento dati nel database

SET SQL_SAFE_UPDATES=0;

LOAD DATA INFILE "./UploadFile/Autore.txt" 
INTO TABLE autore
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "./UploadFile/Biblioteche.txt" 
INTO TABLE biblioteca
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "./UploadFile/Ebook.txt" 
INTO TABLE ebook
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "./UploadFile/Libro.txt" 
INTO TABLE libro
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "./UploadFile/Libro_Cartaceo.txt" 
INTO TABLE librocartaceo
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "./UploadFile/PostiLettura.txt" 
INTO TABLE postolettura
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "./UploadFile/Utente.txt" 
INTO TABLE utente
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(Email,Cognome,Nome,RecapitoTelefonico,Password,@DataNascita,LuogoNascita)
set DataNascita = STR_TO_DATE(@DataNascita,'%d/%m/%Y');

LOAD DATA INFILE "./UploadFile/Utente_Utilizzatore.txt" 
INTO TABLE utilizzatore
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(EmailUtilizzatore,Professione,StatoAccount,@DataCreazioneAccount)
set DataCreazioneAccount = STR_TO_DATE(@DataCreazioneAccount,'%d/%m/%Y');

LOAD DATA INFILE "./UploadFile/consegna.txt" 
INTO TABLE consegna
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(Tipo,Note,EmailVolontario,CodicePrenotazioneLibro,@Data)
set Data = STR_TO_DATE(@Data,'%d/%m/%Y');


LOAD DATA INFILE "./UploadFile/Utente_Volontario.txt" 
INTO TABLE volontario
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "./UploadFile/prenotazione_libro_cartaceo.txt" 
INTO TABLE prenotazione_libro_cartaceo
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(@DataAvvio,Codice,@DataFine,EmailUtilizzatore,CodiceLibro)
set
DataAvvio = STR_TO_DATE(@DataAvvio,'%d/%m/%Y'),
DataFine = STR_TO_DATE(@DataFine,'%d/%m/%Y');
 
 LOAD DATA INFILE "./UploadFile/Utente_Amministratore.txt" 
INTO TABLE amministratore
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES; 

LOAD DATA INFILE "./UploadFile/prenotazione_posto.txt" 
INTO TABLE prenotazione_posto
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE "./UploadFile/Messaggio.txt" 
INTO TABLE messaggio
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(Titolo,Testo,@DataInvio,EmailAmministratore,EmailUtilizzatore)
set Data = STR_TO_DATE(@DataInvio,'%d/%m/%Y');


 #SET SQL_SAFE_UPDATES=1; . 



