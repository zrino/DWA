CREATE DATABASE  IF NOT EXISTS `kazaliste` /*!40100 DEFAULT CHARACTER SET cp1250 COLLATE cp1250_croatian_ci */;
USE `kazaliste`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: kazaliste
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Glumci`
--

DROP TABLE IF EXISTS `Glumci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Glumci` (
  `GID` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(45) COLLATE cp1250_croatian_ci NOT NULL,
  `Prezime` varchar(45) COLLATE cp1250_croatian_ci NOT NULL,
  `DOB` datetime DEFAULT NULL,
  PRIMARY KEY (`GID`),
  UNIQUE KEY `GID_UNIQUE` (`GID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Glumci`
--

LOCK TABLES `Glumci` WRITE;
/*!40000 ALTER TABLE `Glumci` DISABLE KEYS */;
INSERT INTO `Glumci` VALUES (1,'Pero','Perić','0000-00-00 00:00:00'),(3,'Guilherme ','Gameiro Alves','1989-09-29 00:00:00'),(4,'George','Stanciu','1982-11-09 00:00:00'),(5,'Natalia','Horsnell','1991-04-22 00:00:00'),(6,'Takuya','Sumitomo',NULL),(7,'Azamat','Nabiullin','1978-06-27 00:00:00'),(8,'Vitomir','Marof',NULL),(9,'Tamara','Franetović Felbinger','1971-04-04 00:00:00'),(10,'Marija','Kuhar','1971-01-01 00:00:00'),(11,'Damir','Klačar',NULL),(12,'Siniša','Štork',NULL),(13,'Cecilija','Car',NULL),(14,'Ljubomir','Kerekeš','1960-01-16 00:00:00'),(15,'Alma','Prica','1962-09-17 00:00:00'),(16,'Milan','Pleština','1961-05-03 00:00:00'),(17,'Iva','Mihalić','1985-04-03 00:00:00'),(18,'Danko','Ljuština','1952-02-24 00:00:00'),(19,'Bojan','Navojec','1976-04-24 00:00:00');
/*!40000 ALTER TABLE `Glumci` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Glumci_Predstave`
--

