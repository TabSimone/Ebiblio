DROP DATABASE IF EXISTS EBIBLIO;
CREATE DATABASE EBIBLIO;

USE EBIBLIO;

CREATE TABLE `Utente` (
	Email VARCHAR(50) PRIMARY KEY,
	Cognome VARCHAR(50),
    Nome VARCHAR(50),
    RecapitoTelefonico VARCHAR(50),
    Password VARCHAR(50),
    DataNascita DATE,
    LuogoNascita VARCHAR(50)
)
ENGINE=InnoDB
;

CREATE TABLE `Volontario` (
	EmailVolontario VARCHAR(50) PRIMARY KEY REFERENCES Utente(Email),
	MezzoTrasporto VARCHAR(50)
)
ENGINE=InnoDB
;

CREATE TABLE `Amministratore` (
	EmailAmministratore VARCHAR(50) PRIMARY KEY REFERENCES Utente(Email),
	CodiceBiblioteca VARCHAR(50) REFERENCES Biblioteca(Codice),
	Qualifica VARCHAR(50)
)
ENGINE=InnoDB
;

CREATE TABLE `Utilizzatore` (
	EmailUtilizzatore VARCHAR(100) PRIMARY KEY REFERENCES Utente(Email),
	Professione VARCHAR(50),
    StatoAccount VARCHAR(50),
    DataCreazioneAccount DATE
)
ENGINE=InnoDB
;

CREATE TABLE `Consegna` (
	Data DATE,
    Tipo VARCHAR(50),
    Note VARCHAR(50),
	EmailVolontario VARCHAR(50) REFERENCES Volontario(EmailVolontario),
    CodicePrenotazioneLibro INT REFERENCES prenotazione_libro_cartaceo(Codice),
    PRIMARY KEY (CodicePrenotazioneLibro)
)
ENGINE=InnoDB
;

CREATE TABLE `Segnalazione` (
	Data DATE,
    Nota VARCHAR(50),
    EmailAmministratore VARCHAR(50) REFERENCES Amministratore(EmailAmministratore),
    EmailUtilizzatore VARCHAR(50) REFERENCES Utilizzatore(EmailUtilizzatore),
    PRIMARY KEY (Data , EmailAmministratore, EmailUtilizzatore)
)
ENGINE=InnoDB
;

CREATE TABLE `Messaggio` (
	Titolo VARCHAR(50),
    Testo VARCHAR(50),
    Data DATE,
    EmailAmministratore VARCHAR(50) REFERENCES Amministratore(EmailAmministratore),
    EmailUtilizzatore VARCHAR(50) REFERENCES Utilizzatore(EmailUtilizzatore),
    PRIMARY KEY (Data , EmailAmministratore, EmailUtilizzatore)
)
ENGINE=InnoDB
;

CREATE TABLE `Biblioteca` (
	Codice VARCHAR(50) NOT NULL,
	Nome VARCHAR(200),    
    Email VARCHAR(50),
    NoteStoriche VARCHAR(50),
    Indirizzo VARCHAR(100),
    Longitudine VARCHAR(50),
    Latitudine VARCHAR(50),
    SitoWeb VARCHAR(100),
    PRIMARY KEY (Codice),
    NumPosti Int    
)
ENGINE=InnoDB
;

CREATE TABLE `Immagine` (
	Nome VARCHAR(50) REFERENCES Amministratore(EmailAmministratore),
    CodiceBiblioteca VARCHAR(50) REFERENCES Biblioteca(Codice),
    PRIMARY KEY (Nome, CodiceBiblioteca)
)
ENGINE=InnoDB
;

CREATE TABLE `Telefono` (
	Numero INT,
    CodiceBiblioteca VARCHAR(50) REFERENCES Biblioteca(Codice),
    PRIMARY KEY (Numero, CodiceBiblioteca)
)
ENGINE=InnoDB
;

