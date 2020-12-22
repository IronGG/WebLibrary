-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 22 Décembre 2020 à 13:30
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdwebprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_book`
--

CREATE TABLE `t_book` (
  `idBook` int(11) NOT NULL,
  `booCover` varchar(50) NOT NULL,
  `booTitle` varchar(50) NOT NULL,
  `booChapter` int(11) NOT NULL,
  `booExtract` varchar(50) DEFAULT NULL,
  `booAbstract` text NOT NULL,
  `booAuthor` varchar(50) NOT NULL,
  `booEditor` varchar(50) NOT NULL,
  `booYear` year(4) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_book`
--

INSERT INTO `t_book` (`idBook`, `booCover`, `booTitle`, `booChapter`, `booExtract`, `booAbstract`, `booAuthor`, `booEditor`, `booYear`, `idUser`, `idCategory`) VALUES
(1, 'Lataque.jpg', 'Shingeki no Kyojin', 130, NULL, 'Il y a 107 ans, les Titans ont presque exterminé la race humaine.\nCes Titans mesurent principalement une dizaine de mètres et ils se nourrissent d\'humains.\nLes humains ayant survécus à cette extermination ont construit une cité fortifiée avec des murs d\'enceinte de 50 mètres de haut pour pouvoir se protéger des Titans.\n\nPendant 100 ans les humains ont connu la paix.\nEren est un jeune garçon qui rêve de sortir de la ville pour explorer le monde extérieur.\nIl mène une vie paisible avec ses parents et sa sœur Mikasa dans le district de Shiganshina.\n\nMais un jour de l\'année 845, un Titan de plus de 60 mètres de haut apparaît. Il démolit une partie du mur du district de Shiganshina et provoque une invasion de Titans.\n\nEren verra sa mère se faire dévorer sous ses yeux sans rien pouvoir faire. Il décidera après ces événements traumatisants de s\'engager dans les forces militaires de la ville avec pour but d\'exterminer tous les Titans qui existent.', 'Hajime Isayama', 'Kōdansha', 2009, 1, 2),
(2, 'soloLeveling.jpg', 'Solo leveling', 121, NULL, 'Depuis l\'apparition d\'un portail reliant notre monde à un monde rempli de monstres et de créatures de toutes sortes, certaines personnes ont acquis des pouvoirs et la capacité de les chasser : on les appelle les « Chasseurs ». Chaque chasseur voit son potentiel magique classé de E (le plus bas) à S (le plus haut). Le protagoniste de l\'histoire, Sung Jin-Woo, est un chasseur sud-coréen de rang E à peine plus fort qu\'un humain normal. Il est surnommé par ses compères « le chasseur plus faible ». Un jour, lui et son groupe se retrouvent piégés dans un donjon extrêmement dangereux alors qu\'il avait été préalablement détecté en tant que donjon de rang D. Seuls quelques-uns d\'entre eux survivent et parviennent à s\'échapper. Gravement blessé, Sung Jin-Woo reste à l\'arrière et permet aux autres chasseurs de s\'enfuir. Alors qu\'il est sur le point d\'être achevé, Sung Jin-Woo se réveille dans un hôpital où on lui dit que lorsque que les renforts l\'ont retrouvé dans le donjon, il n\'y avait plus aucun monstre aux alentours. Il découvre alors qu\'il possède une capacité qui le transforme en un « Joueur » et qu\'il peut désormais voir une interface lui montrant des quêtes, un inventaire, une boutique qu\'il est le seul à voir... Il découvre également qu\'il peut progresser dans les rangs, ce qui est normalement impossible pour un chasseur. ', 'Chu-Gong', 'Kakao', 2018, 1, 8),
(3, 'NoGameNoLife.jpg', 'No game no life', 11, NULL, 'Sora et Shiro sont deux frère et sœur hikikomori. L\'hikikomori désigne une pathologie psycho-sociale caractérisant les personnes (souvent des adolescents) qui vivent coupées du monde en restant cloîtrées chez elles, refusant toute communication. Dans le cas des deux protagonistes, leur condition vient de leur vision du monde réel, qui se résume à un jeu guère intéressant.\r\n\r\nEnsemble, ils forment un duo de joueurs invaincus, véritable légende urbaine. Un jour, un garçon se qualifiant de "Dieu" les transporte dans un monde fantastique, où il a interdit toute forme de violence entre les 16 races différentes y vivant. À la place, toute décision ou conflit est réglé par le jeu. Les deux adolescents y sont convoqués car ils pourraient bien être les sauveurs de l\'humanité, la race Imanity qui, classée dernière parmi les 16 races, se retrouve confinée dans leur seule et unique cité restante. Durant leur quête pour sauver l\'Imanity, ils rencontrent Stephanie Dola : reconnue comme la petite fille de l\'ancien roi considéré comme fou, Jibril : une Flügel qui est l\'une des races les plus puissantes et Kurami Zell : une ancienne ennemie devenue une alliée.', ' Yū Kamiya', 'Media Factory', 2013, 1, 5),
(4, 'chi.jpg', ' Chi\'s Sweet Home', 218, NULL, 'Un chaton femelle gris et blanc tigré de noir déambule loin de sa mère et du restant de la portée alors qu\'il se promenait dehors avec sa famille. Perdu, le chaton cherche à retrouver sa famille mais à la place il rencontre un jeune garçon, Yohei, et sa mère. Ils emmènent le chaton chez eux, mais les animaux ne sont pas autorisés dans leur immeuble, ils essayent alors de lui trouver un nouveau foyer. Mais cela se révèle être une tâche difficile, et la famille décide finalement de garder le chaton, en le baptisant « Chi ». Finalement, ils trouvent un autre immeuble, où les chats sont autorisés. Un jour, Yohei aperçoit une affiche de recherche à l\'effigie de Chi. Alors, la famille hésite à rendre Chi...\r\n\r\nChaque épisode de ces livres sont différents, mais suivent malgré tout les aventures amusantes d\'un chaton innocent et naïf. ', ' Konami Kanata', 'Kōdansha', 2004, 1, 5),
(5, 'nana.jpg', 'Nana', 84, NULL, 'Dans le Japon contemporain, deux jeunes femmes se rencontrent dans le train les conduisant à Tōkyō. L\'une va rejoindre son petit ami tandis que l\'autre veut devenir chanteuse professionnelle. Inconsciemment, cette dernière est également à la poursuite de son petit ami parti faire carrière dans la musique deux ans plus tôt. Leur destination n\'est pas leur seul point commun car elles ont le même âge (20 ans), mais aussi le même prénom : Nana. Elles se séparent finalement à la descente du train. Plus tard, elles se retrouvent par hasard, alors qu\'elles cherchaient toutes les deux un appartement. Trouvant avantageux de partager les frais de loyer, elles décident de vivre en colocation dans l\'appartement 707 (c\'est une autre coïncidence car leur prénom, Nana, représente le chiffre 7 en japonais). Aussi différentes d\'apparence que de caractère, Nana Ōsaki et Nana Komatsu vont se lier d\'une profonde et fusionnelle amitié, se complétant et se soutenant mutuellement à travers les différentes épreuves qu\'elles seront amenées à traverser. ', ' Ai Yazawa', 'Shūeisha', 0000, 1, 3),
(6, 'godofhigh.jpg', 'The God of High School', 481, NULL, 'Le manhwa raconte les aventures du protagoniste Jin Mo-Ri, un artiste martial de 17 ans à Séoul5. Au début de l\'histoire, il est invité à un tournoi d\'arts martiaux appelé « The God Of High School » (ou « Dieu du lycée » en français). L\'événement, parrainé par une corporation louche, réunit des participants de toute la Corée du Sud pour les phases régionales, puis nationales afin de choisir trois représentants pour le tournoi mondial. En récompense, le gagnant voit le vœu de son choix réalisé.\r\n\r\nCela intrigue Mo-Ri, et au fur de sa progression dans les préliminaires, il rencontrera de nombreux autres concurrents, chacun avec son propre style et ses motivations. Parmi lesquels deux prodiges des arts martiaux : L\'expert en karaté full-contact Han Dae-Wi et la bretteuse Yu Mi-Ra. Ces deux combattants se lieront d\'amitié avec Mo-Ri après l\'avoir affronté, et les trois personnages seront sélectionnés ensemble en tant que représentants de la Corée du Sud pour les phases mondiales. Au fur et à mesure que les préliminaires se terminent et que les équipes se forment, le voile se lève sur la nature de la mystérieuse organisation et des sombres intentions de ses membres. ', 'Park Yong-Je', 'Naver', 2011, 1, 8),
(36, '2020122201564371-e9UcsBxL.jpg', 'Vinland Saga', 176, 'test', 'Thorfinn est le fils de l\'un des plus grands guerriers Vikings, mais quand son père est tué au combat par le chef mercenaire Askeladd, il jure de se venger.\r\n\r\nThorfinn rejoint alors le groupe d\'Askeladd pour le défier en duel. Cependant, il se retrouve pris au milieu d\'une guerre pour la couronne d\'Angleterre.', 'Makoto Yukimura', 'Kōdansha', 2005, 6, 5),
(37, '2020122213041436587.jpg', 'Tonikaku Kawaii: Fly Me to the Moon', 138, 'test', '\r\nLe prénom de Nasa Yuzaki, un collégien studieux, s\'écrit avec le kanji de «Nuit étoilée», mais il se prononce «Nasa». Pour ne plus que l\'on se moque de son nom étrange, il s\'est juré de devenir une personne importante.\r\n\r\nDurant une nuit enneigée, il aperçoit une jeune fille dont il tombe tout de suite amoureux. Cependant, alors qu\'il ne fait plus attention à la route, il se fait renverser par un camion.\r\n\r\nTsukasa, la jeune fille qu\'il regardait, le sauve et Nasa profite de cette situation pour lui avouer ses sentiments. La jeune fille accepte de sortir avec lui mais à une seule condition : ils doivent se marier !\r\n\r\nPlusieurs années après cet événement, Tsukasa vient sonner chez Nasa pour tenir la promesse qu\'elle a faite. Ainsi commence la vie à deux de nos jeunes mariés !', 'Kenjirō Hata', 'Shōgakukan', 2018, 7, 2),
(38, '2020122213074351rzZ68o7ZL.jpg', 'Kakegurui', 82, 'test', 'L\'Académie privée de Hyakkaou est un établissement pour les personnes privilégiées un peu particulier. Quand vous êtes les enfants des plus riches des riches, ce n\'est pas votre prouesse athlétique ou la sagesse des livres qui vous maintient tout en haut. C\'est votre don pour les jeux d\'argent.\r\nQuelle meilleure façon de perfectionner ses compétences qu\'avec un programme rigoureux de jeu ?\r\n\r\nDans l\'Académie privée de Hyakkaou, les gagnants vivent comme des rois alors que les perdants sont condamnés à devenir des animaux de compagnie.\r\n\r\nL\'histoire se centre sur Yumeko Jabami, une mystérieuse étudiante récemment transférée qui a plus d\'un tour dans son sac, et de Suzui, un élève persécuté par Mary Saotome, une élève sadique qui prend un malin plaisir à détruire tous ses adversaires.', 'Homura Kawamoto', 'Square Enix', 2014, 7, 2),
(39, '20201222132814Doraemon.jpg', 'Doraemon', 256, 'test', 'Doraemon est un robot-chat bleu envoyé dans le passé par le descendant du jeune Nobi Nobita, afin d\'aider ce dernier à rembourser ses dettes qui se sont accumulées dans le futur et que tous ses descendants doivent, maintenant, payer.\r\n\r\nDoraemon aide le petit garçon en lui prêtant un nombre incalculable de gadgets futuristes (normal, il vient du futur, me direz-vous !).\r\n\r\nMais Nobita, ne se sert pas toujours adroitement de ces objets, ce qui provoque bon nombre de situations farfelues.', 'Fujiko Fujio', 'Shōgakukan', 1969, 6, 4),
(40, '2020122213314781MA8eU6EyL.jpg', 'Karneval', 136, 'test', 'Nai est un jeune garçon à la recherche de Karoku, avec qui il a grandit. Celui-ci a disparu depuis peu en ne laissant derrière lui qu\'un étrange bracelet qui serait lié à l\'Organisation Nationale de Défense, plus connu sous le nom de "Circus".\r\nIl rencontre Gareki alors que ce dernier s\'apprêtait à dévaliser la maison de Lady Mine où Nai était retenu prisonnier. Le jeune voleur décide de lui prêter main forte et l\'aide à s\'échapper. C\'est ainsi que les deux compagnons se mettent sur la piste de Circus, une organisation qui serait apparemment chargée de poursuivre de grands criminels...', 'Tōya Mikanagi', 'Ichijinsha', 2008, 7, 6),
(41, '2020122213461681IbeXrDOTL.jpg', 'Kilari', 153, 'test', 'Kilari Tsukishima est une jeune fille de 14 ans, très gourmande et déterminée. Un jour en rentrant du collège, elle sauve une tortue appartenant à un garçon de son âge nommé Seiji Hiwatari. Elle tombe tout de suite amoureuse de lui. Kilari découvre par la suite que Seiji est un chanteur qui fait partie du populaire duo SHIPS. Pour le revoir, elle décide d\'entrer elle aussi dans le monde du spectacle pour devenir une chanteuse idol. Malgré les nombreux obstacles et avec l\'aide de son petit chat Na-San et de ses amis, elle arrive à se faire une place en tant qu\'artiste. Mais au fil des épisodes, Kilari se rend compte que ses sentiments envers Seiji ne sont pas tout à fait exacts, et qu\'elle était en réalité amoureuse de quelqu\'un d\'autre... ', 'An Nakahara', 'Shōgakukan', 2004, 6, 4),
(42, '2020122213492951SXmvcKDYL.jpg', 'Nodame Cantabile', 136, 'test', 'C\'est l\'histoire de Shin\'ichi Chiaki, étudiant en 3eme classe de piano à l\'Académie de musique Momogaoka. Né dans une famille de musiciens, il est un excellent pianiste et violoniste. Son rêve est de devenir chef d\'orchestre comme son mentor Sebastiano Viera. Il se sent prisonnier au Japon et perçoit son avenir musical en noir. C\'est dans ce contexte qu\'il rencontre Megumi Node (Nodame) qui ne sait pas lire une partition. Mais elle tombe amoureuse de Chiaki et ces deux personnages vont mutuellement se rapprocher...', ' Tomoko Ninomiya', 'Kōdansha', 2001, 7, 6),
(43, '20201222135321grims-manga-pika.jpg', 'Grimms Manga ', 1, 'test', 'Les contes des frères Grimm revisités façon manga ! Des récits classiques remis au goût du jour qui n\'ont décidément pas pris une ride.\r\n\r\nKei Ishiyama, l\'auteure, ne se contente pas d\'adapter ces récits mais s\'en inspire pour proposer ses propres poésies narratives... et fait preuve d\'une imagination pour le moins débordante ! Le loup du Petit Chaperon rouge reçoit ainsi les conseils avisés de\r\nchèvres avant de deviser sur l\'injustice des hommes et d\'aider Mère-Grand à couper du bois. Raiponce, aux cheveux d\'or et à la voix d\'ange, n\'est plus une jeune fille mais un beau jeune homme retenu par une sorcière... Des contes revisités aux personnages très « kawaï » qui se terminent toujours bien pour le plus grand bonheur des lecteurs !', 'Kei Ishiyama', 'Tokyopop', 2007, 7, 4),
(44, '20201222140034orange_takano_ichigo_1810.jpg', 'Orange', 45, 'test', 'Un jour de printemps, Naho Takamiya, âgée de 16 ans, reçoit une étrange lettre signée de son propre nom, datant de dix ans dans le futur. Elle croit d\'abord bien sûr à une plaisanterie. Cependant, en commençant à lire la lettre et les détails qui y sont écrits, elle se rend compte au fur et à mesure que des événements relatés se sont réalisés, tels que l\'arrivée du nouvel étudiant, Kakeru Naruse, qui est assis à côté d\'elle en classe.\r\n\r\nDans la lettre, la Naho du futur parle de ses nombreux regrets, sous-entendant à la Naho du présent de prendre de meilleures décisions, en particulier concernant Kakeru. En effet, le jeune garçon n\'est plus de ce monde dans le futur. La Naho du futur lui demande donc de veiller sur lui...\r\n\r\n', 'Ichigo Takano', 'Shūeisha', 2012, 6, 3),
(45, '20201222140448hamatora-kurokawa.jpg', 'Hamatora', 20, 'test', 'L\'histoire se déroule dans un monde où certaines personnes sont nées avec un pouvoir spécial appelé "minimum".\r\n\r\nL\'équipe de détectives Hamatora est composé de deux utilisateurs de ce pouvoir : Nice et Murasaki.\r\nUn jour, alors qu\'ils travaillaient à Yokohama, ils tombent sur des infos concernant un dangereux serial killer recherché par un de leurs amis.\r\nMais rapidement, il s\'avère que ce tueur ne s\'attaque qu\'aux gens comme eux, qui sont nés avec un pouvoir.', 'Yukino Kitajima', 'Shūeisha', 2013, 1, 5),
(46, '20201222140912re_creators_7080.jpg', 'Re:Creators', 35, 'test', '\r\nLes humains ont créé plusieurs histoires. Joie, tristesse, la colère, profondes émotions. Ces histoires qui bouleversent nos émotions et nous fascinent.\r\n\r\nSi les personnages de ces histoires avaient leurs propres émotions et intentions, serions-nous des existences divines pour les avoir créé ?\r\n\r\nNotre monde a changé, dans Re:CREATORS, tout le monde devient un Créateur.\r\n\r\n', ' Daiki Kase', 'Shōgakukan', 2017, 7, 5),
(47, '20201222141430tama_no_ue_6073.jpg', 'My Roommate is a Cat', 32, 'test', 'Subaru Mikazuki est un écrivain asocial préférant rester enfermé chez lui que de sortir voir le monde et faire des rencontres. Un jour, il fait la rencontre d\'un chat errant qui devient sa grande source d\'inspiration. On suit ainsi leur quotidien à la fois du point de vue de Subaru et de Haru.', 'Minatsuki', 'Holp Shuppan', 2015, 1, 3),
(48, '2020122214210781J4YoT5SJL.jpg', 'Kuma Kuma Kuma Bear', 30, 'test', '\'histoire nous entraîne dans le quotidien de Yuna, une jeune fille de 15 ans qui vient de commencer à jouer au premier VRMMO du monde. Après avoir gagné plusieurs milliards de yens, elle décide de se confiner chez elle pour jouer toute la journée sans même aller à l\'école.\r\n\r\nAujourd\'hui est grand jour pour l\'histoire de ce jeu car une mise à jour majeure est arrivée ! Ainsi, elle reçoit une rare tenue d\'ours non transférable. Cependant, cette tenue est bien trop gênante pour Yuna et elle ne peut se permettre de la porter, même en jeu. De plus, après avoir répondu à un sondage concernant cette nouvelle mise à jour, elle apparaît dans une forêt inconnue en portant la fameuse tenue.\r\n\r\nYuna va donc commencer son aventure en faisant ce qu\'elle désire.', 'Kumanano', 'Shōsetsuka ni Narō', 2014, 7, 5),
(49, '20201222142535hotaru_2039.jpg', 'Hotaru', 87, 'test', 'Hotaru Amemiya travaille dans une entreprise de design intérieur et mène une petite vie tranquille : elle sort avec ses amies, lit des mangas, traînasse dans son appartement une bière à la main les jours de congé, ne se prend pas la tête et, surtout, ne s\'intéresse pas aux hommes. Pourtant sa vie va changer petit à petit le jour où, par un caprice du destin, Hotaru commence une insouciante cohabitation avec son chef, le séduisant Seiichi Takano, séparé de son épouse. Insouciante, certes, mais non sans difficultés. En effet, Takano ne se lasse pas de la rappeler à l\'ordre... Il la surnomme même « le poisson séché » car sa vie amoureuse est inexistante. Pourtant sur ce point-là aussi les choses vont évoluer pour Hotaru. Quand elle rencontre le charmant designer Makoto, son cœur s\'emballe et c\'est avec confiance qu\'elle se tourne vers Takano qui va lui expliquer le cœur des hommes.', ' Satoru Hiura', 'Kōdansha', 2004, 7, 6);