DROP TABLE IF EXISTS `Glumci_Predstave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Glumci_Predstave` (
  `GID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`),
  KEY `PID_idx` (`PID`),
  KEY `GID_idx` (`GID`),
  CONSTRAINT `Glumac` FOREIGN KEY (`GID`) REFERENCES `Glumci` (`GID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Predstava` FOREIGN KEY (`PID`) REFERENCES `Predstave` (`PID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Glumci_Predstave`
--

LOCK TABLES `Glumci_Predstave` WRITE;
/*!40000 ALTER TABLE `Glumci_Predstave` DISABLE KEYS */;
INSERT INTO `Glumci_Predstave` VALUES (3,3,2),(4,3,3),(5,3,4),(6,3,5),(7,3,6),(8,4,11),(9,4,12),(10,4,13),(11,4,14),(9,5,15),(12,5,16),(13,5,17),(14,6,18),(15,6,19),(16,6,20),(17,6,21),(19,6,22),(18,7,23),(19,7,24),(17,7,25),(16,7,26);
/*!40000 ALTER TABLE `Glumci_Predstave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Predstave`
--

DROP TABLE IF EXISTS `Predstave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Predstave` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(45) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `Slika` varchar(45) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `Redatelj` int(11) DEFAULT NULL,
  `Opis` varchar(3000) COLLATE cp1250_croatian_ci DEFAULT NULL,
  PRIMARY KEY (`PID`),
  UNIQUE KEY `PID_UNIQUE` (`PID`),
  KEY `Redatelj_idx` (`Redatelj`),
  CONSTRAINT `Redatelj` FOREIGN KEY (`Redatelj`) REFERENCES `Redatelj` (`RID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Predstave`
--

LOCK TABLES `Predstave` WRITE;
/*!40000 ALTER TABLE `Predstave` DISABLE KEYS */;
INSERT INTO `Predstave` VALUES (3,'Romeo i Julija','romeo_i_julija.jpg',2,'Balet Romeo i Julija lirska je priča o tragičnim veronskim ljubavnicima na glazbu Sergeja Sergejeviča Prokofjeva, koja je od svojega nastanka 1938. godine neprekidno nadahnuće mnogih naraštaja koreografa i redatelja. To slavno baletno djelo nastalo je prema Shakespeareovoj drami Romeo i Julija, jednoj od najljepših, najtragičnijih i najčitanijih priča svjetske literature koja već četiri stoljeća služi kao nepresušno vrelo inspiracije autorima  različitih umjetničkih izričaja. Mnogi su skladatelji napisali glazbu za balet ili operu o nesretnim ljubavnicima, koji na početku života tragično skončaju zbog mržnje koja vlada između njihovih obitelji Capuleti i Montecchi. Baletno djelo, prema sinopsisu Sergeja Prokofjeva i Leonida Lavrovskoga, majstorska je glazbena partitura bogata umjetničkog izričaja. Prokofjevljeva glazba omogućila je plesati Shakespearea i njegove likove, koji su time dobili novu dimenziju. Ovim je baletom otvorena posve nova stranica u povijesti baletne umjetnosti. Djelo je djelomičnu svjetsku praizvedbu doživjelo izvan Rusije, u Brnu 30. prosinca 1938. godine, a u integralnoj je  verziji izvedeno11. siječnja 1940. godine u Marijinskome teatru u tadašnjemu Lenjingradu, u koreografiji Leonida Lavrovskog. U Hrvatskome narodnom kazalištu u Zagrebu ovo je šesto uprizorenje najpoznatije baletne ljubavne priče tragičnoga završetka. Prvo je bilo već  1948. godine, samo nekoliko godina poslije nastanka konačne redakcije partiture, u koreografiji Margarete Froman, a istu je predstavu vidjela i londonska publika prigodom gostovanja zagrebačkog Baleta 1955. godine, tek upoznajući Prokofjevljev balet  Romea i Juliju. Godine 1964. koreograf Dimitrije Parlić donio je svoju verziju baleta, 1972. godine novo uprizorenje potpisao je Ivica Sertić, 1983. Waczlaw Orlykowski je postavio balet premijerno izveden na Dubrovačkim ljetnim igrama, a 2002. Dinko Bogdanić. Svaka od tih verzija temeljila se na klasičnome baletnom izričaju, dramaturški slijedivši Shakespeareov predložak. Najnoviji koreografski prikaz ovoga baleta ostvarit će Patrice Bart, slavni francuski koreograf iznimne reputacije, koji je mnogim svojim djelima ostavio neizbrisiv trag na najvažnijim svjetskim baletnim pozornicama te utjecao na brojne koreografe i baletne umjetnike. U predstavi ostvarenoj njegovim karakterističnim klasičnim rukopisom, koji osobito vodi računa o karakterizaciji likova, sudjelovat će solisti i ansambl Baleta HNK uz pratnju Orkestra Opere zagrebačkoga HNK.'),(4,'Nikola Šubić Zrinjski','nikola_subic_zrinjski.jpg',3,'Praizvedba opere Nikola Šubić Zrinjski 1876. Ivana pl. Zajca, osnivača i organizatora zagrebačkog opernog kazališta, bila je višestruko važan kulturološki događaj, između ostalog i zato što je označila rođenje Baleta, još jedne umjetničke grane unutar Hrvatskoga narodnog kazališta. Poslije Vatroslava Lisinskog, Zajc je bio onaj koji je utvrdio hrvatsku glazbenu tradiciju, stvorio i organizirao takoreći ni iz čega hrvatski glazbeni život, na koji su se nadovezivale, sljedeće glazbene generacije. Među mnogim njegovim djelima posebno mjesto zauzimaju opere s tematikom iz hrvatske povijesti i legendi, Mislav, Ban Leget i Nikola Šubić Zrinjski, nastao na libreto hrvatskog književnika Huge Badalića. Tematizirajući posljednje sigetske dane hrvatskog junaka Nikole Šubića Zrinskog i njegovu junačku pogibiju, djelo je već na praizvedbi doživjelo nezapamćen uspjeh i do danas zadržalo iznimno i počasno mjesto na hrvatskoj opernoj sceni. Najveći ushit izazvala je potresna zakletva sigetskih junaka i finale U boj, u boj, koji je kao zborska pjesma skladan deset godina prije opere. Djelomice, veliku popularnost djelo može zahvaliti portretiranju stvarnog junaka iz hrvatske prošlosti, koji je u teškim uvjetima turske najezde spasio Slavoniju od potpunog porobljavanja. Iako nije uspio spriječiti Turke da zauzmu neke gradove, hrabro je poginuo braneći Siget.\n\nOsim izrazitog domoljubnog ozračja koje prevladava operom, bitna karakteristika Zajčeva rukopisa vidljiva je i u diferenciranom prikazu dvaju suprotstavljenih svjetova, odnosno civilizacija, od kojih svaka nosi svoja obilježja. Pomno profilirajući likove junaka Zrinjskog i sultana Sulejmana prema povijesnim činjenicama, Zajc je kao antipode stvorio značajne ženske likove hrvatske operne literature, Evu i Jelenu namijenivši im vrlo važnu dramaturšku i glazbenu zadaću.\n\nTijekom uskoro sto četrdeset godina gotovo kontinuiranog prikazivanja sa sedamsto izvedbi djelo je preživjelo mnoge stručne analize, prosudbe i provjere, ali je uvijek s jednakim ushitom primano i doživljeno od publike. Iznimno zanimljiva gledateljima i slušateljima, opera Zrinjski, uz Eru s onoga svijeta, najpopularnije i najčešće izvođeno djelo naše glazbene scene, inscenirana je 12 puta u različitim redateljskim čitanjima do posljednjega 2010. Krešimira Dolenčića pod ravnanjem Josipa Šege. Plejada najvećih hrvatskih dirigenata, počevši od samog Ivana pl. Zajca, ravnala je glazbenim izvedbama u kojima su nastupale sve generacije pjevača zagrebačke Opere tijekom duge izvedbene povijesti djela koje nikada nije izgubilo svoj domoljubni predznak.'),(5,'Ero s onoga svijeta','ero_s_onoga_svijeta.jpg',3,'Jakov Gotovac pripada najvažnijim hrvatskim skladateljima 20. stoljeća. Originalan u izričaju, odlično poznajući opernu scenu i zborsko stvaralaštvo, kao veliki melodičar tijekom cjelokupnoga stvaralaštva je zadržao umjetničko uvjerenje o pravu na vlastiti glazbeni jezik. Njegovo najuspješnije i najpopularnije djelo, opera Ero s onoga svijeta, već davno je ubrojena među najuspjelije slavenske komične opere, a od preizvedbe u Hrvatskome narodnom kazalištu 1935. gotovo ne silazi s repertoara svih nacionalnih kazališnih kuća. Uskoro sedamstota izvedba samo u zagrebačkoj Operi, svjedoči o zanimljivosti djela koje u kontinuitetu potvrđuje svoju vrijednost, stvorivši trajan i uzajaman odnos s publikom i stručnim ocjenjivačima u zemlji ali i svijetu. Naime, Gotovac je gotovo jedini hrvatski skladatelj koji je uz sjajne uspjehe u domovini, ostvario i bogata priznanja u mnogim gradovima Europe, ali i izvan našega kontinenta. Ero s onoga svijeta je u inozemstvu izveden na više od sto opernih pozornica, dok je libreto preveden na desetak jezika. Brojni osvrti o predstavama postavljenim na stranim pozornicama ocjenjuju Eru zaštitnim znakom hrvatske opere koji prenosi melodije, ritmove, pjesme i plesove svoje domovine u svijet, pri čemu su dramska riječ i glazba idealno spojena. Glazbeni kolorit, bujna orkestracija, živahni ritmovi, pjevne vokalne linije koje neprekinuto teku, u uskoj su vezi s iznimnim libretom Milana Begovića, prepunog duhovitih i domišljatih stihova. Skladatelj i librettist, tražeći duh i stil pučkih pripovijedaka, pronašli su odličnu glazbenu i tekstualnu formula za Eru u folkloru određenih južnoslavenskih skupina. Držim da taj narodni izraz koji se pojavljuje u mojoj glazbi, biološki, iskonski nosim u sebi… Povremeno sam uzimao kakvu temu iz nekih zbirki, ali sam komponirao u narodnom duhu, iz vlastitoga ja, tako je Gotovac objasnio podrijetlo narodnog duha u svojim djelima. Glavni lik opera Ero s onoga svijeta, pokretač radnje je Mića, mladić iz bogate seoske obitelji Dalmatinske zagore. Dok pokušava u susjednom selu pronaći djevojku kojom bi se oženio, na majčin savjet, prikazuje se kao siromah. Predstavlja se kao Ero, s onoga svijeta, i želi biti siguran da ga odabranica Đula iskreno voli. Uvjerivši mnoge kako je on Ero, za svakoga ima poneku priču s onoga svijeta. Iako je mnoge prevario, na kraju mu sve oproste i on dobije djevojku koju ljubi. Efektan baletni finale opere, furioznog tempa, koji se često izvodi i izvan operne strukture, svojevrsna je oda pučkom načinu života, u kojemu glazba prožeta etosom dalmatinskog zaleđa dolazi u prvi plan. Do posljednje inscenacije 2003. u režiji Krešimira Dolenčića, Ero je doživio 12 premijernih izvedbi, a u njima su sudjelovale generacije ponajboljih zagrebačkih opernih i baletnih solista i ansambala.'),(6,'Gospoda Glembajevi','gospoda_glembajevi.jpg',1,'Jedan je Glembaj u viničkoj šumi ubio i orobio nekog kranjskog zlatara koji je vozio u Varaždin crkvenu zlatninu. To je bio prvi kapital koji će tijekom godina od obitelji šumskog razbojnika učiniti moćnu dinastiju Glembajevih, ali i prokletstvo koje će se prenositi tragičnim događajima u svakom sljedećem naraštaju. Svi su Glembajevi varalice i ubojice, kaže bárbóczyjevska legenda i to je bapska priča, sve do trenutka kada događaji izmaknu kontroli i prava priroda Glembajevih ponovno izlazi na površinu. Korupcija, izdaja, stari zločini i potisnute strasti – to je samo početak fatalnog niza koji će dovesti do noći obračuna i konačnog raspada obitelji. Mračne tajne odgovaraju na stare kletve i Glembajevi odlaze u ludilo, bankrot, nepovrat i smrt.\n\nGospoda Glembajevi središnja su drama glembajevskog ciklusa Miroslava Krleže i jedna od najizvođenijih hrvatskih drama uopće, a od praizvedbe 1929. živi vrlo intenzivnim životom u brojnim inscenacijama i inačicama. Kapitalističkom transformacijom društva Glembajevi se svojim upisanim asocijacijama podudaraju sa sve više segmenata suvremenog življenja, pa se tako danas to djelo prepoznaje kao jasan logotip trule civilizacije koja počiva na zajedničkoj krizi pojedinca i obitelji. Propast jednog društva, koja je u Krležino vrijeme na ovim prostorima bilo tek fikcija, danas je činjenica koju lucidno artikulira i raščlanjuje drama o Glembajevima. Krleža je uzeo staru formu ibsenovske građanske drame i premjestio je u drugo vrijeme, čime je stvorio hibridnu, transcendirajuću formu, gdje se prema riječima redatelja Vite Taufera vidi nešto najbliže suvremenom, oštrom, perverznom psihološkom trileru, ali i drami apsurda s elementima vodvilja i komedije. Ove godine Glemabajevi ulaze u petu sezonu igranja na daskama zagrebačkog HNK, a svakom novom izvedbom oduševljavaju puno gledalište i svaki put iznova potvrđuju svoje visoko mjesto na popisu najvećih hrvatskih dramskih klasika.\n\nU vrlo odmjerenoj i promišljenoj inscenaciji redatelja Vite Taufera gotovo integralni Krležin tekst igra se furiozno, do kraja daha i s punom snagom posvećenom svakoj rečenici. Minimalnim likovno-scenskim intervencijama u središtu pozornosti su glumačke kreacije, odnosno psihološke situacije koje nikada ne popuštaju u svojem stanju maksimalne unutrašnje napetosti. Iznimne glumačke kreacije nagrađene su nekolikim nagradama 2012. godine; za ulogu Leonea Glembaja Milan Pleština dobio je godišnju Nagradu Vladimir Nazor, Nagradu Grada Zagreba i Nagradu Mila Dimitrijević zagrebačkog HNK, dok je Olga Pakalović za interpretaciju Beatrice dobila Plaketu Grada Zagreba.'),(7,'Razbojnici','razbojnici.jpg',1,'Najpoznatije dramsko djelo slavnog njemačkog pisca objavljeno je kada je autor imao samo 22 godine i već na prvoj izvedbi doživjelo je golem uspjeh. Schiller je bio pripadnik mlade, buntovne i prodorne generacije umjetnika koji su priklonjeni romantičarskom pokretu Sturm und Drang najavljivali i osjećali val promjene koji je polako zahvaćao čitavu Europu. Odustajanjem od klasicističkog modela, približavanjem Shakespeareovoj formi te iznimnom silovitošću zbivanja, Razbojnici najavljuju i novo razdoblje europske dramske književnosti.\n\nPriča je to o dva brata,  ljubomori, izdaji i bijegu od društvenog poretka. To je tek početak niza neobičnih događaja koji će obojicu braće ispratiti na put bez povratka, a zaplet ispuniti neočekivanim obratima i ekstremnim emocijama koje prate temeljna ljudska pitanja. Premda ovakav zaplet sadržava tipične značajke svojega trenutka i vremena, ni danas ne blijedi potreba za radikalnom promjenom društvenog ustroja, a razmatrajući mogućnosti promjene, i danas se ispituju granice vlastite plemenitosti i ljudskosti. Predstavu Razbojnici režirat će Vito Taufer.');
/*!40000 ALTER TABLE `Predstave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Raspored`
--

DROP TABLE IF EXISTS `Raspored`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Raspored` (
  `Datum` datetime NOT NULL,
  `Cijena` mediumtext COLLATE cp1250_croatian_ci,
  `PID` int(11) NOT NULL,
  `RasporedID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`RasporedID`),
  KEY `PID_idx` (`PID`),
  CONSTRAINT `PID` FOREIGN KEY (`PID`) REFERENCES `Predstave` (`PID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Raspored`
--

LOCK TABLES `Raspored` WRITE;
/*!40000 ALTER TABLE `Raspored` DISABLE KEYS */;
INSERT INTO `Raspored` VALUES ('2016-07-09 18:00:00','40',3,1),('2016-07-10 18:00:00','40',3,2),('2016-07-10 20:00:00','50',4,3),('2016-07-11 19:00:00','50',4,4),('2016-07-11 21:00:00','30',5,5),('2016-07-12 18:00:00','50',4,6),('2016-07-15 18:00:00','40',3,7),('2016-07-16 19:00:00','50',7,8),('2016-07-18 19:00:00','40',3,13),('2016-07-21 20:00:00','45',6,14),('2016-07-23 21:00:00','50',7,15),('2016-07-23 22:00:00','45',6,16);
/*!40000 ALTER TABLE `Raspored` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Redatelj`
--

DROP TABLE IF EXISTS `Redatelj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Redatelj` (
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(45) COLLATE cp1250_croatian_ci NOT NULL,
  `Prezime` varchar(45) COLLATE cp1250_croatian_ci NOT NULL,
  PRIMARY KEY (`RID`),
  UNIQUE KEY `RID_UNIQUE` (`RID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Redatelj`
--

LOCK TABLES `Redatelj` WRITE;
/*!40000 ALTER TABLE `Redatelj` DISABLE KEYS */;
INSERT INTO `Redatelj` VALUES (1,'Vito','Taufer'),(2,'Patrice','Bart'),(3,'Krešimir','Dolenčić');
/*!40000 ALTER TABLE `Redatelj` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-03 21:24:09