CREATE TABLE `PostoLettura` (
	CodiceBiblioteca VARCHAR(50) REFERENCES Biblioteca(Codice),
	Numero INT,
    PresaEthernet BOOL,
    PresaCorrente BOOL,
    PRIMARY KEY (CodiceBiblioteca)
)
ENGINE=InnoDB;

CREATE TABLE `Libro` (
	Codice INT NOT NULL AUTO_INCREMENT,
    Titolo VARCHAR(200),
    Genere VARCHAR(50),
    AnnoPubblicazione INT,
    NomeEdizione VARCHAR(50),
    CodiceBiblioteca VARCHAR(50) REFERENCES Biblioteca(Codice),
    PRIMARY KEY (Codice)
)
ENGINE=InnoDB
;

CREATE TABLE `Autore` (
	CodiceLibro INT PRIMARY KEY REFERENCES Libro(Codice),
    NomeAutore VARCHAR(50)
)
ENGINE=InnoDB
;

CREATE TABLE `LibroCartaceo` (
	NumeroPagine INT,
    NumeroScaffale INT,
    StatoPrestito VARCHAR(50),
    StatoConservazione VARCHAR(50),
    CodiceLibro INT PRIMARY KEY REFERENCES Libro(Codice)
)
ENGINE=InnoDB
;

CREATE TABLE `Ebook` (
	PDF VARCHAR(50),
    Dimensione VARCHAR(50),
    NumeroAccessi INT,
    CodiceLibro INT PRIMARY KEY REFERENCES Libro(Codice)
)
ENGINE=InnoDB
;

CREATE TABLE `Prenotazione_libro_cartaceo` (
	DataAvvio DATE,
    Codice INT NOT NULL AUTO_INCREMENT,
    DataFine DATE,
    EmailUtilizzatore VARCHAR(50) REFERENCES Utilizzatore(EmailUtilizzatore),
    CodiceLibro INT REFERENCES Libro(Codice),
	PRIMARY KEY (Codice)
)
ENGINE=InnoDB
;

CREATE TABLE `Prenotazione_Posto` (
	Data DATE,
    Orario INT,
    NumeroPosti INT,
    EmailUtilizzatore VARCHAR(50) REFERENCES Utilizzatore(EmailUtilizzatore),
    CodiceBiblioteca VARCHAR(50) REFERENCES Biblioteca(Codice),
    PRIMARY KEY (Data, Orario, CodiceBiblioteca, NumeroPosti)
)
ENGINE=InnoDB
;

CREATE TABLE `Accesso_Utente_Biblioteca` (
	CodiceBiblioteca VARCHAR(50) REFERENCES Biblioteca(Codice),
    EmailUtente VARCHAR(50) REFERENCES Utilizzatore(EmailUtilizzatore),
    PRIMARY KEY (EmailUtente, CodiceBiblioteca)
)
ENGINE=InnoDB
;

CREATE TABLE `Accesso_Utilizzatore_Ebook` (
	CodiceEbook INT REFERENCES Ebook(CodiceLibro),
    EmailUtilizzatore VARCHAR(50) REFERENCES Utilizzatore(EmailUtilizzatore),
    Codice INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (Codice)
)
ENGINE=InnoDB
;




####################################################################################################
#Stored Procedure
# REGISTRAZIONE UTILIZZATORE
DELIMITER $
CREATE PROCEDURE RegistrazioneUtilizzatore(IN Email VARCHAR(50),IN Cognome VARCHAR(50),IN Nome VARCHAR(50), IN Telefono VARCHAR(14), IN Password VARCHAR(50), IN DataNascita DATE,   IN LuogoNascita VARCHAR(50), IN Professione VARCHAR(250), IN StatoAccount VARCHAR(30), IN DataCreazioneAccount DATE)
BEGIN
	START TRANSACTION;
		INSERT INTO utente (Email, Cognome,Nome,RecapitoTelefonico,Password,DataNascita,LuogoNascita) VAlUES (Email,Cognome, Nome,Telefono, Password,DataNascita,  LuogoNascita   );
        INSERT INTO utilizzatore (EmailUtilizzatore, Professione, StatoAccount,  DataCreazioneAccount) VAlUES (Email, Professione, StatoAccount, DataCreazioneAccount);
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

