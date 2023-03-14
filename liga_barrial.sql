CREATE DATABASE liga_barrial;
USE liga_barrial;

CREATE TABLE `roles`(
	`id_rol`   tinyint NOT NULL,
	`name_rol` varchar(15) NOT NULL,
	PRIMARY KEY (`id_rol`)
);

CREATE TABLE `users`(
	`cod_user`      varchar(8) NOT NULL ,
	`name_user`     varchar(15) NOT NULL ,
	`fk_id_rol`     tinyint NOT NULL ,
	`surname_user`  varchar(20) NOT NULL ,
	`nickname_user` varchar(25) NOT NULL ,
	`email_user`    varchar(45) NOT NULL ,
	`password_user` varchar(255) NOT NULL ,
	`image_user`    varchar(255) NULL ,
	PRIMARY KEY (`cod_user`),
	FOREIGN KEY (`fk_id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `posts`(
	`id_post`      mediumint NOT NULL auto_increment,
	`image_post`   varchar(255) NOT NULL ,
	`fk_cod_user`  varchar(8) NOT NULL ,
	`title_post`   varchar(60) NOT NULL ,
	`content_post` text NOT NULL ,
	PRIMARY KEY (`id_post`),
	FOREIGN KEY (`fk_cod_user`) REFERENCES `users` (`cod_user`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `team_president`(
	`id_president_team` varchar(10) NOT NULL ,
	`fk_cod_user`       varchar(8) NOT NULL ,

	PRIMARY KEY (`id_president_team`),
	FOREIGN KEY (`fk_cod_user`) REFERENCES `users` (`cod_user`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `soccer_teams`(
	`id_team`             varchar(10) NOT NULL ,
	`name_team`           varchar(30) NOT NULL ,
	`logo_team`           varchar(255) NOT NULL ,
	`fundation_date_team` date NOT NULL ,
	`desciption_team`     varchar(60) NULL ,
    `fk_president_team`   varchar(10) NULL,
	PRIMARY KEY (`id_team`),
    FOREIGN KEY (`fk_president_team`) REFERENCES `team_president` (`id_president_team`) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE `players`(
	`ci_player`        varchar(10) NOT NULL ,
	`fk_cod_user`      varchar(8) NOT NULL ,
	`fk_id_team`       varchar(10) NOT NULL ,
	`age_player`       tinyint NOT NULL ,
	`born_date_player` date NOT NULL ,

	PRIMARY KEY (`ci_player`),
	FOREIGN KEY (`fk_id_team`) REFERENCES `soccer_teams` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`fk_cod_user`) REFERENCES `users` (`cod_user`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `asociation_president`(
	`id_aso_president` varchar(10) NOT NULL ,
	`fk_cod_user`      varchar(8) NOT NULL ,
	PRIMARY KEY (`id_aso_president`),
	FOREIGN KEY (`fk_cod_user`) REFERENCES `users` (`cod_user`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `tournament`(
	`cod_tournament`   smallint NOT NULL auto_increment,
	`prize_tournament` decimal(5,2) NOT NULL ,
	`fk_aso_president` varchar(10) NULL ,
	`start_date`       date NOT NULL ,
	`finish_date`      date NOT NULL ,

	PRIMARY KEY (`cod_tournament`),
	FOREIGN KEY (`fk_aso_president`) REFERENCES `asociation_president` (`id_aso_president`) ON UPDATE CASCADE ON DELETE SET NULL
);


CREATE TABLE `secretaries`(
	`id_secretary`    varchar(10) NOT NULL ,
	`fk_id_president` varchar(10) NOT NULL ,
	`fk_cod_user`     varchar(8) NOT NULL ,

	PRIMARY KEY (`id_secretary`),
	FOREIGN KEY (`fk_id_president`) REFERENCES `team_president` (`id_president_team`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`fk_cod_user`) REFERENCES `users` (`cod_user`) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE `matches`(
	`id_match`          smallint NOT NULL AUTO_INCREMENT,
	`fk_visit_team`     varchar(10) NULL ,
	`fk_cod_tournament` smallint NULL,
	`fk_local_team`     varchar(10) NULL ,
    `name_visit_team`     varchar(30) NOT NULL ,
	`name_local_team`     varchar(30) NOT NULL ,
	`goals_winner`      smallint NULL ,
	`goals_loser`       smallint NULL ,
	`office_match`      varchar(255) NULL ,
	`date_match`        datetime NOT NULL ,

	PRIMARY KEY (`id_match`),
	FOREIGN KEY (`fk_visit_team`) REFERENCES `soccer_teams` (`id_team`) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (`fk_local_team`) REFERENCES `soccer_teams` (`id_team`) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (`fk_cod_tournament`) REFERENCES `tournament` (`cod_tournament`) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE `goals`(
	`id_goal`      mediumint NOT NULL auto_increment,
	`fk_ci_player` varchar(10) NOT NULL ,
	`fk_id_match`  smallint NOT NULL ,
	`time_goal`    datetime NOT NULL ,

	PRIMARY KEY (`id_goal`),
	FOREIGN KEY (`fk_ci_player`) REFERENCES `players` (`ci_player`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`fk_id_match`) REFERENCES `matches` (`id_match`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `penalties`(
	`id_penalty`    smallint NOT NULL auto_increment,
	`fk_ci_player`  varchar(10) NOT NULL ,
	`fk_id_match`   smallint NOT NULL ,
	`type_penalty`  VARCHAR(1) NULL ,
	`price_penalty` decimal(4,2) NULL ,

	PRIMARY KEY (`id_penalty`),
	FOREIGN KEY (`fk_ci_player`) REFERENCES `players` (`ci_player`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`fk_id_match`) REFERENCES `matches` (`id_match`) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO roles VALUES (0, 'Administrador'), (1, 'Presidente Liga'), (2, 'Presidente Asoc'), (3, 'Jugador'), (4, 'Usuario'), (5, 'Secretario');
SELECT * FROM roles;

INSERT INTO users VALUES ('#FP18F', 'Felipe', 0, 'Pazmino', 'Felipe', 'felipe@gmail.com', '123123123123', 'cloudinary/http....'),
						 ('#EC18E', 'Estela', 1, 'Chipantasi', 'Estela', 'estela@gmail.com', '123123123123', 'cloudinary/http....'),
                         ('#UP18U', 'Usuario', 1, 'Presidente', 'Usuario', 'presidente@gmail.com', '123123123123', 'cloudinary/http....'),
						 ('#ER18E', 'Edison', 4, 'Rivera', 'Edison', 'edison@gmail.com', '123123123123', 'cloudinary/http....'),
                         ('#CM18C', 'Camila', 3, 'Mier', 'Camila', 'camila@gmail.com', '123123123123', 'cloudinary/http....'),
                         ('#UT18U', 'Usuario', 2, 'Test', 'Usuario', 'usuario@gmail.com', '123123123123', 'cloudinaty/http....'),
                         ('#US18U', 'Usuario', 5, 'Secretario', 'Secretario', 'secretario@gmail.com', '123123123123', 'cloudinaty/http....');
SELECT * FROM users;

INSERT INTO team_president VALUES ('#PRLI18', '#EC18E'), ('#PRAU18', '#UP18U');
SELECT * FROM team_president;

INSERT into soccer_teams VALUES ('#LI1823S', 'Liga de Quito', 'cloudinaty/http....', CURDATE(), 'Somos un Club', '#PRLI18'), 
								('#AU1823S', 'Aucas', 'cloudinaty/http....', CURDATE(), 'Somos un Club', '#PRAU18');
SELECT * FROM soccer_teams;

INSERT INTO players VALUES ('1717171717', '#CM18C', '#LI1823S', 21, '2002-05-31');
SELECT * FROM players;

INSERT INTO asociation_president VALUES ('#PALBB18UT', '#UT18U');
SELECT * FROM asociation_president;

INSERT INTO secretaries VALUES ('#USUS18LB', '#PRLI18', '#US18U');
SELECT * FROM secretaries;

INSERT INTO matches(fk_visit_team, fk_cod_tournament, fk_local_team, name_visit_team, name_local_team, goals_winner, goals_loser, office_match, date_match) 
VALUES ('#LI1823S', NULL, '#AU1823S',  'Liga de Quito', 'Aucas', NULL, NULL, NULL, NOW());

SELECT * FROM matches;

INSERT INTO goals(fk_ci_player, fk_id_match, time_goal) VALUES ('1717171717', 1, NOW());
SELECT * FROM goals;

INSERT INTO penalties(fk_ci_player, fk_id_match, type_penalty, price_penalty) VALUES ('1717171717', 1, '0', 14.90);
SELECT * FROM penalties;

INSERT INTO tournament(prize_tournament, fk_aso_president, start_date, finish_date) VALUES(90, '#PALBB18UT', CURDATE(), '2023-05-31');
SELECT * FROM tournament;

INSERT INTO posts(image_post, fk_cod_user, title_post, content_post) VALUES ('cloudinaty/http....', '#EC18E', 'Test Post', 'Este es un test para un post');
SELECT * FROM posts;

# DELETE FROM users WHERE cod_user = '#EC18E';
# DELETE FROM soccer_teams WHERE id_team = '#LI1823S';
# DELETE FROM players WHERE ci_player = '1717171717'