-- --------------------------------------------------------

--
-- Structure de la table `t_category`
--

CREATE TABLE `t_category` (
  `idCategory` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_category`
--

INSERT INTO `t_category` (`idCategory`, `catName`) VALUES
(2, 'Shõnen'),
(3, 'Shõjo'),
(4, 'Kodomo'),
(5, 'Seinen'),
(6, 'Josei'),
(8, 'Manhwa');

-- --------------------------------------------------------

--
-- Structure de la table `t_evaluate`
--

CREATE TABLE `t_evaluate` (
  `idUser` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `evaGrade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL,
  `usePseudo` varchar(50) NOT NULL,
  `useDate` date NOT NULL,
  `usePassword` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `usePseudo`, `useDate`, `usePassword`) VALUES
(1, 'Chiwou', '2020-09-11', 'mdppassecurisédutout'),
(6, 'IronGG', '2020-12-22', '$2y$10$Fm0OsK6MmvW1.IBgqKzjBeGj2jeewtXbby3Z.Jt5Gx5yhSi5e1T26'),
(7, 'Pouky', '2020-12-22', '$2y$10$h3uMiQqpgsNAGdl6L/tyzeekvOHPBzN03HPA2X1jDo2rW79eN9j0O');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_book`
--
ALTER TABLE `t_book`
  ADD PRIMARY KEY (`idBook`),
  ADD UNIQUE KEY `ID_t_livre_IND` (`idBook`),
  ADD KEY `FKt_appartenir_IND` (`idCategory`),
  ADD KEY `FKt_proposer_IND` (`idUser`);

--
-- Index pour la table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`idCategory`),
  ADD UNIQUE KEY `ID_t_categorie_IND` (`idCategory`);

--
-- Index pour la table `t_evaluate`
--
ALTER TABLE `t_evaluate`
  ADD PRIMARY KEY (`idUser`,`idBook`),
  ADD UNIQUE KEY `ID_t_evaluer_IND` (`idUser`,`idBook`),
  ADD KEY `FKt_e_t_l_IND` (`idBook`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `ID_t_utilisateur_IND` (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_book`
--
ALTER TABLE `t_book`
  MODIFY `idBook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT pour la table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_book`
--
ALTER TABLE `t_book`
  ADD CONSTRAINT `FKt_appartenir_FK` FOREIGN KEY (`idCategory`) REFERENCES `t_category` (`idCategory`),
  ADD CONSTRAINT `FKt_proposer_FK` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_evaluate`
--
ALTER TABLE `t_evaluate`
  ADD CONSTRAINT `FKt_e_t_l_FK` FOREIGN KEY (`idBook`) REFERENCES `t_book` (`idBook`),
  ADD CONSTRAINT `FKt_e_t_u` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