# REGISTRAZIONE VOLOTNARIO
DELIMITER $
CREATE PROCEDURE RegistrazioneVolontario(IN Email VARCHAR(50),IN Cognome VARCHAR(50),IN Nome VARCHAR(50), IN Telefono VARCHAR(14), IN Password VARCHAR(50), IN DataNascita DATE,   IN LuogoNascita VARCHAR(50), IN Mezzo VARCHAR(250))
BEGIN
	START TRANSACTION;
		INSERT INTO utente (Email, Cognome,Nome,RecapitoTelefonico,Password,DataNascita,LuogoNascita) VAlUES (Email,Cognome, Nome,Telefono, Password,DataNascita,  LuogoNascita   );
        INSERT INTO volontario (EmailVolontario,MezzoTrasporto) VAlUES (Email, Mezzo);
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

# REGISTRAZIONE AMMINISTRATORE
DELIMITER $
CREATE PROCEDURE RegistrazioneAmministratore(IN Email VARCHAR(50),IN Cognome VARCHAR(50),IN Nome VARCHAR(50), IN Telefono VARCHAR(14), IN Password VARCHAR(50), IN DataNascita DATE,   IN LuogoNascita VARCHAR(50), IN CodiceBiblioteca VARCHAR(50), IN Qualifica VARCHAR(50))
BEGIN
	START TRANSACTION;
		INSERT INTO utente VAlUES (Email,Cognome, Nome,Telefono, Password,DataNascita,  LuogoNascita   );
        INSERT INTO amministratore  VAlUES (Email, CodiceBiblioteca, Qualifica);
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

# Visualizzazione delle biblioteche presenti
DELIMITER $
CREATE PROCEDURE VisualizzaBibliotechePresenti()
BEGIN  
	SELECT Nome,Codice
    FROM biblioteca;
END $
DELIMITER ;
#_____________________________________________________________

# Visualizzazione dei posti lettura presenti in ogni biblioteca
DELIMITER $
CREATE PROCEDURE VisualizzaPostiLettura() 
BEGIN 
	SELECT Nome as NomeBiblioteca, Codice, NumPosti
    FROM biblioteca INNER JOIN postolettura ON Codice=CodiceBiblioteca   ;
END $
DELIMITER ;
#_____________________________________________________________

# Visualizzazione dei libri disponibili
DELIMITER $
CREATE PROCEDURE VisualizzaLibriDisponibili(In codiceBiblioteca VARCHAR(50)) 
BEGIN 
	SELECT Codice,Titolo,Genere,AnnoPubblicazione,NomeEdizione
    FROM libro INNER JOIN librocartaceo ON Codice=CodiceLibro
    WHERE StatoPrestito="Disponibile" and codiceBiblioteca=libro.CodiceBiblioteca;
END $
DELIMITER ;
#_____________________________________________________________

  
# Visualizzazione classifica delle biblioteche con postazioni letture meno utilizzate
DELIMITER $
CREATE PROCEDURE BiblioConPostLetturaMenoUtilizzate() 
BEGIN   
select CodiceBiblioteca, (ConteggioP/NumPosti) as Percentuale
	from biblioteca inner join (
    select CodiceBiblioteca, Count(*) as ConteggioP from prenotazione_posto
		group by CodiceBiblioteca
		order by ConteggioP desc) as t on Codice=CodiceBiblioteca
		order by Percentuale;
END $
DELIMITER ;
#_____________________________________________________________

# Visualizzazione dei volontari che che hanno effettuato più consegne
DELIMITER $
CREATE PROCEDURE VisualizzaVolontariConPiuConsegne() 
BEGIN 
	Select volontario.EmailVolontario, count(*) as NumConsegne
    FROM volontario inner join consegna on consegna.EmailVolontario = volontario.EmailVolontario
    group by volontario.EmailVolontario
    order by NumConsegne DESC
    limit 5;
END $
DELIMITER ;
#_____________________________________________________________

# Visualizzazione della classifica dei libri cartacei più prenotati
DELIMITER $
CREATE PROCEDURE VisualizzaLibriCartPiuPrenotati() 
BEGIN 
	Select libro.Codice,Titolo, count(*) as NumPrenotazioni
    FROM (libro INNER JOIN librocartaceo ON libro.Codice = librocartaceo.CodiceLibro)
		inner join prenotazione_libro_cartaceo on prenotazione_libro_cartaceo.CodiceLibro= libro.Codice
	group by libro.Codice
    order by NumPrenotazioni DESC
    limit 10;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizzare la classifica degli e-book più acceduti
DELIMITER $
CREATE PROCEDURE EbookPiuAcceduti() 
BEGIN 
	Select CodiceLibro,Titolo, NumeroAccessi
    FROM libro INNER JOIN ebook ON Codice = CodiceLibro
    order by NumeroAccessi DESC
    limit 10;
    
END $
#_____________________________________________________________

#Prenotazione Posto Lettura
DELIMITER $
CREATE PROCEDURE PrenotaPosto(IN Giorno DATE,IN Orario INT, IN NumeroPosti INT,IN EmailUtilizzatore VARCHAR(250), IN CodiceBiblioteca VARCHAR (50) )
#CREATE PROCEDURE PrenotaPosto(IN Inizio TIME)
BEGIN
	START TRANSACTION;
        INSERT INTO prenotazione_posto VALUES (Giorno, Orario, NumeroPosti, EmailUtilizzatore, CodiceBiblioteca);
        #INSERT INTO prenotazione_posto (OraInizio) VALUES (OraInizio);
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

#Prenotazione Libro Cartaceo
DELIMITER $
CREATE PROCEDURE PrenotaLibroCartaceo(IN GiornoInizio DATE, IN DataFine DATE, IN CodiceLibro INT,IN EmailUtilizzatore VARCHAR(250))
BEGIN	
		if exists(Select 1 From librocartaceo Where librocartaceo.CodiceLibro = CodiceLibro AND librocartaceo.StatoPrestito="Disponibile" AND librocartaceo.StatoConservazione !="Scadente") THEN
        INSERT INTO prenotazione_libro_cartaceo (DataAvvio,CodiceLibro,DataFine,EmailUtilizzatore) VALUES (GiornoInizio,CodiceLibro, DataFine,EmailUtilizzatore);        
        #UPDATE librocartaceo SET StatoPrestito = "Prenotato" WHERE librocartaceo.CodiceLibro = CodiceLibro;
        END IF;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizzazione Proprie Prenotazioni di libri
DELIMITER $
CREATE PROCEDURE VisualizzaPropriePrenotazioniDiLibri(IN EmailUtilizzatore VARCHAR(50))
BEGIN	
	Select prenotazione_libro_cartaceo.Codice as CodicePrenotazione, CodiceLibro, Titolo, DataAvvio, DataFine
    FROM prenotazione_libro_cartaceo inner join libro on libro.Codice=prenotazione_libro_cartaceo.CodiceLibro
    where EmailUtilizzatore=prenotazione_libro_cartaceo.EmailUtilizzatore;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizzazione Proprie Prenotazioni di posti lettura
DELIMITER $
CREATE PROCEDURE VisualizzaPropriePrenotazioniPostiLettura(IN EmailUtilizzatore VARCHAR(50))
BEGIN	
	Select Data, Orario, Nome,CodiceBiblioteca, NumeroPosti as NumeroPosto
    FROM prenotazione_posto inner join biblioteca on prenotazione_posto.CodiceBiblioteca=biblioteca.Codice
    where EmailUtilizzatore=prenotazione_posto.EmailUtilizzatore;    
END $
DELIMITER ;
#_____________________________________________________________

#Visualizza Ebook
DELIMITER $
CREATE PROCEDURE VisualizzaEbook(IN Codice VARCHAR(50), IN EmailUtilizzatore VARCHAR(50)) 

BEGIN 
	IF EXISTS (Select * FROM ebook WHERE ebook.codicelibro = Codice)
    THEN
    UPDATE EBOOK SET numeroaccessi = numeroaccessi + 1 where Codice= ebook.CodiceLibro;
    INSERT INTO accesso_utilizzatore_ebook(CodiceEbook, EmailUtilizzatore) VALUES (Codice, EmailUtilizzatore);
    SELECT PDF FROM ebook WHERE ebook.codicelibro = Codice;
    END IF;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizza eventi consegna
DELIMITER $
CREATE PROCEDURE VisualizzaEventiConsegna(IN EmailUtilizzatore VARCHAR(250)) 
BEGIN 
	Select Data,Tipo,Note,EmailVolontario,CodicePrenotazioneLibro
    FROM (consegna INNER JOIN prenotazione_libro_cartaceo ON CodicePrenotazioneLibro = Codice ) 
		inner join utilizzatore on prenotazione_libro_cartaceo.EmailUtilizzatore = utilizzatore.EmailUtilizzatore 
	Where EmailUtilizzatore = utilizzatore.EmailUtilizzatore;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizza tutte le prenotazioni della piattaforma
DELIMITER $
CREATE PROCEDURE VisualizzaTuttePrenotazioni() 
BEGIN 
	Select prenotazione_libro_cartaceo.Codice,CodiceLibro,biblioteca.Nome as NomeBiblioteca, EmailUtilizzatore, DataAvvio, DataFine
    FROM (prenotazione_libro_cartaceo inner join libro on CodiceLibro=libro.Codice) inner join biblioteca on libro.CodiceBiblioteca=biblioteca.Codice;
END $
DELIMITER ;
#_____________________________________________________________

#Inserimento Evento Consegna
DELIMITER $
CREATE PROCEDURE InserisciEventoConsegna(IN Data DATE,IN Tipo VARCHAR(100),IN Note VARCHAR(250),IN EmailVolontario VARCHAR(100), IN CodPrenotazioneLibro INT, IN DataFinale DATE) 
BEGIN 	
        #if exists(Select 1 From prenotazione_libro_cartaceo  Where prenotazione_libro_cartaceo.Codice = CodicePrenotazioneLibro ) THEN        
        INSERT INTO consegna VALUES (Data,Tipo,Note,EmailVolontario,CodPrenotazioneLibro); 
        update prenotazione_libro_cartaceo set prenotazione_libro_cartaceo.DataFine = DataFinale where  prenotazione_libro_cartaceo.Codice = CodPrenotazioneLibro;
        #END IF;   
END $
DELIMITER ;
#_____________________________________________________________

#Aggiornamento Evento Consegna
DELIMITER $
CREATE PROCEDURE AggiornaEventoConsegna(IN CodicePrenotazioneLibro_old INT,IN Data DATE,IN Tipo VARCHAR(100),IN Note VARCHAR(250),IN EmailVolontario VARCHAR(100)) 
BEGIN 
	START TRANSACTION;
        UPDATE consegna
		SET consegna.Data=Data,consegna.Tipo=Tipo,consegna.Note=Note,consegna.EmailVolontario=EmailVolontario
		WHERE CodicePrenotazioneLibro_old = consegna.CodicePrenotazioneLibro ; 
        update consegna set consegna.tipo = "Restituzione" where CodicePrenotazioneLibro = CodicePrenotazioneLibro_old;
   COMMIT;
END $
DELIMITER ;

#_____________________________________________________________

#Elimina Libro
DELIMITER $
CREATE PROCEDURE EliminaLibro(IN CodiceLibro INT) 
BEGIN 
	START TRANSACTION;
        DELETE FROM libro
		WHERE libro.Codice=CodiceLibro;
        DELETE FROM librocartaceo
		WHERE librocartaceo.CodiceLibro=CodiceLibro;
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

#Inserimento Libro
DELIMITER $
CREATE PROCEDURE InserisciLibro(IN Titolo VARCHAR(100),IN Genere VARCHAR(100),IN AnnoPubblicazione VARCHAR(100),IN NomeEdizione VARCHAR(100), IN CodiceBiblioteca VARCHAR(50),IN NumeroPagine INT,IN NumeroScaffale INT,IN StatoPrestito VARCHAR(50),IN StatoConservazione VARCHAR(50)) 
BEGIN 
	START TRANSACTION;
        INSERT INTO libro (Titolo,Genere,AnnoPubblicazione,NomeEdizione,CodiceBiblioteca) VALUES (Titolo,Genere,AnnoPubblicazione,NomeEdizione,CodiceBiblioteca);
        SELECT @cod := Codice FROM libro WHERE libro.Titolo = Titolo;
        INSERT INTO librocartaceo (NumeroPagine,NumeroScaffale,StatoPrestito,StatoConservazione,CodiceLibro) VALUES (NumeroPagine,NumeroScaffale,StatoPrestito,StatoConservazione,@cod);
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

#modifica Libro
DELIMITER $
CREATE PROCEDURE ModificaLibro(IN Codice INT,IN Titolo VARCHAR(100),IN Genere VARCHAR(100),IN AnnoPubblicazione VARCHAR(100),IN NomeEdizione VARCHAR(100), IN CodiceBiblioteca VARCHAR(50),IN NumeroPagine INT,IN NumeroScaffale INT,IN StatoPrestito VARCHAR(50),IN StatoConservazione VARCHAR(50)) 
BEGIN 
	START TRANSACTION;
        UPDATE libro
		SET libro.Titolo=Titolo,libro.Genere=Genere, libro.AnnoPubblicazione= AnnoPubblicazione,libro.NomeEdizione= NomeEdizione,libro.CodiceBiblioteca= CodiceBiblioteca
		WHERE Codice = libro.Codice;
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizza tutte le prenotazioni della piattaforma in una biblioteca
DELIMITER $
CREATE PROCEDURE VisualizzaTuttePrenotazioniDiUnaBiblio(IN CodiceBiblioteca VARCHAR(50) )
BEGIN 
	Select prenotazione_libro_cartaceo.Codice as CodicePrenotazione,CodiceLibro,EmailUtilizzatore,DataAvvio,DataFine
    FROM (prenotazione_libro_cartaceo inner join libro on CodiceLibro=libro.Codice) inner join biblioteca on libro.CodiceBiblioteca=biblioteca.Codice
    where CodiceBiblioteca =biblioteca.Codice;
END $
DELIMITER ;
#_____________________________________________________________

#Inserimento Messaggio per utilizzatore
DELIMITER $
CREATE PROCEDURE InviaMessaggio(IN Titolo VARCHAR(50),IN Testo VARCHAR(200),IN EmailAmministratore VARCHAR(100),IN EmailUtilizzatore VARCHAR(100)) 
BEGIN 
	START TRANSACTION;
        INSERT INTO messaggio VALUES (Titolo,Testo,CURDATE(),EmailAmministratore,EmailUtilizzatore);
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

#Inserimento SEgnalazione comportamento
DELIMITER $
CREATE PROCEDURE InsSegnalazione(IN Nota VARCHAR(100),IN EmailAmministratore VARCHAR(100),IN EmailUtilizzatore VARCHAR(100)) 
BEGIN 
	START TRANSACTION;
        INSERT INTO segnalazione VALUES (CURDATE(),Nota,EmailAmministratore,EmailUtilizzatore);
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

#Rimuovi segnalazioni
DELIMITER $
CREATE PROCEDURE EliminaSegnalazioni(IN EmailUtilizzatore VARCHAR(100)) 
BEGIN 
	START TRANSACTION;
        DELETE FROM segnalazione
		WHERE EmailUtilizzatore = segnalazione.EmailUtilizzatore;
        UPDATE utilizzatore
		SET utilizzatore.StatoAccount="Attivo"
		WHERE EmailUtilizzatore = utilizzatore.EmailUtilizzatore;
        
   COMMIT;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizza i messaggi ricevuti per ogni utente
DELIMITER $
CREATE PROCEDURE VisualizzaMessaggiRicevuti(IN EmailUtente VARCHAR(100) )
BEGIN 
	Select Titolo,Testo,Data,EmailAmministratore
    FROM messaggio
    where  messaggio.EmailUtilizzatore= EmailUtente;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizza Segnalazioni ricevute
DELIMITER $
CREATE PROCEDURE VisualizzaSegnalazioni(IN EmailUtente VARCHAR(100) )
BEGIN 
	Select Data,Nota,EmailAmministratore
    FROM segnalazione
    where EmailUtente = messaggio.EmailUtilizzatore;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizza Numero Posti Biblioteca
DELIMITER $
CREATE PROCEDURE VisualizzaTotalePosti(IN CodiceBiblioteca INT )
BEGIN 
	Select NumPosti
    FROM Biblioteca
    where codice = codiceBiblioteca;
END $
DELIMITER ;
#_____________________________________________________________

#Visualizza Indirizzo Biblioteca
DELIMITER $
CREATE PROCEDURE VisualizzaCodiceBiblioteca(IN CodiceBiblioteca INT )
BEGIN 
	Select StatoConservazione
    FROM librocartaceo
    where librocartaceo.CodiceLibro = CodiceLibro;
END $
DELIMITER ;
#_____________________________________________________________


#TRIGGER


# TRIGGER per libro da disponibile a prenotato
CREATE TRIGGER DiventaPrenotato
AFTER INSERT ON prenotazione_libro_cartaceo
FOR EACH ROW 
	UPDATE librocartaceo SET StatoPrestito = 'Prenotato'     
    where NEW.CodiceLibro= librocartaceo.CodiceLibro ;
    
# TRIGGER per libro da prenotato a Consegnato
CREATE TRIGGER DiventaConsegnato
AFTER INSERT ON consegna
FOR EACH ROW 
	UPDATE librocartaceo SET StatoPrestito = 'Consegnato' 
	where librocartaceo.CodiceLibro In (
		select CodiceLibro 
        from prenotazione_libro_cartaceo
        where Codice = New.CodicePrenotazioneLibro);


# TRIGGER per libro da Consegnato a Disponibile
CREATE TRIGGER DiventaDisponibile
AFTER UPDATE ON consegna
FOR EACH ROW 
	UPDATE librocartaceo SET StatoPrestito = 'Disponibile' 
	where librocartaceo.CodiceLibro In (
		select CodiceLibro 
        from prenotazione_libro_cartaceo
        where new.Tipo="Restituzione");        

#TRIGGER PER LA SOSPENSIONE DELLO STATO DELL'ACCOUNT DELL'UTILIZZATORE
CREATE TRIGGER DisattivazioneAccount 
AFTER INSERT ON segnalazione
FOR EACH ROW 
	UPDATE utilizzatore SET StatoAccount = 'Sospeso' 
    WHERE EmailUtilizzatore IN(SELECT NEW.EmailUtilizzatore
				   FROM segnalazione
                   GROUP BY EmailUtilizzatore
				   HAVING COUNT(*)>= 3);
                   